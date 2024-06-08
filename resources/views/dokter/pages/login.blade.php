<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>login Dokter</h1>
    <form method="post" action="{{ route('dokter.proses-login') }}">
        @csrf
        <input type="email" name="email" required autofocus placeholder="email">
        <input type="password" name="password" required placeholder="password">

        <button type="submit">Login</button>
    </form>

</body>

</html>
