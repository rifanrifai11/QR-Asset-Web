<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsetMutasi
 * @package App\Models
 * @version November 25, 2018, 11:09 am UTC
 *
 * @property \App\Models\Departeman departeman
 * @property \App\Models\DataAset dataAset
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer nomor_surat
 * @property integer data_aset_id
 * @property integer users_id
 * @property string nama_pengguna_baru
 * @property string posisi_pengguna_baru
 * @property string jabatan_pengguna_baru
 * @property integer departemen_id
 * @property string mengetahui
 * @property string jabatan_mengetahui
 * @property string diserahkan
 * @property string jabatan_diserahkan
 */
class AsetMutasi extends Model
{
    use SoftDeletes;

    public $table = 'aset_mutasi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'nama_pengguna_baru',
        'posisi_pengguna_baru',
        'jabatan_pengguna_baru',
        'departemen_id',
        'mengetahui',
        'jabatan_mengetahui',
        'diserahkan',
        'jabatan_diserahkan'
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
        'nama_pengguna_baru' => 'string',
        'posisi_pengguna_baru' => 'string',
        'jabatan_pengguna_baru' => 'string',
        'departemen_id' => 'integer',
        'mengetahui' => 'string',
        'jabatan_mengetahui' => 'string',
        'diserahkan' => 'string',
        'jabatan_diserahkan' => 'string'
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
    public function departeman()
    {
        return $this->belongsTo(\App\Models\Departeman::class);
    }

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
        return $this->belongsTo(\App\Models\User::class);
    }
}
