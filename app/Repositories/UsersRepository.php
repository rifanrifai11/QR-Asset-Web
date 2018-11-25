<?php

namespace App\Repositories;

use App\Models\Users;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:25 am UTC
 *
 * @method Users findWithoutFail($id, $columns = ['*'])
 * @method Users find($id, $columns = ['*'])
 * @method Users first($columns = ['*'])
*/
class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'kontak',
        'password',
        'remember_token',
        'alamat',
        'foto',
        'verified',
        'verification_token',
        'token_device'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Users::class;
    }
}
