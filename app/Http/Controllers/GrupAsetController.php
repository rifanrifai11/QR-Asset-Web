<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGrupAsetRequest;
use App\Http\Requests\UpdateGrupAsetRequest;
use App\Repositories\GrupAsetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GrupAsetController extends AppBaseController
{
    /** @var  GrupAsetRepository */
    private $grupAsetRepository;

    public function __construct(GrupAsetRepository $grupAsetRepo)
    {
        $this->grupAsetRepository = $grupAsetRepo;
    }

    /**
     * Display a listing of the GrupAset.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->grupAsetRepository->pushCriteria(new RequestCriteria($request));
        $grupAsets = $this->grupAsetRepository->all();

        return view('grup_asets.index')
            ->with('grupAsets', $grupAsets);
    }

    /**
     * Show the form for creating a new GrupAset.
     *
     * @return Response
     */
    public function create()
    {
        return view('grup_asets.create');
    }

    /**
     * Store a newly created GrupAset in storage.
     *
     * @param CreateGrupAsetRequest $request
     *
     * @return Response
     */
    public function store(CreateGrupAsetRequest $request)
    {
        $input = $request->all();

        $grupAset = $this->grupAsetRepository->create($input);

        Flash::success('Grup Aset saved successfully.');

        return redirect(route('grupAsets.index'));
    }

    /**
     * Display the specified GrupAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grupAset = $this->grupAsetRepository->findWithoutFail($id);

        if (empty($grupAset)) {
            Flash::error('Grup Aset not found');

            return redirect(route('grupAsets.index'));
        }

        return view('grup_asets.show')->with('grupAset', $grupAset);
    }

    /**
     * Show the form for editing the specified GrupAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grupAset = $this->grupAsetRepository->findWithoutFail($id);

        if (empty($grupAset)) {
            Flash::error('Grup Aset not found');

            return redirect(route('grupAsets.index'));
        }

        return view('grup_asets.edit')->with('grupAset', $grupAset);
    }

    /**
     * Update the specified GrupAset in storage.
     *
     * @param  int              $id
     * @param UpdateGrupAsetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrupAsetRequest $request)
    {
        $grupAset = $this->grupAsetRepository->findWithoutFail($id);

        if (empty($grupAset)) {
            Flash::error('Grup Aset not found');

            return redirect(route('grupAsets.index'));
        }

        $grupAset = $this->grupAsetRepository->update($request->all(), $id);

        Flash::success('Grup Aset updated successfully.');

        return redirect(route('grupAsets.index'));
    }

    /**
     * Remove the specified GrupAset from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grupAset = $this->grupAsetRepository->findWithoutFail($id);

        if (empty($grupAset)) {
            Flash::error('Grup Aset not found');

            return redirect(route('grupAsets.index'));
        }

        $this->grupAsetRepository->delete($id);

        Flash::success('Grup Aset deleted successfully.');

        return redirect(route('grupAsets.index'));
    }
}
