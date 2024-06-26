<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {

        $recordsMutasi = \DB::Table('mutasi')
            ->leftJoin('tbstok', 'mutasi.id_stok', '=', 'tbstok.id_stok')
            ->select('mutasi.*', 'tbstok.nama_stok as nama_stok')
            ->orderBy('id_mutasi', 'DESC');

        $recordMutasi = $recordsMutasi->get();
        $no = 1;

        return view('mutasi.list', compact('recordMutasi', 'no'))
            ->with('judul', 'Daftar Mutasi');
    }

    public function create()
    {

        $recordStok = \DB::table('tbstok')->get();
        $id_stok = 0;
        return view('mutasi.form', compact('recordStok', 'id_stok'))
            ->with('judul', 'Form Mutasi');
    }

    public function store(Request $r)
    {
        $x = array(
            'no_bukti' => $r->no_bukti,
            'masuk_keluar' => $r->masuk_keluar,
            'qty' => $r->qty,
            'harga' => $r->harga,
            'keterangan' => $r->keterangan,
            'id_stok' => $r->id_stok,
        );


        $rec = \DB::table('mutasi')
            ->where('no_bukti', $r->no_bukti)
            ->first();

        if ($rec == null) {
            \DB::table('mutasi')
                ->InsertGetId($x);
            return redirect()->route('mutasi.index')->with('sukses', 'Mutasi Berhasil Disimpan');
        } else {
            return redirect()->route('mutasi.create')->with('gagal', 'Mutasi Sudah Terdaftar');
        }

        return view('mutasi.list')
            ->with('judul', 'Daftar Mutasi');
    }

    public function edit($id_mutasi)
    {
        $recordStoreMutasi = \DB::table('mutasi')
            ->where('id_mutasi', $id_mutasi)
            ->first();

        $dataStok = \DB::table('tbstok')->get();

        return view('mutasi.edit', compact('recordStoreMutasi', 'dataStok'))
            ->with('judul', 'Form Edit Mutasi')
            ->with('id_mutasi', $id_mutasi);
    }

    public function update(Request $r)
    {
        $x = array(
            'no_bukti' => $r->no_bukti,
            'masuk_keluar' => $r->masuk_keluar,
            'qty' => $r->qty,
            'harga' => $r->harga,
            'keterangan' => $r->keterangan,
            'id_stok' => $r->id_stok,
        );

        $rec = \DB::table('mutasi')
            ->where('id_mutasi', $r->id_mutasi)
            ->update($x);

        return redirect()->route('mutasi.index')->with('sukses', 'Mutasi Berhasil Diedit');
    }

    public function destroy($id_mutasi)
    {
        $del = \DB::table('mutasi')
            ->where('id_mutasi', $id_mutasi)
            ->delete();

        return redirect()->route('mutasi.index')
            ->with('id_mutasi', $id_mutasi);
    }
}
