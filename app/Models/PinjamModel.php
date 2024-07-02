<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;
    protected $table        = "peminjaman";
    protected $primaryKey   = "id_pinjam";
    protected $fillable     = ['id_pinjam','nama_petugas','nama_anggota','judul'];

    //relasi ke petugas
    public function petugas()
    {
        return $this->belongsTo('App\Models\PetugasModel', 'nama_petugas');
    }

    //relasi ke anggota
    public function anggota()
    {
        return $this->belongsTo('App\Models\AnggotaModel', 'nama_anggota');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo('App\Models\BukuModel', 'judul');
    }
}