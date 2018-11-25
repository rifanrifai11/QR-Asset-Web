<?php

use App\Models\Lokasi;
use App\Repositories\LokasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LokasiRepositoryTest extends TestCase
{
    use MakeLokasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LokasiRepository
     */
    protected $lokasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lokasiRepo = App::make(LokasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLokasi()
    {
        $lokasi = $this->fakeLokasiData();
        $createdLokasi = $this->lokasiRepo->create($lokasi);
        $createdLokasi = $createdLokasi->toArray();
        $this->assertArrayHasKey('id', $createdLokasi);
        $this->assertNotNull($createdLokasi['id'], 'Created Lokasi must have id specified');
        $this->assertNotNull(Lokasi::find($createdLokasi['id']), 'Lokasi with given id must be in DB');
        $this->assertModelData($lokasi, $createdLokasi);
    }

    /**
     * @test read
     */
    public function testReadLokasi()
    {
        $lokasi = $this->makeLokasi();
        $dbLokasi = $this->lokasiRepo->find($lokasi->id);
        $dbLokasi = $dbLokasi->toArray();
        $this->assertModelData($lokasi->toArray(), $dbLokasi);
    }

    /**
     * @test update
     */
    public function testUpdateLokasi()
    {
        $lokasi = $this->makeLokasi();
        $fakeLokasi = $this->fakeLokasiData();
        $updatedLokasi = $this->lokasiRepo->update($fakeLokasi, $lokasi->id);
        $this->assertModelData($fakeLokasi, $updatedLokasi->toArray());
        $dbLokasi = $this->lokasiRepo->find($lokasi->id);
        $this->assertModelData($fakeLokasi, $dbLokasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLokasi()
    {
        $lokasi = $this->makeLokasi();
        $resp = $this->lokasiRepo->delete($lokasi->id);
        $this->assertTrue($resp);
        $this->assertNull(Lokasi::find($lokasi->id), 'Lokasi should not exist in DB');
    }
}
