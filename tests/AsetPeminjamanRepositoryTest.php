<?php

use App\Models\AsetPeminjaman;
use App\Repositories\AsetPeminjamanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetPeminjamanRepositoryTest extends TestCase
{
    use MakeAsetPeminjamanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsetPeminjamanRepository
     */
    protected $asetPeminjamanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asetPeminjamanRepo = App::make(AsetPeminjamanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsetPeminjaman()
    {
        $asetPeminjaman = $this->fakeAsetPeminjamanData();
        $createdAsetPeminjaman = $this->asetPeminjamanRepo->create($asetPeminjaman);
        $createdAsetPeminjaman = $createdAsetPeminjaman->toArray();
        $this->assertArrayHasKey('id', $createdAsetPeminjaman);
        $this->assertNotNull($createdAsetPeminjaman['id'], 'Created AsetPeminjaman must have id specified');
        $this->assertNotNull(AsetPeminjaman::find($createdAsetPeminjaman['id']), 'AsetPeminjaman with given id must be in DB');
        $this->assertModelData($asetPeminjaman, $createdAsetPeminjaman);
    }

    /**
     * @test read
     */
    public function testReadAsetPeminjaman()
    {
        $asetPeminjaman = $this->makeAsetPeminjaman();
        $dbAsetPeminjaman = $this->asetPeminjamanRepo->find($asetPeminjaman->id);
        $dbAsetPeminjaman = $dbAsetPeminjaman->toArray();
        $this->assertModelData($asetPeminjaman->toArray(), $dbAsetPeminjaman);
    }

    /**
     * @test update
     */
    public function testUpdateAsetPeminjaman()
    {
        $asetPeminjaman = $this->makeAsetPeminjaman();
        $fakeAsetPeminjaman = $this->fakeAsetPeminjamanData();
        $updatedAsetPeminjaman = $this->asetPeminjamanRepo->update($fakeAsetPeminjaman, $asetPeminjaman->id);
        $this->assertModelData($fakeAsetPeminjaman, $updatedAsetPeminjaman->toArray());
        $dbAsetPeminjaman = $this->asetPeminjamanRepo->find($asetPeminjaman->id);
        $this->assertModelData($fakeAsetPeminjaman, $dbAsetPeminjaman->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsetPeminjaman()
    {
        $asetPeminjaman = $this->makeAsetPeminjaman();
        $resp = $this->asetPeminjamanRepo->delete($asetPeminjaman->id);
        $this->assertTrue($resp);
        $this->assertNull(AsetPeminjaman::find($asetPeminjaman->id), 'AsetPeminjaman should not exist in DB');
    }
}
