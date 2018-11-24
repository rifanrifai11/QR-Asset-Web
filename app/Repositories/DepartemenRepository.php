<?php

namespace App\Repositories;

use App\Models\Departemen;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DepartemenRepository
 * @package App\Repositories
 * @version November 24, 2018, 5:49 pm UTC
 *
 * @method Departemen findWithoutFail($id, $columns = ['*'])
 * @method Departemen find($id, $columns = ['*'])
 * @method Departemen first($columns = ['*'])
*/
class DepartemenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama',
        'keterangan',
        'parent_departemen_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Departemen::class;
    }
}
