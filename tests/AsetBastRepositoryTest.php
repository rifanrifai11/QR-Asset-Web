<?php

use App\Models\AsetBast;
use App\Repositories\AsetBastRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetBastRepositoryTest extends TestCase
{
    use MakeAsetBastTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsetBastRepository
     */
    protected $asetBastRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asetBastRepo = App::make(AsetBastRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsetBast()
    {
        $asetBast = $this->fakeAsetBastData();
        $createdAsetBast = $this->asetBastRepo->create($asetBast);
        $createdAsetBast = $createdAsetBast->toArray();
        $this->assertArrayHasKey('id', $createdAsetBast);
        $this->assertNotNull($createdAsetBast['id'], 'Created AsetBast must have id specified');
        $this->assertNotNull(AsetBast::find($createdAsetBast['id']), 'AsetBast with given id must be in DB');
        $this->assertModelData($asetBast, $createdAsetBast);
    }

    /**
     * @test read
     */
    public function testReadAsetBast()
    {
        $asetBast = $this->makeAsetBast();
        $dbAsetBast = $this->asetBastRepo->find($asetBast->id);
        $dbAsetBast = $dbAsetBast->toArray();
        $this->assertModelData($asetBast->toArray(), $dbAsetBast);
    }

    /**
     * @test update
     */
    public function testUpdateAsetBast()
    {
        $asetBast = $this->makeAsetBast();
        $fakeAsetBast = $this->fakeAsetBastData();
        $updatedAsetBast = $this->asetBastRepo->update($fakeAsetBast, $asetBast->id);
        $this->assertModelData($fakeAsetBast, $updatedAsetBast->toArray());
        $dbAsetBast = $this->asetBastRepo->find($asetBast->id);
        $this->assertModelData($fakeAsetBast, $dbAsetBast->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsetBast()
    {
        $asetBast = $this->makeAsetBast();
        $resp = $this->asetBastRepo->delete($asetBast->id);
        $this->assertTrue($resp);
        $this->assertNull(AsetBast::find($asetBast->id), 'AsetBast should not exist in DB');
    }
}
