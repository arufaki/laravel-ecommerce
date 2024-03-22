<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TampilData Mhs</title>
</head>
<style>
    body {
        text-align: center
    }

    table {
        margin: 0 auto;
    }

</style>
<body>
    <h1>Data mhs</h1>
    <br>
    <a href="{{url('/inputmhs')}}">Tambah Data Baru</a>
    <br>
    <br>
    <table border="1" width="50%">
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>NoHp</th>
        <tr>
            <td>1</td>
            <td>{{$nim ? $nim : "-"}}</td>
            <td>{{$nama ? $nama : "-"}}</td>
            <td>{{$alamat ? $alamat : "-"}}</td>
            <td>{{$nohp ? $nohp : "-"}}</td>
        </tr>
    </table>
</body>
</html>