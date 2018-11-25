<?php

namespace App\Repositories;

use App\Models\AsetBast;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetBastRepository
 * @package App\Repositories
 * @version November 7, 2017, 3:50 am UTC
 *
 * @method AsetBast findWithoutFail($id, $columns = ['*'])
 * @method AsetBast find($id, $columns = ['*'])
 * @method AsetBast first($columns = ['*'])
*/
class AsetBastRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'tanggal_bast',
        'nama',
        'nik',
        'departemen_id',
        'jabatan',
        'jobsite',
        'atasan_langsung',
        'diserahkan_oleh',
        'jabatan_diserahkan',
        'cek_oleh',
        'jabatan_cek',
        'penerima_oleh',
        'jabatan_penerima'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AsetBast::class;
    }
}
