<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKondisiAsetRequest;
use App\Http\Requests\UpdateKondisiAsetRequest;
use App\Repositories\KondisiAsetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KondisiAsetController extends AppBaseController
{
    /** @var  KondisiAsetRepository */
    private $kondisiAsetRepository;

    public function __construct(KondisiAsetRepository $kondisiAsetRepo)
    {
        $this->kondisiAsetRepository = $kondisiAsetRepo;
    }

    /**
     * Display a listing of the KondisiAset.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kondisiAsetRepository->pushCriteria(new RequestCriteria($request));
        $kondisiAsets = $this->kondisiAsetRepository->all();

        return view('kondisi_asets.index')
            ->with('kondisiAsets', $kondisiAsets);
    }

    /**
     * Show the form for creating a new KondisiAset.
     *
     * @return Response
     */
    public function create()
    {
        return view('kondisi_asets.create');
    }

    /**
     * Store a newly created KondisiAset in storage.
     *
     * @param CreateKondisiAsetRequest $request
     *
     * @return Response
     */
    public function store(CreateKondisiAsetRequest $request)
    {
        $input = $request->all();

        $kondisiAset = $this->kondisiAsetRepository->create($input);

        Flash::success('Kondisi Aset saved successfully.');

        return redirect(route('kondisiAsets.index'));
    }

    /**
     * Display the specified KondisiAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kondisiAset = $this->kondisiAsetRepository->findWithoutFail($id);

        if (empty($kondisiAset)) {
            Flash::error('Kondisi Aset not found');

            return redirect(route('kondisiAsets.index'));
        }

        return view('kondisi_asets.show')->with('kondisiAset', $kondisiAset);
    }

    /**
     * Show the form for editing the specified KondisiAset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kondisiAset = $this->kondisiAsetRepository->findWithoutFail($id);

        if (empty($kondisiAset)) {
            Flash::error('Kondisi Aset not found');

            return redirect(route('kondisiAsets.index'));
        }

        return view('kondisi_asets.edit')->with('kondisiAset', $kondisiAset);
    }

    /**
     * Update the specified KondisiAset in storage.
     *
     * @param  int              $id
     * @param UpdateKondisiAsetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKondisiAsetRequest $request)
    {
        $kondisiAset = $this->kondisiAsetRepository->findWithoutFail($id);

        if (empty($kondisiAset)) {
            Flash::error('Kondisi Aset not found');

            return redirect(route('kondisiAsets.index'));
        }

        $kondisiAset = $this->kondisiAsetRepository->update($request->all(), $id);

        Flash::success('Kondisi Aset updated successfully.');

        return redirect(route('kondisiAsets.index'));
    }

    /**
     * Remove the specified KondisiAset from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kondisiAset = $this->kondisiAsetRepository->findWithoutFail($id);

        if (empty($kondisiAset)) {
            Flash::error('Kondisi Aset not found');

            return redirect(route('kondisiAsets.index'));
        }

        $this->kondisiAsetRepository->delete($id);

        Flash::success('Kondisi Aset deleted successfully.');

        return redirect(route('kondisiAsets.index'));
    }
}
