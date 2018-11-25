<?php

namespace App\Repositories;

use App\Models\AsetPeminjaman;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetPeminjamanRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:12 am UTC
 *
 * @method AsetPeminjaman findWithoutFail($id, $columns = ['*'])
 * @method AsetPeminjaman find($id, $columns = ['*'])
 * @method AsetPeminjaman first($columns = ['*'])
*/
class AsetPeminjamanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'nomor_peminjam',
        'nama_peminjam',
        'nrp',
        'departemen_id',
        'jabatan',
        'alasan',
        'tanggal_peminjaman',
        'waktu_peminjaman_awal',
        'waktu_peminjaman_akhir',
        'tanggal_pengembalian',
        'waktu_pengembalian',
        'jabatan_peminjam',
        'mengetahui',
        'jabatan_mengetahui'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AsetPeminjaman::class;
    }
}
