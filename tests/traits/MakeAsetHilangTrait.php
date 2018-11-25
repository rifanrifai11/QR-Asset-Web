<?php

use Faker\Factory as Faker;
use App\Models\AsetHilang;
use App\Repositories\AsetHilangRepository;

trait MakeAsetHilangTrait
{
    /**
     * Create fake instance of AsetHilang and save it in database
     *
     * @param array $asetHilangFields
     * @return AsetHilang
     */
    public function makeAsetHilang($asetHilangFields = [])
    {
        /** @var AsetHilangRepository $asetHilangRepo */
        $asetHilangRepo = App::make(AsetHilangRepository::class);
        $theme = $this->fakeAsetHilangData($asetHilangFields);
        return $asetHilangRepo->create($theme);
    }

    /**
     * Get fake instance of AsetHilang
     *
     * @param array $asetHilangFields
     * @return AsetHilang
     */
    public function fakeAsetHilang($asetHilangFields = [])
    {
        return new AsetHilang($this->fakeAsetHilangData($asetHilangFields));
    }

    /**
     * Get fake data of AsetHilang
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsetHilangData($asetHilangFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_surat' => $fake->randomDigitNotNull,
            'data_aset_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull,
            'tanggal_kejadian' => $fake->word,
            'waktu_kejadian' => $fake->word,
            'lokasi_kejadian' => $fake->word,
            'kronologis_kejadian' => $fake->text,
            'mengetahui1' => $fake->word,
            'jabatan_mengetahui1' => $fake->word,
            'mengetahui2' => $fake->word,
            'jabatan_mengetahui2' => $fake->word,
            'check' => $fake->word,
            'jabatan_check' => $fake->word,
            'raised_by' => $fake->word,
            'jabatan_raised_by' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $asetHilangFields);
    }
}
