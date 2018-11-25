<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetMutasiRequest;
use App\Http\Requests\UpdateAsetMutasiRequest;
use App\Models\Departemen;
use App\Repositories\AsetMutasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetMutasiController extends AppBaseController
{
    /** @var  AsetMutasiRepository */
    private $asetMutasiRepository;

    public function __construct(AsetMutasiRepository $asetMutasiRepo)
    {
        $this->asetMutasiRepository = $asetMutasiRepo;
    }

    /**
     * Display a listing of the AsetMutasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetMutasiRepository->pushCriteria(new RequestCriteria($request));
        $asetMutasis = $this->asetMutasiRepository->all();

        return view('aset_mutasis.index')
            ->with('asetMutasis', $asetMutasis);
    }

    /**
     * Show the form for creating a new AsetMutasi.
     *
     * @return Response
     */
    public function create()
    {
        $departemen=Departemen::pluck('nama','id');
        return view('aset_mutasis.create',compact('departemen'));
    }

    /**
     * Store a newly created AsetMutasi in storage.
     *
     * @param CreateAsetMutasiRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetMutasiRequest $request)
    {
        $input = $request->all();

        $asetMutasi = $this->asetMutasiRepository->create($input);

        Flash::success('Aset Mutasi saved successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetMutasis.index'));
        }
    }

    /**
     * Display the specified AsetMutasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetMutasi = $this->asetMutasiRepository->findWithoutFail($id);

        if (empty($asetMutasi)) {
            Flash::error('Aset Mutasi not found');

            return redirect(route('asetMutasis.index'));
        }

        return view('aset_mutasis.show')->with('asetMutasi', $asetMutasi);
    }

    /**
     * Show the form for editing the specified AsetMutasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetMutasi = $this->asetMutasiRepository->findWithoutFail($id);

        if (empty($asetMutasi)) {
            Flash::error('Aset Mutasi not found');

            return redirect(route('asetMutasis.index'));
        }
        $departemen=Departemen::pluck('nama','id');
        return view('aset_mutasis.edit',compact('departemen'))->with('asetMutasi', $asetMutasi);
    }

    /**
     * Update the specified AsetMutasi in storage.
     *
     * @param  int              $id
     * @param UpdateAsetMutasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetMutasiRequest $request)
    {
        $asetMutasi = $this->asetMutasiRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetMutasi)) {
            Flash::error('Aset Mutasi not found');

            return redirect(route('asetMutasis.index'));
        }

        $asetMutasi = $this->asetMutasiRepository->update($request->all(), $id);

        Flash::success('Aset Mutasi updated successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetMutasis.index'));
        }
    }

    /**
     * Remove the specified AsetMutasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $asetMutasi = $this->asetMutasiRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetMutasi)) {
            Flash::error('Aset Mutasi not found');

            return redirect(route('asetMutasis.index'));
        }

        $this->asetMutasiRepository->delete($id);

        Flash::success('Aset Mutasi deleted successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetMutasis.index'));
        }
    }
}
