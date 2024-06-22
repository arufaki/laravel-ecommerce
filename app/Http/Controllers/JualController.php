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
    private function orderConditionCheck($id_penjualan, $status, $keterangan) {

        // call table jual
        $callJual= \DB::table('jual')
            ->where("id_penjualan", $id_penjualan);
        
        // get data Tabel Jual
        $getDataJual = $callJual->first();

        // Call table cart
        $cartUser = \DB::table('cart')
                        ->where('id_user', $getDataJual->id_user);
        
        // Get data Cart then join mutasi and stok tabel for showing data
        $getDataCart = $cartUser->leftJoin('tbstok', 'cart.id_stok', "=", 'tbstok.id_stok')
                                ->leftJoin('mutasi', 'cart.id_stok', "=", 'mutasi.id_stok')
                                ->select('cart.*', 'tbstok.harga_jual as harga_jual', 'tbstok.saldo_awal as saldo_awal', 'mutasi.qty as qty_mutasi')
                                ->get();

        // Looping data cart user yang belanja
        foreach($getDataCart as $cart) {
            
            $dataMutasi = array(
                'no_bukti' => $getDataJual->no_bukti,
                'qty' =>  $cart->qty,
                'harga' => $cart->harga_jual * $cart->qty,
                'keterangan' => $keterangan,
                'id_stok' => $cart->id_stok,
                'created_at' => now(),
                'updated_at' => now(),
            );

            // inputkan data yang sudah dilooping ke tabel mutasi
            \DB::table('mutasi')
                ->InsertGetId($dataMutasi);

            // Update status orderan customer di acc atau tidak, jika acc cart customer masukkan ke tbmutasi
            $updateStatusOrder = $callJual->update(['status' => $status]);

            // cek status yang sudah diperbarui
            $statusCheck = $status == "success" ? "Keluar" : ($status == "rejected" ? "Masuk" : "Keluar");

        

            //  setelah di input ke mutasi, update Saldo Awal dengan rumus dibawah ini
            // cart->saldo awal berasal dari tabel yang sudah dijoin di $getDataCart
            $saldoCondition = $status == "success" ? $cart->saldo_awal - $cart->qty_mutasi : ($status == "rejected" ? $cart->saldo_awal + $cart->qty_mutasi : $cart->saldo_awal);

            // Setelah itu update stok dengan rumus yang sudah di deklarasikan di $updateStok
            \DB::table('tbstok')
                ->where("id_stok", $cart->id_stok)
                ->update(["saldo_awal" => $saldoCondition]);
            
            // Setelah itu hapus cart yang ada di cart pelanggan
            $cartUser->delete();
        } 
    }

    // fungsi ini dijalankan ketika admin menekan tombol accept
    public function edit($id_penjualan)
    {
        // memanggil private fungsi dengan memasukkan parameter sesuai dengan button yang diklik
        // success dan keluar adalah parameter ketika button accept diklik akan update status ke success dan cart masuk ke mutasi dengan keterangan barang keluar atau terjual
        $this->orderConditionCheck($id_penjualan, "success", "Keluar");
        return redirect()->route('jual.index');
    }

        // fungsi ini dijalankan ketika admin menekan tombol reject
    public function show($id_penjualan)
    {
         // memanggil private fungsi dengan memasukkan parameter sesuai dengan button yang diklik
        // rejected dan masuk adalah parameter ketika button reject diklik akan update status ke rejected dan cart masuk ke mutasi dengan keterangan barang masuk atau return jual
        $this->orderConditionCheck($id_penjualan, "rejected", "Masuk");
        return redirect()->route('jual.index');
    }

}
