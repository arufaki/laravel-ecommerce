<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function perkalian() {
        return view('perkalian');
    }

    public function penjumlahan() {
        return view('penjumlahan');
    }

    public function kali(Request $val) {
        $number1 = $val -> number1;
        $number2 = $val -> number2;
        $result = $number1 * $number2;
        return view("perkalian")
                    ->with('number1', $number1)
                    ->with('number2', $number2)
                    ->with('result', $result);
    }

    public function jumlah(Request $val) {
        $number1 = $val -> number1;
        $number2 = $val -> number2;
        $result = $number1 + $number2;
        return view("penjumlahan")
                    ->with('number1', $number1)
                    ->with('number2', $number2)
                    ->with('result', $result);
    }

    public function berita(Request $numId) {
        $idBerita = $numId -> idBerita;
        return view("berita")
                    ->with("idBerita", $idBerita);
    }

    public function inputmhs() {
        return view('index');
    }

    public function tampildata(Request $r) {
        $nim = $r -> nim;
        $nama = $r -> nama;
        $alamat = $r -> alamat;
        $nohp = $r -> nohp;

        return view('tampildata')
                    ->with('nim', $nim)
                    ->with('nama', $nama)
                    ->with('alamat', $alamat)
                    ->with('nohp', $nohp);
    }

    public function inputmatkul() {
        return view('indexmatkul');    
    }

    public function tambahmatkul(Request $val) {
        $kode = $val -> kode;
        $nama = $val -> nama;
        $sks = $val -> sks;
        $semester = $val -> semester;
        $dosen = $val -> dosen;

        return view('indexmatkul')
                    ->with('kode', $kode)
                    ->with('nama', $nama)
                    ->with('sks', $sks)
                    ->with('semester', $semester)
                    ->with('dosen', $dosen);
    }

    public function krs() {
        return view('krs');
    }
   
}