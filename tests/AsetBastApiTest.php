<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetBastApiTest extends TestCase
{
    use MakeAsetBastTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsetBast()
    {
        $asetBast = $this->fakeAsetBastData();
        $this->json('POST', '/api/v1/asetBasts', $asetBast);

        $this->assertApiResponse($asetBast);
    }

    /**
     * @test
     */
    public function testReadAsetBast()
    {
        $asetBast = $this->makeAsetBast();
        $this->json('GET', '/api/v1/asetBasts/'.$asetBast->id);

        $this->assertApiResponse($asetBast->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsetBast()
    {
        $asetBast = $this->makeAsetBast();
        $editedAsetBast = $this->fakeAsetBastData();

        $this->json('PUT', '/api/v1/asetBasts/'.$asetBast->id, $editedAsetBast);

        $this->assertApiResponse($editedAsetBast);
    }

    /**
     * @test
     */
    public function testDeleteAsetBast()
    {
        $asetBast = $this->makeAsetBast();
        $this->json('DELETE', '/api/v1/asetBasts/'.$asetBast->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asetBasts/'.$asetBast->id);

        $this->assertResponseStatus(404);
    }
}
