<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PenggunaAset
 * @package App\Models
 * @version November 25, 2018, 11:22 am UTC
 *
 * @property \App\Models\Departeman departeman
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string no_bast
 * @property string nama
 * @property string nrp
 * @property string lokasi_kerja
 * @property integer departemen_id
 * @property string atasan_langsung
 * @property string pic_aset
 * @property string posisi
 */
class PenggunaAset extends Model
{
    use SoftDeletes;

    public $table = 'pengguna_aset';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_bast',
        'nama',
        'nrp',
        'lokasi_kerja',
        'departemen_id',
        'atasan_langsung',
        'pic_aset',
        'posisi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no_bast' => 'string',
        'nama' => 'string',
        'nrp' => 'string',
        'lokasi_kerja' => 'string',
        'departemen_id' => 'integer',
        'atasan_langsung' => 'string',
        'pic_aset' => 'string',
        'posisi' => 'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function dataAsets()
    {
        return $this->belongsToMany(\App\Models\DataAset::class, 'data_aset_has_pengguna_aset');
    }
}
