<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index() {
        return view('dosen.list')
            ->with('judul', 'Daftar Dosen');
    }

    public function create() {
        return view('dosen.form')
            ->with('judul', 'Form Dosen');
    }

    public function store(Request $r) {
        $x = array(
            'nid' => $r->nid,
            'nama_dosen' => $r->nama_dosen,
            'jenis_kelamin' => $r->jenis_kelamin,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
        );

        $pesan = '';
        $rec =\DB::table('tbldosen')
            ->where('nid', $r->nid)
            ->first();
        
            if($rec == null) {
                \DB::table('tbldosen')
                    ->InsertGetId($x);
            } else {
                $pesan = "Nid Sudah Terdaftar";
            }

            return view('dosen.list')
                    ->with('judul', 'Daftar Dosen')
                    ->with('pesan', $pesan);
    }

    public function edit($id_dosen) {
        
        return view('dosen.edit')
                ->with('judul', 'Form Edit Dosen')
                ->with('id_dosen', $id_dosen);
    }

    public function update(Request $r) {
        $x = array(
            'nid' => $r->nid,
            'nama_dosen' => $r->nama_dosen,
            'jenis_kelamin' => $r->jenis_kelamin,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
        );

        $pesan = '';
        $rec =\DB::table('tbldosen')
            ->where('id_dosen', $r->id_dosen)
            ->update($x);

            return redirect()->route('dosen.index')
                    ->with('pesan', $pesan);
    }

    public function destroy($id_dosen) {
        // $x = array(
        //     'nim' => $r -> nim,
        //     'nama' => $r -> nama,
        //     'alamat' => $r -> alamat,
        //     'nohp' => $r -> nohp,
        // ); 

        $del = \DB::table('tbldosen')
                ->where('id', $id_dosen)
                ->delete();

                return redirect()->route('dosen.index')
                        ->with('id_dosen', $id_dosen);
        

        // $deletItem = DB::delete('DELETE FROM tblmhs WHERE id');
        //     return view('mahasiswa.list')
        //             ->with('id', $id);
    }
}
