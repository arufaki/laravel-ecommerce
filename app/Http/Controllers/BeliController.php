<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class BeliController extends Controller
{
    public function index()
    {

        $recordsBeli = \DB::Table('beli')
            ->leftJoin('tbpemasok', 'beli.id_pemasok', '=', 'tbpemasok.id_pemasok')
            ->select('beli.*', 'tbpemasok.nama_pemasok as nama_pemasok')
            ->orderBy('id_pembelian', 'desc');

        $recordBeli = $recordsBeli->get();
        $no = 1;

        return view('beli.list', compact('recordBeli', 'no'))
            ->with('judul', 'Daftar Beli');
    }

    public function create()
    {
        $user = Auth()->user()->id;
        $date = Carbon::now();
        $noBukti = "BUY". $user. $date->format('YmdHis');

        

        $recordPemasok = \DB::table('tbpemasok')->get();
        $id_pemasok = 0;
        return view('beli.form', compact('recordPemasok', 'id_pemasok', 'noBukti'))
            ->with('judul', 'Form Beli');
    }

    public function store(Request $r)
    {

        // dd($r->all());

        $r->validate([
            'beli.*.no_bukti' => 'required',
            'beli.*.keterangan' => 'required',
            'beli.*.tanggal' => 'required',
            'beli.*.id_stok' => 'required',
            'beli.*.id_pemasok' => 'required',
            'beli.*.qty' => 'required',
            'beli.*.subtotal' => 'required',
            'beli.*.status' => 'required',
        ]);

        // masukkan ke tbjual index ke 0
        \DB::table('beli')->insert([
                'no_bukti' => $r->beli[0]['no_bukti'],
                'tanggal' => $r->beli[0]['tanggal'],
                'keterangan' => $r->beli[0]['keterangan'],
                'id_pemasok' => $r->beli[0]['id_pemasok'],
            ]);

        foreach($r->beli as $key => $value) {
            \DB::table('mutasi')->insert([
                'no_bukti' => $value['no_bukti'],
                'qty' => $value['qty'],
                'harga' => $value['subtotal'],
                'keterangan' => $value['keterangan'],
                'status' => $value['status'],
                'id_stok' => $value['id_stok'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('beli.index')->with('sukses', 'Pembelian Berhasil Disimpan');
    }

    public function show($no_bukti) {
        $getBeli = \DB::table('beli')
                ->leftJoin('tbpemasok', 'beli.id_pemasok', '=', 'tbpemasok.id_pemasok')
                ->where('no_bukti', $no_bukti)
                ->select('beli.*', 'tbpemasok.nama_pemasok')
                ->first();

        $getMutasi = \DB::table('mutasi')
                    ->leftJoin('tbstok', 'mutasi.id_stok', '=', 'tbstok.id_stok')
                    ->where('mutasi.no_bukti', $no_bukti)
                    ->select('mutasi.*', 'tbstok.*')
                    ->get();

        $calcTotal = $getMutasi->sum(function ($datas) {
                            return $datas->harga;
                        });

        return view('beli.detail', compact('getBeli', 'getMutasi', 'calcTotal'));
    }

    public function edit($id_pembelian)
    {
        $recordStorePembelian = \DB::table('beli')
            ->where('id_pembelian', $id_pembelian)
            ->first();

        $dataPemasok = \DB::table('tbpemasok')->get();

        return view('beli.edit', compact('recordStorePembelian', 'dataPemasok'))
            ->with('judul', 'Form Edit Pembelian')
            ->with('id_pembelian', $id_pembelian);
    }

    public function update(Request $r)
    {
        $x = array(
            'no_bukti' => $r->no_bukti,
            'tanggal' => $r->tanggal,
            'keterangan' => $r->keterangan,
            'id_pemasok' => $r->id_pemasok,
        );

        $rec = \DB::table('beli')
            ->where('id_pembelian', $r->id_pembelian)
            ->update($x);

        return redirect()->route('beli.index')->with('sukses', 'Pembelian Berhasil Diedit');
    }

    public function destroy($id_pembelian)
    {
        $noBukti = \DB::table('beli')
                    ->where('id_pembelian', $id_pembelian)
                    ->value('no_bukti');

        $del = \DB::table('beli')
            ->where('id_pembelian', $id_pembelian)
            ->delete();

        $deleteMutasi = \DB::table('mutasi')
                        ->where('no_bukti', $noBukti)
                        ->delete();

        return redirect()->route('beli.index')
            ->with('id_pembelian', $id_pembelian);
    }
}
