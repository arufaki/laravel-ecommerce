<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index() {
        $recordStok= \DB::Table('tbstok')->get();
        $no = 1;

        return view('stok.list', compact('recordStok', 'no'))
            ->with('judul', 'Daftar Tahun Akademik');
    }

    public function create() {
        return view('stok.form')
            ->with('judul', 'Form Stok');
    }

    public function store(Request $r) {
        $x = array(
            'kode_stok' => $r->kode_stok,
            'nama_stok' => $r->nama_stok,
            'saldo_awal' => $r->saldo_awal,
            'harga_beli' => $r->harga_beli,
            'harga_jual' => $r->harga_jual,
            'harga_modal' => $r->harga_modal,
            'foto_barang' => $r->foto_barang,
            'deskripsi_barang' => $r->deskripsi_barang,
            'pajang' => $r->pajang,
        );

        $rec =\DB::table('tbstok')
            ->where('kode_stok', $r->kode_stok)
            ->first();

            if($rec == null) {
                \DB::table('tbstok')
                        ->InsertGetId($x);
                return redirect()->route('stok.index')->with('sukses', 'Stok Berhasil Disimpan');
            } else {
                return redirect()->route('stok.create')->with('gagal', 'Stok Sudah Terdaftar');
            }

    }

    public function edit($id_stok) {
        $recordStoreTA = \DB::table('tbstok')
                ->where('id_stok', $id_stok)
                ->first();

        return view('stok.edit', compact('recordStoreTA'))
                ->with('judul', 'Form Edit Stok')
                ->with('id_stok', $id_stok);
    }

    public function destroy($id_stok) {
        $del = \DB::table('tbstok')
                ->where('id_stok', $id_stok)
                ->delete();

                return redirect()->route('stok.index')
                        ->with('id_stok', $id_stok);


    }
}
