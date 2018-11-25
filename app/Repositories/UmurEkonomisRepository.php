<?php

namespace App\Repositories;

use App\Models\UmurEkonomis;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UmurEkonomisRepository
 * @package App\Repositories
 * @version November 25, 2018, 11:25 am UTC
 *
 * @method UmurEkonomis findWithoutFail($id, $columns = ['*'])
 * @method UmurEkonomis find($id, $columns = ['*'])
 * @method UmurEkonomis first($columns = ['*'])
*/
class UmurEkonomisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'tahun',
        'nilai_rumus'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UmurEkonomis::class;
    }
}
