<?php

use App\Models\Jobsite;
use App\Repositories\JobsiteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobsiteRepositoryTest extends TestCase
{
    use MakeJobsiteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JobsiteRepository
     */
    protected $jobsiteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jobsiteRepo = App::make(JobsiteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJobsite()
    {
        $jobsite = $this->fakeJobsiteData();
        $createdJobsite = $this->jobsiteRepo->create($jobsite);
        $createdJobsite = $createdJobsite->toArray();
        $this->assertArrayHasKey('id', $createdJobsite);
        $this->assertNotNull($createdJobsite['id'], 'Created Jobsite must have id specified');
        $this->assertNotNull(Jobsite::find($createdJobsite['id']), 'Jobsite with given id must be in DB');
        $this->assertModelData($jobsite, $createdJobsite);
    }

    /**
     * @test read
     */
    public function testReadJobsite()
    {
        $jobsite = $this->makeJobsite();
        $dbJobsite = $this->jobsiteRepo->find($jobsite->id);
        $dbJobsite = $dbJobsite->toArray();
        $this->assertModelData($jobsite->toArray(), $dbJobsite);
    }

    /**
     * @test update
     */
    public function testUpdateJobsite()
    {
        $jobsite = $this->makeJobsite();
        $fakeJobsite = $this->fakeJobsiteData();
        $updatedJobsite = $this->jobsiteRepo->update($fakeJobsite, $jobsite->id);
        $this->assertModelData($fakeJobsite, $updatedJobsite->toArray());
        $dbJobsite = $this->jobsiteRepo->find($jobsite->id);
        $this->assertModelData($fakeJobsite, $dbJobsite->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJobsite()
    {
        $jobsite = $this->makeJobsite();
        $resp = $this->jobsiteRepo->delete($jobsite->id);
        $this->assertTrue($resp);
        $this->assertNull(Jobsite::find($jobsite->id), 'Jobsite should not exist in DB');
    }
}
