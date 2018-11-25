<?php

use Faker\Factory as Faker;
use App\Models\Jobsite;
use App\Repositories\JobsiteRepository;

trait MakeJobsiteTrait
{
    /**
     * Create fake instance of Jobsite and save it in database
     *
     * @param array $jobsiteFields
     * @return Jobsite
     */
    public function makeJobsite($jobsiteFields = [])
    {
        /** @var JobsiteRepository $jobsiteRepo */
        $jobsiteRepo = App::make(JobsiteRepository::class);
        $theme = $this->fakeJobsiteData($jobsiteFields);
        return $jobsiteRepo->create($theme);
    }

    /**
     * Get fake instance of Jobsite
     *
     * @param array $jobsiteFields
     * @return Jobsite
     */
    public function fakeJobsite($jobsiteFields = [])
    {
        return new Jobsite($this->fakeJobsiteData($jobsiteFields));
    }

    /**
     * Get fake data of Jobsite
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJobsiteData($jobsiteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'keterangan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $jobsiteFields);
    }
}
