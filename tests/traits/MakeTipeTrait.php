<?php

use Faker\Factory as Faker;
use App\Models\Tipe;
use App\Repositories\TipeRepository;

trait MakeTipeTrait
{
    /**
     * Create fake instance of Tipe and save it in database
     *
     * @param array $tipeFields
     * @return Tipe
     */
    public function makeTipe($tipeFields = [])
    {
        /** @var TipeRepository $tipeRepo */
        $tipeRepo = App::make(TipeRepository::class);
        $theme = $this->fakeTipeData($tipeFields);
        return $tipeRepo->create($theme);
    }

    /**
     * Get fake instance of Tipe
     *
     * @param array $tipeFields
     * @return Tipe
     */
    public function fakeTipe($tipeFields = [])
    {
        return new Tipe($this->fakeTipeData($tipeFields));
    }

    /**
     * Get fake data of Tipe
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTipeData($tipeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'keterangan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $tipeFields);
    }
}
