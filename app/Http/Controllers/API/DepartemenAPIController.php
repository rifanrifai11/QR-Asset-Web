<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepartemenAPIRequest;
use App\Http\Requests\API\UpdateDepartemenAPIRequest;
use App\Models\Departemen;
use App\Repositories\DepartemenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DepartemenController
 * @package App\Http\Controllers\API
 */

class DepartemenAPIController extends AppBaseController
{
    /** @var  DepartemenRepository */
    private $departemenRepository;

    public function __construct(DepartemenRepository $departemenRepo)
    {
        $this->departemenRepository = $departemenRepo;
    }

    /**
     * Display a listing of the Departemen.
     * GET|HEAD /departemens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departemenRepository->pushCriteria(new RequestCriteria($request));
        $this->departemenRepository->pushCriteria(new LimitOffsetCriteria($request));
        $departemens = $this->departemenRepository->all();

        return $this->sendResponse($departemens->toArray(), 'Departemens retrieved successfully');
    }

    /**
     * Store a newly created Departemen in storage.
     * POST /departemens
     *
     * @param CreateDepartemenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartemenAPIRequest $request)
    {
        $input = $request->all();

        $departemens = $this->departemenRepository->create($input);

        return $this->sendResponse($departemens->toArray(), 'Departemen saved successfully');
    }

    /**
     * Display the specified Departemen.
     * GET|HEAD /departemens/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Departemen $departemen */
        $departemen = $this->departemenRepository->findWithoutFail($id);

        if (empty($departemen)) {
            return $this->sendError('Departemen not found');
        }

        return $this->sendResponse($departemen->toArray(), 'Departemen retrieved successfully');
    }

    /**
     * Update the specified Departemen in storage.
     * PUT/PATCH /departemens/{id}
     *
     * @param  int $id
     * @param UpdateDepartemenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartemenAPIRequest $request)
    {
        $input = $request->all();

        /** @var Departemen $departemen */
        $departemen = $this->departemenRepository->findWithoutFail($id);

        if (empty($departemen)) {
            return $this->sendError('Departemen not found');
        }

        $departemen = $this->departemenRepository->update($input, $id);

        return $this->sendResponse($departemen->toArray(), 'Departemen updated successfully');
    }

    /**
     * Remove the specified Departemen from storage.
     * DELETE /departemens/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Departemen $departemen */
        $departemen = $this->departemenRepository->findWithoutFail($id);

        if (empty($departemen)) {
            return $this->sendError('Departemen not found');
        }

        $departemen->delete();

        return $this->sendResponse($id, 'Departemen deleted successfully');
    }
}
