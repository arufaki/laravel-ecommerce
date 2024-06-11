<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        $recordsCart = \DB::table('cart')
        ->leftJoin('tbstok', 'cart.id_stok', '=', 'tbstok.id_stok')
        ->select('cart.*', 'tbstok.nama_stok as nama_stok', 'tbstok.harga_jual as harga_jual', 'tbstok.image as image')
        ->orderBy('id_cart', 'desc');

        $recordsAlamat = \DB::table('tbpelanggan')
        ->leftJoin('users', 'tbpelanggan.id_user', '=', 'users.id')
        ->select('tbpelanggan.*', 'users.name as nama_pelanggan');

        $recordCarts = $recordsCart->get();

        $calcSubTotal = $recordCarts->sum(function($datas) {
            return $datas->harga_jual * $datas->qty;
        });

        $subtotal = $recordCarts ? $calcSubTotal : 0;

        // $deliveryFee = $recordCarts ? 200000 : 0;

        $total = $subtotal;

        return view('ecomPages.checkout', compact('recordCarts', 'subtotal', 'total'));
    }

}
