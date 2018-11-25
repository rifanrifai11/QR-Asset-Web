<?php

use App\Models\Vendor;
use App\Repositories\VendorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VendorRepositoryTest extends TestCase
{
    use MakeVendorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VendorRepository
     */
    protected $vendorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vendorRepo = App::make(VendorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVendor()
    {
        $vendor = $this->fakeVendorData();
        $createdVendor = $this->vendorRepo->create($vendor);
        $createdVendor = $createdVendor->toArray();
        $this->assertArrayHasKey('id', $createdVendor);
        $this->assertNotNull($createdVendor['id'], 'Created Vendor must have id specified');
        $this->assertNotNull(Vendor::find($createdVendor['id']), 'Vendor with given id must be in DB');
        $this->assertModelData($vendor, $createdVendor);
    }

    /**
     * @test read
     */
    public function testReadVendor()
    {
        $vendor = $this->makeVendor();
        $dbVendor = $this->vendorRepo->find($vendor->id);
        $dbVendor = $dbVendor->toArray();
        $this->assertModelData($vendor->toArray(), $dbVendor);
    }

    /**
     * @test update
     */
    public function testUpdateVendor()
    {
        $vendor = $this->makeVendor();
        $fakeVendor = $this->fakeVendorData();
        $updatedVendor = $this->vendorRepo->update($fakeVendor, $vendor->id);
        $this->assertModelData($fakeVendor, $updatedVendor->toArray());
        $dbVendor = $this->vendorRepo->find($vendor->id);
        $this->assertModelData($fakeVendor, $dbVendor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVendor()
    {
        $vendor = $this->makeVendor();
        $resp = $this->vendorRepo->delete($vendor->id);
        $this->assertTrue($resp);
        $this->assertNull(Vendor::find($vendor->id), 'Vendor should not exist in DB');
    }
}
