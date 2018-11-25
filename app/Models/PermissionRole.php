<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PermissionRole
 * @package App\Models
 * @version November 25, 2018, 11:23 am UTC
 *
 * @property \App\Models\Permission permission
 * @property \App\Models\Role role
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer role_id
 */
class PermissionRole extends Model
{
    use SoftDeletes;

    public $table = 'permission_role';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'permission_id' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function permission()
    {
        return $this->belongsTo(\App\Models\Permission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }
}
