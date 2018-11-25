<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsetPelepasan
 * @package App\Models
 * @version November 7, 2017, 3:50 am UTC
 *
 * @property \App\Models\DataAset dataAset
 * @property \App\User user
 * @property \Illuminate\Database\Eloquent\Collection asetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection grubAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer nomor_surat
 * @property integer data_aset_id
 * @property integer users_id
 * @property string metode_pelepasan
 * @property string catatan
 * @property string foto_saat_ini
 * @property string menyetujui
 * @property string jabatan_menyetujui
 * @property string mengetahui
 * @property string jabatan_mengetahui
 * @property string diajukan
 * @property string jabatan_diajukan
 */
class AsetPelepasan extends Model
{
    use SoftDeletes;

    public $table = 'aset_pelepasan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'metode_pelepasan',
        'catatan',
        'foto_saat_ini',
        'menyetujui',
        'jabatan_menyetujui',
        'mengetahui',
        'jabatan_mengetahui',
        'diajukan',
        'jabatan_diajukan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomor_surat' => 'integer',
        'data_aset_id' => 'integer',
        'users_id' => 'integer',
        'metode_pelepasan' => 'string',
        'catatan' => 'string',
        'foto_saat_ini' => 'string',
        'menyetujui' => 'string',
        'jabatan_menyetujui' => 'string',
        'mengetahui' => 'string',
        'jabatan_mengetahui' => 'string',
        'diajukan' => 'string',
        'jabatan_diajukan' => 'string'
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
    public function user()
    {
        return $this->belongsTo(\App\User::class,'users_id');
    }
}
