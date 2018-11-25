<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataAsetApiTest extends TestCase
{
    use MakeDataAsetTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDataAset()
    {
        $dataAset = $this->fakeDataAsetData();
        $this->json('POST', '/api/v1/dataAsets', $dataAset);

        $this->assertApiResponse($dataAset);
    }

    /**
     * @test
     */
    public function testReadDataAset()
    {
        $dataAset = $this->makeDataAset();
        $this->json('GET', '/api/v1/dataAsets/'.$dataAset->id);

        $this->assertApiResponse($dataAset->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDataAset()
    {
        $dataAset = $this->makeDataAset();
        $editedDataAset = $this->fakeDataAsetData();

        $this->json('PUT', '/api/v1/dataAsets/'.$dataAset->id, $editedDataAset);

        $this->assertApiResponse($editedDataAset);
    }

    /**
     * @test
     */
    public function testDeleteDataAset()
    {
        $dataAset = $this->makeDataAset();
        $this->json('DELETE', '/api/v1/dataAsets/'.$dataAset->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dataAsets/'.$dataAset->id);

        $this->assertResponseStatus(404);
    }
}
