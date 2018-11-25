<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetPembelianApiTest extends TestCase
{
    use MakeAsetPembelianTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsetPembelian()
    {
        $asetPembelian = $this->fakeAsetPembelianData();
        $this->json('POST', '/api/v1/asetPembelians', $asetPembelian);

        $this->assertApiResponse($asetPembelian);
    }

    /**
     * @test
     */
    public function testReadAsetPembelian()
    {
        $asetPembelian = $this->makeAsetPembelian();
        $this->json('GET', '/api/v1/asetPembelians/'.$asetPembelian->id);

        $this->assertApiResponse($asetPembelian->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsetPembelian()
    {
        $asetPembelian = $this->makeAsetPembelian();
        $editedAsetPembelian = $this->fakeAsetPembelianData();

        $this->json('PUT', '/api/v1/asetPembelians/'.$asetPembelian->id, $editedAsetPembelian);

        $this->assertApiResponse($editedAsetPembelian);
    }

    /**
     * @test
     */
    public function testDeleteAsetPembelian()
    {
        $asetPembelian = $this->makeAsetPembelian();
        $this->json('DELETE', '/api/v1/asetPembelians/'.$asetPembelian->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asetPembelians/'.$asetPembelian->id);

        $this->assertResponseStatus(404);
    }
}
