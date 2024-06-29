<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

//Route untuk Data Buku
Route :: get('/buku','App\Http\Controllers\BukuController@bukutampil');
Route :: post('/buku/tambah','App\Http\Controllers\BukuController@bukutambah');
Route :: get('/buku/hapus/(id_buku)','BukuController@bukuhapus');
Route :: put('/buku/edit(id_buku)','BukuController@bukuedit');

//Route untuk Data Buku
Route :: get('/home',function(){return view('halaman\view_home');});
Route :: post('/buku/tambah','BukuController@bukutambah');
Route :: get('/buku/hapus/(id_buku)','BukuController@bukuhapus');
Route :: put('/buku/edit(id_buku)','BukuController@bukuedit');

//Route untuk Data Anggota
Route :: get('/anggota','App\Http\Controllers\AnggotaController@anggotatampil');
Route :: post('/anggota/tambah','AnggotaController@anggotatambah');
Route :: get('/anggota/hapus/(id_anggota)','AnggotaController@anggotahapus');
Route :: put('/anggota/edit(id_anggota)','AnggotaController@anggotaedit');

//Route untuk Data Petugas
Route :: get('/petugas','App\Http\Controllers\PetugasController@petugastampil');
Route :: post('/petugas/tambah','PetugasController@petugastambah');
Route :: get('/petugas/hapus/(id_petugas)','PetugasController@petugashapus');
Route :: put('/buku/edit(id_petugas)','PetugasController@petugasedit');

//Route untuk Data Peminjaman
Route :: get('/pinjam','App\Http\Controllers\PinjamController@pinjamtampil');
Route :: post('/pinjam/tambah','PinjamController@pinjamtambah');
Route :: get('/pinjam/hapus/(id_pinjam)','PinjamController@pinjamhapus');
Route :: put('/pinjam/edit(id_pinjam)','PinjamController@pinjamedit');




