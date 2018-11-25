<?php

use Faker\Factory as Faker;
use App\Models\Merek;
use App\Repositories\MerekRepository;

trait MakeMerekTrait
{
    /**
     * Create fake instance of Merek and save it in database
     *
     * @param array $merekFields
     * @return Merek
     */
    public function makeMerek($merekFields = [])
    {
        /** @var MerekRepository $merekRepo */
        $merekRepo = App::make(MerekRepository::class);
        $theme = $this->fakeMerekData($merekFields);
        return $merekRepo->create($theme);
    }

    /**
     * Get fake instance of Merek
     *
     * @param array $merekFields
     * @return Merek
     */
    public function fakeMerek($merekFields = [])
    {
        return new Merek($this->fakeMerekData($merekFields));
    }

    /**
     * Get fake data of Merek
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMerekData($merekFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'keterangan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $merekFields);
    }
}
