<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePermissionsAPIRequest;
use App\Http\Requests\API\UpdatePermissionsAPIRequest;
use App\Models\Permissions;
use App\Repositories\PermissionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PermissionsController
 * @package App\Http\Controllers\API
 */

class PermissionsAPIController extends AppBaseController
{
    /** @var  PermissionsRepository */
    private $permissionsRepository;

    public function __construct(PermissionsRepository $permissionsRepo)
    {
        $this->permissionsRepository = $permissionsRepo;
    }

    /**
     * Display a listing of the Permissions.
     * GET|HEAD /permissions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->permissionsRepository->pushCriteria(new RequestCriteria($request));
        $this->permissionsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $permissions = $this->permissionsRepository->all();

        return $this->sendResponse($permissions->toArray(), 'Permissions retrieved successfully');
    }

    /**
     * Store a newly created Permissions in storage.
     * POST /permissions
     *
     * @param CreatePermissionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionsAPIRequest $request)
    {
        $input = $request->all();

        $permissions = $this->permissionsRepository->create($input);

        return $this->sendResponse($permissions->toArray(), 'Permissions saved successfully');
    }

    /**
     * Display the specified Permissions.
     * GET|HEAD /permissions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Permissions $permissions */
        $permissions = $this->permissionsRepository->findWithoutFail($id);

        if (empty($permissions)) {
            return $this->sendError('Permissions not found');
        }

        return $this->sendResponse($permissions->toArray(), 'Permissions retrieved successfully');
    }

    /**
     * Update the specified Permissions in storage.
     * PUT/PATCH /permissions/{id}
     *
     * @param  int $id
     * @param UpdatePermissionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Permissions $permissions */
        $permissions = $this->permissionsRepository->findWithoutFail($id);

        if (empty($permissions)) {
            return $this->sendError('Permissions not found');
        }

        $permissions = $this->permissionsRepository->update($input, $id);

        return $this->sendResponse($permissions->toArray(), 'Permissions updated successfully');
    }

    /**
     * Remove the specified Permissions from storage.
     * DELETE /permissions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Permissions $permissions */
        $permissions = $this->permissionsRepository->findWithoutFail($id);

        if (empty($permissions)) {
            return $this->sendError('Permissions not found');
        }

        $permissions->delete();

        return $this->sendResponse($id, 'Permissions deleted successfully');
    }
}
