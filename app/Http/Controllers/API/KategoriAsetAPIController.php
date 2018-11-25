<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKategoriAsetAPIRequest;
use App\Http\Requests\API\UpdateKategoriAsetAPIRequest;
use App\Models\KategoriAset;
use App\Repositories\KategoriAsetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KategoriAsetController
 * @package App\Http\Controllers\API
 */

class KategoriAsetAPIController extends AppBaseController
{
    /** @var  KategoriAsetRepository */
    private $kategoriAsetRepository;

    public function __construct(KategoriAsetRepository $kategoriAsetRepo)
    {
        $this->kategoriAsetRepository = $kategoriAsetRepo;
    }

    /**
     * Display a listing of the KategoriAset.
     * GET|HEAD /kategoriAsets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kategoriAsetRepository->pushCriteria(new RequestCriteria($request));
        $this->kategoriAsetRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kategoriAsets = $this->kategoriAsetRepository->all();

        return $this->sendResponse($kategoriAsets->toArray(), 'Kategori Asets retrieved successfully');
    }

    /**
     * Store a newly created KategoriAset in storage.
     * POST /kategoriAsets
     *
     * @param CreateKategoriAsetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKategoriAsetAPIRequest $request)
    {
        $input = $request->all();

        $kategoriAsets = $this->kategoriAsetRepository->create($input);

        return $this->sendResponse($kategoriAsets->toArray(), 'Kategori Aset saved successfully');
    }

    /**
     * Display the specified KategoriAset.
     * GET|HEAD /kategoriAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KategoriAset $kategoriAset */
        $kategoriAset = $this->kategoriAsetRepository->findWithoutFail($id);

        if (empty($kategoriAset)) {
            return $this->sendError('Kategori Aset not found');
        }

        return $this->sendResponse($kategoriAset->toArray(), 'Kategori Aset retrieved successfully');
    }

    /**
     * Update the specified KategoriAset in storage.
     * PUT/PATCH /kategoriAsets/{id}
     *
     * @param  int $id
     * @param UpdateKategoriAsetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKategoriAsetAPIRequest $request)
    {
        $input = $request->all();

        /** @var KategoriAset $kategoriAset */
        $kategoriAset = $this->kategoriAsetRepository->findWithoutFail($id);

        if (empty($kategoriAset)) {
            return $this->sendError('Kategori Aset not found');
        }

        $kategoriAset = $this->kategoriAsetRepository->update($input, $id);

        return $this->sendResponse($kategoriAset->toArray(), 'KategoriAset updated successfully');
    }

    /**
     * Remove the specified KategoriAset from storage.
     * DELETE /kategoriAsets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KategoriAset $kategoriAset */
        $kategoriAset = $this->kategoriAsetRepository->findWithoutFail($id);

        if (empty($kategoriAset)) {
            return $this->sendError('Kategori Aset not found');
        }

        $kategoriAset->delete();

        return $this->sendResponse($id, 'Kategori Aset deleted successfully');
    }
}
