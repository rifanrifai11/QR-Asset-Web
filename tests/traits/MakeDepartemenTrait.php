<?php

use Faker\Factory as Faker;
use App\Models\Departemen;
use App\Repositories\DepartemenRepository;

trait MakeDepartemenTrait
{
    /**
     * Create fake instance of Departemen and save it in database
     *
     * @param array $departemenFields
     * @return Departemen
     */
    public function makeDepartemen($departemenFields = [])
    {
        /** @var DepartemenRepository $departemenRepo */
        $departemenRepo = App::make(DepartemenRepository::class);
        $theme = $this->fakeDepartemenData($departemenFields);
        return $departemenRepo->create($theme);
    }

    /**
     * Get fake instance of Departemen
     *
     * @param array $departemenFields
     * @return Departemen
     */
    public function fakeDepartemen($departemenFields = [])
    {
        return new Departemen($this->fakeDepartemenData($departemenFields));
    }

    /**
     * Get fake data of Departemen
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDepartemenData($departemenFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode' => $fake->word,
            'nama' => $fake->word,
            'keterangan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'parent_departemen_id' => $fake->randomDigitNotNull
        ], $departemenFields);
    }
}
