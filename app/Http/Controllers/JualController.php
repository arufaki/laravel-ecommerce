<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JualController extends Controller
{
    public function index()
    {

        $recordsJual = \DB::Table('jual')
            ->leftJoin('tbpelanggan', 'jual.id_pelanggan', '=', 'tbpelanggan.id_pelanggan')
            ->select('jual.*', 'tbpelanggan.nama_pelanggan as nama_pelanggan');

        $recordJual = $recordsJual->get();
        $no = 1;

        return view('jual.list', compact('recordJual', 'no'))
            ->with('judul', 'Daftar Jual');
    }

    public function create()
    {

        $recordPelanggan = \DB::table('tbpelanggan')->get();
        $id_pelanggan = 0;
        return view('jual.form', compact('recordPelanggan', 'id_pelanggan'))
            ->with('judul', 'Form Jual');
    }

    public function store(Request $r)
    {
        $x = array(
            'no_bukti' => $r->no_bukti,
            'tanggal' => $r->tanggal,
            'keterangan' => $r->keterangan,
            'id_pelanggan' => $r->id_pelanggan,
        );


        $rec = \DB::table('jual')
            ->where('no_bukti', $r->no_bukti)
            ->first();

        if ($rec == null) {
            \DB::table('jual')
                ->InsertGetId($x);
            return redirect()->route('jual.index')->with('sukses', 'Penjualan Berhasil Disimpan');
        } else {
            return redirect()->route('jual.create')->with('gagal', 'Penjualan Sudah Terdaftar');
        }

        return view('jual.list')
            ->with('judul', 'Daftar Jual');
    }

    public function edit($id_penjualan)
    {
        $recordStorePenjualan = \DB::table('jual')
            ->where('id_penjualan', $id_penjualan)
            ->first();

        $dataPelanggan = \DB::table('tbpelanggan')->get();

        return view('jual.edit', compact('recordStorePenjualan', 'dataPelanggan'))
            ->with('judul', 'Form Edit Penjualan')
            ->with('id_penjualan', $id_penjualan);
    }

    public function update(Request $r)
    {
        $x = array(
            'no_bukti' => $r->no_bukti,
            'tanggal' => $r->tanggal,
            'keterangan' => $r->keterangan,
            'id_pelanggan' => $r->id_pelanggan,
        );

        $rec = \DB::table('jual')
            ->where('id_penjualan', $r->id_penjualan)
            ->update($x);

        return redirect()->route('jual.index')->with('sukses', 'Penjualan Berhasil Diedit');
    }

    public function destroy($id_penjualan)
    {
        $del = \DB::table('jual')
            ->where('id_penjualan', $id_penjualan)
            ->delete();

        return redirect()->route('jual.index')
            ->with('id_penjualan', $id_penjualan);
    }
}
