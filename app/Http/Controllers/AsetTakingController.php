<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetTakingRequest;
use App\Http\Requests\UpdateAsetTakingRequest;
use App\Repositories\AsetTakingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsetTakingController extends AppBaseController
{
    /** @var  AsetTakingRepository */
    private $asetTakingRepository;

    public function __construct(AsetTakingRepository $asetTakingRepo)
    {
        $this->asetTakingRepository = $asetTakingRepo;
    }

    /**
     * Display a listing of the AsetTaking.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asetTakingRepository->pushCriteria(new RequestCriteria($request));
        $asetTakings = $this->asetTakingRepository->all();

        return view('aset_takings.index')
            ->with('asetTakings', $asetTakings);
    }

    /**
     * Show the form for creating a new AsetTaking.
     *
     * @return Response
     */
    public function create()
    {
        return view('aset_takings.create');
    }

    /**
     * Store a newly created AsetTaking in storage.
     *
     * @param CreateAsetTakingRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetTakingRequest $request)
    {
        $input = $request->all();

        $asetTaking = $this->asetTakingRepository->create($input);

        Flash::success('Aset Taking saved successfully.');

        return redirect(route('asetTakings.index'));
    }

    /**
     * Display the specified AsetTaking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asetTaking = $this->asetTakingRepository->findWithoutFail($id);

        if (empty($asetTaking)) {
            Flash::error('Aset Taking not found');

            return redirect(route('asetTakings.index'));
        }

        return view('aset_takings.show')->with('asetTaking', $asetTaking);
    }

    /**
     * Show the form for editing the specified AsetTaking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asetTaking = $this->asetTakingRepository->findWithoutFail($id);

        if (empty($asetTaking)) {
            Flash::error('Aset Taking not found');

            return redirect(route('asetTakings.index'));
        }

        return view('aset_takings.edit')->with('asetTaking', $asetTaking);
    }

    /**
     * Update the specified AsetTaking in storage.
     *
     * @param  int              $id
     * @param UpdateAsetTakingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetTakingRequest $request)
    {
        $asetTaking = $this->asetTakingRepository->findWithoutFail($id);

        if (empty($asetTaking)) {
            Flash::error('Aset Taking not found');

            return redirect(route('asetTakings.index'));
        }

        $asetTaking = $this->asetTakingRepository->update($request->all(), $id);

        Flash::success('Aset Taking updated successfully.');

        return redirect(route('asetTakings.index'));
    }

    /**
     * Remove the specified AsetTaking from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asetTaking = $this->asetTakingRepository->findWithoutFail($id);

        if (empty($asetTaking)) {
            Flash::error('Aset Taking not found');

            return redirect(route('asetTakings.index'));
        }

        $this->asetTakingRepository->delete($id);

        Flash::success('Aset Taking deleted successfully.');

        return redirect(route('asetTakings.index'));
    }
}
