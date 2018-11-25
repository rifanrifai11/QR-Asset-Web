<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJobsiteAPIRequest;
use App\Http\Requests\API\UpdateJobsiteAPIRequest;
use App\Models\Jobsite;
use App\Repositories\JobsiteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JobsiteController
 * @package App\Http\Controllers\API
 */

class JobsiteAPIController extends AppBaseController
{
    /** @var  JobsiteRepository */
    private $jobsiteRepository;

    public function __construct(JobsiteRepository $jobsiteRepo)
    {
        $this->jobsiteRepository = $jobsiteRepo;
    }

    /**
     * Display a listing of the Jobsite.
     * GET|HEAD /jobsites
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jobsiteRepository->pushCriteria(new RequestCriteria($request));
        $this->jobsiteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jobsites = $this->jobsiteRepository->all();

        return $this->sendResponse($jobsites->toArray(), 'Jobsites retrieved successfully');
    }

    /**
     * Store a newly created Jobsite in storage.
     * POST /jobsites
     *
     * @param CreateJobsiteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJobsiteAPIRequest $request)
    {
        $input = $request->all();

        $jobsites = $this->jobsiteRepository->create($input);

        return $this->sendResponse($jobsites->toArray(), 'Jobsite saved successfully');
    }

    /**
     * Display the specified Jobsite.
     * GET|HEAD /jobsites/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Jobsite $jobsite */
        $jobsite = $this->jobsiteRepository->findWithoutFail($id);

        if (empty($jobsite)) {
            return $this->sendError('Jobsite not found');
        }

        return $this->sendResponse($jobsite->toArray(), 'Jobsite retrieved successfully');
    }

    /**
     * Update the specified Jobsite in storage.
     * PUT/PATCH /jobsites/{id}
     *
     * @param  int $id
     * @param UpdateJobsiteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJobsiteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Jobsite $jobsite */
        $jobsite = $this->jobsiteRepository->findWithoutFail($id);

        if (empty($jobsite)) {
            return $this->sendError('Jobsite not found');
        }

        $jobsite = $this->jobsiteRepository->update($input, $id);

        return $this->sendResponse($jobsite->toArray(), 'Jobsite updated successfully');
    }

    /**
     * Remove the specified Jobsite from storage.
     * DELETE /jobsites/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Jobsite $jobsite */
        $jobsite = $this->jobsiteRepository->findWithoutFail($id);

        if (empty($jobsite)) {
            return $this->sendError('Jobsite not found');
        }

        $jobsite->delete();

        return $this->sendResponse($id, 'Jobsite deleted successfully');
    }
}
