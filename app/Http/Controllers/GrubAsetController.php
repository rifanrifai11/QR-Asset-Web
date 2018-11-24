<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGrubAsetRequest;
use App\Http\Requests\UpdateGrubAsetRequest;
use App\Repositories\GrubAsetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GrubAsetController extends AppBaseController
{
    /** @var  GrubAsetRepository */
    private $grubAsetRepository;

    public function __construct(GrubAsetRepository $grubAsetRepo)
    {
        $this->grubAsetRepository = $grubAsetRepo;
    }

    /**
     * Display a listing of the GrubAset.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->grubAsetRepository->pushCriteria(new RequestCriteria($request));
        $grubAsets = $this->grubAsetRepository->all();

        return view('grub_asets.index')
            ->with('grubAsets', $grubAsets);
    }

    /**
     * Show the form for creating a new GrubAset.
     *
     * @return Response
     */
    public function create()
    {
        $parent_grub_aset=GrubAset::whereNull('parent_grub_aset_kode')->pluck('nama','kode');
        $umur_ekonomis=UmurEkonomis::pluck('nama','id');
        $kategori_aset=KategoriAset::pluck('nama','id');
        return view('grub_asets.create',compact('parent_grub_aset','umur_ekonomis','kategori_aset'));
    }

    /**
     * Store a newly created GrubAset in storage.
     *
     * @param CreateGrubAsetRequest $request
     *
     * @return Response
     */
    public function store(CreateGrubAsetRequest $request)
    {
        $input = $request->all();

        $grubAset = $this->grubAsetRepository->create($input);

        Flash::success('Grub Aset saved successfully.');

        return redirect(route('grubAsets.index'));
    }

    /**
     * Display the specified GrubAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grubAset = $this->grubAsetRepository->findWithoutFail($id);

        if (empty($grubAset)) {
            Flash::error('Grub Aset not found');

            return redirect(route('grubAsets.index'));
        }

        return view('grub_asets.show')->with('grubAset', $grubAset);
    }

    /**
     * Show the form for editing the specified GrubAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grubAset = $this->grubAsetRepository->findWithoutFail($id);

        if (empty($grubAset)) {
            Flash::error('Grub Aset not found');

            return redirect(route('grubAsets.index'));
        }

        return view('grub_asets.edit')->with('grubAset', $grubAset);
    }

    /**
     * Update the specified GrubAset in storage.
     *
     * @param  int              $id
     * @param UpdateGrubAsetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrubAsetRequest $request)
    {
        $grubAset = $this->grubAsetRepository->findWithoutFail($id);

        if (empty($grubAset)) {
            Flash::error('Grub Aset not found');

            return redirect(route('grubAsets.index'));
        }

        $grubAset = $this->grubAsetRepository->update($request->all(), $id);

        Flash::success('Grub Aset updated successfully.');

        return redirect(route('grubAsets.index'));
    }

    /**
     * Remove the specified GrubAset from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grubAset = $this->grubAsetRepository->findWithoutFail($id);

        if (empty($grubAset)) {
            Flash::error('Grub Aset not found');

            return redirect(route('grubAsets.index'));
        }

        $this->grubAsetRepository->delete($id);

        Flash::success('Grub Aset deleted successfully.');

        return redirect(route('grubAsets.index'));
    }
}
