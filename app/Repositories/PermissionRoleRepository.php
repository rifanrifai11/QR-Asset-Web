<?php

namespace App\Repositories;

use App\Models\PermissionRole;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionRoleRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:23 am UTC
 *
 * @method PermissionRole findWithoutFail($id, $columns = ['*'])
 * @method PermissionRole find($id, $columns = ['*'])
 * @method PermissionRole first($columns = ['*'])
*/
class PermissionRoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PermissionRole::class;
    }
}
