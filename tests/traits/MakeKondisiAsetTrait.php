<?php

use Faker\Factory as Faker;
use App\Models\KondisiAset;
use App\Repositories\KondisiAsetRepository;

trait MakeKondisiAsetTrait
{
    /**
     * Create fake instance of KondisiAset and save it in database
     *
     * @param array $kondisiAsetFields
     * @return KondisiAset
     */
    public function makeKondisiAset($kondisiAsetFields = [])
    {
        /** @var KondisiAsetRepository $kondisiAsetRepo */
        $kondisiAsetRepo = App::make(KondisiAsetRepository::class);
        $theme = $this->fakeKondisiAsetData($kondisiAsetFields);
        return $kondisiAsetRepo->create($theme);
    }

    /**
     * Get fake instance of KondisiAset
     *
     * @param array $kondisiAsetFields
     * @return KondisiAset
     */
    public function fakeKondisiAset($kondisiAsetFields = [])
    {
        return new KondisiAset($this->fakeKondisiAsetData($kondisiAsetFields));
    }

    /**
     * Get fake data of KondisiAset
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKondisiAsetData($kondisiAsetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'keterangan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $kondisiAsetFields);
    }
}
