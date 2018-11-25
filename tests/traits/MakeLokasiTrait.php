<?php

use Faker\Factory as Faker;
use App\Models\Lokasi;
use App\Repositories\LokasiRepository;

trait MakeLokasiTrait
{
    /**
     * Create fake instance of Lokasi and save it in database
     *
     * @param array $lokasiFields
     * @return Lokasi
     */
    public function makeLokasi($lokasiFields = [])
    {
        /** @var LokasiRepository $lokasiRepo */
        $lokasiRepo = App::make(LokasiRepository::class);
        $theme = $this->fakeLokasiData($lokasiFields);
        return $lokasiRepo->create($theme);
    }

    /**
     * Get fake instance of Lokasi
     *
     * @param array $lokasiFields
     * @return Lokasi
     */
    public function fakeLokasi($lokasiFields = [])
    {
        return new Lokasi($this->fakeLokasiData($lokasiFields));
    }

    /**
     * Get fake data of Lokasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLokasiData($lokasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'keterangan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $lokasiFields);
    }
}
