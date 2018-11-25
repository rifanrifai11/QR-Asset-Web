<?php

use App\Models\UmurEkonomis;
use App\Repositories\UmurEkonomisRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UmurEkonomisRepositoryTest extends TestCase
{
    use MakeUmurEkonomisTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UmurEkonomisRepository
     */
    protected $umurEkonomisRepo;

    public function setUp()
    {
        parent::setUp();
        $this->umurEkonomisRepo = App::make(UmurEkonomisRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUmurEkonomis()
    {
        $umurEkonomis = $this->fakeUmurEkonomisData();
        $createdUmurEkonomis = $this->umurEkonomisRepo->create($umurEkonomis);
        $createdUmurEkonomis = $createdUmurEkonomis->toArray();
        $this->assertArrayHasKey('id', $createdUmurEkonomis);
        $this->assertNotNull($createdUmurEkonomis['id'], 'Created UmurEkonomis must have id specified');
        $this->assertNotNull(UmurEkonomis::find($createdUmurEkonomis['id']), 'UmurEkonomis with given id must be in DB');
        $this->assertModelData($umurEkonomis, $createdUmurEkonomis);
    }

    /**
     * @test read
     */
    public function testReadUmurEkonomis()
    {
        $umurEkonomis = $this->makeUmurEkonomis();
        $dbUmurEkonomis = $this->umurEkonomisRepo->find($umurEkonomis->id);
        $dbUmurEkonomis = $dbUmurEkonomis->toArray();
        $this->assertModelData($umurEkonomis->toArray(), $dbUmurEkonomis);
    }

    /**
     * @test update
     */
    public function testUpdateUmurEkonomis()
    {
        $umurEkonomis = $this->makeUmurEkonomis();
        $fakeUmurEkonomis = $this->fakeUmurEkonomisData();
        $updatedUmurEkonomis = $this->umurEkonomisRepo->update($fakeUmurEkonomis, $umurEkonomis->id);
        $this->assertModelData($fakeUmurEkonomis, $updatedUmurEkonomis->toArray());
        $dbUmurEkonomis = $this->umurEkonomisRepo->find($umurEkonomis->id);
        $this->assertModelData($fakeUmurEkonomis, $dbUmurEkonomis->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUmurEkonomis()
    {
        $umurEkonomis = $this->makeUmurEkonomis();
        $resp = $this->umurEkonomisRepo->delete($umurEkonomis->id);
        $this->assertTrue($resp);
        $this->assertNull(UmurEkonomis::find($umurEkonomis->id), 'UmurEkonomis should not exist in DB');
    }
}
