<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsetPeminjaman
 * @package App\Models
 * @version November 25, 2018, 11:12 am UTC
 *
 * @property \App\Models\Departeman departeman
 * @property \App\Models\DataAset dataAset
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection asetHilang
 * @property \Illuminate\Database\Eloquent\Collection asetPelepasan
 * @property \Illuminate\Database\Eloquent\Collection asetPembelian
 * @property \Illuminate\Database\Eloquent\Collection asetRusak
 * @property \Illuminate\Database\Eloquent\Collection dataAsetHasPenggunaAset
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer nomor_surat
 * @property integer data_aset_id
 * @property integer users_id
 * @property string nomor_peminjam
 * @property string nama_peminjam
 * @property string nrp
 * @property integer departemen_id
 * @property string jabatan
 * @property string alasan
 * @property date tanggal_peminjaman
 * @property time waktu_peminjaman_awal
 * @property time waktu_peminjaman_akhir
 * @property date tanggal_pengembalian
 * @property string|\Carbon\Carbon waktu_pengembalian
 * @property string jabatan_peminjam
 * @property string mengetahui
 * @property string jabatan_mengetahui
 */
class AsetPeminjaman extends Model
{
    use SoftDeletes;

    public $table = 'aset_peminjaman';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomor_surat',
        'data_aset_id',
        'users_id',
        'nomor_peminjam',
        'nama_peminjam',
        'nrp',
        'departemen_id',
        'jabatan',
        'alasan',
        'tanggal_peminjaman',
        'waktu_peminjaman_awal',
        'waktu_peminjaman_akhir',
        'tanggal_pengembalian',
        'waktu_pengembalian',
        'jabatan_peminjam',
        'mengetahui',
        'jabatan_mengetahui'
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
        'nomor_peminjam' => 'string',
        'nama_peminjam' => 'string',
        'nrp' => 'string',
        'departemen_id' => 'integer',
        'jabatan' => 'string',
        'alasan' => 'string',
        'tanggal_peminjaman' => 'date',
        'tanggal_pengembalian' => 'date',
        'jabatan_peminjam' => 'string',
        'mengetahui' => 'string',
        'jabatan_mengetahui' => 'string'
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
    public function departeman()
    {
        return $this->belongsTo(\App\Models\Departeman::class);
    }

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
