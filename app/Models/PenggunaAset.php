<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PenggunaAset
 * @package App\Models
 * @version November 24, 2018, 10:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
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

    
}
