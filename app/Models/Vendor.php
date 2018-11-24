<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vendor
 * @package App\Models
 * @version November 24, 2018, 5:56 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property string kode_registrasi
 * @property string nama
 * @property string alamat
 * @property string kota
 * @property string fax
 * @property string email
 * @property string attn
 * @property string telepon
 * @property string phone
 */
class Vendor extends Model
{
    use SoftDeletes;

    public $table = 'vendor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode_registrasi',
        'nama',
        'alamat',
        'kota',
        'fax',
        'email',
        'attn',
        'telepon',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_registrasi' => 'string',
        'nama' => 'string',
        'alamat' => 'string',
        'kota' => 'string',
        'fax' => 'string',
        'email' => 'string',
        'attn' => 'string',
        'telepon' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
