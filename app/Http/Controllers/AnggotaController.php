<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//panggil model BukuModel
use App\Models\AnggotaModel;

class AnggotaController extends Controller
{
    //method untuk tampil data anggota
    public function anggotatampil()
    {
        $dataanggota = AnggotaModel::orderby('id_anggota', 'ASC')
        ->paginate(5);

        return view('halaman/view_anggota',['anggota'=>$dataanggota]);
    }

    //method untuk tambah data anggota
    public function anggotatambah(Request $request)
    {
        Validator::validate($request->all(), [
            'nik' => 'required',
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'hp' => 'required'
        ]);

        AnggotaModel::create([
            'nik' => $request->nik,
            'nama_anggota' => $request->nama_anggota,
            'alamat' => $request->alamat,
            'hp' => $request->hp
        ]);

        return redirect('/anggota');
    }

     //method untuk hapus data anggota
     public function anggotahapus($id_anggota)
     {
         $dataanggota=AnggotaModel::find($id_anggota);
         $dataanggota->delete();
 
         return redirect()->back();
     }

     //method untuk edit data anggota
    public function anggotaedit($id_anggota, Request $request)
    {
        Validator::validate($request->all(), [
            'nik' => 'required',
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'hp' => 'required'
        ]);

        $id_anggota = AnggotaModel::find($id_anggota);
        $id_anggota->nik   = $request->nik;
        $id_anggota->nama_anggota      = $request->nama_anggota;
        $id_anggota->alamat  = $request->alamat;
        $id_anggota->hp   = $request->hp;

        $id_anggota->save();

        return redirect()->back();
    }
}