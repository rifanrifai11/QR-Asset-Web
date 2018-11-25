<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUmurEkonomisAPIRequest;
use App\Http\Requests\API\UpdateUmurEkonomisAPIRequest;
use App\Models\UmurEkonomis;
use App\Repositories\UmurEkonomisRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UmurEkonomisController
 * @package App\Http\Controllers\API
 */

class UmurEkonomisAPIController extends AppBaseController
{
    /** @var  UmurEkonomisRepository */
    private $umurEkonomisRepository;

    public function __construct(UmurEkonomisRepository $umurEkonomisRepo)
    {
        $this->umurEkonomisRepository = $umurEkonomisRepo;
    }

    /**
     * Display a listing of the UmurEkonomis.
     * GET|HEAD /umurEkonomis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->umurEkonomisRepository->pushCriteria(new RequestCriteria($request));
        $this->umurEkonomisRepository->pushCriteria(new LimitOffsetCriteria($request));
        $umurEkonomis = $this->umurEkonomisRepository->all();

        return $this->sendResponse($umurEkonomis->toArray(), 'Umur Ekonomis retrieved successfully');
    }

    /**
     * Store a newly created UmurEkonomis in storage.
     * POST /umurEkonomis
     *
     * @param CreateUmurEkonomisAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUmurEkonomisAPIRequest $request)
    {
        $input = $request->all();

        $umurEkonomis = $this->umurEkonomisRepository->create($input);

        return $this->sendResponse($umurEkonomis->toArray(), 'Umur Ekonomis saved successfully');
    }

    /**
     * Display the specified UmurEkonomis.
     * GET|HEAD /umurEkonomis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UmurEkonomis $umurEkonomis */
        $umurEkonomis = $this->umurEkonomisRepository->findWithoutFail($id);

        if (empty($umurEkonomis)) {
            return $this->sendError('Umur Ekonomis not found');
        }

        return $this->sendResponse($umurEkonomis->toArray(), 'Umur Ekonomis retrieved successfully');
    }

    /**
     * Update the specified UmurEkonomis in storage.
     * PUT/PATCH /umurEkonomis/{id}
     *
     * @param  int $id
     * @param UpdateUmurEkonomisAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUmurEkonomisAPIRequest $request)
    {
        $input = $request->all();

        /** @var UmurEkonomis $umurEkonomis */
        $umurEkonomis = $this->umurEkonomisRepository->findWithoutFail($id);

        if (empty($umurEkonomis)) {
            return $this->sendError('Umur Ekonomis not found');
        }

        $umurEkonomis = $this->umurEkonomisRepository->update($input, $id);

        return $this->sendResponse($umurEkonomis->toArray(), 'UmurEkonomis updated successfully');
    }

    /**
     * Remove the specified UmurEkonomis from storage.
     * DELETE /umurEkonomis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UmurEkonomis $umurEkonomis */
        $umurEkonomis = $this->umurEkonomisRepository->findWithoutFail($id);

        if (empty($umurEkonomis)) {
            return $this->sendError('Umur Ekonomis not found');
        }

        $umurEkonomis->delete();

        return $this->sendResponse($id, 'Umur Ekonomis deleted successfully');
    }
}
