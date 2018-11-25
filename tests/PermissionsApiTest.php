<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionsApiTest extends TestCase
{
    use MakePermissionsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePermissions()
    {
        $permissions = $this->fakePermissionsData();
        $this->json('POST', '/api/v1/permissions', $permissions);

        $this->assertApiResponse($permissions);
    }

    /**
     * @test
     */
    public function testReadPermissions()
    {
        $permissions = $this->makePermissions();
        $this->json('GET', '/api/v1/permissions/'.$permissions->id);

        $this->assertApiResponse($permissions->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePermissions()
    {
        $permissions = $this->makePermissions();
        $editedPermissions = $this->fakePermissionsData();

        $this->json('PUT', '/api/v1/permissions/'.$permissions->id, $editedPermissions);

        $this->assertApiResponse($editedPermissions);
    }

    /**
     * @test
     */
    public function testDeletePermissions()
    {
        $permissions = $this->makePermissions();
        $this->json('DELETE', '/api/v1/permissions/'.$permissions->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/permissions/'.$permissions->id);

        $this->assertResponseStatus(404);
    }
}
