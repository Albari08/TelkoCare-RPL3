<!DOCTYPE html>
<html>
<head>
    <title>Doctor Login</title>
</head>
<body>
    <form method="POST" action="{{ route('doctor.login.submit') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
