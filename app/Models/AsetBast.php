<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsetBast
 * @package App\Models
 * @version November 7, 2017, 3:50 am UTC
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
 * @property date tanggal_bast
 * @property string nama
 * @property string nik
 * @property integer departemen_id
 * @property string jabatan
 * @property string jobsite
 * @property string atasan_langsung
 * @property string diserahkan_oleh
 * @property string jabatan_diserahkan
 * @property string cek_oleh
 * @property string jabatan_cek
 * @property string penerima_oleh
 * @property string jabatan_penerima
 */
class AsetBast extends Model
{
    use SoftDeletes;

    public $table = 'aset_bast';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'tanggal_bast',
        'nama',
        'nik',
        'departemen_id',
        'jabatan',
        'jobsite_id',
        'atasan_langsung',
        'diserahkan_oleh',
        'jabatan_diserahkan',
        'cek_oleh',
        'jabatan_cek',
        'penerima_oleh',
        'jabatan_penerima',
        'jabatan_project_manager',
        'nama_project_manager'
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
        'tanggal_bast' => 'date',
        'nama' => 'string',
        'nik' => 'string',
        'departemen_id' => 'integer',
        'jabatan' => 'string',
        'jobsite' => 'string',
        'atasan_langsung' => 'string',
        'diserahkan_oleh' => 'string',
        'jabatan_diserahkan' => 'string',
        'cek_oleh' => 'string',
        'jabatan_cek' => 'string',
        'penerima_oleh' => 'string',
        'jabatan_penerima' => 'string',
        'jabatan_project_manager'=> 'string',
        'nama_project_manager'=> 'string'
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
    public function departemen()
    {
        return $this->belongsTo(\App\Models\Departemen::class);
    }

    public function jobsite()
    {
        return $this->belongsTo(\App\Models\Jobsite::class);
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
