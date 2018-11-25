<?php

namespace App\Repositories;

use App\Models\AsetHilang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetHilangRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:08 am UTC
 *
 * @method AsetHilang findWithoutFail($id, $columns = ['*'])
 * @method AsetHilang find($id, $columns = ['*'])
 * @method AsetHilang first($columns = ['*'])
*/
class AsetHilangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'tanggal_kejadian',
        'waktu_kejadian',
        'lokasi_kejadian',
        'kronologis_kejadian',
        'mengetahui1',
        'jabatan_mengetahui1',
        'mengetahui2',
        'jabatan_mengetahui2',
        'check',
        'jabatan_check',
        'raised_by',
        'jabatan_raised_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AsetHilang::class;
    }
}
