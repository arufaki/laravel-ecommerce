<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index() {

        $recordsKelas = \DB::table('kelas')
        ->leftJoin('tahun_akademik', 'kelas.id_tahun_akademik', '=', 'tahun_akademik.id_tahun_akademik')
        ->select('kelas.*', 'tahun_akademik.kode_tahun_akademik as kode_tahun_akademik', 'tahun_akademik.nama_tahun_akademik as nama_tahun_akademik');
        $recordKelas = $recordsKelas->get();
        $no = 1;
        
        return view('kelas.list', compact('recordKelas', 'no'))
            ->with('judul', 'Daftar Kelas');
    }

    public function create() {
        $recordTA = \DB::table('tahun_akademik')->get();
        $id_tahun_akademik = 0;
        return view('kelas.form', compact('recordTA', 'id_tahun_akademik'))
            ->with('judul', 'Form Kelas');
    }

    public function store(Request $r) {
        $x = array(
            'kode_kelas' => $r->kode_kelas,
            'nama_kelas' => $r->nama_kelas,
            'id_tahun_akademik' => $r->id_tahun_akademik,
        );

        $rec =\DB::table('kelas')
            ->where('kode_kelas', $r->kode_kelas)
            ->first();
        
            if($rec == null) {
                \DB::table('kelas')
                ->InsertGetId($x);
                return redirect()->route('kelas.index')->with('sukses', 'Kelas Berhasil Disimpan');
            } else {
                return redirect()->route('kelas.create')->with('gagal', 'Kelas Sudah Terdaftar');
            } 
    }

    public function edit($id_kelas) {
        
        return view('kelas.edit')
                ->with('judul', 'Form Edit Kelas')
                ->with('id_kelas', $id_kelas);
    }

    public function update(Request $r) {
        $x = array(
            'kode_kelas' => $r->kode_kelas,
            'nama_kelas' => $r->nama_kelas,
            'id_tahun_akademik' => $r->id_tahun_akademik,
        );

        $pesan = '';
        $rec =\DB::table('kelas')
            ->where('id_kelas', $r -> id_kelas)
            ->update($x);

            return redirect()->route('kelas.index')
                    ->with('pesan', $pesan);
    }

    public function destroy($id_kelas) {
        $del = \DB::table('kelas')
                ->where('id_kelas', $id_kelas)
                ->delete();

                return redirect()->route('kelas.index')
                        ->with('id_kelas', $id_kelas);
        

    }
}
