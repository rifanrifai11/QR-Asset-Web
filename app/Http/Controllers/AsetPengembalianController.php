<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetPengembalianRequest;
use App\Http\Requests\UpdateAsetPengembalianRequest;
use App\Models\Departemen;
use App\Repositories\AsetPengembalianRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetPengembalianController extends AppBaseController
{
    /** @var  AsetPengembalianRepository */
    private $asetPengembalianRepository;

    public function __construct(AsetPengembalianRepository $asetPengembalianRepo)
    {
        $this->asetPengembalianRepository = $asetPengembalianRepo;
    }

    /**
     * Display a listing of the AsetPengembalian.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPengembalianRepository->pushCriteria(new RequestCriteria($request));
        $asetPengembalians = $this->asetPengembalianRepository->all();

        return view('aset_pengembalians.index')
            ->with('asetPengembalians', $asetPengembalians);
    }

    /**
     * Show the form for creating a new AsetPengembalian.
     *
     * @return Response
     */
    public function create()
    {
        $departemen=Departemen::pluck('nama','id');
        return view('aset_pengembalians.create',compact('departemen'));
    }

    /**
     * Store a newly created AsetPengembalian in storage.
     *
     * @param CreateAsetPengembalianRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPengembalianRequest $request)
    {
        $input = $request->all();

        $asetPengembalian = $this->asetPengembalianRepository->create($input);

        Flash::success('Aset Pengembalian saved successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPengembalians.index'));
        }
    }

    /**
     * Display the specified AsetPengembalian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetPengembalian = $this->asetPengembalianRepository->findWithoutFail($id);

        if (empty($asetPengembalian)) {
            Flash::error('Aset Pengembalian not found');

            return redirect(route('asetPengembalians.index'));
        }

        return view('aset_pengembalians.show')->with('asetPengembalian', $asetPengembalian);
    }

    /**
     * Show the form for editing the specified AsetPengembalian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetPengembalian = $this->asetPengembalianRepository->findWithoutFail($id);

        if (empty($asetPengembalian)) {
            Flash::error('Aset Pengembalian not found');

            return redirect(route('asetPengembalians.index'));
        }
        $departemen=Departemen::pluck('nama','id');
        return view('aset_pengembalians.edit',compact('departemen'))->with('asetPengembalian', $asetPengembalian);
    }

    /**
     * Update the specified AsetPengembalian in storage.
     *
     * @param  int              $id
     * @param UpdateAsetPengembalianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPengembalianRequest $request)
    {
        $asetPengembalian = $this->asetPengembalianRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetPengembalian)) {
            Flash::error('Aset Pengembalian not found');

            return redirect(route('asetPengembalians.index'));
        }

        $asetPengembalian = $this->asetPengembalianRepository->update($request->all(), $id);

        Flash::success('Aset Pengembalian updated successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPengembalians.index'));
        }
    }

    /**
     * Remove the specified AsetPengembalian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $asetPengembalian = $this->asetPengembalianRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetPengembalian)) {
            Flash::error('Aset Pengembalian not found');

            return redirect(route('asetPengembalians.index'));
        }

        $this->asetPengembalianRepository->delete($id);

        Flash::success('Aset Pengembalian deleted successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetPengembalians.index'));
        }
    }
}
