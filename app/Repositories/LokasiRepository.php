<?php

namespace App\Repositories;

use App\Models\Lokasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class lokasiRepository
 * @package App\Repositories
 * @version February 18, 2018, 1:44 pm UTC
 *
 * @method lokasi findWithoutFail($id, $columns = ['*'])
 * @method lokasi find($id, $columns = ['*'])
 * @method lokasi first($columns = ['*'])
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
        return lokasi::class;
    }
}
