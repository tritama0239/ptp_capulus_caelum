<?php

use Illuminate\Support\Facades\Route;

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

Route::get('google', function () {
    return view('googleAuth');
});

Route::get('redirect/{driver}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('redirectToProvider');
Route::get('{driver}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback')->name('handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});

Route::get('login','App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login','App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout','App\Http\Controllers\AuthController@logout')->name('logout');

//auth -> Pegawai || Manager 

Route::group(['middleware' =>['auth']], function(){
    Route::group(['middleware' => ['cek_login:manager']], function(){
        Route::get('/manager', 'App\Http\Controllers\ManagerController@index')->name('v_manager');

        Route::get('/manager/transaksi/viewgrafik', 'App\Http\Controllers\ManagerController@viewgrafik')->name('viewgrafik');

        Route::get('/manager/barang/viewstock', 'App\Http\Controllers\ManagerController@viewstock')->name('viewstock');
        Route::get('/manager/barang/searchstock', 'App\Http\Controllers\ManagerController@searchstock')->name('searchstock');
        Route::get('/manager/barang/viewstock/export/', 'App\Http\Controllers\ManagerController@export')->name('export');

        Route::get('/manager/pesanan/vieworder', 'App\Http\Controllers\ManagerController@vieworder')->name('vieworder');
        Route::get('/manager/barang/searchorder', 'App\Http\Controllers\ManagerController@searchorder')->name('searchorder');
        Route::get('/manager/pesanan/vieworder/export1/', 'App\Http\Controllers\ManagerController@export1')->name('export1');

        Route::get('/manager/transaksi/viewreport', 'App\Http\Controllers\ManagerController@viewreport')->name('viewreport');
        Route::get('/manager/barang/searchreport', 'App\Http\Controllers\ManagerController@searchreport')->name('searchreport');
        Route::get('/manager/transaksi/viewreport/export2/', 'App\Http\Controllers\ManagerController@export2')->name('export2');


    });

    Route::group(['middleware' => ['cek_login:pegawai']], function(){
        Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index')->name('v_pegawai');

        Route::get('/pegawai/barang/addstock', 'App\Http\Controllers\PegawaiController@addstock')->name('addstock');
        Route::post('/pegawai/barang/savestock', 'App\Http\Controllers\PegawaiController@savestock')->name('savestock');
        Route::get('/pegawai/barang/addstock1', 'App\Http\Controllers\PegawaiController@addstock1')->name('addstock1');
        Route::post('/pegawai/barang/savestock1', 'App\Http\Controllers\PegawaiController@savestock1')->name('savestock1');
        Route::get('/pegawai/barang/viewstock', 'App\Http\Controllers\PegawaiController@viewstock')->name('viewstock');
        Route::get('/pegawai/barang/searchstock', 'App\Http\Controllers\PegawaiController@searchstock')->name('searchstock');
        Route::get('/pegawai/barang/editstock/{id_brg}', 'App\Http\Controllers\PegawaiController@editstock')->name('editstock');
        Route::put('/pegawai/barang/updatedstock/{id_brg}', 'App\Http\Controllers\PegawaiController@updatedstock')->name('updatedstock');
        Route::get('/pegawai/barang/deletestock/{id_brg}', 'App\Http\Controllers\PegawaiController@deletestock')->name('deletestock');


        Route::get('/pegawai/pesanan/addorder', 'App\Http\Controllers\PegawaiController@addorder')->name('addorder');
        Route::post('/pegawai/pesanan/saveorder', 'App\Http\Controllers\PegawaiController@saveorder')->name('saveorder');
        Route::get('/pegawai/pesanan/vieworder', 'App\Http\Controllers\PegawaiController@vieworder')->name('vieworder');
        Route::get('/pegawai/pesanan/searchorder', 'App\Http\Controllers\PegawaiController@searchorder')->name('searchorder');
        Route::get('/pegawai/pesanan/editorder/{id_pes}', 'App\Http\Controllers\PegawaiController@editorder')->name('editorder');
        Route::put('/pegawai/pesanan/updatedorder/{id_pes}', 'App\Http\Controllers\PegawaiController@updatedorder')->name('updatedorder');
        Route::get('/pegawai/pesanan/deleteorder/{id_pes}', 'App\Http\Controllers\PegawaiController@deleteorder')->name('deleteorder');

    });
});
Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



