<?php

use App\Models\AsetHilang;
use App\Repositories\AsetHilangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsetHilangRepositoryTest extends TestCase
{
    use MakeAsetHilangTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsetHilangRepository
     */
    protected $asetHilangRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asetHilangRepo = App::make(AsetHilangRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsetHilang()
    {
        $asetHilang = $this->fakeAsetHilangData();
        $createdAsetHilang = $this->asetHilangRepo->create($asetHilang);
        $createdAsetHilang = $createdAsetHilang->toArray();
        $this->assertArrayHasKey('id', $createdAsetHilang);
        $this->assertNotNull($createdAsetHilang['id'], 'Created AsetHilang must have id specified');
        $this->assertNotNull(AsetHilang::find($createdAsetHilang['id']), 'AsetHilang with given id must be in DB');
        $this->assertModelData($asetHilang, $createdAsetHilang);
    }

    /**
     * @test read
     */
    public function testReadAsetHilang()
    {
        $asetHilang = $this->makeAsetHilang();
        $dbAsetHilang = $this->asetHilangRepo->find($asetHilang->id);
        $dbAsetHilang = $dbAsetHilang->toArray();
        $this->assertModelData($asetHilang->toArray(), $dbAsetHilang);
    }

    /**
     * @test update
     */
    public function testUpdateAsetHilang()
    {
        $asetHilang = $this->makeAsetHilang();
        $fakeAsetHilang = $this->fakeAsetHilangData();
        $updatedAsetHilang = $this->asetHilangRepo->update($fakeAsetHilang, $asetHilang->id);
        $this->assertModelData($fakeAsetHilang, $updatedAsetHilang->toArray());
        $dbAsetHilang = $this->asetHilangRepo->find($asetHilang->id);
        $this->assertModelData($fakeAsetHilang, $dbAsetHilang->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsetHilang()
    {
        $asetHilang = $this->makeAsetHilang();
        $resp = $this->asetHilangRepo->delete($asetHilang->id);
        $this->assertTrue($resp);
        $this->assertNull(AsetHilang::find($asetHilang->id), 'AsetHilang should not exist in DB');
    }
}
