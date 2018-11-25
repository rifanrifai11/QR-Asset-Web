<?php

use Faker\Factory as Faker;
use App\Models\AsetPelepasan;
use App\Repositories\AsetPelepasanRepository;

trait MakeAsetPelepasanTrait
{
    /**
     * Create fake instance of AsetPelepasan and save it in database
     *
     * @param array $asetPelepasanFields
     * @return AsetPelepasan
     */
    public function makeAsetPelepasan($asetPelepasanFields = [])
    {
        /** @var AsetPelepasanRepository $asetPelepasanRepo */
        $asetPelepasanRepo = App::make(AsetPelepasanRepository::class);
        $theme = $this->fakeAsetPelepasanData($asetPelepasanFields);
        return $asetPelepasanRepo->create($theme);
    }

    /**
     * Get fake instance of AsetPelepasan
     *
     * @param array $asetPelepasanFields
     * @return AsetPelepasan
     */
    public function fakeAsetPelepasan($asetPelepasanFields = [])
    {
        return new AsetPelepasan($this->fakeAsetPelepasanData($asetPelepasanFields));
    }

    /**
     * Get fake data of AsetPelepasan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsetPelepasanData($asetPelepasanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_surat' => $fake->randomDigitNotNull,
            'data_aset_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull,
            'metode_pelepasan' => $fake->word,
            'catatan' => $fake->word,
            'foto_saat_ini' => $fake->word,
            'menyetujui' => $fake->word,
            'jabatan_menyetujui' => $fake->word,
            'mengetahui' => $fake->word,
            'jabatan_mengetahui' => $fake->word,
            'diajukan' => $fake->word,
            'jabatan_diajukan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $asetPelepasanFields);
    }
}
