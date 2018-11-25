<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KondisiAsetApiTest extends TestCase
{
    use MakeKondisiAsetTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKondisiAset()
    {
        $kondisiAset = $this->fakeKondisiAsetData();
        $this->json('POST', '/api/v1/kondisiAsets', $kondisiAset);

        $this->assertApiResponse($kondisiAset);
    }

    /**
     * @test
     */
    public function testReadKondisiAset()
    {
        $kondisiAset = $this->makeKondisiAset();
        $this->json('GET', '/api/v1/kondisiAsets/'.$kondisiAset->id);

        $this->assertApiResponse($kondisiAset->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKondisiAset()
    {
        $kondisiAset = $this->makeKondisiAset();
        $editedKondisiAset = $this->fakeKondisiAsetData();

        $this->json('PUT', '/api/v1/kondisiAsets/'.$kondisiAset->id, $editedKondisiAset);

        $this->assertApiResponse($editedKondisiAset);
    }

    /**
     * @test
     */
    public function testDeleteKondisiAset()
    {
        $kondisiAset = $this->makeKondisiAset();
        $this->json('DELETE', '/api/v1/kondisiAsets/'.$kondisiAset->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kondisiAsets/'.$kondisiAset->id);

        $this->assertResponseStatus(404);
    }
}
