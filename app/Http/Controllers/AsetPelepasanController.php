<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetPelepasanRequest;
use App\Http\Requests\UpdateAsetPelepasanRequest;
use App\Repositories\AsetPelepasanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetPelepasanController extends AppBaseController
{
    /** @var  AsetPelepasanRepository */
    private $asetPelepasanRepository;

    public function __construct(AsetPelepasanRepository $asetPelepasanRepo)
    {
        $this->asetPelepasanRepository = $asetPelepasanRepo;
    }

    /**
     * Display a listing of the AsetPelepasan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPelepasanRepository->pushCriteria(new RequestCriteria($request));
        $asetPelepasans = $this->asetPelepasanRepository->all();

        return view('aset_pelepasans.index')
            ->with('asetPelepasans', $asetPelepasans);
    }

    /**
     * Show the form for creating a new AsetPelepasan.
     *
     * @return Response
     */
    public function create()
    {
        return view('aset_pelepasans.create');
    }

    /**
     * Store a newly created AsetPelepasan in storage.
     *
     * @param CreateAsetPelepasanRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPelepasanRequest $request)
    {
        $input = $request->all();

        $asetPelepasan = $this->asetPelepasanRepository->create($input);

        Flash::success('Aset Pelepasan saved successfully.');

        return redirect(route('asetPelepasans.index'));
    }

    /**
     * Display the specified AsetPelepasan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetPelepasan = $this->asetPelepasanRepository->findWithoutFail($id);

        if (empty($asetPelepasan)) {
            Flash::error('Aset Pelepasan not found');

            return redirect(route('asetPelepasans.index'));
        }

        return view('aset_pelepasans.show')->with('asetPelepasan', $asetPelepasan);
    }

    /**
     * Show the form for editing the specified AsetPelepasan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetPelepasan = $this->asetPelepasanRepository->findWithoutFail($id);

        if (empty($asetPelepasan)) {
            Flash::error('Aset Pelepasan not found');

            return redirect(route('asetPelepasans.index'));
        }

        return view('aset_pelepasans.edit')->with('asetPelepasan', $asetPelepasan);
    }

    /**
     * Update the specified AsetPelepasan in storage.
     *
     * @param  int              $id
     * @param UpdateAsetPelepasanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPelepasanRequest $request)
    {
        $asetPelepasan = $this->asetPelepasanRepository->findWithoutFail($id);

        if (empty($asetPelepasan)) {
            Flash::error('Aset Pelepasan not found');

            return redirect(route('asetPelepasans.index'));
        }

        $asetPelepasan = $this->asetPelepasanRepository->update($request->all(), $id);

        Flash::success('Aset Pelepasan updated successfully.');

        return redirect(route('asetPelepasans.index'));
    }

    /**
     * Remove the specified AsetPelepasan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asetPelepasan = $this->asetPelepasanRepository->findWithoutFail($id);

        if (empty($asetPelepasan)) {
            Flash::error('Aset Pelepasan not found');

            return redirect(route('asetPelepasans.index'));
        }

        $this->asetPelepasanRepository->delete($id);

        Flash::success('Aset Pelepasan deleted successfully.');

        return redirect(route('asetPelepasans.index'));
    }
}
