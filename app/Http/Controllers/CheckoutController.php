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
            'ekspedisi' => $r->expedition_input,
            'bukti_pembayaran' => $saveImage,
            'id_user' => $user,
        );

        $rec = \DB::table('jual')
                ->where("no_bukti", $noBukti)
                ->first();

        if ($rec == null) {
            \DB::table('jual')
                ->InsertGetId($x);

            return redirect()->route('ecomPages.index')->with('sukses', 'Berhasil Checkout');
        } else {
            return redirect()->back()->with('gagal', 'Checkout Gagal');
        }

    }

}
