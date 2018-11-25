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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');















Route::resource('asetBasts', 'AsetBastController');

Route::resource('asetHilangs', 'AsetHilangController');

Route::resource('asetMutasis', 'AsetMutasiController');

Route::resource('asetPelepasans', 'AsetPelepasanController');

Route::resource('asetPembelians', 'AsetPembelianController');

Route::resource('asetPeminjamen', 'AsetPeminjamanController');

Route::resource('asetPengembalians', 'AsetPengembalianController');

Route::resource('asetTakings', 'AsetTakingController');

Route::resource('dataAsets', 'DataAsetController');

Route::resource('departemens', 'DepartemenController');

Route::resource('grupAsets', 'GrupAsetController');

Route::resource('jobsites', 'JobsiteController');

Route::resource('kategoriAsets', 'KategoriAsetController');

Route::resource('kondisiAsets', 'KondisiAsetController');

Route::resource('lokasis', 'LokasiController');

Route::resource('mereks', 'MerekController');

Route::resource('penggunaAsets', 'PenggunaAsetController');

Route::resource('permissions', 'PermissionsController');

Route::resource('permissionRoles', 'PermissionRoleController');

Route::resource('roles', 'RolesController');

Route::resource('roleUsers', 'RoleUserController');

Route::resource('tipes', 'TipeController');

Route::resource('umurEkonomis', 'UmurEkonomisController');

Route::resource('users', 'UsersController');

Route::resource('vendors', 'VendorController');