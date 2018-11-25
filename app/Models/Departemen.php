<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departemen
 * @package App\Models
 * @version November 25, 2018, 11:17 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection AsetBast
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection AsetMutasi
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection AsetPeminjaman
 * @property \Illuminate\Database\Eloquent\Collection AsetPengembalian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection DataAset
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection PenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string kode
 * @property string nama
 * @property string keterangan
 * @property integer parent_departemen_id
 */
class Departemen extends Model
{
    use SoftDeletes;

    public $table = 'departemen';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
        'nama',
        'keterangan',
        'parent_departemen_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'nama' => 'string',
        'keterangan' => 'string',
        'parent_departemen_id' => 'integer'
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
    public function asetMutasis()
    {
        return $this->hasMany(\App\Models\AsetMutasi::class);
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
    public function dataAsets()
    {
        return $this->hasMany(\App\Models\DataAset::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penggunaAsets()
    {
        return $this->hasMany(\App\Models\PenggunaAset::class);
    }
}
