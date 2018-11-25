<?php

use App\Models\AsetPelepasan;
use App\Repositories\AsetPelepasanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetPelepasanRepositoryTest extends TestCase
{
    use MakeAsetPelepasanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsetPelepasanRepository
     */
    protected $asetPelepasanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asetPelepasanRepo = App::make(AsetPelepasanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsetPelepasan()
    {
        $asetPelepasan = $this->fakeAsetPelepasanData();
        $createdAsetPelepasan = $this->asetPelepasanRepo->create($asetPelepasan);
        $createdAsetPelepasan = $createdAsetPelepasan->toArray();
        $this->assertArrayHasKey('id', $createdAsetPelepasan);
        $this->assertNotNull($createdAsetPelepasan['id'], 'Created AsetPelepasan must have id specified');
        $this->assertNotNull(AsetPelepasan::find($createdAsetPelepasan['id']), 'AsetPelepasan with given id must be in DB');
        $this->assertModelData($asetPelepasan, $createdAsetPelepasan);
    }

    /**
     * @test read
     */
    public function testReadAsetPelepasan()
    {
        $asetPelepasan = $this->makeAsetPelepasan();
        $dbAsetPelepasan = $this->asetPelepasanRepo->find($asetPelepasan->id);
        $dbAsetPelepasan = $dbAsetPelepasan->toArray();
        $this->assertModelData($asetPelepasan->toArray(), $dbAsetPelepasan);
    }

    /**
     * @test update
     */
    public function testUpdateAsetPelepasan()
    {
        $asetPelepasan = $this->makeAsetPelepasan();
        $fakeAsetPelepasan = $this->fakeAsetPelepasanData();
        $updatedAsetPelepasan = $this->asetPelepasanRepo->update($fakeAsetPelepasan, $asetPelepasan->id);
        $this->assertModelData($fakeAsetPelepasan, $updatedAsetPelepasan->toArray());
        $dbAsetPelepasan = $this->asetPelepasanRepo->find($asetPelepasan->id);
        $this->assertModelData($fakeAsetPelepasan, $dbAsetPelepasan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsetPelepasan()
    {
        $asetPelepasan = $this->makeAsetPelepasan();
        $resp = $this->asetPelepasanRepo->delete($asetPelepasan->id);
        $this->assertTrue($resp);
        $this->assertNull(AsetPelepasan::find($asetPelepasan->id), 'AsetPelepasan should not exist in DB');
    }
}
