<?php

namespace App\Repositories;

use App\Models\KategoriAset;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KategoriAsetRepository
 * @package App\Repositories
 * @version November 24, 2018, 5:51 pm UTC
 *
 * @method KategoriAset findWithoutFail($id, $columns = ['*'])
 * @method KategoriAset find($id, $columns = ['*'])
 * @method KategoriAset first($columns = ['*'])
*/
class KategoriAsetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KategoriAset::class;
    }
}
