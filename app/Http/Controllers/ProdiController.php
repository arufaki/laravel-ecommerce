<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index() {

        $recordsProdi = \DB::Table('prodi')
            ->leftJoin('fakultas', 'prodi.id_fakultas', '=', 'fakultas.id_fakultas')
            ->leftJoin('jenjang', 'prodi.id_jenjang', '=', 'jenjang.id_jenjang')
            ->leftJoin('tbldosen', 'prodi.id_dosen', '=', 'tbldosen.id_dosen')
            ->select('prodi.*', 'fakultas.nama_fakultas as nama_fakultas', 'jenjang.nama_jenjang as nama_jenjang', 'tbldosen.nama_dosen as nama_kaprodi');

        $recordProdi = $recordsProdi->get();
        $no = 1;
        return view('prodi.list', compact('recordProdi', 'no'))
                ->with('judul', 'Daftar Prodi');
    }

    public function create() {

        $recordKaprodi = \DB::table('tbldosen')->get();
        $id_dosen = 0;
        return view('prodi.form', compact('recordKaprodi', 'id_dosen'))
            ->with('judul', 'Form Prodi');
    }

    public function store(Request $r) {
        $x = array(
            'kode_prodi' => $r->kode_prodi,
            'nama_prodi' => $r->nama_prodi,
            'id_dosen' => $r->id_dosen,
            'id_jenjang' => $r->id_jenjang,
            'id_fakultas' => $r->id_fakultas,
            'tglsk' => $r->tglsk,
            'akreditasi' => $r->akreditasi, 
        );

        $rec =\DB::table('prodi')
            ->where('kode_prodi', $r->kode_prodi)
            ->first();
        
            if($rec == null) {
                \DB::table('prodi')
                ->InsertGetId($x);
                return redirect()->route('prodi.index')->with('sukses', 'Program Studi Berhasil Disimpan');
            } else {
                return redirect()->route('prodi.create')->with('gagal', 'Program Studi Sudah Terdaftar');
            } 
    }

    public function edit($id_prodi) {
        $recordsProdi = \DB::table('prodi')
                ->where('id_prodi', $id_prodi)
                ->first();

        $dataJenjang = \DB::Table('jenjang')->get();
        $dataFakultas = \DB::Table('fakultas')->get();
        $dataKaprodi = \DB::Table('tbldosen')->get();

        return view('prodi.edit', compact('recordsProdi', 'dataJenjang', 'dataFakultas', 'dataKaprodi'))
                ->with('judul', 'Form Edit Prodi')
                ->with('id_prodi', $id_prodi);
    }

    public function update(Request $r) {
        $x = array(
            'kode_prodi' => $r->kode_prodi,
            'nama_prodi' => $r->nama_prodi,
            'id_dosen' => $r->id_dosen,
            'id_jenjang' => $r->id_jenjang,
            'id_fakultas' => $r->id_fakultas,
            'tglsk' => $r->tglsk,
            'akreditasi' => $r->akreditasi, 
        );

        $rec =\DB::table('prodi')
            ->where('id_prodi', $r -> id_prodi)
            ->update($x);

            return redirect()->route('prodi.index')->with('sukses', 'Prodi Berhasil Diedit');
    }

    public function destroy($id_prodi) {
        $del = \DB::table('prodi')
                ->where('id_prodi', $id_prodi)
                ->delete();

                return redirect()->route('prodi.index')
                        ->with('id_prodi', $id_prodi);
        

    }
}
