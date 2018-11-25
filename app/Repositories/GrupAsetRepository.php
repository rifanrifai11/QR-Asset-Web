<?php

namespace App\Repositories;

use App\Models\GrupAset;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GrupAsetRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:18 am UTC
 *
 * @method GrupAset findWithoutFail($id, $columns = ['*'])
 * @method GrupAset find($id, $columns = ['*'])
 * @method GrupAset first($columns = ['*'])
*/
class GrupAsetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'parent_grub_aset_kode',
        'keterangan',
        'umur_ekonomis_id',
        'kategori_aset_id',
        'persentase_sisa'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GrupAset::class;
    }
}
