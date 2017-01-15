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

Route::get('/', function () {
    return view('dashboard.peserta');
});

Route::get('/peserta', function(){
	return view('peserta.index');
});

Route::get('/jurusan', function(){
	return view('peserta.jurusan.index');
});

Route::get('/jurusan', function(){
	return view('peserta.jurusan.index');
});

Route::get('/pengumuman', function(){
	return view('peserta.pengumuman.index');
});

Route::get('/prosedur', function(){
	return view('peserta.prosedur.index');
});

Route::get('/jadwal', function(){
	return view('peserta.jadwal.index');
});

Route::get('/kontak', function(){
	return view('peserta.kontak.index');
});

Route::get('/biodata', function(){
	return view('peserta.biodata.index');
});
Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
	Route::get('setting/password','SettingController@editPassword');
	Route::post('setting/password','SettingController@updatePassword');
	
});
Route::group(['prefix'=>'admin','middleware'=>['auth','operator']],function(){
	Route::get('/',function(){ //masuk ke UserController edit/update
		    return view('dashboard.admin');
		});
	Route::get('password','SettingController@editPasswordAdmin');
	Route::post('password','SettingController@updatePasswordAdmin');
	Route::get('peserta/pdf/{peserta}','PesertaController@pdf');
	Route::resource('peserta','PesertaController');
	Route::resource('jurusan','JurusanController');
	Route::resource('pengumuman','PengumumanController');
	Route::resource('prosedur','ProsedurController');
	Route::resource('jadwal','JadwalController');
	Route::resource('kontak','KontakController');
	Route::resource('operator','OperatorController');
	Route::resource('akunpeserta','AkunpesertaController');
});



Auth::routes();

Route::get('/home', 'HomeController@index');
