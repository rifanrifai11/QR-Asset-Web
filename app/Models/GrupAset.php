<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GrupAset
 * @package App\Models
 * @version November 25, 2018, 11:18 am UTC
 *
 * @property \App\Models\KategoriAset kategoriAset
 * @property \App\Models\UmurEkonomi umurEkonomi
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection DataAset
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string nama
 * @property string parent_grub_aset_kode
 * @property string keterangan
 * @property integer umur_ekonomis_id
 * @property integer kategori_aset_id
 * @property integer persentase_sisa
 */
class GrupAset extends Model
{
    use SoftDeletes;

    public $table = 'grub_aset';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'parent_grub_aset_kode',
        'keterangan',
        'umur_ekonomis_id',
        'kategori_aset_id',
        'persentase_sisa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kode' => 'string',
        'nama' => 'string',
        'parent_grub_aset_kode' => 'string',
        'keterangan' => 'string',
        'umur_ekonomis_id' => 'integer',
        'kategori_aset_id' => 'integer',
        'persentase_sisa' => 'integer'
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
    public function kategoriAset()
    {
        return $this->belongsTo(\App\Models\KategoriAset::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function umurEkonomi()
    {
        return $this->belongsTo(\App\Models\UmurEkonomi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dataAsets()
    {
        return $this->hasMany(\App\Models\DataAset::class);
    }
}
