<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
            foreach($r->image as $key => $images) {

                $imageName = time().rand(1,99).'.'.$images->extension();  

                $images->storeAs('foto-produk', $imageName);

                // $imagePath = 'foto-barang/'.$images->hashName();
                // $image->move(public_path('foto-barang'), $imagePath);
                // $images->storeAs($imagePath);


                // $imagePath = $image->storeAs('foto-barang', $image->hashName());
                $image[]=$imageName;
            }
        }

        $x = array(
            'kode_stok' => $r->kode_stok,
            'nama_stok' => $r->nama_stok,
            'saldo_awal' => $r->saldo_awal,
            'harga_beli' => $r->harga_beli,
            'harga_jual' => $r->harga_jual,
            'image' => json_encode($image),
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
        $stok = \DB::Table('tbstok')
                    ->where('id_stok', $id_stok)
                    ->first();


        if($stok) {
            $imgArray = json_decode($stok->image, true);

            foreach($imgArray as $images) {
                if (Storage::exists('foto-produk/' . $images)) {
                    Storage::delete('foto-produk/' . $images);
                }
            }

            \DB::table('tbstok')->where('id_stok', $id_stok)->delete();

            return redirect()->route('stok.index')->with('sukses', 'Stok Berhasil Dihapus');
        } else {
            return redirect()->route('stok.index')->with('gagal', 'Stok Tidak Ditemukan');
        }
                    
                   
                    
        // $del = \DB::table('tbstok')
        //     ->where('id_stok', $id_stok)
        //     ->delete();

        // return redirect()->route('stok.index')
        //     ->with('id_stok', $id_stok);
    }
}

