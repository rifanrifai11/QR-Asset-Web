<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleUserApiTest extends TestCase
{
    use MakeRoleUserTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRoleUser()
    {
        $roleUser = $this->fakeRoleUserData();
        $this->json('POST', '/api/v1/roleUsers', $roleUser);

        $this->assertApiResponse($roleUser);
    }

    /**
     * @test
     */
    public function testReadRoleUser()
    {
        $roleUser = $this->makeRoleUser();
        $this->json('GET', '/api/v1/roleUsers/'.$roleUser->id);

        $this->assertApiResponse($roleUser->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRoleUser()
    {
        $roleUser = $this->makeRoleUser();
        $editedRoleUser = $this->fakeRoleUserData();

        $this->json('PUT', '/api/v1/roleUsers/'.$roleUser->id, $editedRoleUser);

        $this->assertApiResponse($editedRoleUser);
    }

    /**
     * @test
     */
    public function testDeleteRoleUser()
    {
        $roleUser = $this->makeRoleUser();
        $this->json('DELETE', '/api/v1/roleUsers/'.$roleUser->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/roleUsers/'.$roleUser->id);

        $this->assertResponseStatus(404);
    }
}
