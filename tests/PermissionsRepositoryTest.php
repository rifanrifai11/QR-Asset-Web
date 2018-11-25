<?php

use App\Models\Permissions;
use App\Repositories\PermissionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionsRepositoryTest extends TestCase
{
    use MakePermissionsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PermissionsRepository
     */
    protected $permissionsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->permissionsRepo = App::make(PermissionsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePermissions()
    {
        $permissions = $this->fakePermissionsData();
        $createdPermissions = $this->permissionsRepo->create($permissions);
        $createdPermissions = $createdPermissions->toArray();
        $this->assertArrayHasKey('id', $createdPermissions);
        $this->assertNotNull($createdPermissions['id'], 'Created Permissions must have id specified');
        $this->assertNotNull(Permissions::find($createdPermissions['id']), 'Permissions with given id must be in DB');
        $this->assertModelData($permissions, $createdPermissions);
    }

    /**
     * @test read
     */
    public function testReadPermissions()
    {
        $permissions = $this->makePermissions();
        $dbPermissions = $this->permissionsRepo->find($permissions->id);
        $dbPermissions = $dbPermissions->toArray();
        $this->assertModelData($permissions->toArray(), $dbPermissions);
    }

    /**
     * @test update
     */
    public function testUpdatePermissions()
    {
        $permissions = $this->makePermissions();
        $fakePermissions = $this->fakePermissionsData();
        $updatedPermissions = $this->permissionsRepo->update($fakePermissions, $permissions->id);
        $this->assertModelData($fakePermissions, $updatedPermissions->toArray());
        $dbPermissions = $this->permissionsRepo->find($permissions->id);
        $this->assertModelData($fakePermissions, $dbPermissions->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePermissions()
    {
        $permissions = $this->makePermissions();
        $resp = $this->permissionsRepo->delete($permissions->id);
        $this->assertTrue($resp);
        $this->assertNull(Permissions::find($permissions->id), 'Permissions should not exist in DB');
    }
}
