<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobsiteRequest;
use App\Http\Requests\UpdateJobsiteRequest;
use App\Repositories\JobsiteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JobsiteController extends AppBaseController
{
    /** @var  JobsiteRepository */
    private $jobsiteRepository;

    public function __construct(JobsiteRepository $jobsiteRepo)
    {
        $this->jobsiteRepository = $jobsiteRepo;
    }

    /**
     * Display a listing of the Jobsite.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jobsiteRepository->pushCriteria(new RequestCriteria($request));
        $jobsites = $this->jobsiteRepository->all();

        return view('jobsites.index')
            ->with('jobsites', $jobsites);
    }

    /**
     * Show the form for creating a new Jobsite.
     *
     * @return Response
     */
    public function create()
    {
        return view('jobsites.create');
    }

    /**
     * Store a newly created Jobsite in storage.
     *
     * @param CreateJobsiteRequest $request
     *
     * @return Response
     */
    public function store(CreateJobsiteRequest $request)
    {
        $input = $request->all();

        $jobsite = $this->jobsiteRepository->create($input);

        Flash::success('Jobsite saved successfully.');

        return redirect(route('jobsites.index'));
    }

    /**
     * Display the specified Jobsite.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jobsite = $this->jobsiteRepository->findWithoutFail($id);

        if (empty($jobsite)) {
            Flash::error('Jobsite not found');

            return redirect(route('jobsites.index'));
        }

        return view('jobsites.show')->with('jobsite', $jobsite);
    }

    /**
     * Show the form for editing the specified Jobsite.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jobsite = $this->jobsiteRepository->findWithoutFail($id);

        if (empty($jobsite)) {
            Flash::error('Jobsite not found');

            return redirect(route('jobsites.index'));
        }

        return view('jobsites.edit')->with('jobsite', $jobsite);
    }

    /**
     * Update the specified Jobsite in storage.
     *
     * @param  int              $id
     * @param UpdateJobsiteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJobsiteRequest $request)
    {
        $jobsite = $this->jobsiteRepository->findWithoutFail($id);

        if (empty($jobsite)) {
            Flash::error('Jobsite not found');

            return redirect(route('jobsites.index'));
        }

        $jobsite = $this->jobsiteRepository->update($request->all(), $id);

        Flash::success('Jobsite updated successfully.');

        return redirect(route('jobsites.index'));
    }

    /**
     * Remove the specified Jobsite from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jobsite = $this->jobsiteRepository->findWithoutFail($id);

        if (empty($jobsite)) {
            Flash::error('Jobsite not found');

            return redirect(route('jobsites.index'));
        }

        $this->jobsiteRepository->delete($id);

        Flash::success('Jobsite deleted successfully.');

        return redirect(route('jobsites.index'));
    }
}
