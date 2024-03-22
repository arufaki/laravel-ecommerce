<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perkalian</title>
</head>
<style>
    body {
        text-align: center;
    }
    form {
        display: flex;
        justify-content: center;
        flex-direction: row;
        height: 20px;
        align-items: center;
        gap: 10px
    }
</style>
<body>
    <h1>Perkalian</h1>
    <h3><a href="{{url('/')}}">Back to Home</a></h3>
    <form action="kali" method="post">
        <input type="hidden" value="{!! csrf_token() !!}" name="_token">
        <input type="number" name="number1" value="{{isset($number1) ? $number1 : ""}}">
        <p>*</p>
        <input type="number" name="number2" value="{{isset($number2) ? $number2 : ""}}">
        <button type="submit">=</button>
        <input type="number" name="result" value="{{isset($result) ? $result : ""}}" disabled>
    </form>
</body>
</html>