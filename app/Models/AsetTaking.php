<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsetTaking
 * @package App\Models
 * @version November 24, 2018, 7:43 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property integer users_id
 * @property integer data_aset_id
 * @property string kondisi_aset_id
 */
class AsetTaking extends Model
{
    use SoftDeletes;

    public $table = 'aset_taking';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'users_id',
        'data_aset_id',
        'kondisi_aset_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'users_id' => 'integer',
        'data_aset_id' => 'integer',
        'kondisi_aset_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
