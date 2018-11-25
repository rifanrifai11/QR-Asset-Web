<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipeRequest;
use App\Http\Requests\UpdateTipeRequest;
use App\Models\Tipe;
use App\Repositories\TipeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipeController extends AppBaseController
{
    /** @var  TipeRepository */
    private $tipeRepository;

    public function __construct(TipeRepository $tipeRepo)
    {
        $this->tipeRepository = $tipeRepo;
    }

    /**
     * Display a listing of the Tipe.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipeRepository->pushCriteria(new RequestCriteria($request));
        $tipes = $this->tipeRepository->all();

        return view('tipes.index')
            ->with('tipes', $tipes);
    }

    /**
     * Show the form for creating a new Tipe.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipes.create');
    }

    /**
     * Store a newly created Tipe in storage.
     *
     * @param CreateTipeRequest $request
     *
     * @return Response
     */
    public function store(CreateTipeRequest $request)
    {
        $input = $request->all();

        $tipe = $this->tipeRepository->create($input);

        Flash::success('Tipe saved successfully.');

        return redirect(route('tipes.index'));
    }

    /**
     * Display the specified Tipe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipe = $this->tipeRepository->findWithoutFail($id);

        if (empty($tipe)) {
            Flash::error('Tipe not found');

            return redirect(route('tipes.index'));
        }

        return view('tipes.show')->with('tipe', $tipe);
    }

    /**
     * Show the form for editing the specified Tipe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipe = $this->tipeRepository->findWithoutFail($id);

        if (empty($tipe)) {
            Flash::error('Tipe not found');

            return redirect(route('tipes.index'));
        }

        return view('tipes.edit')->with('tipe', $tipe);
    }

    /**
     * Update the specified Tipe in storage.
     *
     * @param  int              $id
     * @param UpdateTipeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipeRequest $request)
    {
        $tipe = $this->tipeRepository->findWithoutFail($id);

        if (empty($tipe)) {
            Flash::error('Tipe not found');

            return redirect(route('tipes.index'));
        }

        $tipe = $this->tipeRepository->update($request->all(), $id);

        Flash::success('Tipe updated successfully.');

        return redirect(route('tipes.index'));
    }

    /**
     * Remove the specified Tipe from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipe = $this->tipeRepository->findWithoutFail($id);

        if (empty($tipe)) {
            Flash::error('Tipe not found');

            return redirect(route('tipes.index'));
        }

        $this->tipeRepository->delete($id);

        Flash::success('Tipe deleted successfully.');

        return redirect(route('tipes.index'));
    }

    public function autocomplete(Request $request){
        $data=Tipe::select("nama as name")->where('nama','like',"%{$request->input('query')}%")->get();
        return response()->json($data);
    }
}
