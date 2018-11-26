<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KategoriAset
 * @package App\Models
 * @version November 24, 2018, 5:51 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property string kode
 * @property string nama
 * @property string keterangan
 */
class KategoriAset extends Model
{
    use SoftDeletes;

    public $table = 'kategori_aset';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
        'nama',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'nama' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
