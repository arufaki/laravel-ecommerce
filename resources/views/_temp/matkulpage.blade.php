<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Mata Kuliah</title>
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
</head>
<style>
    .container {
        width: calc(100% - 50px);
        margin: 0 auto;
    }
</style>
<body>
    <div class="container">
        <a href="{{url('/')}}">Back</a>
        <form action="tambahmatkul" method="POST">
            @yield('form')
        </form>
        <div class="tampil">
            @yield('tampilmatkul')
        </div>
    </div>
</body>
</html>