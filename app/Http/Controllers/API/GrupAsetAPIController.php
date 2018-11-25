<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGrupAsetAPIRequest;
use App\Http\Requests\API\UpdateGrupAsetAPIRequest;
use App\Models\GrupAset;
use App\Repositories\GrupAsetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class GrupAsetController
 * @package App\Http\Controllers\API
 */

class GrupAsetAPIController extends AppBaseController
{
    /** @var  GrupAsetRepository */
    private $grupAsetRepository;

    public function __construct(GrupAsetRepository $grupAsetRepo)
    {
        $this->grupAsetRepository = $grupAsetRepo;
    }

    /**
     * Display a listing of the GrupAset.
     * GET|HEAD /grupAsets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->grupAsetRepository->pushCriteria(new RequestCriteria($request));
        $this->grupAsetRepository->pushCriteria(new LimitOffsetCriteria($request));
        $grupAsets = $this->grupAsetRepository->all();

        return $this->sendResponse($grupAsets->toArray(), 'Grup Asets retrieved successfully');
    }

    /**
     * Store a newly created GrupAset in storage.
     * POST /grupAsets
     *
     * @param CreateGrupAsetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGrupAsetAPIRequest $request)
    {
        $input = $request->all();

        $grupAsets = $this->grupAsetRepository->create($input);

        return $this->sendResponse($grupAsets->toArray(), 'Grup Aset saved successfully');
    }

    /**
     * Display the specified GrupAset.
     * GET|HEAD /grupAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GrupAset $grupAset */
        $grupAset = $this->grupAsetRepository->findWithoutFail($id);

        if (empty($grupAset)) {
            return $this->sendError('Grup Aset not found');
        }

        return $this->sendResponse($grupAset->toArray(), 'Grup Aset retrieved successfully');
    }

    /**
     * Update the specified GrupAset in storage.
     * PUT/PATCH /grupAsets/{id}
     *
     * @param  int $id
     * @param UpdateGrupAsetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrupAsetAPIRequest $request)
    {
        $input = $request->all();

        /** @var GrupAset $grupAset */
        $grupAset = $this->grupAsetRepository->findWithoutFail($id);

        if (empty($grupAset)) {
            return $this->sendError('Grup Aset not found');
        }

        $grupAset = $this->grupAsetRepository->update($input, $id);

        return $this->sendResponse($grupAset->toArray(), 'GrupAset updated successfully');
    }

    /**
     * Remove the specified GrupAset from storage.
     * DELETE /grupAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GrupAset $grupAset */
        $grupAset = $this->grupAsetRepository->findWithoutFail($id);

        if (empty($grupAset)) {
            return $this->sendError('Grup Aset not found');
        }

        $grupAset->delete();

        return $this->sendResponse($id, 'Grup Aset deleted successfully');
    }
}
