<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $newProduct = \DB::table('tbstok')->get();

        return view('ecomPages.index', compact('newProduct'));
    }

    public function productDetail($id_stok) {
        $selectedProduct = \DB::table('tbstok')->where('id_stok', $id_stok)->first();

        $extractImage = json_decode($selectedProduct->image);

        return view('ecomPages.product-detail', compact('selectedProduct', 'extractImage'));
    }


    // public function signin() {
    //     return view('ecomPages.login');
    // }

    // public function cart() {
    //     return view('ecomPages.cart');
    // }
}
