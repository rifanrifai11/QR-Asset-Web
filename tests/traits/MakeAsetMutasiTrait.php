<?php

use Faker\Factory as Faker;
use App\Models\AsetMutasi;
use App\Repositories\AsetMutasiRepository;

trait MakeAsetMutasiTrait
{
    /**
     * Create fake instance of AsetMutasi and save it in database
     *
     * @param array $asetMutasiFields
     * @return AsetMutasi
     */
    public function makeAsetMutasi($asetMutasiFields = [])
    {
        /** @var AsetMutasiRepository $asetMutasiRepo */
        $asetMutasiRepo = App::make(AsetMutasiRepository::class);
        $theme = $this->fakeAsetMutasiData($asetMutasiFields);
        return $asetMutasiRepo->create($theme);
    }

    /**
     * Get fake instance of AsetMutasi
     *
     * @param array $asetMutasiFields
     * @return AsetMutasi
     */
    public function fakeAsetMutasi($asetMutasiFields = [])
    {
        return new AsetMutasi($this->fakeAsetMutasiData($asetMutasiFields));
    }

    /**
     * Get fake data of AsetMutasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsetMutasiData($asetMutasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_surat' => $fake->randomDigitNotNull,
            'data_aset_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull,
            'nama_pengguna_baru' => $fake->word,
            'posisi_pengguna_baru' => $fake->word,
            'jabatan_pengguna_baru' => $fake->word,
            'departemen_id' => $fake->randomDigitNotNull,
            'mengetahui' => $fake->word,
            'jabatan_mengetahui' => $fake->word,
            'diserahkan' => $fake->word,
            'jabatan_diserahkan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $asetMutasiFields);
    }
}
