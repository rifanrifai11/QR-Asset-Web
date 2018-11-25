<?php

use App\Models\AsetMutasi;
use App\Repositories\AsetMutasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetMutasiRepositoryTest extends TestCase
{
    use MakeAsetMutasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsetMutasiRepository
     */
    protected $asetMutasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asetMutasiRepo = App::make(AsetMutasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsetMutasi()
    {
        $asetMutasi = $this->fakeAsetMutasiData();
        $createdAsetMutasi = $this->asetMutasiRepo->create($asetMutasi);
        $createdAsetMutasi = $createdAsetMutasi->toArray();
        $this->assertArrayHasKey('id', $createdAsetMutasi);
        $this->assertNotNull($createdAsetMutasi['id'], 'Created AsetMutasi must have id specified');
        $this->assertNotNull(AsetMutasi::find($createdAsetMutasi['id']), 'AsetMutasi with given id must be in DB');
        $this->assertModelData($asetMutasi, $createdAsetMutasi);
    }

    /**
     * @test read
     */
    public function testReadAsetMutasi()
    {
        $asetMutasi = $this->makeAsetMutasi();
        $dbAsetMutasi = $this->asetMutasiRepo->find($asetMutasi->id);
        $dbAsetMutasi = $dbAsetMutasi->toArray();
        $this->assertModelData($asetMutasi->toArray(), $dbAsetMutasi);
    }

    /**
     * @test update
     */
    public function testUpdateAsetMutasi()
    {
        $asetMutasi = $this->makeAsetMutasi();
        $fakeAsetMutasi = $this->fakeAsetMutasiData();
        $updatedAsetMutasi = $this->asetMutasiRepo->update($fakeAsetMutasi, $asetMutasi->id);
        $this->assertModelData($fakeAsetMutasi, $updatedAsetMutasi->toArray());
        $dbAsetMutasi = $this->asetMutasiRepo->find($asetMutasi->id);
        $this->assertModelData($fakeAsetMutasi, $dbAsetMutasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsetMutasi()
    {
        $asetMutasi = $this->makeAsetMutasi();
        $resp = $this->asetMutasiRepo->delete($asetMutasi->id);
        $this->assertTrue($resp);
        $this->assertNull(AsetMutasi::find($asetMutasi->id), 'AsetMutasi should not exist in DB');
    }
}
