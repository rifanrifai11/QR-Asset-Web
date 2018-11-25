<?php

namespace App\Repositories;

use App\Models\AsetRusak;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetRusakRepository
 * @package App\Repositories
 * @version November 7, 2017, 3:51 am UTC
 *
 * @method AsetRusak findWithoutFail($id, $columns = ['*'])
 * @method AsetRusak find($id, $columns = ['*'])
 * @method AsetRusak first($columns = ['*'])
*/
class AsetRusakRepository extends BaseRepository
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
        'langkah_perbaikan',
        'catatan_perbaikan',
        'rekomendasi',
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
        return AsetRusak::class;
    }
}
