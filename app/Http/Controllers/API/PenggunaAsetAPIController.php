<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePenggunaAsetAPIRequest;
use App\Http\Requests\API\UpdatePenggunaAsetAPIRequest;
use App\Models\PenggunaAset;
use App\Repositories\PenggunaAsetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PenggunaAsetController
 * @package App\Http\Controllers\API
 */

class PenggunaAsetAPIController extends AppBaseController
{
    /** @var  PenggunaAsetRepository */
    private $penggunaAsetRepository;

    public function __construct(PenggunaAsetRepository $penggunaAsetRepo)
    {
        $this->penggunaAsetRepository = $penggunaAsetRepo;
    }

    /**
     * Display a listing of the PenggunaAset.
     * GET|HEAD /penggunaAsets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->penggunaAsetRepository->pushCriteria(new RequestCriteria($request));
        $this->penggunaAsetRepository->pushCriteria(new LimitOffsetCriteria($request));
        $penggunaAsets = $this->penggunaAsetRepository->all();

        return $this->sendResponse($penggunaAsets->toArray(), 'Pengguna Asets retrieved successfully');
    }

    /**
     * Store a newly created PenggunaAset in storage.
     * POST /penggunaAsets
     *
     * @param CreatePenggunaAsetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePenggunaAsetAPIRequest $request)
    {
        $input = $request->all();

        $penggunaAsets = $this->penggunaAsetRepository->create($input);

        return $this->sendResponse($penggunaAsets->toArray(), 'Pengguna Aset saved successfully');
    }

    /**
     * Display the specified PenggunaAset.
     * GET|HEAD /penggunaAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PenggunaAset $penggunaAset */
        $penggunaAset = $this->penggunaAsetRepository->findWithoutFail($id);

        if (empty($penggunaAset)) {
            return $this->sendError('Pengguna Aset not found');
        }

        return $this->sendResponse($penggunaAset->toArray(), 'Pengguna Aset retrieved successfully');
    }

    /**
     * Update the specified PenggunaAset in storage.
     * PUT/PATCH /penggunaAsets/{id}
     *
     * @param  int $id
     * @param UpdatePenggunaAsetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenggunaAsetAPIRequest $request)
    {
        $input = $request->all();

        /** @var PenggunaAset $penggunaAset */
        $penggunaAset = $this->penggunaAsetRepository->findWithoutFail($id);

        if (empty($penggunaAset)) {
            return $this->sendError('Pengguna Aset not found');
        }

        $penggunaAset = $this->penggunaAsetRepository->update($input, $id);

        return $this->sendResponse($penggunaAset->toArray(), 'PenggunaAset updated successfully');
    }

    /**
     * Remove the specified PenggunaAset from storage.
     * DELETE /penggunaAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PenggunaAset $penggunaAset */
        $penggunaAset = $this->penggunaAsetRepository->findWithoutFail($id);

        if (empty($penggunaAset)) {
            return $this->sendError('Pengguna Aset not found');
        }

        $penggunaAset->delete();

        return $this->sendResponse($id, 'Pengguna Aset deleted successfully');
    }
}
