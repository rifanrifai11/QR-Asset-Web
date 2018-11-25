<?php

use App\Models\DataAset;
use App\Repositories\DataAsetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataAsetRepositoryTest extends TestCase
{
    use MakeDataAsetTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DataAsetRepository
     */
    protected $dataAsetRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dataAsetRepo = App::make(DataAsetRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDataAset()
    {
        $dataAset = $this->fakeDataAsetData();
        $createdDataAset = $this->dataAsetRepo->create($dataAset);
        $createdDataAset = $createdDataAset->toArray();
        $this->assertArrayHasKey('id', $createdDataAset);
        $this->assertNotNull($createdDataAset['id'], 'Created DataAset must have id specified');
        $this->assertNotNull(DataAset::find($createdDataAset['id']), 'DataAset with given id must be in DB');
        $this->assertModelData($dataAset, $createdDataAset);
    }

    /**
     * @test read
     */
    public function testReadDataAset()
    {
        $dataAset = $this->makeDataAset();
        $dbDataAset = $this->dataAsetRepo->find($dataAset->id);
        $dbDataAset = $dbDataAset->toArray();
        $this->assertModelData($dataAset->toArray(), $dbDataAset);
    }

    /**
     * @test update
     */
    public function testUpdateDataAset()
    {
        $dataAset = $this->makeDataAset();
        $fakeDataAset = $this->fakeDataAsetData();
        $updatedDataAset = $this->dataAsetRepo->update($fakeDataAset, $dataAset->id);
        $this->assertModelData($fakeDataAset, $updatedDataAset->toArray());
        $dbDataAset = $this->dataAsetRepo->find($dataAset->id);
        $this->assertModelData($fakeDataAset, $dbDataAset->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDataAset()
    {
        $dataAset = $this->makeDataAset();
        $resp = $this->dataAsetRepo->delete($dataAset->id);
        $this->assertTrue($resp);
        $this->assertNull(DataAset::find($dataAset->id), 'DataAset should not exist in DB');
    }
}
