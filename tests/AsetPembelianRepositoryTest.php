<?php

use App\Models\AsetPembelian;
use App\Repositories\AsetPembelianRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetPembelianRepositoryTest extends TestCase
{
    use MakeAsetPembelianTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsetPembelianRepository
     */
    protected $asetPembelianRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asetPembelianRepo = App::make(AsetPembelianRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsetPembelian()
    {
        $asetPembelian = $this->fakeAsetPembelianData();
        $createdAsetPembelian = $this->asetPembelianRepo->create($asetPembelian);
        $createdAsetPembelian = $createdAsetPembelian->toArray();
        $this->assertArrayHasKey('id', $createdAsetPembelian);
        $this->assertNotNull($createdAsetPembelian['id'], 'Created AsetPembelian must have id specified');
        $this->assertNotNull(AsetPembelian::find($createdAsetPembelian['id']), 'AsetPembelian with given id must be in DB');
        $this->assertModelData($asetPembelian, $createdAsetPembelian);
    }

    /**
     * @test read
     */
    public function testReadAsetPembelian()
    {
        $asetPembelian = $this->makeAsetPembelian();
        $dbAsetPembelian = $this->asetPembelianRepo->find($asetPembelian->id);
        $dbAsetPembelian = $dbAsetPembelian->toArray();
        $this->assertModelData($asetPembelian->toArray(), $dbAsetPembelian);
    }

    /**
     * @test update
     */
    public function testUpdateAsetPembelian()
    {
        $asetPembelian = $this->makeAsetPembelian();
        $fakeAsetPembelian = $this->fakeAsetPembelianData();
        $updatedAsetPembelian = $this->asetPembelianRepo->update($fakeAsetPembelian, $asetPembelian->id);
        $this->assertModelData($fakeAsetPembelian, $updatedAsetPembelian->toArray());
        $dbAsetPembelian = $this->asetPembelianRepo->find($asetPembelian->id);
        $this->assertModelData($fakeAsetPembelian, $dbAsetPembelian->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsetPembelian()
    {
        $asetPembelian = $this->makeAsetPembelian();
        $resp = $this->asetPembelianRepo->delete($asetPembelian->id);
        $this->assertTrue($resp);
        $this->assertNull(AsetPembelian::find($asetPembelian->id), 'AsetPembelian should not exist in DB');
    }
}
