<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Users
 * @package App\Models
 * @version November 25, 2018, 11:25 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection AsetBast
 * @property \Illuminate\Database\Eloquent\Collection AsetHilang
 * @property \Illuminate\Database\Eloquent\Collection AsetMutasi
 * @property \Illuminate\Database\Eloquent\Collection AsetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection AsetPembelian
 * @property \Illuminate\Database\Eloquent\Collection AsetPeminjaman
 * @property \Illuminate\Database\Eloquent\Collection AsetPengembalian
 * @property \Illuminate\Database\Eloquent\Collection AsetRusak
 * @property \Illuminate\Database\Eloquent\Collection AsetTaking
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string name
 * @property string email
 * @property string kontak
 * @property string password
 * @property string remember_token
 * @property string alamat
 * @property string foto
 * @property boolean verified
 * @property string verification_token
 * @property string token_device
 */
class Users extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'kontak' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'alamat' => 'string',
        'foto' => 'string',
        'verified' => 'boolean',
        'verification_token' => 'string',
        'token_device' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetBasts()
    {
        return $this->hasMany(\App\Models\AsetBast::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetHilangs()
    {
        return $this->hasMany(\App\Models\AsetHilang::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetMutasis()
    {
        return $this->hasMany(\App\Models\AsetMutasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetPelepasans()
    {
        return $this->hasMany(\App\Models\AsetPelepasan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetPembelians()
    {
        return $this->hasMany(\App\Models\AsetPembelian::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetPeminjamen()
    {
        return $this->hasMany(\App\Models\AsetPeminjaman::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetPengembalians()
    {
        return $this->hasMany(\App\Models\AsetPengembalian::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetRusaks()
    {
        return $this->hasMany(\App\Models\AsetRusak::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetTakings()
    {
        return $this->hasMany(\App\Models\AsetTaking::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'role_user');
    }
}
