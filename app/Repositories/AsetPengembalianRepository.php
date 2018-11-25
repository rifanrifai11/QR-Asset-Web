<?php

namespace App\Repositories;

use App\Models\AsetPengembalian;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetPengembalianRepository
 * @package App\Repositories
 * @version November 7, 2017, 3:41 am UTC
 *
 * @method AsetPengembalian findWithoutFail($id, $columns = ['*'])
 * @method AsetPengembalian find($id, $columns = ['*'])
 * @method AsetPengembalian first($columns = ['*'])
*/
class AsetPengembalianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'nama',
        'nik',
        'jabatan',
        'departemen_id',
        'lokasi',
        'atasan_langsung',
        'diserahkan',
        'jabatan_diserahkan',
        'cek',
        'jabatan_cek',
        'penerima',
        'jabatan_penerima'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AsetPengembalian::class;
    }
}
