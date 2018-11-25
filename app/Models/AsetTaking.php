<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsetTaking
 * @package App\Models
 * @version November 25, 2018, 11:14 am UTC
 *
 * @property \App\Models\DataAset dataAset
 * @property \App\Models\KondisiAset kondisiAset
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer users_id
 * @property integer data_aset_id
 * @property string kondisi_aset_id
 */
class AsetTaking extends Model
{
    use SoftDeletes;

    public $table = 'aset_taking';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'users_id',
        'data_aset_id',
        'kondisi_aset_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'users_id' => 'integer',
        'data_aset_id' => 'integer',
        'kondisi_aset_id' => 'string'
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
    public function dataAset()
    {
        return $this->belongsTo(\App\Models\DataAset::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kondisiAset()
    {
        return $this->belongsTo(\App\Models\KondisiAset::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
