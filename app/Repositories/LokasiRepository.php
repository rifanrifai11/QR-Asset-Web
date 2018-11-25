<?php

namespace App\Repositories;

use App\Models\Lokasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LokasiRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:21 am UTC
 *
 * @method Lokasi findWithoutFail($id, $columns = ['*'])
 * @method Lokasi find($id, $columns = ['*'])
 * @method Lokasi first($columns = ['*'])
*/
class LokasiRepository extends BaseRepository
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
        return Lokasi::class;
    }
}
