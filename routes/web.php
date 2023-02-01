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

// Route::get('/', function () {
//     return view('welcome');
//     }
// );

//FrontEnd
Route::get('/', 'FrontEnd\HomeController@index')->name('home');
Route::get('/FasilitasDanLayanan', 'FrontEnd\FasilitasDanLayananController@index')->name('fasilitas');
Route::get('/TenagaMedis', 'FrontEnd\TenagaMedisController@index')->name('tenagaMedis');
Route::get('/DaftarOnline', 'FrontEnd\DaftarOnlineController@index')->name('daftarOnline');
Route::post('/registrasiOnline', 'FrontEnd\DaftarOnlineController@registrasi')->name('daftarOnline.registrasi');
Route::post('/checkPasien', 'FrontEnd\DaftarOnlineController@check_pasien')->name('daftarOnline.checkPasien');
Route::post('/daftarAntrian', 'FrontEnd\DaftarOnlineController@daftar_antrian')->name('daftarOnline.daftarAntrian');
Route::get('/antrianSaatIni', 'FrontEnd\DaftarOnlineController@antrian_saat_ini')->name('daftarOnline.antrianSaatIni');


//Main
Route::get('/dashboard', 'MainController@index')->name('dashboard')->middleware('auth');

//Obat

Route::get('/obat', 'ObatController@index')->name('obat')->middleware('auth');

Route::delete('/obat/hapus/{id}','ObatController@hapus_obat')->name('obat.destroy')->middleware('auth','staff');

Route::get('/obat/edit/{id}', 'ObatController@edit_obat')->name('obat.edit')->middleware('auth','staff');

Route::get('/obat/tambah/', 'ObatController@tambah_obat')->name('obat.tambah')->middleware('auth','staff');

Route::post('/obat/tambah/simpan', 'ObatController@simpan_obat')->name('obat.simpan')->middleware('auth','staff');

Route::post('/obat/edit/update/', 'ObatController@update_obat')->name('obat.update')->middleware('auth','staff');
//End Obat

//Lab

Route::get('/lab', 'LabController@index')->name('lab')->middleware('auth');

Route::delete('/lab/hapus/{id}','LabController@hapus_lab')->name('lab.destroy')->middleware('auth','staff');

Route::get('/lab/edit/{id}', 'LabController@edit_lab')->name('lab.edit')->middleware('auth','staff');

Route::get('/lab/tambah', 'LabController@tambah_lab')->name('lab.tambah')->middleware('auth','staff');

Route::post('/lab/tambah/simpan', 'LabController@simpan_lab')->name('lab.simpan')->middleware('auth','staff');

Route::post('/lab/edit/update/', 'LabController@update_lab')->name('lab.update')->middleware('auth','staff');
//End Lab

//rm

Route::get('/rm', 'RMController@index')->name('rm')->middleware('auth');

Route::delete('/rm/hapus/{id}','RMController@hapus_rm')->name('rm.destroy')->middleware('auth');

Route::get('/rm/edit/{id}', 'RMController@edit_rm')->name('rm.edit')->middleware('auth');

Route::get('/rm/tambah', 'RMController@tambah_rm')->name('rm.tambah')->middleware('auth');

Route::get('/rm/tambah/{idpasien}', 'RMController@tambah_rmid')->name('rm.tambah.id')->middleware('auth');

Route::post('/rm/simpan/', 'RMController@simpan_rm')->name('rm.simpan')->middleware('auth');

Route::post('/rm/update/', 'RMController@update_rm')->name('rm.update')->middleware('auth');

Route::get('/rm/list/{idpasien}', 'RMController@list_rm')->name('rm.list')->middleware('auth');

Route::get('/rm/lihat/{id}', 'RMController@lihat_rm')->name('rm.lihat')->middleware('auth');
//End rm

//Tagihan
Route::get('/tagihan/{id}', 'RMController@tagihan')->name('tagihan')->middleware('auth');
//Endtagihan

//Tagihan
Route::get('/pengaturan', 'PengaturanController@index')->name('pengaturan')->middleware('auth','admin');

Route::patch('/pengaturan/simpan', 'PengaturanController@simpan')->name('pengaturan.simpan')->middleware('auth','admin');
//Endtagihan

//Profile
Auth::routes([
  'register' => true,
  'verify' => false,
  'reset' => false
]);

Route::group(['prefix' => 'users'], function(){
    Route::auth();
});

Route::get('users/profile', 'ProfileController@index')->name('profile.edit')->middleware('auth');

Route::get('users/profile/{id}', 'ProfileController@edit')->name('profile.edit.admin')->middleware('auth','admin');

Route::patch('users/profile/simpan', 'ProfileController@simpan')->name('profile.simpan')->middleware('auth');\
//endProfile

//Users
Route::get('/users', 'UserController@index')->name('user')->middleware('auth','admin');

Route::delete('/users/delete/{id}', 'UserController@hapus')->name('user.destroy')->middleware('auth','admin');


//endUsers

Route::group(['prefix'=>'agama','as'=>'agama.'], function()
{
  Route::get('/select', ['as' => 'select', 'uses' => 'AgamaController@select']);
});

Route::group(['prefix'=>'poli','as'=>'poli.'], function()
{
  Route::get('/select', ['as' => 'select', 'uses' => 'BackEnd\PoliController@select']);
});



Route::group(['middleware' => ['auth']], function () {
  Route::group(['prefix'=>'pasien','as'=>'pasien'], function()
  {
    Route::get('/', ['uses' => 'PasienController@index']);
    Route::get('/tambah', ['as' => '.tambah', 'uses' => 'PasienController@tambah_pasien']);
    Route::post('/tambah/simpan', ['as' => '.simpan', 'uses' => 'PasienController@simpan_pasien']);
    Route::get('/edit/update', ['as' => '.update', 'uses' => 'PasienController@update_pasien']);
    Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'PasienController@edit_pasien']);
    Route::delete('/hapus/{id}', ['as' => '.destroy', 'uses' => 'PasienController@hapus_pasien']);
  });

  Route::group(['prefix'=>'poli','as'=>'poli'], function()
  {
    Route::get('/', ['uses' => 'BackEnd\PoliController@index']);
    Route::post('/insert_update', ['as' => '.insert_update','uses' => 'BackEnd\PoliController@insert_update']);
    Route::post('/delete', ['as' => '.delete','uses' => 'BackEnd\PoliController@delete']);
    Route::get('/show', ['as' => '.show', 'uses' => 'BackEnd\PoliController@show']);

  });
});
