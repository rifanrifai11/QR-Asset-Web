<?php

use App\Models\KategoriAset;
use App\Repositories\KategoriAsetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KategoriAsetRepositoryTest extends TestCase
{
    use MakeKategoriAsetTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KategoriAsetRepository
     */
    protected $kategoriAsetRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kategoriAsetRepo = App::make(KategoriAsetRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKategoriAset()
    {
        $kategoriAset = $this->fakeKategoriAsetData();
        $createdKategoriAset = $this->kategoriAsetRepo->create($kategoriAset);
        $createdKategoriAset = $createdKategoriAset->toArray();
        $this->assertArrayHasKey('id', $createdKategoriAset);
        $this->assertNotNull($createdKategoriAset['id'], 'Created KategoriAset must have id specified');
        $this->assertNotNull(KategoriAset::find($createdKategoriAset['id']), 'KategoriAset with given id must be in DB');
        $this->assertModelData($kategoriAset, $createdKategoriAset);
    }

    /**
     * @test read
     */
    public function testReadKategoriAset()
    {
        $kategoriAset = $this->makeKategoriAset();
        $dbKategoriAset = $this->kategoriAsetRepo->find($kategoriAset->id);
        $dbKategoriAset = $dbKategoriAset->toArray();
        $this->assertModelData($kategoriAset->toArray(), $dbKategoriAset);
    }

    /**
     * @test update
     */
    public function testUpdateKategoriAset()
    {
        $kategoriAset = $this->makeKategoriAset();
        $fakeKategoriAset = $this->fakeKategoriAsetData();
        $updatedKategoriAset = $this->kategoriAsetRepo->update($fakeKategoriAset, $kategoriAset->id);
        $this->assertModelData($fakeKategoriAset, $updatedKategoriAset->toArray());
        $dbKategoriAset = $this->kategoriAsetRepo->find($kategoriAset->id);
        $this->assertModelData($fakeKategoriAset, $dbKategoriAset->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKategoriAset()
    {
        $kategoriAset = $this->makeKategoriAset();
        $resp = $this->kategoriAsetRepo->delete($kategoriAset->id);
        $this->assertTrue($resp);
        $this->assertNull(KategoriAset::find($kategoriAset->id), 'KategoriAset should not exist in DB');
    }
}
