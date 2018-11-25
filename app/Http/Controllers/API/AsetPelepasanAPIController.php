<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsetPelepasanAPIRequest;
use App\Http\Requests\API\UpdateAsetPelepasanAPIRequest;
use App\Models\AsetPelepasan;
use App\Repositories\AsetPelepasanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsetPelepasanController
 * @package App\Http\Controllers\API
 */

class AsetPelepasanAPIController extends AppBaseController
{
    /** @var  AsetPelepasanRepository */
    private $asetPelepasanRepository;

    public function __construct(AsetPelepasanRepository $asetPelepasanRepo)
    {
        $this->asetPelepasanRepository = $asetPelepasanRepo;
    }

    /**
     * Display a listing of the AsetPelepasan.
     * GET|HEAD /asetPelepasans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetPelepasanRepository->pushCriteria(new RequestCriteria($request));
        $this->asetPelepasanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asetPelepasans = $this->asetPelepasanRepository->all();

        return $this->sendResponse($asetPelepasans->toArray(), 'Aset Pelepasans retrieved successfully');
    }

    /**
     * Store a newly created AsetPelepasan in storage.
     * POST /asetPelepasans
     *
     * @param CreateAsetPelepasanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetPelepasanAPIRequest $request)
    {
        $input = $request->all();

        $asetPelepasans = $this->asetPelepasanRepository->create($input);

        return $this->sendResponse($asetPelepasans->toArray(), 'Aset Pelepasan saved successfully');
    }

    /**
     * Display the specified AsetPelepasan.
     * GET|HEAD /asetPelepasans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AsetPelepasan $asetPelepasan */
        $asetPelepasan = $this->asetPelepasanRepository->findWithoutFail($id);

        if (empty($asetPelepasan)) {
            return $this->sendError('Aset Pelepasan not found');
        }

        return $this->sendResponse($asetPelepasan->toArray(), 'Aset Pelepasan retrieved successfully');
    }

    /**
     * Update the specified AsetPelepasan in storage.
     * PUT/PATCH /asetPelepasans/{id}
     *
     * @param  int $id
     * @param UpdateAsetPelepasanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetPelepasanAPIRequest $request)
    {
        $input = $request->all();

        /** @var AsetPelepasan $asetPelepasan */
        $asetPelepasan = $this->asetPelepasanRepository->findWithoutFail($id);

        if (empty($asetPelepasan)) {
            return $this->sendError('Aset Pelepasan not found');
        }

        $asetPelepasan = $this->asetPelepasanRepository->update($input, $id);

        return $this->sendResponse($asetPelepasan->toArray(), 'AsetPelepasan updated successfully');
    }

    /**
     * Remove the specified AsetPelepasan from storage.
     * DELETE /asetPelepasans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AsetPelepasan $asetPelepasan */
        $asetPelepasan = $this->asetPelepasanRepository->findWithoutFail($id);

        if (empty($asetPelepasan)) {
            return $this->sendError('Aset Pelepasan not found');
        }

        $asetPelepasan->delete();

        return $this->sendResponse($id, 'Aset Pelepasan deleted successfully');
    }
}
