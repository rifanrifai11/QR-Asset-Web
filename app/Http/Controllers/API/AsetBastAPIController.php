<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsetBastAPIRequest;
use App\Http\Requests\API\UpdateAsetBastAPIRequest;
use App\Models\AsetBast;
use App\Repositories\AsetBastRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsetBastController
 * @package App\Http\Controllers\API
 */

class AsetBastAPIController extends AppBaseController
{
    /** @var  AsetBastRepository */
    private $asetBastRepository;

    public function __construct(AsetBastRepository $asetBastRepo)
    {
        $this->asetBastRepository = $asetBastRepo;
    }

    /**
     * Display a listing of the AsetBast.
     * GET|HEAD /asetBasts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetBastRepository->pushCriteria(new RequestCriteria($request));
        $this->asetBastRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asetBasts = $this->asetBastRepository->all();

        return $this->sendResponse($asetBasts->toArray(), 'Aset Basts retrieved successfully');
    }

    /**
     * Store a newly created AsetBast in storage.
     * POST /asetBasts
     *
     * @param CreateAsetBastAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetBastAPIRequest $request)
    {
        $input = $request->all();

        $asetBasts = $this->asetBastRepository->create($input);

        return $this->sendResponse($asetBasts->toArray(), 'Aset Bast saved successfully');
    }

    /**
     * Display the specified AsetBast.
     * GET|HEAD /asetBasts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AsetBast $asetBast */
        $asetBast = $this->asetBastRepository->findWithoutFail($id);

        if (empty($asetBast)) {
            return $this->sendError('Aset Bast not found');
        }

        return $this->sendResponse($asetBast->toArray(), 'Aset Bast retrieved successfully');
    }

    /**
     * Update the specified AsetBast in storage.
     * PUT/PATCH /asetBasts/{id}
     *
     * @param  int $id
     * @param UpdateAsetBastAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetBastAPIRequest $request)
    {
        $input = $request->all();

        /** @var AsetBast $asetBast */
        $asetBast = $this->asetBastRepository->findWithoutFail($id);

        if (empty($asetBast)) {
            return $this->sendError('Aset Bast not found');
        }

        $asetBast = $this->asetBastRepository->update($input, $id);

        return $this->sendResponse($asetBast->toArray(), 'AsetBast updated successfully');
    }

    /**
     * Remove the specified AsetBast from storage.
     * DELETE /asetBasts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AsetBast $asetBast */
        $asetBast = $this->asetBastRepository->findWithoutFail($id);

        if (empty($asetBast)) {
            return $this->sendError('Aset Bast not found');
        }

        $asetBast->delete();

        return $this->sendResponse($id, 'Aset Bast deleted successfully');
    }
}
