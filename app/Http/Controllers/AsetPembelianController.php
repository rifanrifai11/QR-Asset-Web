<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetPembelianRequest;
use App\Http\Requests\UpdateAsetPembelianRequest;
use App\Repositories\AsetPembelianRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetPembelianController extends AppBaseController
{
    /** @var  AsetPembelianRepository */
    private $asetPembelianRepository;

    public function __construct(AsetPembelianRepository $asetPembelianRepo)
    {
        $this->asetPembelianRepository = $asetPembelianRepo;
    }

    /**
     * Display a listing of the AsetPembelian.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPembelianRepository->pushCriteria(new RequestCriteria($request));
        $asetPembelians = $this->asetPembelianRepository->all();

        return view('aset_pembelians.index')
            ->with('asetPembelians', $asetPembelians);
    }

    /**
     * Show the form for creating a new AsetPembelian.
     *
     * @return Response
     */
    public function create()
    {
        return view('aset_pembelians.create');
    }

    /**
     * Store a newly created AsetPembelian in storage.
     *
     * @param CreateAsetPembelianRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPembelianRequest $request)
    {
        $input = $request->all();

        $asetPembelian = $this->asetPembelianRepository->create($input);

        Flash::success('Aset Pembelian saved successfully.');

        return redirect(route('asetPembelians.index'));
    }

    /**
     * Display the specified AsetPembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);

        if (empty($asetPembelian)) {
            Flash::error('Aset Pembelian not found');

            return redirect(route('asetPembelians.index'));
        }

        return view('aset_pembelians.show')->with('asetPembelian', $asetPembelian);
    }

    /**
     * Show the form for editing the specified AsetPembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);

        if (empty($asetPembelian)) {
            Flash::error('Aset Pembelian not found');

            return redirect(route('asetPembelians.index'));
        }

        return view('aset_pembelians.edit')->with('asetPembelian', $asetPembelian);
    }

    /**
     * Update the specified AsetPembelian in storage.
     *
     * @param  int              $id
     * @param UpdateAsetPembelianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPembelianRequest $request)
    {
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);

        if (empty($asetPembelian)) {
            Flash::error('Aset Pembelian not found');

            return redirect(route('asetPembelians.index'));
        }

        $asetPembelian = $this->asetPembelianRepository->update($request->all(), $id);

        Flash::success('Aset Pembelian updated successfully.');

        return redirect(route('asetPembelians.index'));
    }

    /**
     * Remove the specified AsetPembelian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);

        if (empty($asetPembelian)) {
            Flash::error('Aset Pembelian not found');

            return redirect(route('asetPembelians.index'));
        }

        $this->asetPembelianRepository->delete($id);

        Flash::success('Aset Pembelian deleted successfully.');

        return redirect(route('asetPembelians.index'));
    }
}
