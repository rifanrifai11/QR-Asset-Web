<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMerekRequest;
use App\Http\Requests\UpdateMerekRequest;
use App\Repositories\MerekRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MerekController extends AppBaseController
{
    /** @var  MerekRepository */
    private $merekRepository;

    public function __construct(MerekRepository $merekRepo)
    {
        $this->merekRepository = $merekRepo;
    }

    /**
     * Display a listing of the Merek.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->merekRepository->pushCriteria(new RequestCriteria($request));
        $mereks = $this->merekRepository->all();

        return view('mereks.index')
            ->with('mereks', $mereks);
    }

    /**
     * Show the form for creating a new Merek.
     *
     * @return Response
     */
    public function create()
    {
        return view('mereks.create');
    }

    /**
     * Store a newly created Merek in storage.
     *
     * @param CreateMerekRequest $request
     *
     * @return Response
     */
    public function store(CreateMerekRequest $request)
    {
        $input = $request->all();

        $merek = $this->merekRepository->create($input);

        Flash::success('Merek saved successfully.');

        return redirect(route('mereks.index'));
    }

    /**
     * Display the specified Merek.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $merek = $this->merekRepository->findWithoutFail($id);

        if (empty($merek)) {
            Flash::error('Merek not found');

            return redirect(route('mereks.index'));
        }

        return view('mereks.show')->with('merek', $merek);
    }

    /**
     * Show the form for editing the specified Merek.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $merek = $this->merekRepository->findWithoutFail($id);

        if (empty($merek)) {
            Flash::error('Merek not found');

            return redirect(route('mereks.index'));
        }

        return view('mereks.edit')->with('merek', $merek);
    }

    /**
     * Update the specified Merek in storage.
     *
     * @param  int              $id
     * @param UpdateMerekRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMerekRequest $request)
    {
        $merek = $this->merekRepository->findWithoutFail($id);

        if (empty($merek)) {
            Flash::error('Merek not found');

            return redirect(route('mereks.index'));
        }

        $merek = $this->merekRepository->update($request->all(), $id);

        Flash::success('Merek updated successfully.');

        return redirect(route('mereks.index'));
    }

    /**
     * Remove the specified Merek from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $merek = $this->merekRepository->findWithoutFail($id);

        if (empty($merek)) {
            Flash::error('Merek not found');

            return redirect(route('mereks.index'));
        }

        $this->merekRepository->delete($id);

        Flash::success('Merek deleted successfully.');

        return redirect(route('mereks.index'));
    }
}
