<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .container, form {
        display: flex;
        flex-direction: column;
        width: 20%;
        align-items: center;
        justify-content: center;
        margin: 0 auto
    }

    form {
        gap: 10px
    }
</style>
<body>
    <div class="container">
        <a href="{{url('/')}}">Back</a>
        <h1>Input Data Mahasiswa</h1>
        <form method="POST" action="{{url('tampildata')}}">@yield('input')</form>
    </div>
</body>
</html>