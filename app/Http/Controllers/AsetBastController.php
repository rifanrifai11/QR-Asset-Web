<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetBastRequest;
use App\Http\Requests\UpdateAsetBastRequest;
use App\Repositories\AsetBastRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetBastController extends AppBaseController
{
    /** @var  AsetBastRepository */
    private $asetBastRepository;

    public function __construct(AsetBastRepository $asetBastRepo)
    {
        $this->asetBastRepository = $asetBastRepo;
    }

    /**
     * Display a listing of the AsetBast.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetBastRepository->pushCriteria(new RequestCriteria($request));
        $asetBasts = $this->asetBastRepository->all();

        return view('aset_basts.index')
            ->with('asetBasts', $asetBasts);
    }

    /**
     * Show the form for creating a new AsetBast.
     *
     * @return Response
     */
    public function create()
    {
        return view('aset_basts.create');
    }

    /**
     * Store a newly created AsetBast in storage.
     *
     * @param CreateAsetBastRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetBastRequest $request)
    {
        $input = $request->all();

        $asetBast = $this->asetBastRepository->create($input);

        Flash::success('Aset Bast saved successfully.');

        return redirect(route('asetBasts.index'));
    }

    /**
     * Display the specified AsetBast.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetBast = $this->asetBastRepository->findWithoutFail($id);

        if (empty($asetBast)) {
            Flash::error('Aset Bast not found');

            return redirect(route('asetBasts.index'));
        }

        return view('aset_basts.show')->with('asetBast', $asetBast);
    }

    /**
     * Show the form for editing the specified AsetBast.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetBast = $this->asetBastRepository->findWithoutFail($id);

        if (empty($asetBast)) {
            Flash::error('Aset Bast not found');

            return redirect(route('asetBasts.index'));
        }

        return view('aset_basts.edit')->with('asetBast', $asetBast);
    }

    /**
     * Update the specified AsetBast in storage.
     *
     * @param  int              $id
     * @param UpdateAsetBastRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetBastRequest $request)
    {
        $asetBast = $this->asetBastRepository->findWithoutFail($id);

        if (empty($asetBast)) {
            Flash::error('Aset Bast not found');

            return redirect(route('asetBasts.index'));
        }

        $asetBast = $this->asetBastRepository->update($request->all(), $id);

        Flash::success('Aset Bast updated successfully.');

        return redirect(route('asetBasts.index'));
    }

    /**
     * Remove the specified AsetBast from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asetBast = $this->asetBastRepository->findWithoutFail($id);

        if (empty($asetBast)) {
            Flash::error('Aset Bast not found');

            return redirect(route('asetBasts.index'));
        }

        $this->asetBastRepository->delete($id);

        Flash::success('Aset Bast deleted successfully.');

        return redirect(route('asetBasts.index'));
    }
}
