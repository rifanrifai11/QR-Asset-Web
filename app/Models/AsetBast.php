<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsetBast
 * @package App\Models
 * @version November 25, 2018, 11:06 am UTC
 *
 * @property \App\Models\Departeman departeman
 * @property \App\Models\Jobsite jobsite
 * @property \App\Models\DataAset dataAset
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string nomor_surat
 * @property integer data_aset_id
 * @property integer users_id
 * @property date tanggal_bast
 * @property string nama
 * @property string nik
 * @property integer departemen_id
 * @property integer jobsite_id
 * @property string jabatan
 * @property string atasan_langsung
 * @property string diserahkan_oleh
 * @property string jabatan_diserahkan
 * @property string cek_oleh
 * @property string jabatan_cek
 * @property string penerima_oleh
 * @property string jabatan_penerima
 * @property string jabatan_project_manager
 * @property string nama_project_manager
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
        'jobsite_id',
        'jabatan',
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
        'nomor_surat' => 'string',
        'data_aset_id' => 'integer',
        'users_id' => 'integer',
        'tanggal_bast' => 'date',
        'nama' => 'string',
        'nik' => 'string',
        'departemen_id' => 'integer',
        'jobsite_id' => 'integer',
        'jabatan' => 'string',
        'atasan_langsung' => 'string',
        'diserahkan_oleh' => 'string',
        'jabatan_diserahkan' => 'string',
        'cek_oleh' => 'string',
        'jabatan_cek' => 'string',
        'penerima_oleh' => 'string',
        'jabatan_penerima' => 'string',
        'jabatan_project_manager' => 'string',
        'nama_project_manager' => 'string'
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
        return $this->belongsTo(\App\Models\User::class);
    }
}
