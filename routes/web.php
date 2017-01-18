<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PengunjungController@index');
Route::get('peserta','PengunjungController@peserta');
Route::get('pengumuman','PengunjungController@pengumuman');
Route::get('prosedur','PengunjungController@prosedur');
Route::get('jadwal','PengunjungController@jadwal');
Route::get('kontak','PengunjungController@kontak');
Route::post('kontak','PengunjungController@kirim');

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>['auth','role:peserta']],function(){
	Route::get('biodata/{peserta}/pdf','BiodataController@pdf');
	Route::resource('biodata', 'BiodataController');
	Route::get('setting/password','SettingController@editPassword');
	Route::post('setting/password','SettingController@updatePassword');
	
});

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|operator']],function(){
	Route::get('/',function(){ //masuk ke UserController edit/update
		    return view('dashboard.admin');
		});
	Route::get('password','SettingController@editPasswordAdmin');
	Route::post('password','SettingController@updatePasswordAdmin');

	Route::get('peserta/status/{peserta}/edit','PesertaController@status');
	Route::patch('peserta/status/{peserta}','PesertaController@updateStatus');

	Route::get('peserta/{peserta}/pdf','PesertaController@pdf');
	Route::resource('peserta','PesertaController');
	Route::resource('jurusan','JurusanController');
	Route::resource('pengumuman','PengumumanController');
	Route::resource('prosedur','ProsedurController');
	Route::resource('jadwal','JadwalController');
	Route::resource('kontak','KontakController');
});

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function(){
	Route::resource('status','StatusController');
	Route::resource('operator','OperatorController');
	Route::resource('akunpeserta','AkunpesertaController');
});