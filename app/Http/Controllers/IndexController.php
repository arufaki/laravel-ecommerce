<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;

class IndexController extends Controller
{
    public function index(){
        $newArrival = DB::table('tbstok')
            ->orderBy('id_stok', 'desc')
            ->limit(5)
            ->get();

        $topSelling = \DB::table('mutasi')
            ->leftJoin('tbstok', 'mutasi.id_stok', '=', 'tbstok.id_stok')
            ->select('tbstok.nama_stok', 'tbstok.harga_jual', 'tbstok.image', 'mutasi.id_stok', DB::raw('SUM(mutasi.qty) as total_keluar'))
            ->where('mutasi.keterangan', '=', "Keluar")
            ->groupBy('mutasi.id_stok', 'tbstok.nama_stok', 'tbstok.harga_jual', 'tbstok.image')
            ->orderBy('total_keluar', 'DESC')
            ->get();


        return view('ecomPages.index', compact('newArrival', 'topSelling'));
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

}
