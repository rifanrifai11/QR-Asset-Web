<?php

namespace App\Repositories;

use App\Models\KondisiAset;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KondisiAsetRepository
 * @package App\Repositories
 * @version November 24, 2018, 5:50 pm UTC
 *
 * @method KondisiAset findWithoutFail($id, $columns = ['*'])
 * @method KondisiAset find($id, $columns = ['*'])
 * @method KondisiAset first($columns = ['*'])
*/
class KondisiAsetRepository extends BaseRepository
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
        return KondisiAset::class;
    }
}
