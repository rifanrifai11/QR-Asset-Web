<?php

use Faker\Factory as Faker;
use App\Models\KategoriAset;
use App\Repositories\KategoriAsetRepository;

trait MakeKategoriAsetTrait
{
    /**
     * Create fake instance of KategoriAset and save it in database
     *
     * @param array $kategoriAsetFields
     * @return KategoriAset
     */
    public function makeKategoriAset($kategoriAsetFields = [])
    {
        /** @var KategoriAsetRepository $kategoriAsetRepo */
        $kategoriAsetRepo = App::make(KategoriAsetRepository::class);
        $theme = $this->fakeKategoriAsetData($kategoriAsetFields);
        return $kategoriAsetRepo->create($theme);
    }

    /**
     * Get fake instance of KategoriAset
     *
     * @param array $kategoriAsetFields
     * @return KategoriAset
     */
    public function fakeKategoriAset($kategoriAsetFields = [])
    {
        return new KategoriAset($this->fakeKategoriAsetData($kategoriAsetFields));
    }

    /**
     * Get fake data of KategoriAset
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKategoriAsetData($kategoriAsetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode' => $fake->word,
            'nama' => $fake->word,
            'keterangan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $kategoriAsetFields);
    }
}
