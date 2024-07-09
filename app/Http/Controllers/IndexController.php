<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use RealRashid\SweetAlert\Facades\Alert;


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

        $selectedProduct = \DB::table('vsaldoakhir2')
        ->leftJoin('tbstok', 'vsaldoakhir2.id_stok', '=', 'tbstok.id_stok')
        ->leftJoin('tbsatuan', 'tbstok.id_satuan', '=', 'tbsatuan.id_satuan')
        ->select('vsaldoakhir2.*', 'tbsatuan.nama_satuan', 'tbstok.*')
        ->where('vsaldoakhir2.id_stok', $id_stok)->first();

        $extractImage = json_decode($selectedProduct->image);
        

        return view('ecomPages.product-detail', compact('selectedProduct', 'extractImage'));
    }


    public function products(Request $r) {
        $newProducts = \DB::table('tbstok')
        ->leftJoin('tbkategori', 'tbstok.id_kategori', '=', 'tbkategori.id_kategori')
        ->leftJoin('brand', 'tbstok.id_brand', '=', 'brand.id_brand')
        ->select('tbstok.*', 'tbkategori.nama_kategori as nama_kategori', 'brand.nama_brand as nama_brand');

        $search = $r->input('search');

        if($search) {
            $filterSearch = $newProducts->where('tbstok.nama_stok', 'like', "%$search%")
                                        ->orWhere('nama_kategori', 'like', "%$search%")
                                        ->orWhere('nama_brand', 'like', "%$search%")->get();
            return view('ecomPages.products', ['products' => $filterSearch, 'isSearch' => true]);
        }

        $newProduct = $newProducts->get();

        return view('ecomPages.products', ['products' => $newProduct, 'isSearch' => false]);
    }

    public function updateUsername(Request $r) {
        $user = Auth()->user();

        $r->validate([
            'name' => 'required|string|max:255',
        ]);

        $updateUsername = \DB::table('users')
                            ->where('id', $user->id)
                            ->update(['name' => $r->name]);

        Alert::success('Success', 'Success Changing Username');
        return redirect()->back();
    }

    public function updateInformation(Request $r) {
        $user = Auth()->user();

        $r->validate([
            'nohp' => 'nullable|string|max:300',
            'alamat_pelanggan' => 'nullable|string|max:300',    
        ]);

        $x = array(
            'nohp' => $r->nohp,
            'alamat_pelanggan' => $r->alamat_pelanggan,
        );
        
        $updateUserInfo = \DB::table('tbpelanggan')
                            ->where('id_user', $user->id)
                            ->first();

        if($updateUserInfo == null) {
            \DB::table('tbpelanggan')
                ->where('id_user', $user->id)
                ->insertGetId($x);

             Alert::success('Success', 'Success Adding Information');
            return redirect()->back();
        } else {
            \DB::table('tbpelanggan')
                ->where('id_user', $user->id)
                ->update($x);

            Alert::success('Success', 'Success Changing Information');
            return redirect()->back();
        }

    }

    // public function searchFunction(Request $r) {

    //     $search = $r->input('search');

    //     $dataProduct = \DB::table('tbstok')


    //     return view('ecomPages.products');
    // }

}
