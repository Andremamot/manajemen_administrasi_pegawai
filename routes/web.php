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


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

//Route untuk user Admin
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    Route::get('/pegawai/index', 'GuruController@index');
    Route::post('/pegawai/tambah', 'GuruController@tambah');
    Route::get('/pegawai/{id}/edit', 'GuruController@edit');
    Route::post('/pegawai/{id}/update', 'GuruController@update');
    Route::get('/pegawai/{id}/delete', 'GuruController@delete');
    Route::resource('/pengguna', 'PenggunaController');
});

//Route untuk user Admin, Petugas Administrasi Surat dan Petugas Administrasi Keuangan
Route::group(['middleware' => ['auth', 'checkRole:admin,PetugasAdministrasiKeuangan,PetugasAdministrasiSurat']], function () {
    Route::get('/', function () {
        return view('/dashboard');
    });

    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/pengumuman/index', 'PengumumanController@index');
    Route::post('/pengumuman/tambah', 'PengumumanController@tambah');
});

//Route untuk user Admin, Petugas Administrasi Surat, Petugas Administrasi Keuangan dan Siswa
Route::group(['middleware' => ['auth', 'checkRole:admin,PetugasAdministrasiKeuangan,PetugasAdministrasiSurat,Siswa']], function () {
    Route::get('/auths/{id}/gantipassword', 'AuthController@gantipassword');
    Route::post('/auths/{id}/simpanpassword', 'AuthController@simpanpassword');
});
