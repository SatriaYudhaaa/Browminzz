<!DOCTYPE html>
<html>
<head>
    <title>Browminzz</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav class="navbar">
    <div class="logo">Browminzz</div>

    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/menu">Menu</a>
    </div>
</nav>

@if(session('error'))
    <div style="color:red; text-align:center; margin:10px;">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    @yield('content')
</div>

</body>
</html>