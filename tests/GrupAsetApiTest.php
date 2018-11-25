<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GrupAsetApiTest extends TestCase
{
    use MakeGrupAsetTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateGrupAset()
    {
        $grupAset = $this->fakeGrupAsetData();
        $this->json('POST', '/api/v1/grupAsets', $grupAset);

        $this->assertApiResponse($grupAset);
    }

    /**
     * @test
     */
    public function testReadGrupAset()
    {
        $grupAset = $this->makeGrupAset();
        $this->json('GET', '/api/v1/grupAsets/'.$grupAset->id);

        $this->assertApiResponse($grupAset->toArray());
    }

    /**
     * @test
     */
    public function testUpdateGrupAset()
    {
        $grupAset = $this->makeGrupAset();
        $editedGrupAset = $this->fakeGrupAsetData();

        $this->json('PUT', '/api/v1/grupAsets/'.$grupAset->id, $editedGrupAset);

        $this->assertApiResponse($editedGrupAset);
    }

    /**
     * @test
     */
    public function testDeleteGrupAset()
    {
        $grupAset = $this->makeGrupAset();
        $this->json('DELETE', '/api/v1/grupAsets/'.$grupAset->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/grupAsets/'.$grupAset->id);

        $this->assertResponseStatus(404);
    }
}
