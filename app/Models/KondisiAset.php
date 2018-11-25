<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KondisiAset
 * @package App\Models
 * @version November 25, 2018, 11:21 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection AsetTaking
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string nama
 * @property string keterangan
 */
class KondisiAset extends Model
{
    use SoftDeletes;

    public $table = 'kondisi_aset';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'nama' => 'string',
        'keterangan' => 'string'
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
    public function asetTakings()
    {
        return $this->hasMany(\App\Models\AsetTaking::class);
    }
}
