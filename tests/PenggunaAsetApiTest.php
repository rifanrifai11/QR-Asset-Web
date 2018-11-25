<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PenggunaAsetApiTest extends TestCase
{
    use MakePenggunaAsetTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePenggunaAset()
    {
        $penggunaAset = $this->fakePenggunaAsetData();
        $this->json('POST', '/api/v1/penggunaAsets', $penggunaAset);

        $this->assertApiResponse($penggunaAset);
    }

    /**
     * @test
     */
    public function testReadPenggunaAset()
    {
        $penggunaAset = $this->makePenggunaAset();
        $this->json('GET', '/api/v1/penggunaAsets/'.$penggunaAset->id);

        $this->assertApiResponse($penggunaAset->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePenggunaAset()
    {
        $penggunaAset = $this->makePenggunaAset();
        $editedPenggunaAset = $this->fakePenggunaAsetData();

        $this->json('PUT', '/api/v1/penggunaAsets/'.$penggunaAset->id, $editedPenggunaAset);

        $this->assertApiResponse($editedPenggunaAset);
    }

    /**
     * @test
     */
    public function testDeletePenggunaAset()
    {
        $penggunaAset = $this->makePenggunaAset();
        $this->json('DELETE', '/api/v1/penggunaAsets/'.$penggunaAset->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/penggunaAsets/'.$penggunaAset->id);

        $this->assertResponseStatus(404);
    }
}
