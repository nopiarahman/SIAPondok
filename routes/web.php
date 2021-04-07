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
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/profil', 'AuthController@profil');


Route::group(['middleware'=>['auth','checkRole:admin']],function(){
    
    Route::get('/santriuula', 'SantriUulaController@index');
    
    Route::get('/santriwustha', 'SantriWusthaController@index');
    Route::post('/santriwustha', 'SantriWusthaController@store');
    Route::get('/santriwusthatambah', 'SantriWusthaController@create');
    Route::get('/santriwustha/{santriwustha}', 'SantriWusthaController@show');
    Route::delete ('/santriwustha/{santriwustha}','SantriWusthaController@destroy');
    Route::get('/santriwustha/{santriwustha}/edit', 'SantriWusthaController@edit');
    Route::patch('/santriwustha/{santriwustha}','SantriWusthaController@update');
    Route::post('/gantistatus/{santriwustha}','SantriWusthaController@gantistatus');
    
    Route::get('/asatidzah', 'AsatidzahController@index');
    Route::post('/asatidzah', 'AsatidzahController@store');
    Route::get('/asatidzahtambah', 'AsatidzahController@create');
    Route::get('/asatidzah/{asatidzah}', 'AsatidzahController@show');
    Route::delete ('/asatidzah/{asatidzah}','AsatidzahController@destroy');
    Route::get('/asatidzah/{asatidzah}/edit', 'AsatidzahController@edit');
    Route::patch('/asatidzah/{asatidzah}','AsatidzahController@update');
    
    Route::post('/kelas/isiWaliKelas/{kelas}','KelasController@isiWaliKelas');
    Route::post('/kelas/gantiWaliKelas/{kelas}','KelasController@gantiWaliKelas');
    Route::get('/kelas', 'KelasController@index');
    Route::post('/kelas', 'KelasController@store');
    Route::get('/kelas/kelasisi/', 'KelasController@isi');
    Route::post('/kelas/kelasisi/', 'KelasController@isikelas');
    Route::get('/kelastambah', 'KelasController@create');
    Route::get('/kelas/{kelas}', 'KelasController@show');
    Route::delete ('/kelas/{kelas}','KelasController@destroy');
    Route::get('/kelas/{kelas}/edit', 'KelasController@edit');
    Route::patch('/kelas/{kelas}','KelasController@update');

    /* Kelas Tahfidz */
    Route::get('/kelasTahfidz','KelasTahfidzController@index');
    Route::post('/kelasTahfidzTambah','KelasTahfidzController@store');
    Route::post('/kelasTahfidz/isiPengampu/{pengampu}','KelasTahfidzController@isiPengampu');
    Route::get('/kelasTahfidz/kelasisi','KelasTahfidzController@isi');
    Route::post('/kelasTahfidz/kelasisi','KelasTahfidzController@isikelas');
    Route::delete('/kelasTahfidzHapus/{kelas}','KelasTahfidzController@destroy');
    Route::get('/kelasTahfidz/{kelas}', 'KelasTahfidzController@show');
    Route::patch('/kelasTahfidz/{kelas}','KelasTahfidzController@update');
    
    Route::get('/mapel', 'MapelController@index');
    Route::post('/mapel', 'MapelController@store');
    Route::get('/mapeltambah', 'MapelController@create');
    Route::get('/mapel/{mapel}', 'MapelController@show');
    Route::delete ('/mapel/{mapel}','MapelController@destroy');
    Route::get('/mapel/{mapel}/edit', 'MapelController@edit');
    Route::patch('/mapel/{mapel}','MapelController@update');
    
    Route::get('/pelanggaran', 'PelanggaranController@index');
    Route::post('/pelanggaran', 'PelanggaranController@store');
    Route::get('/pelanggarantambah', 'PelanggaranController@create');
    Route::get('/pelanggaran/{pelanggaran}', 'PelanggaranController@show');
    Route::delete ('/pelanggaran/{pelanggaran}','PelanggaranController@destroy');
    Route::get('/pelanggaran/{pelanggaran}/edit', 'PelanggaranController@edit');
    Route::patch('/pelanggaran/{pelanggaran}','PelanggaranController@update');
    
    Route::get('/jadwalbelajar', 'JadwalBelajarController@index');
    Route::get('/jadwalbelajartambah', 'JadwalBelajarController@create');
    Route::post('/jadwalbelajar', 'JadwalBelajarController@store');
    Route::delete ('/jadwalbelajar/{jadwalbelajar}','JadwalBelajarController@destroy');
    Route::get('/jadwalbelajar/{jadwalbelajar}/edit', 'JadwalBelajarController@edit');
    Route::patch('/jadwalbelajar/{jadwalbelajar}','JadwalBelajarController@update');
    
    Route::get('/periode', 'PeriodeController@index');
    Route::post('/periode', 'PeriodeController@store');
    Route::patch('/periode/{periode}', 'PeriodeController@update');
    Route::delete('/periode/{periode}', 'PeriodeController@destroy');
    Route::get('/periode/{id}/aktif', 'PeriodeController@setaktif');

});

