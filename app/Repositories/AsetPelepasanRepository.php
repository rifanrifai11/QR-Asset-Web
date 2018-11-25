<?php

namespace App\Repositories;

use App\Models\AsetPelepasan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetPelepasanRepository
 * @package App\Repositories
 * @version November 7, 2017, 3:50 am UTC
 *
 * @method AsetPelepasan findWithoutFail($id, $columns = ['*'])
 * @method AsetPelepasan find($id, $columns = ['*'])
 * @method AsetPelepasan first($columns = ['*'])
*/
class AsetPelepasanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'metode_pelepasan',
        'catatan',
        'foto_saat_ini',
        'menyetujui',
        'jabatan_menyetujui',
        'mengetahui',
        'jabatan_mengetahui',
        'diajukan',
        'jabatan_diajukan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AsetPelepasan::class;
    }
}
