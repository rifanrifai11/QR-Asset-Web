<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VendorApiTest extends TestCase
{
    use MakeVendorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVendor()
    {
        $vendor = $this->fakeVendorData();
        $this->json('POST', '/api/v1/vendors', $vendor);

        $this->assertApiResponse($vendor);
    }

    /**
     * @test
     */
    public function testReadVendor()
    {
        $vendor = $this->makeVendor();
        $this->json('GET', '/api/v1/vendors/'.$vendor->id);

        $this->assertApiResponse($vendor->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVendor()
    {
        $vendor = $this->makeVendor();
        $editedVendor = $this->fakeVendorData();

        $this->json('PUT', '/api/v1/vendors/'.$vendor->id, $editedVendor);

        $this->assertApiResponse($editedVendor);
    }

    /**
     * @test
     */
    public function testDeleteVendor()
    {
        $vendor = $this->makeVendor();
        $this->json('DELETE', '/api/v1/vendors/'.$vendor->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vendors/'.$vendor->id);

        $this->assertResponseStatus(404);
    }
}
