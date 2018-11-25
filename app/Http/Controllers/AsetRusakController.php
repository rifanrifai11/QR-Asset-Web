<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetRusakRequest;
use App\Http\Requests\UpdateAsetRusakRequest;
use App\Repositories\AsetRusakRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetRusakController extends AppBaseController
{
    /** @var  AsetRusakRepository */
    private $asetRusakRepository;

    public function __construct(AsetRusakRepository $asetRusakRepo)
    {
        $this->asetRusakRepository = $asetRusakRepo;
    }

    /**
     * Display a listing of the AsetRusak.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetRusakRepository->pushCriteria(new RequestCriteria($request));
        $asetRusaks = $this->asetRusakRepository->all();

        return view('aset_rusaks.index')
            ->with('asetRusaks', $asetRusaks);
    }

    /**
     * Show the form for creating a new AsetRusak.
     *
     * @return Response
     */
    public function create()
    {
        return view('aset_rusaks.create');
    }

    /**
     * Store a newly created AsetRusak in storage.
     *
     * @param CreateAsetRusakRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetRusakRequest $request)
    {
        $input = $request->all();

        $asetRusak = $this->asetRusakRepository->create($input);

        Flash::success('Aset Rusak saved successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetRusaks.index'));
        }
    }

    /**
     * Display the specified AsetRusak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetRusak = $this->asetRusakRepository->findWithoutFail($id);

        if (empty($asetRusak)) {
            Flash::error('Aset Rusak not found');

            return redirect(route('asetRusaks.index'));
        }

        return view('aset_rusaks.show')->with('asetRusak', $asetRusak);
    }

    /**
     * Show the form for editing the specified AsetRusak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetRusak = $this->asetRusakRepository->findWithoutFail($id);

        if (empty($asetRusak)) {
            Flash::error('Aset Rusak not found');

            return redirect(route('asetRusaks.index'));
        }

        return view('aset_rusaks.edit')->with('asetRusak', $asetRusak);
    }

    /**
     * Update the specified AsetRusak in storage.
     *
     * @param  int              $id
     * @param UpdateAsetRusakRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetRusakRequest $request)
    {
        $asetRusak = $this->asetRusakRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetRusak)) {
            Flash::error('Aset Rusak not found');

            return redirect(route('asetRusaks.index'));
        }

        $asetRusak = $this->asetRusakRepository->update($request->all(), $id);

        Flash::success('Aset Rusak updated successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetRusaks.index'));
        }
    }

    /**
     * Remove the specified AsetRusak from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $asetRusak = $this->asetRusakRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($asetRusak)) {
            Flash::error('Aset Rusak not found');

            return redirect(route('asetRusaks.index'));
        }

        $this->asetRusakRepository->delete($id);

        Flash::success('Aset Rusak deleted successfully.');

        if(isset($input['url_callback'])){
            return redirect(url($input['url_callback']));
        }else {
            return redirect(route('asetRusaks.index'));
        }
    }
}
