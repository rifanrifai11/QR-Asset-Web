<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDataAsetAPIRequest;
use App\Http\Requests\API\UpdateDataAsetAPIRequest;
use App\Models\DataAset;
use App\Repositories\DataAsetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DataAsetController
 * @package App\Http\Controllers\API
 */

class DataAsetAPIController extends AppBaseController
{
    /** @var  DataAsetRepository */
    private $dataAsetRepository;

    public function __construct(DataAsetRepository $dataAsetRepo)
    {
        $this->dataAsetRepository = $dataAsetRepo;
    }

    /**
     * Display a listing of the DataAset.
     * GET|HEAD /dataAsets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataAsetRepository->pushCriteria(new RequestCriteria($request));
        $this->dataAsetRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dataAsets = $this->dataAsetRepository->all();

        return $this->sendResponse($dataAsets->toArray(), 'Data Asets retrieved successfully');
    }

    /**
     * Store a newly created DataAset in storage.
     * POST /dataAsets
     *
     * @param CreateDataAsetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDataAsetAPIRequest $request)
    {
        $input = $request->all();

        $dataAsets = $this->dataAsetRepository->create($input);

        return $this->sendResponse($dataAsets->toArray(), 'Data Aset saved successfully');
    }

    /**
     * Display the specified DataAset.
     * GET|HEAD /dataAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DataAset $dataAset */
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            return $this->sendError('Data Aset not found');
        }

        return $this->sendResponse($dataAset->toArray(), 'Data Aset retrieved successfully');
    }

    /**
     * Update the specified DataAset in storage.
     * PUT/PATCH /dataAsets/{id}
     *
     * @param  int $id
     * @param UpdateDataAsetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataAsetAPIRequest $request)
    {
        $input = $request->all();

        /** @var DataAset $dataAset */
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            return $this->sendError('Data Aset not found');
        }

        $dataAset = $this->dataAsetRepository->update($input, $id);

        return $this->sendResponse($dataAset->toArray(), 'DataAset updated successfully');
    }

    /**
     * Remove the specified DataAset from storage.
     * DELETE /dataAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DataAset $dataAset */
        $dataAset = $this->dataAsetRepository->findWithoutFail($id);

        if (empty($dataAset)) {
            return $this->sendError('Data Aset not found');
        }

        $dataAset->delete();

        return $this->sendResponse($id, 'Data Aset deleted successfully');
    }
}
