<?php

namespace App\Repositories;

use App\Models\GrubAset;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GrubAsetRepository
 * @package App\Repositories
 * @version November 6, 2017, 11:07 pm UTC
 *
 * @method GrubAset findWithoutFail($id, $columns = ['*'])
 * @method GrubAset find($id, $columns = ['*'])
 * @method GrubAset first($columns = ['*'])
*/
class GrubAsetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'parent_grub_aset_kode',
        'keterangan',
        'umur_ekonomis_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GrubAset::class;
    }
}
