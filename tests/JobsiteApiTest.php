<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobsiteApiTest extends TestCase
{
    use MakeJobsiteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJobsite()
    {
        $jobsite = $this->fakeJobsiteData();
        $this->json('POST', '/api/v1/jobsites', $jobsite);

        $this->assertApiResponse($jobsite);
    }

    /**
     * @test
     */
    public function testReadJobsite()
    {
        $jobsite = $this->makeJobsite();
        $this->json('GET', '/api/v1/jobsites/'.$jobsite->id);

        $this->assertApiResponse($jobsite->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJobsite()
    {
        $jobsite = $this->makeJobsite();
        $editedJobsite = $this->fakeJobsiteData();

        $this->json('PUT', '/api/v1/jobsites/'.$jobsite->id, $editedJobsite);

        $this->assertApiResponse($editedJobsite);
    }

    /**
     * @test
     */
    public function testDeleteJobsite()
    {
        $jobsite = $this->makeJobsite();
        $this->json('DELETE', '/api/v1/jobsites/'.$jobsite->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/jobsites/'.$jobsite->id);

        $this->assertResponseStatus(404);
    }
}
