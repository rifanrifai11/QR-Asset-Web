<?php

use App\Models\PenggunaAset;
use App\Repositories\PenggunaAsetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PenggunaAsetRepositoryTest extends TestCase
{
    use MakePenggunaAsetTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PenggunaAsetRepository
     */
    protected $penggunaAsetRepo;

    public function setUp()
    {
        parent::setUp();
        $this->penggunaAsetRepo = App::make(PenggunaAsetRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePenggunaAset()
    {
        $penggunaAset = $this->fakePenggunaAsetData();
        $createdPenggunaAset = $this->penggunaAsetRepo->create($penggunaAset);
        $createdPenggunaAset = $createdPenggunaAset->toArray();
        $this->assertArrayHasKey('id', $createdPenggunaAset);
        $this->assertNotNull($createdPenggunaAset['id'], 'Created PenggunaAset must have id specified');
        $this->assertNotNull(PenggunaAset::find($createdPenggunaAset['id']), 'PenggunaAset with given id must be in DB');
        $this->assertModelData($penggunaAset, $createdPenggunaAset);
    }

    /**
     * @test read
     */
    public function testReadPenggunaAset()
    {
        $penggunaAset = $this->makePenggunaAset();
        $dbPenggunaAset = $this->penggunaAsetRepo->find($penggunaAset->id);
        $dbPenggunaAset = $dbPenggunaAset->toArray();
        $this->assertModelData($penggunaAset->toArray(), $dbPenggunaAset);
    }

    /**
     * @test update
     */
    public function testUpdatePenggunaAset()
    {
        $penggunaAset = $this->makePenggunaAset();
        $fakePenggunaAset = $this->fakePenggunaAsetData();
        $updatedPenggunaAset = $this->penggunaAsetRepo->update($fakePenggunaAset, $penggunaAset->id);
        $this->assertModelData($fakePenggunaAset, $updatedPenggunaAset->toArray());
        $dbPenggunaAset = $this->penggunaAsetRepo->find($penggunaAset->id);
        $this->assertModelData($fakePenggunaAset, $dbPenggunaAset->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePenggunaAset()
    {
        $penggunaAset = $this->makePenggunaAset();
        $resp = $this->penggunaAsetRepo->delete($penggunaAset->id);
        $this->assertTrue($resp);
        $this->assertNull(PenggunaAset::find($penggunaAset->id), 'PenggunaAset should not exist in DB');
    }
}
