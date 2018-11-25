<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KategoriAsetApiTest extends TestCase
{
    use MakeKategoriAsetTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKategoriAset()
    {
        $kategoriAset = $this->fakeKategoriAsetData();
        $this->json('POST', '/api/v1/kategoriAsets', $kategoriAset);

        $this->assertApiResponse($kategoriAset);
    }

    /**
     * @test
     */
    public function testReadKategoriAset()
    {
        $kategoriAset = $this->makeKategoriAset();
        $this->json('GET', '/api/v1/kategoriAsets/'.$kategoriAset->id);

        $this->assertApiResponse($kategoriAset->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKategoriAset()
    {
        $kategoriAset = $this->makeKategoriAset();
        $editedKategoriAset = $this->fakeKategoriAsetData();

        $this->json('PUT', '/api/v1/kategoriAsets/'.$kategoriAset->id, $editedKategoriAset);

        $this->assertApiResponse($editedKategoriAset);
    }

    /**
     * @test
     */
    public function testDeleteKategoriAset()
    {
        $kategoriAset = $this->makeKategoriAset();
        $this->json('DELETE', '/api/v1/kategoriAsets/'.$kategoriAset->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kategoriAsets/'.$kategoriAset->id);

        $this->assertResponseStatus(404);
    }
}
