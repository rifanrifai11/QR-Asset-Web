<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetHilangRequest;
use App\Http\Requests\UpdateAsetHilangRequest;
use App\Repositories\AsetHilangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetHilangController extends AppBaseController
{
    /** @var  AsetHilangRepository */
    private $asetHilangRepository;

    public function __construct(AsetHilangRepository $asetHilangRepo)
    {
        $this->asetHilangRepository = $asetHilangRepo;
    }

    /**
     * Display a listing of the AsetHilang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetHilangRepository->pushCriteria(new RequestCriteria($request));
        $asetHilangs = $this->asetHilangRepository->all();

        return view('aset_hilangs.index')
            ->with('asetHilangs', $asetHilangs);
    }

    /**
     * Show the form for creating a new AsetHilang.
     *
     * @return Response
     */
    public function create()
    {
        return view('aset_hilangs.create');
    }

    /**
     * Store a newly created AsetHilang in storage.
     *
     * @param CreateAsetHilangRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetHilangRequest $request)
    {
        $input = $request->all();

        $asetHilang = $this->asetHilangRepository->create($input);

        Flash::success('Aset Hilang saved successfully.');

        return redirect(route('asetHilangs.index'));
    }

    /**
     * Display the specified AsetHilang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetHilang = $this->asetHilangRepository->findWithoutFail($id);

        if (empty($asetHilang)) {
            Flash::error('Aset Hilang not found');

            return redirect(route('asetHilangs.index'));
        }

        return view('aset_hilangs.show')->with('asetHilang', $asetHilang);
    }

    /**
     * Show the form for editing the specified AsetHilang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetHilang = $this->asetHilangRepository->findWithoutFail($id);

        if (empty($asetHilang)) {
            Flash::error('Aset Hilang not found');

            return redirect(route('asetHilangs.index'));
        }

        return view('aset_hilangs.edit')->with('asetHilang', $asetHilang);
    }

    /**
     * Update the specified AsetHilang in storage.
     *
     * @param  int              $id
     * @param UpdateAsetHilangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetHilangRequest $request)
    {
        $asetHilang = $this->asetHilangRepository->findWithoutFail($id);

        if (empty($asetHilang)) {
            Flash::error('Aset Hilang not found');

            return redirect(route('asetHilangs.index'));
        }

        $asetHilang = $this->asetHilangRepository->update($request->all(), $id);

        Flash::success('Aset Hilang updated successfully.');

        return redirect(route('asetHilangs.index'));
    }

    /**
     * Remove the specified AsetHilang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asetHilang = $this->asetHilangRepository->findWithoutFail($id);

        if (empty($asetHilang)) {
            Flash::error('Aset Hilang not found');

            return redirect(route('asetHilangs.index'));
        }

        $this->asetHilangRepository->delete($id);

        Flash::success('Aset Hilang deleted successfully.');

        return redirect(route('asetHilangs.index'));
    }
}
