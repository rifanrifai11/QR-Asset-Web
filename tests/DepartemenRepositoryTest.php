<?php

use App\Models\Departemen;
use App\Repositories\DepartemenRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartemenRepositoryTest extends TestCase
{
    use MakeDepartemenTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DepartemenRepository
     */
    protected $departemenRepo;

    public function setUp()
    {
        parent::setUp();
        $this->departemenRepo = App::make(DepartemenRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDepartemen()
    {
        $departemen = $this->fakeDepartemenData();
        $createdDepartemen = $this->departemenRepo->create($departemen);
        $createdDepartemen = $createdDepartemen->toArray();
        $this->assertArrayHasKey('id', $createdDepartemen);
        $this->assertNotNull($createdDepartemen['id'], 'Created Departemen must have id specified');
        $this->assertNotNull(Departemen::find($createdDepartemen['id']), 'Departemen with given id must be in DB');
        $this->assertModelData($departemen, $createdDepartemen);
    }

    /**
     * @test read
     */
    public function testReadDepartemen()
    {
        $departemen = $this->makeDepartemen();
        $dbDepartemen = $this->departemenRepo->find($departemen->id);
        $dbDepartemen = $dbDepartemen->toArray();
        $this->assertModelData($departemen->toArray(), $dbDepartemen);
    }

    /**
     * @test update
     */
    public function testUpdateDepartemen()
    {
        $departemen = $this->makeDepartemen();
        $fakeDepartemen = $this->fakeDepartemenData();
        $updatedDepartemen = $this->departemenRepo->update($fakeDepartemen, $departemen->id);
        $this->assertModelData($fakeDepartemen, $updatedDepartemen->toArray());
        $dbDepartemen = $this->departemenRepo->find($departemen->id);
        $this->assertModelData($fakeDepartemen, $dbDepartemen->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDepartemen()
    {
        $departemen = $this->makeDepartemen();
        $resp = $this->departemenRepo->delete($departemen->id);
        $this->assertTrue($resp);
        $this->assertNull(Departemen::find($departemen->id), 'Departemen should not exist in DB');
    }
}
