<?php

use App\Models\AsetPengembalian;
use App\Repositories\AsetPengembalianRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetPengembalianRepositoryTest extends TestCase
{
    use MakeAsetPengembalianTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsetPengembalianRepository
     */
    protected $asetPengembalianRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asetPengembalianRepo = App::make(AsetPengembalianRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsetPengembalian()
    {
        $asetPengembalian = $this->fakeAsetPengembalianData();
        $createdAsetPengembalian = $this->asetPengembalianRepo->create($asetPengembalian);
        $createdAsetPengembalian = $createdAsetPengembalian->toArray();
        $this->assertArrayHasKey('id', $createdAsetPengembalian);
        $this->assertNotNull($createdAsetPengembalian['id'], 'Created AsetPengembalian must have id specified');
        $this->assertNotNull(AsetPengembalian::find($createdAsetPengembalian['id']), 'AsetPengembalian with given id must be in DB');
        $this->assertModelData($asetPengembalian, $createdAsetPengembalian);
    }

    /**
     * @test read
     */
    public function testReadAsetPengembalian()
    {
        $asetPengembalian = $this->makeAsetPengembalian();
        $dbAsetPengembalian = $this->asetPengembalianRepo->find($asetPengembalian->id);
        $dbAsetPengembalian = $dbAsetPengembalian->toArray();
        $this->assertModelData($asetPengembalian->toArray(), $dbAsetPengembalian);
    }

    /**
     * @test update
     */
    public function testUpdateAsetPengembalian()
    {
        $asetPengembalian = $this->makeAsetPengembalian();
        $fakeAsetPengembalian = $this->fakeAsetPengembalianData();
        $updatedAsetPengembalian = $this->asetPengembalianRepo->update($fakeAsetPengembalian, $asetPengembalian->id);
        $this->assertModelData($fakeAsetPengembalian, $updatedAsetPengembalian->toArray());
        $dbAsetPengembalian = $this->asetPengembalianRepo->find($asetPengembalian->id);
        $this->assertModelData($fakeAsetPengembalian, $dbAsetPengembalian->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsetPengembalian()
    {
        $asetPengembalian = $this->makeAsetPengembalian();
        $resp = $this->asetPengembalianRepo->delete($asetPengembalian->id);
        $this->assertTrue($resp);
        $this->assertNull(AsetPengembalian::find($asetPengembalian->id), 'AsetPengembalian should not exist in DB');
    }
}
