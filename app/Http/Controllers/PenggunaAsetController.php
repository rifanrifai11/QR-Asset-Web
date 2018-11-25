<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenggunaAsetRequest;
use App\Http\Requests\UpdatePenggunaAsetRequest;
use App\Repositories\PenggunaAsetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PenggunaAsetController extends AppBaseController
{
    /** @var  PenggunaAsetRepository */
    private $penggunaAsetRepository;

    public function __construct(PenggunaAsetRepository $penggunaAsetRepo)
    {
        $this->penggunaAsetRepository = $penggunaAsetRepo;
    }

    /**
     * Display a listing of the PenggunaAset.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->penggunaAsetRepository->pushCriteria(new RequestCriteria($request));
        $penggunaAsets = $this->penggunaAsetRepository->all();

        return view('pengguna_asets.index')
            ->with('penggunaAsets', $penggunaAsets);
    }

    /**
     * Show the form for creating a new PenggunaAset.
     *
     * @return Response
     */
    public function create()
    {
        return view('pengguna_asets.create');
    }

    /**
     * Store a newly created PenggunaAset in storage.
     *
     * @param CreatePenggunaAsetRequest $request
     *
     * @return Response
     */
    public function store(CreatePenggunaAsetRequest $request)
    {
        $input = $request->all();

        $penggunaAset = $this->penggunaAsetRepository->create($input);

        Flash::success('Pengguna Aset saved successfully.');

        return redirect(route('penggunaAsets.index'));
    }

    /**
     * Display the specified PenggunaAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penggunaAset = $this->penggunaAsetRepository->findWithoutFail($id);

        if (empty($penggunaAset)) {
            Flash::error('Pengguna Aset not found');

            return redirect(route('penggunaAsets.index'));
        }

        return view('pengguna_asets.show')->with('penggunaAset', $penggunaAset);
    }

    /**
     * Show the form for editing the specified PenggunaAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penggunaAset = $this->penggunaAsetRepository->findWithoutFail($id);

        if (empty($penggunaAset)) {
            Flash::error('Pengguna Aset not found');

            return redirect(route('penggunaAsets.index'));
        }

        return view('pengguna_asets.edit')->with('penggunaAset', $penggunaAset);
    }

    /**
     * Update the specified PenggunaAset in storage.
     *
     * @param  int              $id
     * @param UpdatePenggunaAsetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenggunaAsetRequest $request)
    {
        $penggunaAset = $this->penggunaAsetRepository->findWithoutFail($id);

        if (empty($penggunaAset)) {
            Flash::error('Pengguna Aset not found');

            return redirect(route('penggunaAsets.index'));
        }

        $penggunaAset = $this->penggunaAsetRepository->update($request->all(), $id);

        Flash::success('Pengguna Aset updated successfully.');

        return redirect(route('penggunaAsets.index'));
    }

    /**
     * Remove the specified PenggunaAset from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penggunaAset = $this->penggunaAsetRepository->findWithoutFail($id);

        if (empty($penggunaAset)) {
            Flash::error('Pengguna Aset not found');

            return redirect(route('penggunaAsets.index'));
        }

        $this->penggunaAsetRepository->delete($id);

        Flash::success('Pengguna Aset deleted successfully.');

        return redirect(route('penggunaAsets.index'));
    }
}
