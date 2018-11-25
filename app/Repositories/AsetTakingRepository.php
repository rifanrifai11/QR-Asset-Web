<?php

namespace App\Repositories;

use App\Models\AsetTaking;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetTakingRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:14 am UTC
 *
 * @method AsetTaking findWithoutFail($id, $columns = ['*'])
 * @method AsetTaking find($id, $columns = ['*'])
 * @method AsetTaking first($columns = ['*'])
*/
class AsetTakingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'data_aset_id',
        'kondisi_aset_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AsetTaking::class;
    }
}
