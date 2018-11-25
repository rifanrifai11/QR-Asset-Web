<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsetMutasiAPIRequest;
use App\Http\Requests\API\UpdateAsetMutasiAPIRequest;
use App\Models\AsetMutasi;
use App\Repositories\AsetMutasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsetMutasiController
 * @package App\Http\Controllers\API
 */

class AsetMutasiAPIController extends AppBaseController
{
    /** @var  AsetMutasiRepository */
    private $asetMutasiRepository;

    public function __construct(AsetMutasiRepository $asetMutasiRepo)
    {
        $this->asetMutasiRepository = $asetMutasiRepo;
    }

    /**
     * Display a listing of the AsetMutasi.
     * GET|HEAD /asetMutasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetMutasiRepository->pushCriteria(new RequestCriteria($request));
        $this->asetMutasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asetMutasis = $this->asetMutasiRepository->all();

        return $this->sendResponse($asetMutasis->toArray(), 'Aset Mutasis retrieved successfully');
    }

    /**
     * Store a newly created AsetMutasi in storage.
     * POST /asetMutasis
     *
     * @param CreateAsetMutasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetMutasiAPIRequest $request)
    {
        $input = $request->all();

        $asetMutasis = $this->asetMutasiRepository->create($input);

        return $this->sendResponse($asetMutasis->toArray(), 'Aset Mutasi saved successfully');
    }

    /**
     * Display the specified AsetMutasi.
     * GET|HEAD /asetMutasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AsetMutasi $asetMutasi */
        $asetMutasi = $this->asetMutasiRepository->findWithoutFail($id);

        if (empty($asetMutasi)) {
            return $this->sendError('Aset Mutasi not found');
        }

        return $this->sendResponse($asetMutasi->toArray(), 'Aset Mutasi retrieved successfully');
    }

    /**
     * Update the specified AsetMutasi in storage.
     * PUT/PATCH /asetMutasis/{id}
     *
     * @param  int $id
     * @param UpdateAsetMutasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetMutasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var AsetMutasi $asetMutasi */
        $asetMutasi = $this->asetMutasiRepository->findWithoutFail($id);

        if (empty($asetMutasi)) {
            return $this->sendError('Aset Mutasi not found');
        }

        $asetMutasi = $this->asetMutasiRepository->update($input, $id);

        return $this->sendResponse($asetMutasi->toArray(), 'AsetMutasi updated successfully');
    }

    /**
     * Remove the specified AsetMutasi from storage.
     * DELETE /asetMutasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AsetMutasi $asetMutasi */
        $asetMutasi = $this->asetMutasiRepository->findWithoutFail($id);

        if (empty($asetMutasi)) {
            return $this->sendError('Aset Mutasi not found');
        }

        $asetMutasi->delete();

        return $this->sendResponse($id, 'Aset Mutasi deleted successfully');
    }
}
