<!DOCTYPE html>

<html>
<head>
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e1e2f, #2c2c54);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

```
    .login-box {
        background: white;
        padding: 30px;
        border-radius: 15px;
        width: 300px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #2ecc71;
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #27ae60;
    }

    .error {
        margin-top: 10px;
        color: red;
        font-size: 14px;
    }
</style>
```

</head>
<body>

<div class="login-box">
    <h2>🔐 Login Admin</h2>

```
<form method="POST" action="/admin/login">
    @csrf

    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>
</form>

@if(session('error'))
    <div class="error">{{ session('error') }}</div>
@endif
```

</div>

</body>
</html>
