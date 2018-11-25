<?php

namespace App\Repositories;

use App\Models\Jobsite;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JobsiteRepository
 * @package App\Repositories
 * @version November 12, 2017, 7:17 am UTC
 *
 * @method Jobsite findWithoutFail($id, $columns = ['*'])
 * @method Jobsite find($id, $columns = ['*'])
 * @method Jobsite first($columns = ['*'])
*/
class JobsiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Jobsite::class;
    }
}
