<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetTakingApiTest extends TestCase
{
    use MakeAsetTakingTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsetTaking()
    {
        $asetTaking = $this->fakeAsetTakingData();
        $this->json('POST', '/api/v1/asetTakings', $asetTaking);

        $this->assertApiResponse($asetTaking);
    }

    /**
     * @test
     */
    public function testReadAsetTaking()
    {
        $asetTaking = $this->makeAsetTaking();
        $this->json('GET', '/api/v1/asetTakings/'.$asetTaking->id);

        $this->assertApiResponse($asetTaking->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsetTaking()
    {
        $asetTaking = $this->makeAsetTaking();
        $editedAsetTaking = $this->fakeAsetTakingData();

        $this->json('PUT', '/api/v1/asetTakings/'.$asetTaking->id, $editedAsetTaking);

        $this->assertApiResponse($editedAsetTaking);
    }

    /**
     * @test
     */
    public function testDeleteAsetTaking()
    {
        $asetTaking = $this->makeAsetTaking();
        $this->json('DELETE', '/api/v1/asetTakings/'.$asetTaking->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asetTakings/'.$asetTaking->id);

        $this->assertResponseStatus(404);
    }
}
