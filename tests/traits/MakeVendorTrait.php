<?php

use Faker\Factory as Faker;
use App\Models\Vendor;
use App\Repositories\VendorRepository;

trait MakeVendorTrait
{
    /**
     * Create fake instance of Vendor and save it in database
     *
     * @param array $vendorFields
     * @return Vendor
     */
    public function makeVendor($vendorFields = [])
    {
        /** @var VendorRepository $vendorRepo */
        $vendorRepo = App::make(VendorRepository::class);
        $theme = $this->fakeVendorData($vendorFields);
        return $vendorRepo->create($theme);
    }

    /**
     * Get fake instance of Vendor
     *
     * @param array $vendorFields
     * @return Vendor
     */
    public function fakeVendor($vendorFields = [])
    {
        return new Vendor($this->fakeVendorData($vendorFields));
    }

    /**
     * Get fake data of Vendor
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVendorData($vendorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode_registrasi' => $fake->word,
            'nama' => $fake->word,
            'alamat' => $fake->word,
            'kota' => $fake->word,
            'fax' => $fake->word,
            'email' => $fake->word,
            'attn' => $fake->word,
            'telepon' => $fake->word,
            'phone' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $vendorFields);
    }
}
