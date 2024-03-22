@extends('matkulpage')
@section('form')
@csrf
    <label for="kode">Kode Mata Kuliah</label>
    <input type="number" name="kode" >
    <label for="nama">Nama Matkul</label>
    <input type="text" name="nama" >
    <label for="sks">SKS</label>
    <input type="number" name="sks">
    <label for="semester">Semester</label>
    <input type="number" name="semester">
    <label for="dosen">Nama Dosen</label>
    <input type="text" name="dosen">
    <button type="submit">Submit</button>
@endsection
@section('tampilmatkul')
    <br>
    <br>
    <br>
    <table border="1" width="50%">
        <th>No</th>
        <th>Kode Matkul</th>
        <th>Nama Matkul</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Nama Dosen</th>
        <tr>
            <td>1</td>
            <td>{{$kode ??  "-"}}</td>
            <td>{{$nama ?? "-"}}</td>
            <td>{{$sks ?? "-"}}</td>
            <td>{{$semester ?? "-"}}</td>
            <td>{{$dosen ?? "-"}}</td>
        </tr>
    </table>    
@endsection