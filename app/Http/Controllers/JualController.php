<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JualController extends Controller
{
    public function index()
    {
        $recordsJual = \DB::Table('jual')
            ->leftJoin('users', 'jual.id_user', '=', 'users.id')
            ->select('jual.*', 'users.name as nama_pelanggan');

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

    // Fungsi private untuk proses input data cart user ke mutasi
    private function orderConditionCheck($id_penjualan, $status) {

        // call table jual
        $callJual= \DB::table('jual')
            ->where("id_penjualan", $id_penjualan);
        
        // get data Tabel Jual
        $getDataJual = $callJual->first();

        // Update status jual sesuai dengan parameter di fungsi edit dan show
        $updateStatusJual = $callJual->update(['status' => $status]);

        // kondisi mutasi dengan left join tbstok serta kondisi no_bukti disamakan dengan no_bukti di tabel jual
        $callMutasi = \DB::table('mutasi')
                    ->leftJoin('tbstok', 'mutasi.id_stok', "=", 'tbstok.id_stok')
                    ->select("mutasi.*", 'tbstok.saldo_awal as saldo_awal')
                    ->where("no_bukti", $getDataJual->no_bukti);

        // ambil seluruh data mutasi yang sesuai dengan kriteria where
        $getDataMutasi = $callMutasi->get();

        // looping data mutasi yang no_buktinya sama
        foreach($getDataMutasi as $mutasi) {
            // kondisi ketika status sukses akan mengurangi saldo dan kalau rejected tidak berkurang atau tetap
            $saldoCondition = $status == "success" ? $mutasi->saldo_awal - $mutasi->qty : $mutasi->saldo_awal;

            // update saldo awal di tabel stok
            \DB::table('tbstok')
            ->where("id_stok", $mutasi->id_stok)
            ->update(["saldo_awal" => $saldoCondition]);

            // kondisi ketika status rejected ubah keterangan jadi saldo masuk
            if($status == "rejected") {
                \DB::table('mutasi')
                    ->where("no_bukti", $getDataJual->no_bukti)
                    ->update(['keterangan' => "Masuk"]);
            }
        }

        // update status di mutasi sesuai dengan tombol yang ditekan di tabel jual
        $updateStatusMutasi = $callMutasi->update(['status' => $status]);
    }

    // fungsi ini dijalankan ketika admin menekan tombol accept
    public function edit($id_penjualan)
    {
        // memanggil private fungsi dengan memasukkan parameter sesuai dengan button yang diklik
        // success dan keluar adalah parameter ketika button accept diklik akan update status ke success dan cart masuk ke mutasi dengan keterangan barang keluar atau terjual
        $this->orderConditionCheck($id_penjualan, "success");
        return redirect()->route('jual.index');
    }

        // fungsi ini dijalankan ketika admin menekan tombol reject
    public function show($id_penjualan)
    {
         // memanggil private fungsi dengan memasukkan parameter sesuai dengan button yang diklik
        // rejected dan masuk adalah parameter ketika button reject diklik akan update status ke rejected dan cart masuk ke mutasi dengan keterangan barang masuk atau return jual
        $this->orderConditionCheck($id_penjualan, "rejected");
        return redirect()->route('jual.index');
    }

}
