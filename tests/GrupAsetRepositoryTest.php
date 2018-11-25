<?php

use App\Models\GrupAset;
use App\Repositories\GrupAsetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GrupAsetRepositoryTest extends TestCase
{
    use MakeGrupAsetTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var GrupAsetRepository
     */
    protected $grupAsetRepo;

    public function setUp()
    {
        parent::setUp();
        $this->grupAsetRepo = App::make(GrupAsetRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateGrupAset()
    {
        $grupAset = $this->fakeGrupAsetData();
        $createdGrupAset = $this->grupAsetRepo->create($grupAset);
        $createdGrupAset = $createdGrupAset->toArray();
        $this->assertArrayHasKey('id', $createdGrupAset);
        $this->assertNotNull($createdGrupAset['id'], 'Created GrupAset must have id specified');
        $this->assertNotNull(GrupAset::find($createdGrupAset['id']), 'GrupAset with given id must be in DB');
        $this->assertModelData($grupAset, $createdGrupAset);
    }

    /**
     * @test read
     */
    public function testReadGrupAset()
    {
        $grupAset = $this->makeGrupAset();
        $dbGrupAset = $this->grupAsetRepo->find($grupAset->id);
        $dbGrupAset = $dbGrupAset->toArray();
        $this->assertModelData($grupAset->toArray(), $dbGrupAset);
    }

    /**
     * @test update
     */
    public function testUpdateGrupAset()
    {
        $grupAset = $this->makeGrupAset();
        $fakeGrupAset = $this->fakeGrupAsetData();
        $updatedGrupAset = $this->grupAsetRepo->update($fakeGrupAset, $grupAset->id);
        $this->assertModelData($fakeGrupAset, $updatedGrupAset->toArray());
        $dbGrupAset = $this->grupAsetRepo->find($grupAset->id);
        $this->assertModelData($fakeGrupAset, $dbGrupAset->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteGrupAset()
    {
        $grupAset = $this->makeGrupAset();
        $resp = $this->grupAsetRepo->delete($grupAset->id);
        $this->assertTrue($resp);
        $this->assertNull(GrupAset::find($grupAset->id), 'GrupAset should not exist in DB');
    }
}
