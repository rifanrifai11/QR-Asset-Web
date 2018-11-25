<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('aset_basts', 'AsetBastAPIController');

Route::resource('aset_hilangs', 'AsetHilangAPIController');

Route::resource('aset_mutasis', 'AsetMutasiAPIController');

Route::resource('aset_pelepasans', 'AsetPelepasanAPIController');

Route::resource('aset_pembelians', 'AsetPembelianAPIController');

Route::resource('aset_peminjamen', 'AsetPeminjamanAPIController');

Route::resource('aset_pengembalians', 'AsetPengembalianAPIController');

Route::resource('aset_takings', 'AsetTakingAPIController');

Route::resource('data_asets', 'DataAsetAPIController');

Route::resource('departemens', 'DepartemenAPIController');

Route::resource('grup_asets', 'GrupAsetAPIController');

Route::resource('jobsites', 'JobsiteAPIController');

Route::resource('kategori_asets', 'KategoriAsetAPIController');

Route::resource('kondisi_asets', 'KondisiAsetAPIController');

Route::resource('lokasis', 'LokasiAPIController');

Route::resource('mereks', 'MerekAPIController');

Route::resource('pengguna_asets', 'PenggunaAsetAPIController');

Route::resource('permissions', 'PermissionsAPIController');

Route::resource('permission_roles', 'PermissionRoleAPIController');

Route::resource('roles', 'RolesAPIController');

Route::resource('role_users', 'RoleUserAPIController');

Route::resource('tipes', 'TipeAPIController');

Route::resource('umur_ekonomis', 'UmurEkonomisAPIController');

Route::resource('users', 'UsersAPIController');

Route::resource('vendors', 'VendorAPIController');