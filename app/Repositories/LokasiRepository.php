<?php

namespace App\Repositories;

use App\Models\Lokasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LokasiRepository
 * @package App\Repositories
 * @version November 24, 2018, 5:58 pm UTC
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
