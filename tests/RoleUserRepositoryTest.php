<?php

use App\Models\RoleUser;
use App\Repositories\RoleUserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleUserRepositoryTest extends TestCase
{
    use MakeRoleUserTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RoleUserRepository
     */
    protected $roleUserRepo;

    public function setUp()
    {
        parent::setUp();
        $this->roleUserRepo = App::make(RoleUserRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRoleUser()
    {
        $roleUser = $this->fakeRoleUserData();
        $createdRoleUser = $this->roleUserRepo->create($roleUser);
        $createdRoleUser = $createdRoleUser->toArray();
        $this->assertArrayHasKey('id', $createdRoleUser);
        $this->assertNotNull($createdRoleUser['id'], 'Created RoleUser must have id specified');
        $this->assertNotNull(RoleUser::find($createdRoleUser['id']), 'RoleUser with given id must be in DB');
        $this->assertModelData($roleUser, $createdRoleUser);
    }

    /**
     * @test read
     */
    public function testReadRoleUser()
    {
        $roleUser = $this->makeRoleUser();
        $dbRoleUser = $this->roleUserRepo->find($roleUser->id);
        $dbRoleUser = $dbRoleUser->toArray();
        $this->assertModelData($roleUser->toArray(), $dbRoleUser);
    }

    /**
     * @test update
     */
    public function testUpdateRoleUser()
    {
        $roleUser = $this->makeRoleUser();
        $fakeRoleUser = $this->fakeRoleUserData();
        $updatedRoleUser = $this->roleUserRepo->update($fakeRoleUser, $roleUser->id);
        $this->assertModelData($fakeRoleUser, $updatedRoleUser->toArray());
        $dbRoleUser = $this->roleUserRepo->find($roleUser->id);
        $this->assertModelData($fakeRoleUser, $dbRoleUser->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRoleUser()
    {
        $roleUser = $this->makeRoleUser();
        $resp = $this->roleUserRepo->delete($roleUser->id);
        $this->assertTrue($resp);
        $this->assertNull(RoleUser::find($roleUser->id), 'RoleUser should not exist in DB');
    }
}
