<?php

use Faker\Factory as Faker;
use App\Models\UmurEkonomis;
use App\Repositories\UmurEkonomisRepository;

trait MakeUmurEkonomisTrait
{
    /**
     * Create fake instance of UmurEkonomis and save it in database
     *
     * @param array $umurEkonomisFields
     * @return UmurEkonomis
     */
    public function makeUmurEkonomis($umurEkonomisFields = [])
    {
        /** @var UmurEkonomisRepository $umurEkonomisRepo */
        $umurEkonomisRepo = App::make(UmurEkonomisRepository::class);
        $theme = $this->fakeUmurEkonomisData($umurEkonomisFields);
        return $umurEkonomisRepo->create($theme);
    }

    /**
     * Get fake instance of UmurEkonomis
     *
     * @param array $umurEkonomisFields
     * @return UmurEkonomis
     */
    public function fakeUmurEkonomis($umurEkonomisFields = [])
    {
        return new UmurEkonomis($this->fakeUmurEkonomisData($umurEkonomisFields));
    }

    /**
     * Get fake data of UmurEkonomis
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUmurEkonomisData($umurEkonomisFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'tahun' => $fake->randomDigitNotNull,
            'nilai_rumus' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $umurEkonomisFields);
    }
}
