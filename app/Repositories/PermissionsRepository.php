<?php

namespace App\Repositories;

use App\Models\Permissions;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionsRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:23 am UTC
 *
 * @method Permissions findWithoutFail($id, $columns = ['*'])
 * @method Permissions find($id, $columns = ['*'])
 * @method Permissions first($columns = ['*'])
*/
class PermissionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'display_name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Permissions::class;
    }
}
