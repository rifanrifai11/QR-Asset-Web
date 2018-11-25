<?php

namespace App\Repositories;

use App\Models\Tipe;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipeRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:24 am UTC
 *
 * @method Tipe findWithoutFail($id, $columns = ['*'])
 * @method Tipe find($id, $columns = ['*'])
 * @method Tipe first($columns = ['*'])
*/
class TipeRepository extends BaseRepository
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
        return Tipe::class;
    }
}
