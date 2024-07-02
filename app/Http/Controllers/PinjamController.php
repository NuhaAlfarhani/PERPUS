<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//memanggil model PinjamModel
use App\Models\PinjamModel;

//memanggil model PetugasModel
use App\Models\PetugasModel;

//memanggil model AnggotaModel
use App\Models\AnggotaModel;

//memanggil model BukuModel
use App\Models\BukuModel;

class PinjamController extends Controller
{
    //method untuk tampil data peminjaman
    public function pinjamtampil()
    {
        $datapinjam = PinjamModel::orderby('id_pinjam', 'ASC')
        ->paginate(5);

        $datapetugas    = PetugasModel::all();
        $dataanggota      = AnggotaModel::all();
        $databuku       = BukuModel::all();

        return view('halaman/view_pinjam',['pinjam'=>$datapinjam,'petugas'=>$datapetugas,'anggota'=>$dataanggota,'buku'=>$databuku]);
    }

    //method untuk tambah data peminjaman
    public function pinjamtambah(Request $request)
{
    Validator::validate($request->all(), [
        'nama_petugas' => 'required',
        'nama_anggota' => 'required',
        'judul' => 'required'
    ]);

    PinjamModel::create([
        'nama_petugas' => $request->nama_petugas,
        'nama_anggota' => $request->nama_anggota,
        'judul' => $request->judul
    ]);

    return redirect('/pinjam');
}

    //method untuk hapus data peminjaman
    public function pinjamhapus($id_pinjam)
    {
        $datapinjam=PinjamModel::find($id_pinjam);
        $datapinjam->delete();

        return redirect()->back();
    }

    //method untuk edit data peminjaman
    public function pinjamedit($id_pinjam, Request $request)
    {
        Validator::validate($request->all(), [
            'nama_petugas' => 'required',
            'nama_anggota' => 'required',
            'judul' => 'required'
        ]);

        $id_pinjam = PinjamModel::find($id_pinjam);
        $id_pinjam->nama_petugas    = $request->nama_petugas;
        $id_pinjam->nama_anggota      = $request->nama_anggota;
        $id_pinjam->judul      = $request->judul;

        $id_pinjam->save();

        return redirect()->back();
    }
}