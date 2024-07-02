<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//panggil model Petugas
use App\Models\PetugasModel;

class PetugasController extends Controller
{
    //method untuk tampil data Petugas
    public function petugastampil()
    {
        $datapetugas = PetugasModel::orderby('id_petugas', 'ASC')
        ->paginate(5);

        return view('halaman/view_petugas',['petugas'=>$datapetugas]);
    }

    //method untuk tambah data petugas
    public function petugastambah(Request $request)
    {
        Validator::validate($request->all(), [
            'nama_petugas' => 'required',
            'hp_petugas' => 'required'
        ]);

        PetugasModel::create([
            'nama_petugas' => $request->nama_petugas,
            'hp_petugas' => $request->hp_petugas
        ]);

        return redirect('/petugas');
    }

     //method untuk hapus data petugas
     public function petugashapus($id_petugas)
     {
         $datapetugas=PetugasModel::find($id_petugas);
         $datapetugas->delete();
 
         return redirect()->back();
     }

     //method untuk edit data petugas
    public function petugasedit($id_petugas, Request $request)
    {
        Validator::validate($request->all(), [
            'nama_petugas' => 'required',
            'hp_petugas' => 'required'
        ]);

        $id_petugas = PetugasModel::find($id_petugas);
        $id_petugas->nama_petugas      = $request->nama_petugas;
        $id_petugas->hp_petugas   = $request->hp_petugas;

        $id_petugas->save();

        return redirect()->back();
    }
}