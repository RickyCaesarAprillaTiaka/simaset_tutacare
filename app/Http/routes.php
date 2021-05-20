<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DashboardController@index');

Route::auth();

Route::group(['middleware' => ['auth']], function () {

  Route::get('user/img/{file}', function($file = null)
  {
      return Mytuta::readFile($file,'user');
  });

  Route::group(['middleware' => ['role:admin']], function () {
    //API User
    Route::post('api/user', 'UserController@getData');
    //users
    Route::resource('dashboard/users', 'UserController');
  });

Route::get('dashboard', 'DashboardController@index');
Route::post('dashboard/asset/add-jenis/store', ['as' => 'dashboard.add-jenis.store', 'uses' => 'JenisController@addJenis']);
Route::post('dashboard/asset/add-cabang/store', ['as' => 'dashboard.add-cabang.store', 'uses' => 'CabangController@addCabang']);
Route::post('dashboard/asset/add-status/store', ['as' => 'dashboard.add-status.store', 'uses' => 'StatusController@addStatus']);
Route::resource('dashboard/cabang', 'CabangController');
Route::resource('dashboard/jenis', 'JenisController');
Route::resource('dashboard/status', 'StatusController');
Route::resource('dashboard/asset', 'AssetController');
Route::get('dashboard/laporan', 'LaporanController@index');
Route::get('dashboard/laporan/pdf', 'LaporanController@pdf');

// profile
Route::resource('dashboard/profile', 'ProfileController');

// Material
Route::resource('dashboard/material', 'MaterialController');

// Proyek
Route::resource('dashboard/proyek', 'ProyekController');
});
