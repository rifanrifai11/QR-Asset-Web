<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsetPembelianAPIRequest;
use App\Http\Requests\API\UpdateAsetPembelianAPIRequest;
use App\Models\AsetPembelian;
use App\Repositories\AsetPembelianRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsetPembelianController
 * @package App\Http\Controllers\API
 */

class AsetPembelianAPIController extends AppBaseController
{
    /** @var  AsetPembelianRepository */
    private $asetPembelianRepository;

    public function __construct(AsetPembelianRepository $asetPembelianRepo)
    {
        $this->asetPembelianRepository = $asetPembelianRepo;
    }

    /**
     * Display a listing of the AsetPembelian.
     * GET|HEAD /asetPembelians
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPembelianRepository->pushCriteria(new RequestCriteria($request));
        $this->asetPembelianRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asetPembelians = $this->asetPembelianRepository->all();

        return $this->sendResponse($asetPembelians->toArray(), 'Aset Pembelians retrieved successfully');
    }

    /**
     * Store a newly created AsetPembelian in storage.
     * POST /asetPembelians
     *
     * @param CreateAsetPembelianAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPembelianAPIRequest $request)
    {
        $input = $request->all();

        $asetPembelians = $this->asetPembelianRepository->create($input);

        return $this->sendResponse($asetPembelians->toArray(), 'Aset Pembelian saved successfully');
    }

    /**
     * Display the specified AsetPembelian.
     * GET|HEAD /asetPembelians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AsetPembelian $asetPembelian */
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);

        if (empty($asetPembelian)) {
            return $this->sendError('Aset Pembelian not found');
        }

        return $this->sendResponse($asetPembelian->toArray(), 'Aset Pembelian retrieved successfully');
    }

    /**
     * Update the specified AsetPembelian in storage.
     * PUT/PATCH /asetPembelians/{id}
     *
     * @param  int $id
     * @param UpdateAsetPembelianAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPembelianAPIRequest $request)
    {
        $input = $request->all();

        /** @var AsetPembelian $asetPembelian */
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);

        if (empty($asetPembelian)) {
            return $this->sendError('Aset Pembelian not found');
        }

        $asetPembelian = $this->asetPembelianRepository->update($input, $id);

        return $this->sendResponse($asetPembelian->toArray(), 'AsetPembelian updated successfully');
    }

    /**
     * Remove the specified AsetPembelian from storage.
     * DELETE /asetPembelians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AsetPembelian $asetPembelian */
        $asetPembelian = $this->asetPembelianRepository->findWithoutFail($id);

        if (empty($asetPembelian)) {
            return $this->sendError('Aset Pembelian not found');
        }

        $asetPembelian->delete();

        return $this->sendResponse($id, 'Aset Pembelian deleted successfully');
    }
}
