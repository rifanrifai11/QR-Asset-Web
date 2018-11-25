<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetPeminjamanRequest;
use App\Http\Requests\UpdateAsetPeminjamanRequest;
use App\Repositories\AsetPeminjamanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetPeminjamanController extends AppBaseController
{
    /** @var  AsetPeminjamanRepository */
    private $asetPeminjamanRepository;

    public function __construct(AsetPeminjamanRepository $asetPeminjamanRepo)
    {
        $this->asetPeminjamanRepository = $asetPeminjamanRepo;
    }

    /**
     * Display a listing of the AsetPeminjaman.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPeminjamanRepository->pushCriteria(new RequestCriteria($request));
        $asetPeminjamen = $this->asetPeminjamanRepository->all();

        return view('aset_peminjamen.index')
            ->with('asetPeminjamen', $asetPeminjamen);
    }

    /**
     * Show the form for creating a new AsetPeminjaman.
     *
     * @return Response
     */
    public function create()
    {
        return view('aset_peminjamen.create');
    }

    /**
     * Store a newly created AsetPeminjaman in storage.
     *
     * @param CreateAsetPeminjamanRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPeminjamanRequest $request)
    {
        $input = $request->all();

        $asetPeminjaman = $this->asetPeminjamanRepository->create($input);

        Flash::success('Aset Peminjaman saved successfully.');

        return redirect(route('asetPeminjamen.index'));
    }

    /**
     * Display the specified AsetPeminjaman.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);

        if (empty($asetPeminjaman)) {
            Flash::error('Aset Peminjaman not found');

            return redirect(route('asetPeminjamen.index'));
        }

        return view('aset_peminjamen.show')->with('asetPeminjaman', $asetPeminjaman);
    }

    /**
     * Show the form for editing the specified AsetPeminjaman.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);

        if (empty($asetPeminjaman)) {
            Flash::error('Aset Peminjaman not found');

            return redirect(route('asetPeminjamen.index'));
        }

        return view('aset_peminjamen.edit')->with('asetPeminjaman', $asetPeminjaman);
    }

    /**
     * Update the specified AsetPeminjaman in storage.
     *
     * @param  int              $id
     * @param UpdateAsetPeminjamanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPeminjamanRequest $request)
    {
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);

        if (empty($asetPeminjaman)) {
            Flash::error('Aset Peminjaman not found');

            return redirect(route('asetPeminjamen.index'));
        }

        $asetPeminjaman = $this->asetPeminjamanRepository->update($request->all(), $id);

        Flash::success('Aset Peminjaman updated successfully.');

        return redirect(route('asetPeminjamen.index'));
    }

    /**
     * Remove the specified AsetPeminjaman from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);

        if (empty($asetPeminjaman)) {
            Flash::error('Aset Peminjaman not found');

            return redirect(route('asetPeminjamen.index'));
        }

        $this->asetPeminjamanRepository->delete($id);

        Flash::success('Aset Peminjaman deleted successfully.');

        return redirect(route('asetPeminjamen.index'));
    }
}
