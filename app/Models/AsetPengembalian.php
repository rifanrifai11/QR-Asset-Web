<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsetPengembalian
 * @package App\Models
 * @version November 7, 2017, 3:41 am UTC
 *
 * @property \App\Models\Departeman departeman
 * @property \App\Models\DataAset dataAset
 * @property \App\User user
 * @property \Illuminate\Database\Eloquent\Collection asetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection grubAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer nomor_surat
 * @property integer data_aset_id
 * @property integer users_id
 * @property string nama
 * @property string nik
 * @property string jabatan
 * @property integer departemen_id
 * @property string lokasi
 * @property string atasan_langsung
 * @property string diserahkan
 * @property string jabatan_diserahkan
 * @property string cek
 * @property string jabatan_cek
 * @property string penerima
 * @property string jabatan_penerima
 */
class AsetPengembalian extends Model
{
    use SoftDeletes;

    public $table = 'aset_pengembalian';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'nama',
        'nik',
        'jabatan',
        'departemen_id',
        'lokasi',
        'atasan_langsung',
        'diserahkan',
        'jabatan_diserahkan',
        'cek',
        'jabatan_cek',
        'penerima',
        'jabatan_penerima'
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
        'nama' => 'string',
        'nik' => 'string',
        'jabatan' => 'string',
        'departemen_id' => 'integer',
        'lokasi' => 'string',
        'atasan_langsung' => 'string',
        'diserahkan' => 'string',
        'jabatan_diserahkan' => 'string',
        'cek' => 'string',
        'jabatan_cek' => 'string',
        'penerima' => 'string',
        'jabatan_penerima' => 'string'
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
        return $this->belongsTo(\App\User::class,'users_id');
    }
}
