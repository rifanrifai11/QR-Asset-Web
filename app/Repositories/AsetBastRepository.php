<?php

namespace App\Repositories;

use App\Models\AsetBast;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetBastRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:06 am UTC
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
        'jobsite_id',
        'jabatan',
        'atasan_langsung',
        'diserahkan_oleh',
        'jabatan_diserahkan',
        'cek_oleh',
        'jabatan_cek',
        'penerima_oleh',
        'jabatan_penerima',
        'jabatan_project_manager',
        'nama_project_manager'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AsetBast::class;
    }
}
