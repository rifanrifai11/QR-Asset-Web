<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsetPeminjamanAPIRequest;
use App\Http\Requests\API\UpdateAsetPeminjamanAPIRequest;
use App\Models\AsetPeminjaman;
use App\Repositories\AsetPeminjamanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsetPeminjamanController
 * @package App\Http\Controllers\API
 */

class AsetPeminjamanAPIController extends AppBaseController
{
    /** @var  AsetPeminjamanRepository */
    private $asetPeminjamanRepository;

    public function __construct(AsetPeminjamanRepository $asetPeminjamanRepo)
    {
        $this->asetPeminjamanRepository = $asetPeminjamanRepo;
    }

    /**
     * Display a listing of the AsetPeminjaman.
     * GET|HEAD /asetPeminjamen
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPeminjamanRepository->pushCriteria(new RequestCriteria($request));
        $this->asetPeminjamanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asetPeminjamen = $this->asetPeminjamanRepository->all();

        return $this->sendResponse($asetPeminjamen->toArray(), 'Aset Peminjamen retrieved successfully');
    }

    /**
     * Store a newly created AsetPeminjaman in storage.
     * POST /asetPeminjamen
     *
     * @param CreateAsetPeminjamanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPeminjamanAPIRequest $request)
    {
        $input = $request->all();

        $asetPeminjamen = $this->asetPeminjamanRepository->create($input);

        return $this->sendResponse($asetPeminjamen->toArray(), 'Aset Peminjaman saved successfully');
    }

    /**
     * Display the specified AsetPeminjaman.
     * GET|HEAD /asetPeminjamen/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AsetPeminjaman $asetPeminjaman */
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);

        if (empty($asetPeminjaman)) {
            return $this->sendError('Aset Peminjaman not found');
        }

        return $this->sendResponse($asetPeminjaman->toArray(), 'Aset Peminjaman retrieved successfully');
    }

    /**
     * Update the specified AsetPeminjaman in storage.
     * PUT/PATCH /asetPeminjamen/{id}
     *
     * @param  int $id
     * @param UpdateAsetPeminjamanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPeminjamanAPIRequest $request)
    {
        $input = $request->all();

        /** @var AsetPeminjaman $asetPeminjaman */
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);

        if (empty($asetPeminjaman)) {
            return $this->sendError('Aset Peminjaman not found');
        }

        $asetPeminjaman = $this->asetPeminjamanRepository->update($input, $id);

        return $this->sendResponse($asetPeminjaman->toArray(), 'AsetPeminjaman updated successfully');
    }

    /**
     * Remove the specified AsetPeminjaman from storage.
     * DELETE /asetPeminjamen/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AsetPeminjaman $asetPeminjaman */
        $asetPeminjaman = $this->asetPeminjamanRepository->findWithoutFail($id);

        if (empty($asetPeminjaman)) {
            return $this->sendError('Aset Peminjaman not found');
        }

        $asetPeminjaman->delete();

        return $this->sendResponse($id, 'Aset Peminjaman deleted successfully');
    }
}
