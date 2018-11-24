<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Merek
 * @package App\Models
 * @version November 24, 2018, 5:57 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property string nama
 * @property string keterangan
 */
class Merek extends Model
{
    use SoftDeletes;

    public $table = 'merek';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
