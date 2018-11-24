<?php

namespace App\Repositories;

use App\Models\Departemen;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DepartemenRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:17 am UTC
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