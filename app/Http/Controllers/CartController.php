<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $recordsCart = \DB::table('cart')
        ->leftJoin('tbstok', 'cart.id_stok', '=', 'tbstok.id_stok')
        ->select('cart.*', 'tbstok.nama_stok as nama_stok', 'tbstok.harga_jual as harga_jual', 'tbstok.image as image');

        $recordCarts = $recordsCart->get();

        return view('ecomPages.cart', compact('recordCarts'));
    }

    public function store(Request $r) {

        $x = array(
            'ukuran' => $r->ukuran,
            'qty' => $r->qty,
            'id_stok' => $r->id_stok,
        );

        $product = \DB::table('tbstok')->where('id_stok', $r->id_stok)->first();
        
        if($product) {
            $cartItem = \DB::table('cart')->where('id_stok', $r->id_stok)->where('ukuran', $r->ukuran)->first();
            
            if($cartItem) {
                \DB::table('cart')->where('id_stok', $r->id_stok)->where('ukuran', $r->ukuran)->increment('qty', $r->qty);
            } else {
                \DB::table('cart')->InsertGetId($x);
            }
            return redirect()->route('cart.index');
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
        
    } 

    public function update(Request $r) {
        $x = array(
            'qty' => $r->qty,
            'id_stok' => $r->id_stok,
        );

        $cartItem = \DB::table('cart')->where('id_cart', $r->id_cart)->first();

        if($cartItem) {
           if($r->action == 'increase') {
                \DB::table('cart')->where('id_cart', $r->id_cart)->increment('qty');
           } else if($r->action == 'decrease') {
                \DB::table('cart')->where('id_cart', $r->id_cart)->decrement('qty');

           }
        }

        return redirect()->route('cart.index');

    }
}
