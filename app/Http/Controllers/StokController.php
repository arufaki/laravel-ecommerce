<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index() {
        $recordStok= \DB::Table('tbstok')->get();
        $no = 1;

        return view('stok.list', compact('recordStok', 'no'))
            ->with('judul', 'Daftar Tahun Akademik');
    }
}
