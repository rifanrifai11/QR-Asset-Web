<?php

use App\Models\AsetTaking;
use App\Repositories\AsetTakingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetTakingRepositoryTest extends TestCase
{
    use MakeAsetTakingTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsetTakingRepository
     */
    protected $asetTakingRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asetTakingRepo = App::make(AsetTakingRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsetTaking()
    {
        $asetTaking = $this->fakeAsetTakingData();
        $createdAsetTaking = $this->asetTakingRepo->create($asetTaking);
        $createdAsetTaking = $createdAsetTaking->toArray();
        $this->assertArrayHasKey('id', $createdAsetTaking);
        $this->assertNotNull($createdAsetTaking['id'], 'Created AsetTaking must have id specified');
        $this->assertNotNull(AsetTaking::find($createdAsetTaking['id']), 'AsetTaking with given id must be in DB');
        $this->assertModelData($asetTaking, $createdAsetTaking);
    }

    /**
     * @test read
     */
    public function testReadAsetTaking()
    {
        $asetTaking = $this->makeAsetTaking();
        $dbAsetTaking = $this->asetTakingRepo->find($asetTaking->id);
        $dbAsetTaking = $dbAsetTaking->toArray();
        $this->assertModelData($asetTaking->toArray(), $dbAsetTaking);
    }

    /**
     * @test update
     */
    public function testUpdateAsetTaking()
    {
        $asetTaking = $this->makeAsetTaking();
        $fakeAsetTaking = $this->fakeAsetTakingData();
        $updatedAsetTaking = $this->asetTakingRepo->update($fakeAsetTaking, $asetTaking->id);
        $this->assertModelData($fakeAsetTaking, $updatedAsetTaking->toArray());
        $dbAsetTaking = $this->asetTakingRepo->find($asetTaking->id);
        $this->assertModelData($fakeAsetTaking, $dbAsetTaking->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsetTaking()
    {
        $asetTaking = $this->makeAsetTaking();
        $resp = $this->asetTakingRepo->delete($asetTaking->id);
        $this->assertTrue($resp);
        $this->assertNull(AsetTaking::find($asetTaking->id), 'AsetTaking should not exist in DB');
    }
}
