<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UmurEkonomisApiTest extends TestCase
{
    use MakeUmurEkonomisTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUmurEkonomis()
    {
        $umurEkonomis = $this->fakeUmurEkonomisData();
        $this->json('POST', '/api/v1/umurEkonomis', $umurEkonomis);

        $this->assertApiResponse($umurEkonomis);
    }

    /**
     * @test
     */
    public function testReadUmurEkonomis()
    {
        $umurEkonomis = $this->makeUmurEkonomis();
        $this->json('GET', '/api/v1/umurEkonomis/'.$umurEkonomis->id);

        $this->assertApiResponse($umurEkonomis->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUmurEkonomis()
    {
        $umurEkonomis = $this->makeUmurEkonomis();
        $editedUmurEkonomis = $this->fakeUmurEkonomisData();

        $this->json('PUT', '/api/v1/umurEkonomis/'.$umurEkonomis->id, $editedUmurEkonomis);

        $this->assertApiResponse($editedUmurEkonomis);
    }

    /**
     * @test
     */
    public function testDeleteUmurEkonomis()
    {
        $umurEkonomis = $this->makeUmurEkonomis();
        $this->json('DELETE', '/api/v1/umurEkonomis/'.$umurEkonomis->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/umurEkonomis/'.$umurEkonomis->id);

        $this->assertResponseStatus(404);
    }
}
