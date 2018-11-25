<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataAset
 * @package App\Models
 * @version November 25, 2018, 11:15 am UTC
 *
 * @property \App\Models\Departeman departeman
 * @property \App\Models\GrubAset grubAset
 * @property \App\Models\Jobsite jobsite
 * @property \App\Models\Lokasi lokasi
 * @property \App\Models\Merek merek
 * @property \App\Models\Tipe tipe
 * @property \App\Models\Vendor vendor
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
 * @property integer urut
 * @property string kode_data_aset
 * @property string spesifikasi
 * @property string no_registrasi
 * @property date tanggal_registrasi
 * @property integer lokasi_id
 * @property integer tipe_id
 * @property integer vendor_id
 * @property integer merek_id
 * @property string foto1
 * @property string foto2
 * @property string foto3
 * @property string foto4
 * @property string grub_aset_kode
 * @property integer jobsite_id
 * @property string serial_number
 * @property integer departemen_id
 * @property string keterangan
 * @property string nama
 */
class DataAset extends Model
{
    use SoftDeletes;

    public $table = 'data_aset';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'urut',
        'kode_data_aset',
        'spesifikasi',
        'no_registrasi',
        'tanggal_registrasi',
        'lokasi_id',
        'tipe_id',
        'vendor_id',
        'merek_id',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'grub_aset_kode',
        'jobsite_id',
        'serial_number',
        'departemen_id',
        'keterangan',
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'urut' => 'integer',
        'kode_data_aset' => 'string',
        'spesifikasi' => 'string',
        'no_registrasi' => 'string',
        'tanggal_registrasi' => 'date',
        'lokasi_id' => 'integer',
        'tipe_id' => 'integer',
        'vendor_id' => 'integer',
        'merek_id' => 'integer',
        'foto1' => 'string',
        'foto2' => 'string',
        'foto3' => 'string',
        'foto4' => 'string',
        'grub_aset_kode' => 'string',
        'jobsite_id' => 'integer',
        'serial_number' => 'string',
        'departemen_id' => 'integer',
        'keterangan' => 'string',
        'nama' => 'string'
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
    public function grubAset()
    {
        return $this->belongsTo(\App\Models\GrubAset::class);
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
    public function lokasi()
    {
        return $this->belongsTo(\App\Models\Lokasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function merek()
    {
        return $this->belongsTo(\App\Models\Merek::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipe()
    {
        return $this->belongsTo(\App\Models\Tipe::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vendor()
    {
        return $this->belongsTo(\App\Models\Vendor::class);
    }

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
    public function penggunaAsets()
    {
        return $this->belongsToMany(\App\Models\PenggunaAset::class, 'data_aset_has_pengguna_aset');
    }
}
