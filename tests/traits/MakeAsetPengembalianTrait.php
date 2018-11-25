<?php

use Faker\Factory as Faker;
use App\Models\AsetPengembalian;
use App\Repositories\AsetPengembalianRepository;

trait MakeAsetPengembalianTrait
{
    /**
     * Create fake instance of AsetPengembalian and save it in database
     *
     * @param array $asetPengembalianFields
     * @return AsetPengembalian
     */
    public function makeAsetPengembalian($asetPengembalianFields = [])
    {
        /** @var AsetPengembalianRepository $asetPengembalianRepo */
        $asetPengembalianRepo = App::make(AsetPengembalianRepository::class);
        $theme = $this->fakeAsetPengembalianData($asetPengembalianFields);
        return $asetPengembalianRepo->create($theme);
    }

    /**
     * Get fake instance of AsetPengembalian
     *
     * @param array $asetPengembalianFields
     * @return AsetPengembalian
     */
    public function fakeAsetPengembalian($asetPengembalianFields = [])
    {
        return new AsetPengembalian($this->fakeAsetPengembalianData($asetPengembalianFields));
    }

    /**
     * Get fake data of AsetPengembalian
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsetPengembalianData($asetPengembalianFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_surat' => $fake->randomDigitNotNull,
            'data_aset_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull,
            'nama' => $fake->word,
            'nik' => $fake->word,
            'jabatan' => $fake->word,
            'departemen_id' => $fake->randomDigitNotNull,
            'lokasi' => $fake->word,
            'atasan_langsung' => $fake->word,
            'diserahkan' => $fake->word,
            'jabatan_diserahkan' => $fake->word,
            'cek' => $fake->word,
            'jabatan_cek' => $fake->word,
            'penerima' => $fake->word,
            'jabatan_penerima' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $asetPengembalianFields);
    }
}
