<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetPengembalianApiTest extends TestCase
{
    use MakeAsetPengembalianTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsetPengembalian()
    {
        $asetPengembalian = $this->fakeAsetPengembalianData();
        $this->json('POST', '/api/v1/asetPengembalians', $asetPengembalian);

        $this->assertApiResponse($asetPengembalian);
    }

    /**
     * @test
     */
    public function testReadAsetPengembalian()
    {
        $asetPengembalian = $this->makeAsetPengembalian();
        $this->json('GET', '/api/v1/asetPengembalians/'.$asetPengembalian->id);

        $this->assertApiResponse($asetPengembalian->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsetPengembalian()
    {
        $asetPengembalian = $this->makeAsetPengembalian();
        $editedAsetPengembalian = $this->fakeAsetPengembalianData();

        $this->json('PUT', '/api/v1/asetPengembalians/'.$asetPengembalian->id, $editedAsetPengembalian);

        $this->assertApiResponse($editedAsetPengembalian);
    }

    /**
     * @test
     */
    public function testDeleteAsetPengembalian()
    {
        $asetPengembalian = $this->makeAsetPengembalian();
        $this->json('DELETE', '/api/v1/asetPengembalians/'.$asetPengembalian->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asetPengembalians/'.$asetPengembalian->id);

        $this->assertResponseStatus(404);
    }
}
