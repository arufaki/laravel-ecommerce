<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StokController extends Controller
{
    public function index()
    {

        $recordsStok = \DB::Table('tbstok')
        ->leftJoin('tbsatuan', 'tbstok.id_satuan', '=', 'tbsatuan.id_satuan')
        ->leftJoin('tbkategori', 'tbstok.id_kategori', '=', 'tbkategori.id_kategori')
        ->select('tbstok.*', 'tbsatuan.nama_satuan as nama_satuan', 'tbkategori.nama_kategori as nama_kategori');

        $recordStok = $recordsStok->get();
        $no = 1;

        return view('stok.list', compact('recordStok', 'no'))
            ->with('judul', 'Daftar Stok');
    }

    public function create()
    {
        $recordKategori = \DB::table('tbkategori')->get();
        $id_kategori = 0;
        $recordSatuan = \DB::table('tbsatuan')->get();
        $id_satuan = 0;
        return view('stok.form', compact('recordKategori', 'id_kategori', 'recordSatuan', 'id_satuan'))
            ->with('judul', 'Form Stok');
    }

    public function store(Request $r)
    {
        $r->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:png,jpg,jpeg|max:10240'
        ]);

        $image=[];

        if ($r->image) {
            foreach($r->image as $images) {

                $imagePath = $images->hashName();
                // $image->move(public_path('foto-barang'), $imagePath);
                $images->storeAs('foto-barang', $imagePath);


                // $imagePath = $image->storeAs('foto-barang', $image->hashName());
                $image[]=$imagePath;
            }
        }

        $x = array(
            'kode_stok' => $r->kode_stok,
            'nama_stok' => $r->nama_stok,
            'saldo_awal' => $r->saldo_awal,
            'harga_beli' => $r->harga_beli,
            'harga_jual' => $r->harga_jual,
            'image' => implode(',', $image),
            'harga_modal' => $r->harga_modal,
            'deskripsi_barang' => $r->deskripsi_barang,
            'pajang' => $r->pajang,
            'id_kategori' => $r->id_kategori,
            'id_satuan' => $r->id_satuan,
        );

        $rec = \DB::table('tbstok')
            ->where('kode_stok', $r->kode_stok)
            ->first();

        if ($rec == null) {
            \DB::table('tbstok')
                ->InsertGetId($x);
            return redirect()->route('stok.index')->with('sukses', 'Stok Berhasil Disimpan');
        } else {
            return redirect()->route('stok.create')->with('gagal', 'Stok Sudah Terdaftar');
        }
    }

    public function edit($id_stok)
    {
        $recordStoreTA = \DB::table('tbstok')
            ->where('id_stok', $id_stok)
            ->first();

        return view('stok.edit', compact('recordStoreTA'))
            ->with('judul', 'Form Edit Stok')
            ->with('id_stok', $id_stok);
    }

    public function destroy($id_stok)
    {
        $dbImg = \DB::Table('tbstok')
                    ->where('id_stok', $id_stok)->first();

                    if($dbImg && $dbImg->image !== null) {
                        Storage::delete($dbImg->image);
                    }
        $del = \DB::table('tbstok')
            ->where('id_stok', $id_stok)
            ->delete();

        return redirect()->route('stok.index')
            ->with('id_stok', $id_stok);
    }
}
