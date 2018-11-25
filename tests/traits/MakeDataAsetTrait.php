<?php

use Faker\Factory as Faker;
use App\Models\DataAset;
use App\Repositories\DataAsetRepository;

trait MakeDataAsetTrait
{
    /**
     * Create fake instance of DataAset and save it in database
     *
     * @param array $dataAsetFields
     * @return DataAset
     */
    public function makeDataAset($dataAsetFields = [])
    {
        /** @var DataAsetRepository $dataAsetRepo */
        $dataAsetRepo = App::make(DataAsetRepository::class);
        $theme = $this->fakeDataAsetData($dataAsetFields);
        return $dataAsetRepo->create($theme);
    }

    /**
     * Get fake instance of DataAset
     *
     * @param array $dataAsetFields
     * @return DataAset
     */
    public function fakeDataAset($dataAsetFields = [])
    {
        return new DataAset($this->fakeDataAsetData($dataAsetFields));
    }

    /**
     * Get fake data of DataAset
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDataAsetData($dataAsetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'urut' => $fake->randomDigitNotNull,
            'kode_data_aset' => $fake->word,
            'spesifikasi' => $fake->word,
            'no_registrasi' => $fake->word,
            'tanggal_registrasi' => $fake->word,
            'lokasi_id' => $fake->randomDigitNotNull,
            'tipe_id' => $fake->randomDigitNotNull,
            'vendor_id' => $fake->randomDigitNotNull,
            'merek_id' => $fake->randomDigitNotNull,
            'foto1' => $fake->word,
            'foto2' => $fake->word,
            'foto3' => $fake->word,
            'foto4' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'grub_aset_kode' => $fake->word,
            'jobsite_id' => $fake->randomDigitNotNull,
            'serial_number' => $fake->word,
            'departemen_id' => $fake->randomDigitNotNull,
            'keterangan' => $fake->word,
            'nama' => $fake->word
        ], $dataAsetFields);
    }
}
