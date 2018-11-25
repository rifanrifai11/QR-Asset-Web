<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataAset
 * @package App\Models
 * @version November 4, 2017, 9:21 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection AsetBast
 * @property \Illuminate\Database\Eloquent\Collection asetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection AsetHilang
 * @property \Illuminate\Database\Eloquent\Collection AsetMutasi
 * @property \Illuminate\Database\Eloquent\Collection AsetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection AsetPembelian
 * @property \Illuminate\Database\Eloquent\Collection AsetPeminjaman
 * @property \Illuminate\Database\Eloquent\Collection AsetPengembalian
 * @property \Illuminate\Database\Eloquent\Collection AsetRusak
 * @property \Illuminate\Database\Eloquent\Collection AsetTaking
 * @property \Illuminate\Database\Eloquent\Collection grubAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer aset_id
 * @property integer urut
 * @property string kode_data_aset
 * @property string spesifikasi
 * @property date tanggal_registrasi
 * @property string foto1
 * @property string foto2
 * @property string foto3
 * @property string foto4
 */
class DataAset extends Model
{
    use SoftDeletes;

    public $table = 'data_aset';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama',
        'grub_aset_kode',
        'urut',
        'kode_data_aset',
        'tipe_id',
        'merek_id',
        'vendor_id',
        'spesifikasi',
        'no_registrasi',
        'tanggal_registrasi',
        'jobsite_id',
        'departemen_id',
        'lokasi_id',
        'foto1',
        'foto2',
        'foto3',
        'foto4'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama'=>'string',
        'grub_aset_kode' => 'string',
        'urut' => 'integer',
        'kode_data_aset' => 'string',
        'tipe_id'=> 'integer',
        'merek_id'=> 'integer',
        'vendor_id'=> 'integer',
        'spesifikasi' => 'string',
        'no_registrasi'=>'string',
        'tanggal_registrasi' => 'date',
        'jobsite_id'=>'integer',
        'departemen_id'=>'integer',
        'foto1' => 'string',
        'foto2' => 'string',
        'foto3' => 'string',
        'foto4' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    protected $appends = ['nilai_sisa','masa_pakai_bulan',
        'masa_pakai_tahun','harga_sekarang_bulan','harga_sekarang_tahun',
        'penyusutan_per_bulan','penyusutan_per_tahun','kondisi'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function grub_asets()
    {
        return $this->belongsTo(\App\Models\GrubAset::class,'grub_aset_kode');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asetBasts()
    {
        return $this->hasMany(\App\Models\AsetBast::class);
    }

    public function latestAsetBasts()
    {
        return $this->hasMany(\App\Models\AsetBast::class)->latest()->first();
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

    public function latestAsetPembelian()
    {
        return $this->hasMany(\App\Models\AsetPembelian::class)->latest();
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

    public function latestAsetTakings()
    {
        return $this->hasMany(\App\Models\AsetTaking::class)->latest();
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

    public function departemen()
    {
        return $this->belongsTo(\App\Models\Departemen::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vendor()
    {
        return $this->belongsTo(\App\Models\Vendor::class);
    }

    public function jobsite()
    {
        return $this->belongsTo(\App\Models\Jobsite::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(\App\Models\Lokasi::class);
    }

    public function getNilaiSisaAttribute(){
        return $this->grub_asets->umurEkonomis->nilai_rumus* $this->latestAsetPembelian()->first()->harga_barang;
    }

    public function getPenyusutanPerTahunAttribute(){
        return ($this->latestAsetPembelian()->first()->harga_barang-$this->nilai_sisa)/$this->grub_asets->umurEkonomis->tahun;
    }

    public function getPenyusutanPerBulanAttribute(){
        return $this->penyusutan_per_tahun/12;
    }

    public function getMasaPakaiBulanAttribute(){
        $now=Carbon::now();
        $tanggal_pembelian=Carbon::parse($this->latestAsetPembelian()->first()->tanggal_pembelian);
        return $now->diffInMonths($tanggal_pembelian);
    }

    public function getMasaPakaiTahunAttribute(){
        $now=Carbon::now();
        $tanggal_pembelian=Carbon::parse( $this->latestAsetPembelian()->first()->tanggal_pembelian);
        return $now->diffInYears($tanggal_pembelian);
    }

    public function getHargaSekarangBulanAttribute(){
        if($this->masa_pakai_bulan<=$this->grub_asets->umurEkonomis->tahun*12){
            return $this->latestAsetPembelian()->first()->harga_barang-$this->masa_pakai_bulan*$this->penyusutan_per_bulan;
        }else{
            return $this->latestAsetPembelian()->first()->harga_barang*$this->grub_asets->persentase_sisa/100;
        }
    }

    public function getHargaSekarangTahunAttribute(){
        if($this->masa_pakai_tahun<=$this->grub_asets->umurEkonomis->tahun){
            return $this->latestAsetPembelian()->first()->harga_barang-$this->masa_pakai_tahun*$this->penyusutan_per_tahun;
        }else{
            return $this->latestAsetPembelian()->first()->harga_barang*$this->grub_asets->persentase_sisa/100;
        }
    }

    public function getKondisiAttribute(){
        if(is_null($this->latestAsetTakings())<=0){
            return "Baik";
        }else{
            return $this->latestAsetTakings()->kondisiAset->nama;
        }
    }


}
