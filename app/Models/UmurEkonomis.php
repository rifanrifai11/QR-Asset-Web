<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UmurEkonomis
 * @package App\Models
 * @version November 24, 2018, 5:49 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property string nama
 * @property integer tahun
 * @property float nilai_rumus
 */
class UmurEkonomis extends Model
{
    use SoftDeletes;

    public $table = 'umur_ekonomis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'tahun',
        'nilai_rumus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'tahun' => 'integer',
        'nilai_rumus' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
