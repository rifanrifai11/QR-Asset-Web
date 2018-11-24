<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
// Zizaco Entrust
    Route::resource('roles', 'RoleController');
    Route::resource('user_role', 'UserRoleController', ['except' => [
        'create', 'store', 'show', 'destroy',
    ]]);
    Route::resource('permissions', 'PermissionController');
    Route::resource('users', 'UserController');
//end Zizaco

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('departemens', 'DepartemenController');

    Route::resource('kondisiAsets', 'KondisiAsetController');

    Route::resource('vendors', 'VendorController');

    Route::resource('mereks', 'MerekController');

    Route::resource('kategoriAsets', 'KategoriAsetController');

    Route::resource('penggunaAsets', 'PenggunaAsetController');

    Route::resource('asets', 'AsetController');

    Route::resource('dataAsets', 'DataAsetController');
    Route::get('report/dataAsets','DataAsetController@downloadPDF');
    Route::get('aset_kode_baru/{grub_aset_kode}',['as'=>'get_aset_kode_baru','uses'=>'DataAsetController@getKodeUrutDataAset']);
    Route::get('download_all_barcode','DataAsetController@downloadAllBarcode');

    Route::get('download_double_barcode/{id}','DataAsetController@downloadDoubleBarcode');

    Route::resource('tipes', 'TipeController');

    Route::resource('umurEkonomis', 'UmurEkonomisController');

    Route::resource('asetTakings', 'AsetTakingController');
    Route::get('report/asetTakings','AsetTakingController@downloadPDF');

    Route::resource('grubAsets', 'GrubAsetController');

    Route::resource('penggunaAsets', 'PenggunaAsetController');

    Route::resource('asets', 'AsetController');

    Route::resource('grubAsets', 'GrubAsetController');

    Route::resource('asetPengembalians', 'AsetPengembalianController');

    Route::resource('asetMutasis', 'AsetMutasiController');

    Route::resource('asetPeminjamen', 'AsetPeminjamanController');
    Route::get('asetPeminjamen/report/{id}','AsetPeminjamanController@print_report');

    Route::resource('asetPelepasans', 'AsetPelepasanController');

    Route::resource('asetBasts', 'AsetBastController');
    Route::get('asetBasts/report/{id}','AsetBastController@print_report');

    Route::resource('asetRusaks', 'AsetRusakController');

    Route::resource('asetHilangs', 'AsetHilangController');

    Route::resource('asetPembelians', 'AsetPembelianController');
    Route::get('asetPembelians/report/{id}','AsetPembelianController@print_report');


//AutoComplete
    Route::get('/tipe/autocomplete',['as'=>'tipe_autocomplete','uses'=>'TipeController@autocomplete']);
    Route::get('/merek/autocomplete',['as'=>'merek_autocomplete','uses'=>'MerekController@autocomplete']);
    Route::get('/vendor/autocomplete',['as'=>'vendor_autocomplete','uses'=>'VendorController@autocomplete']);


    Route::resource('jobsites', 'JobsiteController');
});


Route::resource('lokasis', 'LokasiController');

Route::resource('umurEkonomis', 'UmurEkonomisController');

Route::resource('departemens', 'DepartemenController');

Route::resource('kondisiAsets', 'KondisiAsetController');

Route::resource('kategoriAsets', 'KategoriAsetController');


Route::resource('vendors', 'VendorController');

Route::resource('jobsites', 'JobsiteController');

Route::resource('mereks', 'MerekController');

Route::resource('tipes', 'TipeController');

Route::resource('lokasis', 'LokasiController');

Route::resource('asetTakings', 'AsetTakingController');

Route::resource('penggunaAsets', 'PenggunaAsetController');