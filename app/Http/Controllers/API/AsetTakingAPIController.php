<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsetTakingAPIRequest;
use App\Http\Requests\API\UpdateAsetTakingAPIRequest;
use App\Models\AsetTaking;
use App\Models\DataAset;
use App\Models\KondisiAset;
use App\Repositories\AsetTakingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsetTakingController
 * @package App\Http\Controllers\API
 */

class AsetTakingAPIController extends AppBaseController
{
    /** @var  AsetTakingRepository */
    private $asetTakingRepository;

    public function __construct(AsetTakingRepository $asetTakingRepo)
    {
        $this->asetTakingRepository = $asetTakingRepo;
    }

    /**
     * Display a listing of the AsetTaking.
     * GET|HEAD /asetTakings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetTakingRepository->pushCriteria(new RequestCriteria($request));
        $this->asetTakingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asetTakings = $this->asetTakingRepository->all();

        return $this->sendResponse($asetTakings->toArray(), 'Aset Takings retrieved successfully');
    }

    /**
     * Store a newly created AsetTaking in storage.
     * POST /asetTakings
     *
     * @param CreateAsetTakingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetTakingAPIRequest $request)
    {
        $input = $request->all();

        $dataAset=DataAset::where('kode_data_aset',$input['kode_data_aset'])->first();

        if (empty($dataAset)) {
            return $this->sendError('Data Aset tidak ditemukan');
        }

        $kondisiAset=KondisiAset::where('id',$input['kondisi_aset_id'])->first();

        if (empty($kondisiAset)) {
            return $this->sendError('Kondisi Aset tidak ditemukan');
        }

        $input['data_aset_id']=$dataAset->id;

        $input['users_id']=Auth::id();

        $asetTakings = $this->asetTakingRepository->create($input);

        return $this->sendResponse($asetTakings->toArray(), 'Aset Taking saved successfully');
    }

    /**
     * Display the specified AsetTaking.
     * GET|HEAD /asetTakings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AsetTaking $asetTaking */
        $asetTaking = $this->asetTakingRepository->findWithoutFail($id);

        if (empty($asetTaking)) {
            return $this->sendError('Aset Taking not found');
        }

        return $this->sendResponse($asetTaking->toArray(), 'Aset Taking retrieved successfully');
    }

    /**
     * Update the specified AsetTaking in storage.
     * PUT/PATCH /asetTakings/{id}
     *
     * @param  int $id
     * @param UpdateAsetTakingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetTakingAPIRequest $request)
    {
        $input = $request->all();

        /** @var AsetTaking $asetTaking */
        $asetTaking = $this->asetTakingRepository->findWithoutFail($id);

        if (empty($asetTaking)) {
            return $this->sendError('Aset Taking not found');
        }

        $asetTaking = $this->asetTakingRepository->update($input, $id);

        return $this->sendResponse($asetTaking->toArray(), 'AsetTaking updated successfully');
    }

    /**
     * Remove the specified AsetTaking from storage.
     * DELETE /asetTakings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AsetTaking $asetTaking */
        $asetTaking = $this->asetTakingRepository->findWithoutFail($id);

        if (empty($asetTaking)) {
            return $this->sendError('Aset Taking not found');
        }

        $asetTaking->delete();

        return $this->sendResponse($id, 'Aset Taking deleted successfully');
    }
}
