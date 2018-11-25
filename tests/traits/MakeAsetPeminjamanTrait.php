<?php

use Faker\Factory as Faker;
use App\Models\AsetPeminjaman;
use App\Repositories\AsetPeminjamanRepository;

trait MakeAsetPeminjamanTrait
{
    /**
     * Create fake instance of AsetPeminjaman and save it in database
     *
     * @param array $asetPeminjamanFields
     * @return AsetPeminjaman
     */
    public function makeAsetPeminjaman($asetPeminjamanFields = [])
    {
        /** @var AsetPeminjamanRepository $asetPeminjamanRepo */
        $asetPeminjamanRepo = App::make(AsetPeminjamanRepository::class);
        $theme = $this->fakeAsetPeminjamanData($asetPeminjamanFields);
        return $asetPeminjamanRepo->create($theme);
    }

    /**
     * Get fake instance of AsetPeminjaman
     *
     * @param array $asetPeminjamanFields
     * @return AsetPeminjaman
     */
    public function fakeAsetPeminjaman($asetPeminjamanFields = [])
    {
        return new AsetPeminjaman($this->fakeAsetPeminjamanData($asetPeminjamanFields));
    }

    /**
     * Get fake data of AsetPeminjaman
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsetPeminjamanData($asetPeminjamanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_surat' => $fake->randomDigitNotNull,
            'data_aset_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull,
            'nomor_peminjam' => $fake->word,
            'nama_peminjam' => $fake->word,
            'nrp' => $fake->word,
            'departemen_id' => $fake->randomDigitNotNull,
            'jabatan' => $fake->word,
            'alasan' => $fake->word,
            'tanggal_peminjaman' => $fake->word,
            'waktu_peminjaman_awal' => $fake->word,
            'waktu_peminjaman_akhir' => $fake->word,
            'tanggal_pengembalian' => $fake->word,
            'waktu_pengembalian' => $fake->date('Y-m-d H:i:s'),
            'jabatan_peminjam' => $fake->word,
            'mengetahui' => $fake->word,
            'jabatan_mengetahui' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $asetPeminjamanFields);
    }
}
