<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsetHilangAPIRequest;
use App\Http\Requests\API\UpdateAsetHilangAPIRequest;
use App\Models\AsetHilang;
use App\Repositories\AsetHilangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsetHilangController
 * @package App\Http\Controllers\API
 */

class AsetHilangAPIController extends AppBaseController
{
    /** @var  AsetHilangRepository */
    private $asetHilangRepository;

    public function __construct(AsetHilangRepository $asetHilangRepo)
    {
        $this->asetHilangRepository = $asetHilangRepo;
    }

    /**
     * Display a listing of the AsetHilang.
     * GET|HEAD /asetHilangs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetHilangRepository->pushCriteria(new RequestCriteria($request));
        $this->asetHilangRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asetHilangs = $this->asetHilangRepository->all();

        return $this->sendResponse($asetHilangs->toArray(), 'Aset Hilangs retrieved successfully');
    }

    /**
     * Store a newly created AsetHilang in storage.
     * POST /asetHilangs
     *
     * @param CreateAsetHilangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetHilangAPIRequest $request)
    {
        $input = $request->all();

        $asetHilangs = $this->asetHilangRepository->create($input);

        return $this->sendResponse($asetHilangs->toArray(), 'Aset Hilang saved successfully');
    }

    /**
     * Display the specified AsetHilang.
     * GET|HEAD /asetHilangs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AsetHilang $asetHilang */
        $asetHilang = $this->asetHilangRepository->findWithoutFail($id);

        if (empty($asetHilang)) {
            return $this->sendError('Aset Hilang not found');
        }

        return $this->sendResponse($asetHilang->toArray(), 'Aset Hilang retrieved successfully');
    }

    /**
     * Update the specified AsetHilang in storage.
     * PUT/PATCH /asetHilangs/{id}
     *
     * @param  int $id
     * @param UpdateAsetHilangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetHilangAPIRequest $request)
    {
        $input = $request->all();

        /** @var AsetHilang $asetHilang */
        $asetHilang = $this->asetHilangRepository->findWithoutFail($id);

        if (empty($asetHilang)) {
            return $this->sendError('Aset Hilang not found');
        }

        $asetHilang = $this->asetHilangRepository->update($input, $id);

        return $this->sendResponse($asetHilang->toArray(), 'AsetHilang updated successfully');
    }

    /**
     * Remove the specified AsetHilang from storage.
     * DELETE /asetHilangs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AsetHilang $asetHilang */
        $asetHilang = $this->asetHilangRepository->findWithoutFail($id);

        if (empty($asetHilang)) {
            return $this->sendError('Aset Hilang not found');
        }

        $asetHilang->delete();

        return $this->sendResponse($id, 'Aset Hilang deleted successfully');
    }
}
