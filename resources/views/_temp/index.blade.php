@extends('default')
@section('input')
@csrf
    <label for="nim">Nim</label>
    <input type="number" name="nim">
    <label for="nama">Nama</label>
    <input type="text" name="nama">
    <label for="alamat">Alamat</label>
    <input type="text" name="alamat">
    <label for="nohp">No Telepon</label>
    <input type="number" name="nohp">
    <button type="submit">Submit</button>
@endsection