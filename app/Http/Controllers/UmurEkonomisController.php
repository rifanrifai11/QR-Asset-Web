<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUmurEkonomisRequest;
use App\Http\Requests\UpdateUmurEkonomisRequest;
use App\Repositories\UmurEkonomisRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UmurEkonomisController extends AppBaseController
{
    /** @var  UmurEkonomisRepository */
    private $umurEkonomisRepository;

    public function __construct(UmurEkonomisRepository $umurEkonomisRepo)
    {
        $this->umurEkonomisRepository = $umurEkonomisRepo;
    }

    /**
     * Display a listing of the UmurEkonomis.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->umurEkonomisRepository->pushCriteria(new RequestCriteria($request));
        $umurEkonomis = $this->umurEkonomisRepository->all();

        return view('umur_ekonomis.index')
            ->with('umurEkonomis', $umurEkonomis);
    }

    /**
     * Show the form for creating a new UmurEkonomis.
     *
     * @return Response
     */
    public function create()
    {
        return view('umur_ekonomis.create');
    }

    /**
     * Store a newly created UmurEkonomis in storage.
     *
     * @param CreateUmurEkonomisRequest $request
     *
     * @return Response
     */
    public function store(CreateUmurEkonomisRequest $request)
    {
        $input = $request->all();

        $umurEkonomis = $this->umurEkonomisRepository->create($input);

        Flash::success('Umur Ekonomis saved successfully.');

        return redirect(route('umurEkonomis.index'));
    }

    /**
     * Display the specified UmurEkonomis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $umurEkonomis = $this->umurEkonomisRepository->findWithoutFail($id);

        if (empty($umurEkonomis)) {
            Flash::error('Umur Ekonomis not found');

            return redirect(route('umurEkonomis.index'));
        }

        return view('umur_ekonomis.show')->with('umurEkonomis', $umurEkonomis);
    }

    /**
     * Show the form for editing the specified UmurEkonomis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $umurEkonomis = $this->umurEkonomisRepository->findWithoutFail($id);

        if (empty($umurEkonomis)) {
            Flash::error('Umur Ekonomis not found');

            return redirect(route('umurEkonomis.index'));
        }

        return view('umur_ekonomis.edit')->with('umurEkonomis', $umurEkonomis);
    }

    /**
     * Update the specified UmurEkonomis in storage.
     *
     * @param  int              $id
     * @param UpdateUmurEkonomisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUmurEkonomisRequest $request)
    {
        $umurEkonomis = $this->umurEkonomisRepository->findWithoutFail($id);

        if (empty($umurEkonomis)) {
            Flash::error('Umur Ekonomis not found');

            return redirect(route('umurEkonomis.index'));
        }

        $umurEkonomis = $this->umurEkonomisRepository->update($request->all(), $id);

        Flash::success('Umur Ekonomis updated successfully.');

        return redirect(route('umurEkonomis.index'));
    }

    /**
     * Remove the specified UmurEkonomis from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $umurEkonomis = $this->umurEkonomisRepository->findWithoutFail($id);

        if (empty($umurEkonomis)) {
            Flash::error('Umur Ekonomis not found');

            return redirect(route('umurEkonomis.index'));
        }

        $this->umurEkonomisRepository->delete($id);

        Flash::success('Umur Ekonomis deleted successfully.');

        return redirect(route('umurEkonomis.index'));
    }
}
