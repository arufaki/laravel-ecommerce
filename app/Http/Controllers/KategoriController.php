<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $recordKategori = \DB::Table('tbkategori')->get();
        $no = 1;

        return view('kategori.list', compact('recordKategori', 'no'))
            ->with('judul', 'Daftar Kategori');
    }

    public function create()
    {
        return view('kategori.form')
            ->with('judul', 'Form Kategori');
    }

    public function store(Request $r)
    {
        $x = array(
            'nama_kategori' => $r->nama_kategori,
        );


        $rec = \DB::table('tbkategori')
            ->where('nama_kategori', $r->nama_kategori)
            ->first();

        if ($rec == null) {
            \DB::table('tbkategori')
                ->InsertGetId($x);
            return redirect()->route('kategori.index')->with('sukses', 'Kategori Berhasil Disimpan');
        } else {
            return redirect()->route('kategori.create')->with('gagal', 'Kategori Sudah Terdaftar');
        }

        return view('kategori.list')
            ->with('judul', 'Daftar Kategori');
    }

    public function edit($id_kategori)
    {
        $recordStoreKategori = \DB::table('tbkategori')
            ->where('id_kategori', $id_kategori)
            ->first();

        return view('kategori.edit', compact('recordStoreKategori'))
            ->with('judul', 'Form Edit Kategori')
            ->with('id_kategori', $id_kategori);
    }

    public function update(Request $r)
    {
        $x = array(
            'nama_kategori' => $r->nama_kategori,
        );

        $rec = \DB::table('tbkategori')
            ->where('id_kategori', $r->id_kategori)
            ->update($x);

        return redirect()->route('kategori.index')->with('sukses', 'Kategori Berhasil Diedit');
    }

    public function destroy($id_kategori)
    {
        $del = \DB::table('tbkategori')
            ->where('id_kategori', $id_kategori)
            ->delete();

        return redirect()->route('kategori.index')
            ->with('id_kategori', $id_kategori);
    }
}
