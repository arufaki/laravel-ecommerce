<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index() {
        $user = Auth()->user()->id;
        $adminFee = 1200;

        $recordsCart = \DB::table('cart')
        ->where('id_user', $user)
        ->leftJoin('tbstok', 'cart.id_stok', '=', 'tbstok.id_stok')
        ->select('cart.*', 'tbstok.nama_stok as nama_stok', 'tbstok.harga_jual as harga_jual', 'tbstok.image as image')
        ->orderBy('id_cart', 'desc');

        

        $recordCarts = $recordsCart->get();

        $calcSubTotal = $recordCarts->sum(function($datas) {
            return $datas->harga_jual * $datas->qty;
        });

        $subtotal = $recordCarts ? $calcSubTotal : 0;

        $deliveryFee = $recordCarts ? 100000 : 0;

        $total = $subtotal;

        // Call Address in Checkout Page
        $userAddress =  \DB::table('users')
        ->where('id', $user)
        ->leftJoin('tbpelanggan', "users.id", "=", "tbpelanggan.id_user")
        ->select('users.*', "tbpelanggan.alamat_pelanggan as alamat_pelanggan", "tbpelanggan.nohp as nohp")
        ->get();

        return view('ecomPages.checkout', compact('recordCarts', 'subtotal', 'total', 'deliveryFee', 'userAddress'));
    }

    public function store(Request $r) {
        $user = Auth()->user()->id;
        $date = Carbon::now();
        $noBukti = "OR". $user. $date->format('YmdHis');

        $fotoPembayaran = $r->validate(['image' => 'image|mimes:png,jpg,jpeg|max:2048']);
        $imageAccess = $r->file('image');

        if($r->hasFile('image')) {
            $imageName =  time().rand(1,99).'.'.$r->file('image')->extension();
            $saveImage = $r->file('image')->storeAs('bukti-pembayaran', $imageName);  
        } 

        $x = array(
            'no_bukti' => $noBukti,
            'tanggal' => $date,
            'keterangan' => "Penjualan",
            'ekspedisi' => "JNE",
            'bukti_pembayaran' => $saveImage,
            'id_user' => $user,
        );

        $rec = \DB::table('jual')
                ->where("no_bukti", $noBukti)
                ->first();

        if ($rec == null) {
            \DB::table('jual')
                ->InsertGetId($x);

            // Ambil semua produk dari cart user lalu masukkan ke tbmutasi 
            $cartUser = \DB::table('cart')
                        ->where('id_user', $user)
                        ->leftJoin('tbstok', 'cart.id_stok', "=", 'tbstok.id_stok')
                        ->leftJoin('mutasi', 'cart.id_stok', "=", 'mutasi.id_stok')
                        ->select('cart.*', 'tbstok.harga_jual as harga_jual', 'tbstok.saldo_awal as saldo_awal', 'mutasi.masuk as stok_masuk', 'mutasi.keluar as stok_keluar')
                        ->get();

            foreach($cartUser as $cart) {

                $dataMutasi = array(
                    'no_bukti' => $noBukti,
                    'keluar' => $cart->qty,
                    'harga' => $cart->harga_jual * $cart->qty,
                    'keterangan' => "Keluar",
                    'id_stok' => $cart->id_stok,
                    'created_at' => $date,
                    'updated_at' => $date,
                );

                \DB::table('mutasi')
                    ->InsertGetId($dataMutasi);

                // Update Qty di TBSTOK - Qty di Cart User
                $updateStok = $cart->saldo_awal + $cart->stok_masuk - $cart->qty;

                \DB::table('tbstok')
                    ->where("id_stok", $cart->id_stok)
                    ->update(["saldo_awal" => $updateStok]);
            }

            return redirect()->route('ecomPages.index')->with('sukses', 'Berhasil Checkout');
        } else {
            return redirect()->back()->with('gagal', 'Checkout Gagal');
        }

    }

}
