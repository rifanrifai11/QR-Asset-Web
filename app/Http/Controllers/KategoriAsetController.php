<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKategoriAsetRequest;
use App\Http\Requests\UpdateKategoriAsetRequest;
use App\Repositories\KategoriAsetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KategoriAsetController extends AppBaseController
{
    /** @var  KategoriAsetRepository */
    private $kategoriAsetRepository;

    public function __construct(KategoriAsetRepository $kategoriAsetRepo)
    {
        $this->kategoriAsetRepository = $kategoriAsetRepo;
    }

    /**
     * Display a listing of the KategoriAset.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kategoriAsetRepository->pushCriteria(new RequestCriteria($request));
        $kategoriAsets = $this->kategoriAsetRepository->all();

        return view('kategori_asets.index')
            ->with('kategoriAsets', $kategoriAsets);
    }

    /**
     * Show the form for creating a new KategoriAset.
     *
     * @return Response
     */
    public function create()
    {
        return view('kategori_asets.create');
    }

    /**
     * Store a newly created KategoriAset in storage.
     *
     * @param CreateKategoriAsetRequest $request
     *
     * @return Response
     */
    public function store(CreateKategoriAsetRequest $request)
    {
        $input = $request->all();

        $kategoriAset = $this->kategoriAsetRepository->create($input);

        Flash::success('Kategori Aset saved successfully.');

        return redirect(route('kategoriAsets.index'));
    }

    /**
     * Display the specified KategoriAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kategoriAset = $this->kategoriAsetRepository->findWithoutFail($id);

        if (empty($kategoriAset)) {
            Flash::error('Kategori Aset not found');

            return redirect(route('kategoriAsets.index'));
        }

        return view('kategori_asets.show')->with('kategoriAset', $kategoriAset);
    }

    /**
     * Show the form for editing the specified KategoriAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kategoriAset = $this->kategoriAsetRepository->findWithoutFail($id);

        if (empty($kategoriAset)) {
            Flash::error('Kategori Aset not found');

            return redirect(route('kategoriAsets.index'));
        }

        return view('kategori_asets.edit')->with('kategoriAset', $kategoriAset);
    }

    /**
     * Update the specified KategoriAset in storage.
     *
     * @param  int              $id
     * @param UpdateKategoriAsetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKategoriAsetRequest $request)
    {
        $kategoriAset = $this->kategoriAsetRepository->findWithoutFail($id);

        if (empty($kategoriAset)) {
            Flash::error('Kategori Aset not found');

            return redirect(route('kategoriAsets.index'));
        }

        $kategoriAset = $this->kategoriAsetRepository->update($request->all(), $id);

        Flash::success('Kategori Aset updated successfully.');

        return redirect(route('kategoriAsets.index'));
    }

    /**
     * Remove the specified KategoriAset from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kategoriAset = $this->kategoriAsetRepository->findWithoutFail($id);

        if (empty($kategoriAset)) {
            Flash::error('Kategori Aset not found');

            return redirect(route('kategoriAsets.index'));
        }

        $this->kategoriAsetRepository->delete($id);

        Flash::success('Kategori Aset deleted successfully.');

        return redirect(route('kategoriAsets.index'));
    }
}
