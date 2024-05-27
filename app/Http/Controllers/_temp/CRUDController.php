<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUDController extends Controller
{
    public function index() {
        return view('mahasiswa.list')
            ->with('judul', 'Daftar Mahasiswa');
    }

    public function create() {
        return view('mahasiswa.form')
            ->with('judul', 'Form Mahasiswa');
    }

    public function store(Request $r) {
        $x = array(
            'nim' => $r->nim,
            'nama' => $r->nama,
            'jenis_kelamin' => $r->jenis_kelamin,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
            'id_prodi' =>$r->id_prodi,
            'id_dosen' =>$r->id_dosen,
        );

        $pesan = '';
        $rec =\DB::table('tblmhs')
            ->where('nim', $r -> nim)
            ->first();
        
            if($rec == null) {
                \DB::table('tblmhs')
                    ->insertgetId($x);
            } else {
                $pesan = "Nim Sudah Terdaftar";
            }

            return view('mahasiswa.list')
                    ->with('judul', 'Daftar Mahasiswa')
                    ->with('pesan', $pesan);
    }

    public function edit($id) {
        
        return view('mahasiswa.edit')
                ->with('judul', 'Form Edit Dosen')
                ->with('id', $id);
    }

    public function update(Request $r) {
        $x = array(
            'nim' => $r->nim,
            'nama' => $r->nama,
            'jenis_kelamin' => $r->jenis_kelamin,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
            'id_prodi' =>$r->id_prodi,
            'id_dosen' =>$r->id_dosen,
        );

        $pesan = '';
        $rec =\DB::table('tblmhs')
            ->where('id', $r->id)
            ->update($x);

            return view('mahasiswa.list')
                    ->with('pesan', $pesan);
    }

    public function destroy($id) {
        // $x = array(
        //     'nim' => $r -> nim,
        //     'nama' => $r -> nama,
        //     'alamat' => $r -> alamat,
        //     'nohp' => $r -> nohp,
        // ); 

        $del = \DB::table('tblmhs')
                ->where('id', $id)
                ->delete();

                return redirect()->route('mahasiswa.index')
                        ->with('id', $id);
        

        // $deletItem = DB::delete('DELETE FROM tblmhs WHERE id');
        //     return view('mahasiswa.list')
        //             ->with('id', $id);
    }
        
}

