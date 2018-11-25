<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetPelepasanApiTest extends TestCase
{
    use MakeAsetPelepasanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsetPelepasan()
    {
        $asetPelepasan = $this->fakeAsetPelepasanData();
        $this->json('POST', '/api/v1/asetPelepasans', $asetPelepasan);

        $this->assertApiResponse($asetPelepasan);
    }

    /**
     * @test
     */
    public function testReadAsetPelepasan()
    {
        $asetPelepasan = $this->makeAsetPelepasan();
        $this->json('GET', '/api/v1/asetPelepasans/'.$asetPelepasan->id);

        $this->assertApiResponse($asetPelepasan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsetPelepasan()
    {
        $asetPelepasan = $this->makeAsetPelepasan();
        $editedAsetPelepasan = $this->fakeAsetPelepasanData();

        $this->json('PUT', '/api/v1/asetPelepasans/'.$asetPelepasan->id, $editedAsetPelepasan);

        $this->assertApiResponse($editedAsetPelepasan);
    }

    /**
     * @test
     */
    public function testDeleteAsetPelepasan()
    {
        $asetPelepasan = $this->makeAsetPelepasan();
        $this->json('DELETE', '/api/v1/asetPelepasans/'.$asetPelepasan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asetPelepasans/'.$asetPelepasan->id);

        $this->assertResponseStatus(404);
    }
}
