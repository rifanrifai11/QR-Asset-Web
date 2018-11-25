<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetPeminjamanApiTest extends TestCase
{
    use MakeAsetPeminjamanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsetPeminjaman()
    {
        $asetPeminjaman = $this->fakeAsetPeminjamanData();
        $this->json('POST', '/api/v1/asetPeminjamen', $asetPeminjaman);

        $this->assertApiResponse($asetPeminjaman);
    }

    /**
     * @test
     */
    public function testReadAsetPeminjaman()
    {
        $asetPeminjaman = $this->makeAsetPeminjaman();
        $this->json('GET', '/api/v1/asetPeminjamen/'.$asetPeminjaman->id);

        $this->assertApiResponse($asetPeminjaman->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsetPeminjaman()
    {
        $asetPeminjaman = $this->makeAsetPeminjaman();
        $editedAsetPeminjaman = $this->fakeAsetPeminjamanData();

        $this->json('PUT', '/api/v1/asetPeminjamen/'.$asetPeminjaman->id, $editedAsetPeminjaman);

        $this->assertApiResponse($editedAsetPeminjaman);
    }

    /**
     * @test
     */
    public function testDeleteAsetPeminjaman()
    {
        $asetPeminjaman = $this->makeAsetPeminjaman();
        $this->json('DELETE', '/api/v1/asetPeminjamen/'.$asetPeminjaman->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asetPeminjamen/'.$asetPeminjaman->id);

        $this->assertResponseStatus(404);
    }
}
