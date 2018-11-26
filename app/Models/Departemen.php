<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departemen
 * @package App\Models
 * @version November 24, 2018, 5:49 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property string kode
 * @property string nama
 * @property string keterangan
 * @property integer parent_departemen_id
 */
class Departemen extends Model
{
    use SoftDeletes;

    public $table = 'departemen';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
        'nama',
        'keterangan',
        'parent_departemen_id'
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
        'keterangan' => 'string',
        'parent_departemen_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
