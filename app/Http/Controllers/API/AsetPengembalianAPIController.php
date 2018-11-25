<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsetPengembalianAPIRequest;
use App\Http\Requests\API\UpdateAsetPengembalianAPIRequest;
use App\Models\AsetPengembalian;
use App\Repositories\AsetPengembalianRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsetPengembalianController
 * @package App\Http\Controllers\API
 */

class AsetPengembalianAPIController extends AppBaseController
{
    /** @var  AsetPengembalianRepository */
    private $asetPengembalianRepository;

    public function __construct(AsetPengembalianRepository $asetPengembalianRepo)
    {
        $this->asetPengembalianRepository = $asetPengembalianRepo;
    }

    /**
     * Display a listing of the AsetPengembalian.
     * GET|HEAD /asetPengembalians
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPengembalianRepository->pushCriteria(new RequestCriteria($request));
        $this->asetPengembalianRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asetPengembalians = $this->asetPengembalianRepository->all();

        return $this->sendResponse($asetPengembalians->toArray(), 'Aset Pengembalians retrieved successfully');
    }

    /**
     * Store a newly created AsetPengembalian in storage.
     * POST /asetPengembalians
     *
     * @param CreateAsetPengembalianAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPengembalianAPIRequest $request)
    {
        $input = $request->all();

        $asetPengembalians = $this->asetPengembalianRepository->create($input);

        return $this->sendResponse($asetPengembalians->toArray(), 'Aset Pengembalian saved successfully');
    }

    /**
     * Display the specified AsetPengembalian.
     * GET|HEAD /asetPengembalians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AsetPengembalian $asetPengembalian */
        $asetPengembalian = $this->asetPengembalianRepository->findWithoutFail($id);

        if (empty($asetPengembalian)) {
            return $this->sendError('Aset Pengembalian not found');
        }

        return $this->sendResponse($asetPengembalian->toArray(), 'Aset Pengembalian retrieved successfully');
    }

    /**
     * Update the specified AsetPengembalian in storage.
     * PUT/PATCH /asetPengembalians/{id}
     *
     * @param  int $id
     * @param UpdateAsetPengembalianAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPengembalianAPIRequest $request)
    {
        $input = $request->all();

        /** @var AsetPengembalian $asetPengembalian */
        $asetPengembalian = $this->asetPengembalianRepository->findWithoutFail($id);

        if (empty($asetPengembalian)) {
            return $this->sendError('Aset Pengembalian not found');
        }

        $asetPengembalian = $this->asetPengembalianRepository->update($input, $id);

        return $this->sendResponse($asetPengembalian->toArray(), 'AsetPengembalian updated successfully');
    }

    /**
     * Remove the specified AsetPengembalian from storage.
     * DELETE /asetPengembalians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AsetPengembalian $asetPengembalian */
        $asetPengembalian = $this->asetPengembalianRepository->findWithoutFail($id);

        if (empty($asetPengembalian)) {
            return $this->sendError('Aset Pengembalian not found');
        }

        $asetPengembalian->delete();

        return $this->sendResponse($id, 'Aset Pengembalian deleted successfully');
    }
}
