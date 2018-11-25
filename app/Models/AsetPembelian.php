<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsetPembelian
 * @package App\Models
 * @version November 25, 2018, 11:11 am UTC
 *
 * @property \App\Models\DataAset dataAset
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer nomor_surat
 * @property integer data_aset_id
 * @property integer users_id
 * @property string nomor_general_request
 * @property string nomor_purchase_order
 * @property date tanggal_pembelian
 * @property integer harga_barang
 * @property string mengetahui1
 * @property string jabatan_mengetahui1
 * @property string mengetahui2
 * @property string jabatan_mengetahui2
 * @property string check
 * @property string jabatan_check
 * @property string raised_by
 * @property string jabatan_raised_by
 */
class AsetPembelian extends Model
{
    use SoftDeletes;

    public $table = 'aset_pembelian';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'nomor_general_request',
        'nomor_purchase_order',
        'tanggal_pembelian',
        'harga_barang',
        'mengetahui1',
        'jabatan_mengetahui1',
        'mengetahui2',
        'jabatan_mengetahui2',
        'check',
        'jabatan_check',
        'raised_by',
        'jabatan_raised_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomor_surat' => 'integer',
        'data_aset_id' => 'integer',
        'users_id' => 'integer',
        'nomor_general_request' => 'string',
        'nomor_purchase_order' => 'string',
        'tanggal_pembelian' => 'date',
        'harga_barang' => 'integer',
        'mengetahui1' => 'string',
        'jabatan_mengetahui1' => 'string',
        'mengetahui2' => 'string',
        'jabatan_mengetahui2' => 'string',
        'check' => 'string',
        'jabatan_check' => 'string',
        'raised_by' => 'string',
        'jabatan_raised_by' => 'string'
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
    public function dataAset()
    {
        return $this->belongsTo(\App\Models\DataAset::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
