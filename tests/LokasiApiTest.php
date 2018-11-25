<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LokasiApiTest extends TestCase
{
    use MakeLokasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLokasi()
    {
        $lokasi = $this->fakeLokasiData();
        $this->json('POST', '/api/v1/lokasis', $lokasi);

        $this->assertApiResponse($lokasi);
    }

    /**
     * @test
     */
    public function testReadLokasi()
    {
        $lokasi = $this->makeLokasi();
        $this->json('GET', '/api/v1/lokasis/'.$lokasi->id);

        $this->assertApiResponse($lokasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLokasi()
    {
        $lokasi = $this->makeLokasi();
        $editedLokasi = $this->fakeLokasiData();

        $this->json('PUT', '/api/v1/lokasis/'.$lokasi->id, $editedLokasi);

        $this->assertApiResponse($editedLokasi);
    }

    /**
     * @test
     */
    public function testDeleteLokasi()
    {
        $lokasi = $this->makeLokasi();
        $this->json('DELETE', '/api/v1/lokasis/'.$lokasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/lokasis/'.$lokasi->id);

        $this->assertResponseStatus(404);
    }
}
