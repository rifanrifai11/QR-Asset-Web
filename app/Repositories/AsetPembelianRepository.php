<?php

namespace App\Repositories;

use App\Models\AsetPembelian;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsetPembelianRepository
 * @package App\Repositories
 * @version November 7, 2017, 3:51 am UTC
 *
 * @method AsetPembelian findWithoutFail($id, $columns = ['*'])
 * @method AsetPembelian find($id, $columns = ['*'])
 * @method AsetPembelian first($columns = ['*'])
*/
class AsetPembelianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return AsetPembelian::class;
    }
}
