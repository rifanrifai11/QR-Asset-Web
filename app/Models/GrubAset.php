<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GrubAset
 * @package App\Models
 * @version November 6, 2017, 11:07 pm UTC
 *
 * @property \App\Models\UmurEkonomi umurEkonomi
 * @property \Illuminate\Database\Eloquent\Collection Aset
 * @property \Illuminate\Database\Eloquent\Collection asetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string nama
 * @property string parent_grub_aset_kode
 * @property string keterangan
 * @property integer umur_ekonomis_id
 */
class GrubAset extends Model
{
    use SoftDeletes;

    public $table = 'grub_aset';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'kode';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
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
        'kategori_aset_id'=>'integer',
        'persentase_sisa'=>'integer'
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
    public function umurEkonomis()
    {
        return $this->belongsTo(\App\Models\UmurEkonomis::class,'umur_ekonomis_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function data_asets()
    {
        return $this->hasMany(\App\Models\DataAset::class);
    }

    public function getKodeUrutBaruAttribute()
    {
        $last=$this->hasMany(\App\Models\DataAset::class)->orderBy('urut','desc')->first();
        if(empty($last)){
            return 1;
        }else{
            return $last->urut+1;
        }
    }

    public function getKodeDataAsetBaruAttribute(){
        $kode_data_aset="EMB/".$this->parent->kode."/".$this->kode."/".substr("000".$this->kode_urut_baru, -3);
        return $kode_data_aset;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function child()
    {
        return $this->hasMany(\App\Models\GrubAset::class,'parent_grub_aset_kode');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parent()
    {
        return $this->belongsTo(\App\Models\GrubAset::class,'parent_grub_aset_kode');
    }

    public function kategori_aset()
    {
        return $this->belongsTo(\App\Models\KategoriAset::class);
    }

    public function getKodeNamaAttribute(){
        return $this->kode.'-'.$this->nama;
    }

}
