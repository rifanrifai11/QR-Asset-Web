<?php

use Faker\Factory as Faker;
use App\Models\GrupAset;
use App\Repositories\GrupAsetRepository;

trait MakeGrupAsetTrait
{
    /**
     * Create fake instance of GrupAset and save it in database
     *
     * @param array $grupAsetFields
     * @return GrupAset
     */
    public function makeGrupAset($grupAsetFields = [])
    {
        /** @var GrupAsetRepository $grupAsetRepo */
        $grupAsetRepo = App::make(GrupAsetRepository::class);
        $theme = $this->fakeGrupAsetData($grupAsetFields);
        return $grupAsetRepo->create($theme);
    }

    /**
     * Get fake instance of GrupAset
     *
     * @param array $grupAsetFields
     * @return GrupAset
     */
    public function fakeGrupAset($grupAsetFields = [])
    {
        return new GrupAset($this->fakeGrupAsetData($grupAsetFields));
    }

    /**
     * Get fake data of GrupAset
     *
     * @param array $postFields
     * @return array
     */
    public function fakeGrupAsetData($grupAsetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'parent_grub_aset_kode' => $fake->word,
            'keterangan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'umur_ekonomis_id' => $fake->randomDigitNotNull,
            'kategori_aset_id' => $fake->randomDigitNotNull,
            'persentase_sisa' => $fake->randomDigitNotNull
        ], $grupAsetFields);
    }
}
