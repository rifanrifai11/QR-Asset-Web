<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;
use App\Repositories\LokasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LokasiController extends AppBaseController
{
    /** @var  LokasiRepository */
    private $LokasiRepository;

    public function __construct(LokasiRepository $LokasiRepo)
    {
        $this->LokasiRepository = $LokasiRepo;
    }

    /**
     * Display a listing of the Lokasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->LokasiRepository->pushCriteria(new RequestCriteria($request));
        $lokasis = $this->LokasiRepository->all();

        return view('lokasis.index')
            ->with('lokasis', $lokasis);
    }

    /**
     * Show the form for creating a new Lokasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('lokasis.create');
    }

    /**
     * Store a newly created Lokasi in storage.
     *
     * @param CreateLokasiRequest $request
     *
     * @return Response
     */
    public function store(CreateLokasiRequest $request)
    {
        $input = $request->all();

        $Lokasi = $this->LokasiRepository->create($input);

        Flash::success('Lokasi saved successfully.');

        return redirect(route('lokasis.index'));
    }

    /**
     * Display the specified Lokasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lokasi = $this->LokasiRepository->findWithoutFail($id);

        if (empty($lokasi)) {
            Flash::error('Lokasi not found');

            return redirect(route('lokasis.index'));
        }

        return view('lokasis.show')->with('lokasi', $lokasi);
    }

    /**
     * Show the form for editing the specified Lokasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lokasi = $this->LokasiRepository->findWithoutFail($id);

        if (empty($lokasi)) {
            Flash::error('Lokasi not found');

            return redirect(route('lokasis.index'));
        }

        return view('lokasis.edit')->with('lokasi', $lokasi);
    }

    /**
     * Update the specified Lokasi in storage.
     *
     * @param  int              $id
     * @param UpdateLokasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLokasiRequest $request)
    {
        $lokasi = $this->LokasiRepository->findWithoutFail($id);

        if (empty($lokasi)) {
            Flash::error('Lokasi not found');

            return redirect(route('lokasis.index'));
        }

        $lokasi = $this->LokasiRepository->update($request->all(), $id);

        Flash::success('Lokasi updated successfully.');

        return redirect(route('lokasis.index'));
    }

    /**
     * Remove the specified Lokasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lokasi = $this->LokasiRepository->findWithoutFail($id);

        if (empty($lokasi)) {
            Flash::error('Lokasi not found');

            return redirect(route('lokasis.index'));
        }

        $this->LokasiRepository->delete($id);

        Flash::success('Lokasi deleted successfully.');

        return redirect(route('lokasis.index'));
    }
}
