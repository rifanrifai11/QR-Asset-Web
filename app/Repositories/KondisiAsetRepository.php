<?php

namespace App\Repositories;

use App\Models\KondisiAset;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KondisiAsetRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:21 am UTC
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
