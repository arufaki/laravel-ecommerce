<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $recordPelanggan = \DB::Table('tbpelanggan')->get();
        $no = 1;

        return view('pelanggan.list', compact('recordPelanggan', 'no'))
            ->with('judul', 'Daftar Pelanggan');
    }

    public function create()
    {
        return view('pelanggan.form')
            ->with('judul', 'Form Pelanggan');
    }

    public function store(Request $r)
    {
        $x = array(
            'kode_pelanggan' => $r->kode_pelanggan,
            'nama_pelanggan' => $r->nama_pelanggan,
            'alamat_pelanggan' => $r->alamat_pelanggan,
            'nohp' => $r->nohp,
            'top' => $r->top,
        );


        $rec = \DB::table('tbpelanggan')
            ->where('kode_pelanggan', $r->kode_pelanggan)
            ->first();

        if ($rec == null) {
            \DB::table('tbpelanggan')
                ->InsertGetId($x);
            return redirect()->route('pelanggan.index')->with('sukses', 'Pelanggan Berhasil Disimpan');
        } else {
            return redirect()->route('pelanggan.create')->with('gagal', 'Pelanggan Sudah Terdaftar');
        }

        return view('pelanggan.list')
            ->with('judul', 'Daftar Pelanggan');
    }

    public function edit($id_pelanggan)
    {
        $recordStorePelanggan = \DB::table('tbpelanggan')
            ->where('id_pelanggan', $id_pelanggan)
            ->first();

        return view('pelanggan.edit', compact('recordStorePelanggan'))
            ->with('judul', 'Form Edit Stok')
            ->with('id_pelanggan', $id_pelanggan);
    }

    public function update(Request $r)
    {
        $x = array(
            'kode_pelanggan' => $r->kode_pelanggan,
            'nama_pelanggan' => $r->nama_pelanggan,
            'alamat_pelanggan' => $r->alamat_pelanggan,
            'nohp' => $r->nohp,
            'top' => $r->top,
        );

        $rec = \DB::table('tbpelanggan')
            ->where('id_pelanggan', $r->id_pelanggan)
            ->update($x);

        return redirect()->route('pelanggan.index')->with('sukses', 'Pelanggan Berhasil Diedit');
    }

    public function destroy($id_pelanggan)
    {
        $del = \DB::table('tbpelanggan')
            ->where('id_pelanggan', $id_pelanggan)
            ->delete();

        return redirect()->route('pelanggan.index')
            ->with('id_pelanggan', $id_pelanggan);
    }
}
