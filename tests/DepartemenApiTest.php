<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartemenApiTest extends TestCase
{
    use MakeDepartemenTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDepartemen()
    {
        $departemen = $this->fakeDepartemenData();
        $this->json('POST', '/api/v1/departemens', $departemen);

        $this->assertApiResponse($departemen);
    }

    /**
     * @test
     */
    public function testReadDepartemen()
    {
        $departemen = $this->makeDepartemen();
        $this->json('GET', '/api/v1/departemens/'.$departemen->id);

        $this->assertApiResponse($departemen->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDepartemen()
    {
        $departemen = $this->makeDepartemen();
        $editedDepartemen = $this->fakeDepartemenData();

        $this->json('PUT', '/api/v1/departemens/'.$departemen->id, $editedDepartemen);

        $this->assertApiResponse($editedDepartemen);
    }

    /**
     * @test
     */
    public function testDeleteDepartemen()
    {
        $departemen = $this->makeDepartemen();
        $this->json('DELETE', '/api/v1/departemens/'.$departemen->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/departemens/'.$departemen->id);

        $this->assertResponseStatus(404);
    }
}
