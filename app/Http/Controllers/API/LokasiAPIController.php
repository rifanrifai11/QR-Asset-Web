<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLokasiAPIRequest;
use App\Http\Requests\API\UpdateLokasiAPIRequest;
use App\Models\Lokasi;
use App\Repositories\LokasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LokasiController
 * @package App\Http\Controllers\API
 */

class LokasiAPIController extends AppBaseController
{
    /** @var  LokasiRepository */
    private $lokasiRepository;

    public function __construct(LokasiRepository $lokasiRepo)
    {
        $this->lokasiRepository = $lokasiRepo;
    }

    /**
     * Display a listing of the Lokasi.
     * GET|HEAD /lokasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lokasiRepository->pushCriteria(new RequestCriteria($request));
        $this->lokasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $lokasis = $this->lokasiRepository->all();

        return $this->sendResponse($lokasis->toArray(), 'Lokasis retrieved successfully');
    }

    /**
     * Store a newly created Lokasi in storage.
     * POST /lokasis
     *
     * @param CreateLokasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLokasiAPIRequest $request)
    {
        $input = $request->all();

        $lokasis = $this->lokasiRepository->create($input);

        return $this->sendResponse($lokasis->toArray(), 'Lokasi saved successfully');
    }

    /**
     * Display the specified Lokasi.
     * GET|HEAD /lokasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Lokasi $lokasi */
        $lokasi = $this->lokasiRepository->findWithoutFail($id);

        if (empty($lokasi)) {
            return $this->sendError('Lokasi not found');
        }

        return $this->sendResponse($lokasi->toArray(), 'Lokasi retrieved successfully');
    }

    /**
     * Update the specified Lokasi in storage.
     * PUT/PATCH /lokasis/{id}
     *
     * @param  int $id
     * @param UpdateLokasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLokasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Lokasi $lokasi */
        $lokasi = $this->lokasiRepository->findWithoutFail($id);

        if (empty($lokasi)) {
            return $this->sendError('Lokasi not found');
        }

        $lokasi = $this->lokasiRepository->update($input, $id);

        return $this->sendResponse($lokasi->toArray(), 'Lokasi updated successfully');
    }

    /**
     * Remove the specified Lokasi from storage.
     * DELETE /lokasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Lokasi $lokasi */
        $lokasi = $this->lokasiRepository->findWithoutFail($id);

        if (empty($lokasi)) {
            return $this->sendError('Lokasi not found');
        }

        $lokasi->delete();

        return $this->sendResponse($id, 'Lokasi deleted successfully');
    }
}
