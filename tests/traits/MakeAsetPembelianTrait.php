<?php

use Faker\Factory as Faker;
use App\Models\AsetPembelian;
use App\Repositories\AsetPembelianRepository;

trait MakeAsetPembelianTrait
{
    /**
     * Create fake instance of AsetPembelian and save it in database
     *
     * @param array $asetPembelianFields
     * @return AsetPembelian
     */
    public function makeAsetPembelian($asetPembelianFields = [])
    {
        /** @var AsetPembelianRepository $asetPembelianRepo */
        $asetPembelianRepo = App::make(AsetPembelianRepository::class);
        $theme = $this->fakeAsetPembelianData($asetPembelianFields);
        return $asetPembelianRepo->create($theme);
    }

    /**
     * Get fake instance of AsetPembelian
     *
     * @param array $asetPembelianFields
     * @return AsetPembelian
     */
    public function fakeAsetPembelian($asetPembelianFields = [])
    {
        return new AsetPembelian($this->fakeAsetPembelianData($asetPembelianFields));
    }

    /**
     * Get fake data of AsetPembelian
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsetPembelianData($asetPembelianFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_surat' => $fake->randomDigitNotNull,
            'data_aset_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull,
            'nomor_general_request' => $fake->word,
            'nomor_purchase_order' => $fake->word,
            'tanggal_pembelian' => $fake->word,
            'harga_barang' => $fake->randomDigitNotNull,
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
        ], $asetPembelianFields);
    }
}
