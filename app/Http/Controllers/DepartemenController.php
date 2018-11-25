<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartemenRequest;
use App\Http\Requests\UpdateDepartemenRequest;
use App\Repositories\DepartemenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DepartemenController extends AppBaseController
{
    /** @var  DepartemenRepository */
    private $departemenRepository;

    public function __construct(DepartemenRepository $departemenRepo)
    {
        $this->departemenRepository = $departemenRepo;
    }

    /**
     * Display a listing of the Departemen.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departemenRepository->pushCriteria(new RequestCriteria($request));
        $departemens = $this->departemenRepository->all();

        return view('departemens.index')
            ->with('departemens', $departemens);
    }

    /**
     * Show the form for creating a new Departemen.
     *
     * @return Response
     */
    public function create()
    {
        return view('departemens.create');
    }

    /**
     * Store a newly created Departemen in storage.
     *
     * @param CreateDepartemenRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartemenRequest $request)
    {
        $input = $request->all();

        $departemen = $this->departemenRepository->create($input);

        Flash::success('Departemen saved successfully.');

        return redirect(route('departemens.index'));
    }

    /**
     * Display the specified Departemen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departemen = $this->departemenRepository->findWithoutFail($id);

        if (empty($departemen)) {
            Flash::error('Departemen not found');

            return redirect(route('departemens.index'));
        }

        return view('departemens.show')->with('departemen', $departemen);
    }

    /**
     * Show the form for editing the specified Departemen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departemen = $this->departemenRepository->findWithoutFail($id);

        if (empty($departemen)) {
            Flash::error('Departemen not found');

            return redirect(route('departemens.index'));
        }

        return view('departemens.edit')->with('departemen', $departemen);
    }

    /**
     * Update the specified Departemen in storage.
     *
     * @param  int              $id
     * @param UpdateDepartemenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartemenRequest $request)
    {
        $departemen = $this->departemenRepository->findWithoutFail($id);

        if (empty($departemen)) {
            Flash::error('Departemen not found');

            return redirect(route('departemens.index'));
        }

        $departemen = $this->departemenRepository->update($request->all(), $id);

        Flash::success('Departemen updated successfully.');

        return redirect(route('departemens.index'));
    }

    /**
     * Remove the specified Departemen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departemen = $this->departemenRepository->findWithoutFail($id);

        if (empty($departemen)) {
            Flash::error('Departemen not found');

            return redirect(route('departemens.index'));
        }

        $this->departemenRepository->delete($id);

        Flash::success('Departemen deleted successfully.');

        return redirect(route('departemens.index'));
    }
}
