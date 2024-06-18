<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $recordBrand = \DB::Table('brand')->get();
        $no = 1;

        return view('brand.list', compact('recordBrand', 'no'))
            ->with('judul', 'Daftar Brand');
    }

    public function create()
    {
        return view('brand.form')
            ->with('judul', 'Form Brand');
    }

    public function store(Request $r)
    {
        $x = array(
            'nama_brand' => $r->nama_brand,
        );


        $rec = \DB::table('brand')
            ->where('nama_brand', $r->nama_brand)
            ->first();

        if ($rec == null) {
            \DB::table('brand')
                ->InsertGetId($x);
            return redirect()->route('brand.index')->with('sukses', 'Brand Berhasil Disimpan');
        } else {
            return redirect()->route('brand.create')->with('gagal', 'Brand Sudah Terdaftar');
        }

        return view('brand.list')
            ->with('judul', 'Daftar Brand');
    }

    public function edit($id_brand)
    {
        $recordStoreBrand = \DB::table('brand')
            ->where('id_brand', $id_brand)
            ->first();

        return view('brand.edit', compact('recordStoreBrand'))
            ->with('judul', 'Form Edit Brand')
            ->with('id_brand', $id_brand);
    }

    public function update(Request $r)
    {
        $x = array(
            'nama_brand' => $r->nama_brand,
        );

        $rec = \DB::table('brand')
            ->where('id_brand', $r->id_brand)
            ->update($x);

        return redirect()->route('brand.index')->with('sukses', 'Brand Berhasil Diedit');
    }

    public function destroy($id_brand)
    {
        $del = \DB::table('brand')
            ->where('id_brand', $id_brand)
            ->delete();

        return redirect()->route('brand.index')
            ->with('id_brand', $id_brand);
    }
}
