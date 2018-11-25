<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetHilangApiTest extends TestCase
{
    use MakeAsetHilangTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsetHilang()
    {
        $asetHilang = $this->fakeAsetHilangData();
        $this->json('POST', '/api/v1/asetHilangs', $asetHilang);

        $this->assertApiResponse($asetHilang);
    }

    /**
     * @test
     */
    public function testReadAsetHilang()
    {
        $asetHilang = $this->makeAsetHilang();
        $this->json('GET', '/api/v1/asetHilangs/'.$asetHilang->id);

        $this->assertApiResponse($asetHilang->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsetHilang()
    {
        $asetHilang = $this->makeAsetHilang();
        $editedAsetHilang = $this->fakeAsetHilangData();

        $this->json('PUT', '/api/v1/asetHilangs/'.$asetHilang->id, $editedAsetHilang);

        $this->assertApiResponse($editedAsetHilang);
    }

    /**
     * @test
     */
    public function testDeleteAsetHilang()
    {
        $asetHilang = $this->makeAsetHilang();
        $this->json('DELETE', '/api/v1/asetHilangs/'.$asetHilang->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asetHilangs/'.$asetHilang->id);

        $this->assertResponseStatus(404);
    }
}
