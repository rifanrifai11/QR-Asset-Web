<?php

namespace App\Repositories;

use App\Models\PenggunaAset;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PenggunaAsetRepository
 * @package App\Repositories
 * @version November 24, 2018, 10:53 pm UTC
 *
 * @method PenggunaAset findWithoutFail($id, $columns = ['*'])
 * @method PenggunaAset find($id, $columns = ['*'])
 * @method PenggunaAset first($columns = ['*'])
*/
class PenggunaAsetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_bast',
        'nama',
        'nrp',
        'lokasi_kerja',
        'departemen_id',
        'atasan_langsung',
        'pic_aset',
        'posisi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PenggunaAset::class;
    }
}
