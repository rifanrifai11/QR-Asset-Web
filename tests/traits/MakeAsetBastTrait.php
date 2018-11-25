<?php

use Faker\Factory as Faker;
use App\Models\AsetBast;
use App\Repositories\AsetBastRepository;

trait MakeAsetBastTrait
{
    /**
     * Create fake instance of AsetBast and save it in database
     *
     * @param array $asetBastFields
     * @return AsetBast
     */
    public function makeAsetBast($asetBastFields = [])
    {
        /** @var AsetBastRepository $asetBastRepo */
        $asetBastRepo = App::make(AsetBastRepository::class);
        $theme = $this->fakeAsetBastData($asetBastFields);
        return $asetBastRepo->create($theme);
    }

    /**
     * Get fake instance of AsetBast
     *
     * @param array $asetBastFields
     * @return AsetBast
     */
    public function fakeAsetBast($asetBastFields = [])
    {
        return new AsetBast($this->fakeAsetBastData($asetBastFields));
    }

    /**
     * Get fake data of AsetBast
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsetBastData($asetBastFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_surat' => $fake->word,
            'data_aset_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull,
            'tanggal_bast' => $fake->word,
            'nama' => $fake->word,
            'nik' => $fake->word,
            'departemen_id' => $fake->randomDigitNotNull,
            'jobsite_id' => $fake->randomDigitNotNull,
            'jabatan' => $fake->word,
            'atasan_langsung' => $fake->word,
            'diserahkan_oleh' => $fake->word,
            'jabatan_diserahkan' => $fake->word,
            'cek_oleh' => $fake->word,
            'jabatan_cek' => $fake->word,
            'penerima_oleh' => $fake->word,
            'jabatan_penerima' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'jabatan_project_manager' => $fake->word,
            'nama_project_manager' => $fake->word
        ], $asetBastFields);
    }
}
