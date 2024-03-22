<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Application</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center
    }
</style>

<body>
    <h1>KRS</h1>
    <br>
    <br>
    <a href="{{ url('tahunakademik') }}">Input Tahun Akademik</a>
    <br>
    <br>
    <a href="{{ url('ruang') }}">Input Ruang</a>
    <br>
    <br>
    <a href="{{ url('prodi') }}">Input Prodi</a>
    <br>
    <br>
    <a href="{{ url('kelas') }}">Input Kelas</a>
    <br>
    <br>
    <a href="{{ url('fakultas') }}">Input Fakultas</a>
    <br>
    <br>
    <a href="{{ Route('mahasiswa.index', 'mahasiswa') }}">Input Mahasiswa with DBMS</a>
    <br>
    <br>
    <a href="{{ url('dosen') }}">Input Dosen with DBMS</a>
    <br>
    <br>
    <h3><a href="{{ url('/') }}">Back to Home</a></h3>
</body>

</html>
