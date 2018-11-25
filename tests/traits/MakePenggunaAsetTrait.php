<?php

use Faker\Factory as Faker;
use App\Models\PenggunaAset;
use App\Repositories\PenggunaAsetRepository;

trait MakePenggunaAsetTrait
{
    /**
     * Create fake instance of PenggunaAset and save it in database
     *
     * @param array $penggunaAsetFields
     * @return PenggunaAset
     */
    public function makePenggunaAset($penggunaAsetFields = [])
    {
        /** @var PenggunaAsetRepository $penggunaAsetRepo */
        $penggunaAsetRepo = App::make(PenggunaAsetRepository::class);
        $theme = $this->fakePenggunaAsetData($penggunaAsetFields);
        return $penggunaAsetRepo->create($theme);
    }

    /**
     * Get fake instance of PenggunaAset
     *
     * @param array $penggunaAsetFields
     * @return PenggunaAset
     */
    public function fakePenggunaAset($penggunaAsetFields = [])
    {
        return new PenggunaAset($this->fakePenggunaAsetData($penggunaAsetFields));
    }

    /**
     * Get fake data of PenggunaAset
     *
     * @param array $postFields
     * @return array
     */
    public function fakePenggunaAsetData($penggunaAsetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'no_bast' => $fake->word,
            'nama' => $fake->word,
            'nrp' => $fake->word,
            'lokasi_kerja' => $fake->word,
            'departemen_id' => $fake->randomDigitNotNull,
            'atasan_langsung' => $fake->word,
            'pic_aset' => $fake->word,
            'posisi' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $penggunaAsetFields);
    }
}
