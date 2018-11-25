<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKondisiAsetAPIRequest;
use App\Http\Requests\API\UpdateKondisiAsetAPIRequest;
use App\Models\KondisiAset;
use App\Repositories\KondisiAsetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KondisiAsetController
 * @package App\Http\Controllers\API
 */

class KondisiAsetAPIController extends AppBaseController
{
    /** @var  KondisiAsetRepository */
    private $kondisiAsetRepository;

    public function __construct(KondisiAsetRepository $kondisiAsetRepo)
    {
        $this->kondisiAsetRepository = $kondisiAsetRepo;
    }

    /**
     * Display a listing of the KondisiAset.
     * GET|HEAD /kondisiAsets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kondisiAsetRepository->pushCriteria(new RequestCriteria($request));
        $this->kondisiAsetRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kondisiAsets = $this->kondisiAsetRepository->all();

        return $this->sendResponse($kondisiAsets->toArray(), 'Kondisi Asets retrieved successfully');
    }

    /**
     * Store a newly created KondisiAset in storage.
     * POST /kondisiAsets
     *
     * @param CreateKondisiAsetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKondisiAsetAPIRequest $request)
    {
        $input = $request->all();

        $kondisiAsets = $this->kondisiAsetRepository->create($input);

        return $this->sendResponse($kondisiAsets->toArray(), 'Kondisi Aset saved successfully');
    }

    /**
     * Display the specified KondisiAset.
     * GET|HEAD /kondisiAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KondisiAset $kondisiAset */
        $kondisiAset = $this->kondisiAsetRepository->findWithoutFail($id);

        if (empty($kondisiAset)) {
            return $this->sendError('Kondisi Aset not found');
        }

        return $this->sendResponse($kondisiAset->toArray(), 'Kondisi Aset retrieved successfully');
    }

    /**
     * Update the specified KondisiAset in storage.
     * PUT/PATCH /kondisiAsets/{id}
     *
     * @param  int $id
     * @param UpdateKondisiAsetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKondisiAsetAPIRequest $request)
    {
        $input = $request->all();

        /** @var KondisiAset $kondisiAset */
        $kondisiAset = $this->kondisiAsetRepository->findWithoutFail($id);

        if (empty($kondisiAset)) {
            return $this->sendError('Kondisi Aset not found');
        }

        $kondisiAset = $this->kondisiAsetRepository->update($input, $id);

        return $this->sendResponse($kondisiAset->toArray(), 'KondisiAset updated successfully');
    }

    /**
     * Remove the specified KondisiAset from storage.
     * DELETE /kondisiAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KondisiAset $kondisiAset */
        $kondisiAset = $this->kondisiAsetRepository->findWithoutFail($id);

        if (empty($kondisiAset)) {
            return $this->sendError('Kondisi Aset not found');
        }

        $kondisiAset->delete();

        return $this->sendResponse($id, 'Kondisi Aset deleted successfully');
    }
}