Route::group(['middleware'=>['auth','checkRole:admin,asatidzah,waliSantri,kepalaYayasan',]],function(){
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/santriwustha', 'SantriWusthaController@index');
    Route::get('/santriwustha/{santriwustha}', 'SantriWusthaController@show');
    Route::get('/jadwalbelajar', 'JadwalBelajarController@index');
    Route::get('/kelas', 'KelasController@index');
    Route::get('/kelas/kelasisi/', 'KelasController@isi');
    Route::get('/kelas/{kelas}', 'KelasController@show');

    /* Memasukan Nilai Tahfidz */
    Route::get('/carisurah', 'NilaiTahfidzController@loadData');
    Route::post('/testcari', 'NilaiTahfidzController@testcari');

    Route::get('/nilaitahfidz','NilaiTahfidzController@index');
    Route::get('/nilaitahfidz/isi/{nilai}','NilaiTahfidzController@isi');
    Route::delete('/nilaitahfidzhapus/{nilai}','NilaiTahfidzController@destroy');
    Route::post('/nilaitahfidzsantri','NilaiTahfidzController@isinilai');
    Route::get('/cetaknilaitahfidz/{santriwustha}','CetakNilaiController@cetaknilaitahfidz');

    Route::get('/laporan', 'LaporanController@index');
    Route::get('/laporannilai', 'LaporanController@show');
    Route::get('/laporan/{santriwustha}/detail', 'LaporanController@detail');
    Route::get('/cetaknilai/{santriwustha}','CetakNilaiController@cetak');
    Route::get('/cetaknilaisw/{santriwustha}','CetakNilaiController@cetaksw');
    Route::get('/cetaknilaimid/{santriwustha}','CetakNilaiController@cetakmid');
    
    Route::get('/pengumuman','PengumumanController@index');
    Route::get('/pengumumantambah','PengumumanController@create');
    Route::post('/pengumumantambah','PengumumanController@store');
    Route::delete('/pengumumanhapus/{pengumuman}','PengumumanController@destroy');

    Route::get('/nilai', 'NilaiController@index');
    Route::post('/nilaiisiuts/{jadwalbelajar}', 'NilaiController@storeuts');
    Route::post('/nilaiisi/{jadwalbelajar}', 'NilaiController@store');
    Route::get('/nilaitambah', 'NilaiController@create');
    Route::get('/nilai/{jadwalbelajar}','NilaiController@show');
    Route::delete('/nilai/{nilai}','NilaiController@destroy');
    
    Route::get('/dataSantri','WaliKelasController@index');
    
});
Route::group(['middleware'=>['auth','checkRole:waliSantri']],function(){
    Route::get('/walisantriwustha', 'WaliSantriController@lihatsantri');
    Route::get('/lihatnilai', 'WaliSantriController@lihatnilai');
    Route::get('/lihatpelanggaran', 'WaliSantriController@lihatpelanggaran');
    Route::get('/pengumumanWali', 'WaliSantriController@lihatPengumuman');
});

Route::group(['middleware' => ['auth','checkRole:kepalaYayasan']], function () {
    Route::get('/editadmin','KepalaYayasanController@editAdmin');
    Route::post('/admintambah','KepalaYayasanController@admintambah');
    Route::delete('/adminhapus/{admin}','KepalaYayasanController@adminhapus');
    Route::get('/dataSantriUulaa','KepalaYayasanController@datasantriuulaa');
    Route::get('/dataSantriWustha','KepalaYayasanController@datasantriwustha');
    Route::get('/dataSantriBanaat','KepalaYayasanController@datasantribanaat');
    Route::get('/dataSantriUlyaa','KepalaYayasanController@datasantriulyaa');
    Route::get('/dataasatidzah','KepalaYayasanController@dataasatidzah');
    Route::get('/dataasatidzah/{asatidzah}', 'KepalaYayasanController@dataasatidzahshow');
});

Route::get('/profil','HomeController@showChangePasswordForm');
Route::post('/profil','HomeController@changePassword')->name('changePassword');
// Auth::routes();

// Route::get('/index', 'HomeController@index')->name('index');
