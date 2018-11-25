<?php

namespace App\Repositories;

use App\Models\DataAset;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataAsetRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:15 am UTC
 *
 * @method DataAset findWithoutFail($id, $columns = ['*'])
 * @method DataAset find($id, $columns = ['*'])
 * @method DataAset first($columns = ['*'])
*/
class DataAsetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'urut',
        'kode_data_aset',
        'spesifikasi',
        'no_registrasi',
        'tanggal_registrasi',
        'lokasi_id',
        'tipe_id',
        'vendor_id',
        'merek_id',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'grub_aset_kode',
        'jobsite_id',
        'serial_number',
        'departemen_id',
        'keterangan',
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataAset::class;
    }
}
