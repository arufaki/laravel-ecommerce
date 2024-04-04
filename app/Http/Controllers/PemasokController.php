<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function index()
    {
        $recordPemasok = \DB::Table('tbpemasok')->get();
        $no = 1;

        return view('pemasok.list', compact('recordPemasok', 'no'))
            ->with('judul', 'Daftar Pemasok');
    }

    public function create()
    {
        return view('pemasok.form')
            ->with('judul', 'Form pemasok');
    }

    public function store(Request $r)
    {
        $x = array(
            'kode_pemasok' => $r->kode_pemasok,
            'nama_pemasok' => $r->nama_pemasok,
            'alamat_pemasok' => $r->alamat_pemasok,
            'nohp' => $r->nohp,
            'top' => $r->top,
        );


        $rec = \DB::table('tbpemasok')
            ->where('kode_pemasok', $r->kode_pemasok)
            ->first();

        if ($rec == null) {
            \DB::table('tbpemasok')
                ->InsertGetId($x);
            return redirect()->route('pemasok.index')->with('sukses', 'Pemasok Berhasil Disimpan');
        } else {
            return redirect()->route('pemasok.create')->with('gagal', 'Pemasok Sudah Terdaftar');
        }

        return view('pemasok.list')
            ->with('judul', 'Daftar Pemasok');
    }

    public function edit($id_pemasok)
    {
        $recordStorePemasok = \DB::table('tbpemasok')
            ->where('id_pemasok', $id_pemasok)
            ->first();

        return view('pemasok.edit', compact('recordStorePemasok'))
            ->with('judul', 'Form Edit Stok')
            ->with('id_pemasok', $id_pemasok);
    }

    public function update(Request $r)
    {
        $x = array(
            'kode_pemasok' => $r->kode_pemasok,
            'nama_pemasok' => $r->nama_pemasok,
            'alamat_pemasok' => $r->alamat_pemasok,
            'nohp' => $r->nohp,
            'top' => $r->top,
        );

        $rec = \DB::table('tbpemasok')
            ->where('id_pemasok', $r->id_pemasok)
            ->update($x);

        return redirect()->route('pemasok.index')->with('sukses', 'Pemasok Berhasil Diedit');
    }

    public function destroy($id_pemasok)
    {
        $del = \DB::table('tbpemasok')
            ->where('id_pemasok', $id_pemasok)
            ->delete();

        return redirect()->route('pemasok.index')
            ->with('id_pemasok', $id_pemasok);
    }
}
