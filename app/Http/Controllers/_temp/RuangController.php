<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index() {
        $recordRuang = \DB::table('ruang')->GET();
        $no = 1;
        return view('ruang.list', compact('recordRuang', 'no'))
            ->with('judul', 'Daftar Ruang');
    }

    public function create() {
        return view('ruang.form')
            ->with('judul', 'Form Ruang');
    }

    public function store(Request $r) {
        $x = array(
            'kode_ruang' => $r->kode_ruang,
            'nama_ruang' => $r->nama_ruang,
        );

        $rec =\DB::table('ruang')
            ->where('kode_ruang', $r->kode_ruang)
            ->first();
        
            if($rec == null) {
                \DB::table('ruang')
                ->InsertGetId($x);
                return redirect()->route('ruang.index')->with('sukses', 'Ruang Berhasil Disimpan');
            } else {
                return redirect()->route('ruang.create')->with('gagal', 'Ruang Sudah Terdaftar');
            }
    }

    public function edit($id_ruang) {
        $recordRuang = \DB::table('ruang')
                ->where('id_ruang', $id_ruang)
                ->first();
        
        return view('ruang.edit', compact('recordRuang'))
                ->with('judul', 'Form Edit Ruang')
                ->with('id_ruang', $id_ruang);
    }

    public function update(Request $r) {
        $x = array(
            'kode_ruang' => $r->kode_ruang,
            'nama_ruang' => $r->nama_ruang,
        );

        $rec =\DB::table('ruang')
            ->where('id_ruang', $r -> id_ruang)
            ->update($x);

            return redirect()->route('ruang.index')->with('sukses', 'Ruang Berhasil Diedit');
    }

    public function destroy($id_ruang) {
        $del = \DB::table('ruang')
                ->where('id_ruang', $id_ruang)
                ->delete();

                return redirect()->route('ruang.index')
                        ->with('id_ruang', $id_ruang);
        

    }
}
