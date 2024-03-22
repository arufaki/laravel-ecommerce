<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TahunAkademikController extends Controller
{
    public function index() {
        $recordsTahunAkademik = \DB::Table('tahun_akademik');
        $no = 1;

        $recordTahunAkademik = $recordsTahunAkademik->get();

        return view('tahunakademik.list', compact('recordTahunAkademik', 'no'))
            ->with('judul', 'Daftar Tahun Akademik');
    }

    public function create() {
        return view('tahunakademik.form')
            ->with('judul', 'Form Tahun Akademik');
    }

    public function store(Request $r) {
        $x = array(
            'kode_tahun_akademik' => $r->kode_tahun_akademik,
            'nama_tahun_akademik' => $r->nama_tahun_akademik,
        );

        $rec =\DB::table('tahun_akademik')
            ->where('kode_tahun_akademik', $r->kode_tahun_akademik)
            ->first();
        
            if($rec == null) {
                \DB::table('tahun_akademik')
                        ->InsertGetId($x);
                return redirect()->route('tahunakademik.index')->with('sukses', 'Tahun Akademik Berhasil Disimpan');
            } else {
                return redirect()->route('tahunakademik.create')->with('gagal', 'Tahun Akademik Sudah Terdaftar');
            }

    }

    public function edit($id_tahun_akademik) {
        $recordStoreTA = \DB::table('tahun_akademik')
                ->where('id_tahun_akademik', $id_tahun_akademik)
                ->first();

        return view('tahunakademik.edit', compact('recordStoreTA'))
                ->with('judul', 'Form Edit Tahun Akademik')
                ->with('id_tahun_akademik', $id_tahun_akademik);
    }

    public function update(Request $r) {
        $x = array(
            'kode_tahun_akademik' => $r->kode_tahun_akademik,
            'nama_tahun_akademik' => $r->nama_tahun_akademik,
        );
            $rec =\DB::table('tahun_akademik')
            ->where('id_tahun_akademik', $r -> id_tahun_akademik)
            ->update($x);
            return redirect()->route('tahunakademik.index')->with('sukses', 'Tahun Akademik Berhasil Diedit');
    }

    public function destroy($id_tahun_akademik) {
        $del = \DB::table('tahun_akademik')
                ->where('id_tahun_akademik', $id_tahun_akademik)
                ->delete();

                return redirect()->route('tahunakademik.index')
                        ->with('id_tahun_akademik', $id_tahun_akademik);
        

    }
}
