<?php

namespace App\Repositories;

use App\Models\DataAset;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataAsetRepository
 * @package App\Repositories
 * @version December 28, 2017, 11:06 pm UTC
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
        'urut'=> 'like',
        'kode_data_aset'=> 'like',
        'spesifikasi'=> 'like',
        'no_registrasi'=> 'like',
        'tanggal_registrasi'=> 'like',
        'tipe_id'=> 'like',
        'vendor_id'=> 'like',
        'merek_id'=> 'like',
        'lokasi.nama'=> 'like',
        'foto1'=> 'like',
        'foto2'=> 'like',
        'foto3'=> 'like',
        'foto4'=> 'like',
        'grub_aset_kode'=> 'like',
        'jobsite_id'=> 'like',
        'serial_number'=> 'like',
        'departemen_id'=> 'like',
        'merek.nama'=> 'like',
        'tipe.nama'=> 'like',
        'departemen.nama'=> 'like',
        'vendor.nama'=> 'like',
        'jobsite.nama'=> 'like',
        'grub_asets.nama'=> 'like'

    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataAset::class;
    }
}
