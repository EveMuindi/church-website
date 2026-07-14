<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIC SHILOH</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <div class="header-content">
        <h1>AIC SHILOH</h1>
        <p>Growing in Faith, Hope and Love</p>
    </div>
</header>

<nav>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/ministries">Ministries</a>
    <a href="/prayer">Prayer</a>

    @auth
        @if(auth()->user()->role === 'super_admin')
            <a href="/admin">Admin</a>
        @endif

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button style="background:none;border:none;color:white;font-weight:bold;cursor:pointer;">
                Logout
            </button>
        </form>
    @else
        <a href="/login">Login</a>
    @endauth
</nav>

<main>
    @yield('content')
</main>

<footer>
    <h3>AIC SHILOH</h3>
    <p>Growing in Faith, Hope and Love.</p>
    <p>&copy; {{ date('Y') }} AIC SHILOH. All Rights Reserved.</p>
</footer>

</body>
</html>