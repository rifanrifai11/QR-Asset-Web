<?php

namespace App\Repositories;

use App\Models\AsetMutasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetMutasiRepository
 * @package App\Repositories
 * @version November 7, 2017, 3:44 am UTC
 *
 * @method AsetMutasi findWithoutFail($id, $columns = ['*'])
 * @method AsetMutasi find($id, $columns = ['*'])
 * @method AsetMutasi first($columns = ['*'])
*/
class AsetMutasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'nama_pengguna_baru',
        'posisi_pengguna_baru',
        'jabatan_pengguna_baru',
        'departemen_id',
        'mengetahui',
        'jabatan_mengetahui',
        'diserahkan',
        'jabatan_diserahkan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AsetMutasi::class;
    }
}
