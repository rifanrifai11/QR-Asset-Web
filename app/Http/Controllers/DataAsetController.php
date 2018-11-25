<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataAsetRequest;
use App\Http\Requests\UpdateDataAsetRequest;
use App\Repositories\DataAsetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DataAsetController extends AppBaseController
{
    /** @var  DataAsetRepository */
    private $dataAsetRepository;

    public function __construct(DataAsetRepository $dataAsetRepo)
    {
        $this->dataAsetRepository = $dataAsetRepo;
    }

    /**
     * Display a listing of the DataAset.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataAsetRepository->pushCriteria(new RequestCriteria($request));
        $dataAsets = $this->dataAsetRepository->all();

        return view('data_asets.index')
            ->with('dataAsets', $dataAsets);
    }

    /**
     * Show the form for creating a new DataAset.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_asets.create');
    }

    /**
     * Store a newly created DataAset in storage.
     *
     * @param CreateDataAsetRequest $request
     *
     * @return Response
     */
    public function store(CreateDataAsetRequest $request)
    {
        $input = $request->all();

        $dataAset = $this->dataAsetRepository->create($input);

        Flash::success('Data Aset saved successfully.');

        return redirect(route('dataAsets.index'));
    }

    /**
     * Display the specified DataAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            Flash::error('Data Aset not found');

            return redirect(route('dataAsets.index'));
        }

        return view('data_asets.show')->with('dataAset', $dataAset);
    }

    /**
     * Show the form for editing the specified DataAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            Flash::error('Data Aset not found');

            return redirect(route('dataAsets.index'));
        }

        return view('data_asets.edit')->with('dataAset', $dataAset);
    }

    /**
     * Update the specified DataAset in storage.
     *
     * @param  int              $id
     * @param UpdateDataAsetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataAsetRequest $request)
    {
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            Flash::error('Data Aset not found');

            return redirect(route('dataAsets.index'));
        }

        $dataAset = $this->dataAsetRepository->update($request->all(), $id);

        Flash::success('Data Aset updated successfully.');

        return redirect(route('dataAsets.index'));
    }

    /**
     * Remove the specified DataAset from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            Flash::error('Data Aset not found');

            return redirect(route('dataAsets.index'));
        }

        $this->dataAsetRepository->delete($id);

        Flash::success('Data Aset deleted successfully.');

        return redirect(route('dataAsets.index'));
    }
}
