<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $recordSatuan = \DB::Table('tbsatuan')->get();
        $no = 1;

        return view('satuan.list', compact('recordSatuan', 'no'))
            ->with('judul', 'Daftar Satuan');
    }

    public function create()
    {
        return view('satuan.form')
            ->with('judul', 'Form Satuan');
    }

    public function store(Request $r)
    {
        $x = array(
            'nama_satuan' => $r->nama_satuan,
        );


        $rec = \DB::table('tbsatuan')
            ->where('nama_satuan', $r->nama_satuan)
            ->first();

        if ($rec == null) {
            \DB::table('tbsatuan')
                ->InsertGetId($x);
            return redirect()->route('satuan.index')->with('sukses', 'Satuan Berhasil Disimpan');
        } else {
            return redirect()->route('satuan.create')->with('gagal', 'Satuan Sudah Terdaftar');
        }

        return view('satuan.list')
            ->with('judul', 'Daftar Satuan');
    }

    public function edit($id_satuan)
    {
        $recordStoreSatuan = \DB::table('tbsatuan')
            ->where('id_satuan', $id_satuan)
            ->first();

        return view('satuan.edit', compact('recordStoreSatuan'))
            ->with('judul', 'Form Edit Satuan')
            ->with('id_satuan', $id_satuan);
    }

    public function update(Request $r)
    {
        $x = array(
            'nama_satuan' => $r->nama_satuan,
        );

        $rec = \DB::table('tbsatuan')
            ->where('id_satuan', $r->id_satuan)
            ->update($x);

        return redirect()->route('satuan.index')->with('sukses', 'Satuan Berhasil Diedit');
    }

    public function destroy($id_satuan)
    {
        $del = \DB::table('tbsatuan')
            ->where('id_satuan', $id_satuan)
            ->delete();

        return redirect()->route('satuan.index')
            ->with('id_satuan', $id_satuan);
    }
}
