<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetMutasiApiTest extends TestCase
{
    use MakeAsetMutasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsetMutasi()
    {
        $asetMutasi = $this->fakeAsetMutasiData();
        $this->json('POST', '/api/v1/asetMutasis', $asetMutasi);

        $this->assertApiResponse($asetMutasi);
    }

    /**
     * @test
     */
    public function testReadAsetMutasi()
    {
        $asetMutasi = $this->makeAsetMutasi();
        $this->json('GET', '/api/v1/asetMutasis/'.$asetMutasi->id);

        $this->assertApiResponse($asetMutasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsetMutasi()
    {
        $asetMutasi = $this->makeAsetMutasi();
        $editedAsetMutasi = $this->fakeAsetMutasiData();

        $this->json('PUT', '/api/v1/asetMutasis/'.$asetMutasi->id, $editedAsetMutasi);

        $this->assertApiResponse($editedAsetMutasi);
    }

    /**
     * @test
     */
    public function testDeleteAsetMutasi()
    {
        $asetMutasi = $this->makeAsetMutasi();
        $this->json('DELETE', '/api/v1/asetMutasis/'.$asetMutasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asetMutasis/'.$asetMutasi->id);

        $this->assertResponseStatus(404);
    }
}
