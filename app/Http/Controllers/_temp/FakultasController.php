<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index() {
        $recordsFakultas = \DB::Table('fakultas')
        ->leftJoin('tbldosen', 'fakultas.id_dosen', '=', 'tbldosen.id_dosen')
        ->select('fakultas.*', 'tbldosen.nama_dosen as nama_dekan');

        $recordFakultas = $recordsFakultas->get();
        $no = 1;
        return view('fakultas.list', compact('recordFakultas', 'no'))
                ->with('judul', 'Daftar Fakultas');
    }

    public function create() {
        $recordDekan = \DB::table('tbldosen')->get();
        $id_dosen = 0;

        return view('fakultas.form', compact('recordDekan', 'id_dosen'))
            ->with('judul', 'Form Fakultas');
    }

    public function store(Request $r) {
        $x = array(
            'kode_fakultas' => $r->kode_fakultas,
            'nama_fakultas' => $r->nama_fakultas,
            'id_dosen' => $r->id_dosen,
        );

  
        $rec =\DB::table('fakultas')
            ->where('kode_fakultas', $r->kode_fakultas)
            ->first();
        
            if($rec == null) {
                \DB::table('fakultas')
                ->InsertGetId($x);
                return redirect()->route('fakultas.index')->with('sukses', 'Fakultas Berhasil Disimpan');
            } else {
                return redirect()->route('fakultas.create')->with('gagal', 'Fakultas Sudah Terdaftar');
            }

            return view('fakultas.list')
                    ->with('judul', 'Daftar Fakultas')
                    ->with('pesan', $pesan);
    }

    public function edit($id_fakultas) {
        $recordFakultas = \DB::table('fakultas')
                ->where('id_fakultas', $id_fakultas)
                ->first();
        $dataDekan = \DB::Table('tbldosen')->get();

        return view('fakultas.edit', compact('recordFakultas', 'dataDekan'))
                ->with('judul', 'Form Edit Fakultas')
                ->with('id_fakultas', $id_fakultas);
    }

    public function update(Request $r) {
        $x = array(
            'kode_fakultas' => $r->kode_fakultas,
            'nama_fakultas' => $r->nama_fakultas,
            'id_dosen' => $r->id_dosen,
        );

        $rec =\DB::table('fakultas')
            ->where('id_fakultas', $r -> id_fakultas)
            ->update($x);

            return redirect()->route('fakultas.index')->with('sukses', 'Fakultas Berhasil Diedit');
    }

    public function destroy($id_fakultas) {
        $del = \DB::table('fakultas')
                ->where('id_fakultas', $id_fakultas)
                ->delete();

                return redirect()->route('fakultas.index')
                        ->with('id_fakultas', $id_fakultas);
        

    }
}
