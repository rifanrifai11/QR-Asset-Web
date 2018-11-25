<?php

use Faker\Factory as Faker;
use App\Models\AsetTaking;
use App\Repositories\AsetTakingRepository;

trait MakeAsetTakingTrait
{
    /**
     * Create fake instance of AsetTaking and save it in database
     *
     * @param array $asetTakingFields
     * @return AsetTaking
     */
    public function makeAsetTaking($asetTakingFields = [])
    {
        /** @var AsetTakingRepository $asetTakingRepo */
        $asetTakingRepo = App::make(AsetTakingRepository::class);
        $theme = $this->fakeAsetTakingData($asetTakingFields);
        return $asetTakingRepo->create($theme);
    }

    /**
     * Get fake instance of AsetTaking
     *
     * @param array $asetTakingFields
     * @return AsetTaking
     */
    public function fakeAsetTaking($asetTakingFields = [])
    {
        return new AsetTaking($this->fakeAsetTakingData($asetTakingFields));
    }

    /**
     * Get fake data of AsetTaking
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsetTakingData($asetTakingFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'users_id' => $fake->randomDigitNotNull,
            'data_aset_id' => $fake->randomDigitNotNull,
            'kondisi_aset_id' => $fake->word
        ], $asetTakingFields);
    }
}
