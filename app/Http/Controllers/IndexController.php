<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function index(){
        $newProduct = \DB::table('tbstok')->get();

        return view('ecomPages.index', compact('newProduct'));
    }

    public function productDetail($id_stok) {

        // $user= Auth()->user();
        // dd($user);

        $selectedProduct = \DB::table('tbstok')
        ->leftJoin('tbsatuan', 'tbstok.id_satuan', '=', 'tbsatuan.id_satuan')
        ->select('tbstok.*', 'tbsatuan.nama_satuan')
        ->where('id_stok', $id_stok)->first();

        $extractImage = json_decode($selectedProduct->image);
        

        return view('ecomPages.product-detail', compact('selectedProduct', 'extractImage'));
    }


    public function products() {
        $newProduct = \DB::table('tbstok')->get();

        return view('ecomPages.products', compact('newProduct'));
    }


    // public function signin() {
    //     return view('ecomPages.login');
    // }

    // public function cart() {
    //     return view('ecomPages.cart');
    // }
}
