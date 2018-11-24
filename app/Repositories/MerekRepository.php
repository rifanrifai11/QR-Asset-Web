<?php

namespace App\Repositories;

use App\Models\Merek;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MerekRepository
 * @package App\Repositories
 * @version November 24, 2018, 5:57 pm UTC
 *
 * @method Merek findWithoutFail($id, $columns = ['*'])
 * @method Merek find($id, $columns = ['*'])
 * @method Merek first($columns = ['*'])
*/
class MerekRepository extends BaseRepository
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
        return Merek::class;
    }
}
