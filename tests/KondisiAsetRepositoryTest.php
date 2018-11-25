<?php

use App\Models\KondisiAset;
use App\Repositories\KondisiAsetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KondisiAsetRepositoryTest extends TestCase
{
    use MakeKondisiAsetTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KondisiAsetRepository
     */
    protected $kondisiAsetRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kondisiAsetRepo = App::make(KondisiAsetRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKondisiAset()
    {
        $kondisiAset = $this->fakeKondisiAsetData();
        $createdKondisiAset = $this->kondisiAsetRepo->create($kondisiAset);
        $createdKondisiAset = $createdKondisiAset->toArray();
        $this->assertArrayHasKey('id', $createdKondisiAset);
        $this->assertNotNull($createdKondisiAset['id'], 'Created KondisiAset must have id specified');
        $this->assertNotNull(KondisiAset::find($createdKondisiAset['id']), 'KondisiAset with given id must be in DB');
        $this->assertModelData($kondisiAset, $createdKondisiAset);
    }

    /**
     * @test read
     */
    public function testReadKondisiAset()
    {
        $kondisiAset = $this->makeKondisiAset();
        $dbKondisiAset = $this->kondisiAsetRepo->find($kondisiAset->id);
        $dbKondisiAset = $dbKondisiAset->toArray();
        $this->assertModelData($kondisiAset->toArray(), $dbKondisiAset);
    }

    /**
     * @test update
     */
    public function testUpdateKondisiAset()
    {
        $kondisiAset = $this->makeKondisiAset();
        $fakeKondisiAset = $this->fakeKondisiAsetData();
        $updatedKondisiAset = $this->kondisiAsetRepo->update($fakeKondisiAset, $kondisiAset->id);
        $this->assertModelData($fakeKondisiAset, $updatedKondisiAset->toArray());
        $dbKondisiAset = $this->kondisiAsetRepo->find($kondisiAset->id);
        $this->assertModelData($fakeKondisiAset, $dbKondisiAset->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKondisiAset()
    {
        $kondisiAset = $this->makeKondisiAset();
        $resp = $this->kondisiAsetRepo->delete($kondisiAset->id);
        $this->assertTrue($resp);
        $this->assertNull(KondisiAset::find($kondisiAset->id), 'KondisiAset should not exist in DB');
    }
}
