<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AIC SHILOH | Growing in Faith, Hope and Love')</title>

<meta name="description" content="AIC SHILOH Church - Growing in Faith, Hope and Love. Join us for worship, prayer, sermons, events and fellowship.">

<meta name="keywords" content="AIC SHILOH, Church, Syokimau Church, Katani Church, Christian Church Kenya, Sermons, Prayer Requests">

<meta name="author" content="Tasha Muindi">

<meta property="og:title" content="AIC SHILOH">

<meta property="og:description" content="Growing in Faith, Hope and Love.">

<meta property="og:image" content="{{ asset('images/logo.png') }}">

<meta property="og:type" content="website">

<meta property="og:url" content="{{ url()->current() }}">

<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

<link rel="manifest" href="{{ asset('manifest.json') }}">

<link rel="canonical" href="{{ url()->current() }}">

<meta name="theme-color" content="#0B5D1E">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

<header>
    <div class="header-content">

        <img src="{{ asset('images/logo.png') }}" alt="AIC SHILOH" class="logo">

        <div>
            <h1>AIC SHILOH</h1>
            <p>Growing in Faith, Hope and Love</p>
        </div>

    </div>
</header>

<nav>

    <div class="menu-toggle">
        <i class="fas fa-bars"></i>
    </div>

    <div class="nav-links">

    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/ministries">Ministries</a>
    <a href="/sermons">Sermons</a>
    <a href="/contact">Contact</a>
    <a href="/prayer">Prayer</a>
    <a href="/giving">Give</a>

        @auth

            @if(auth()->user()->role == 'super_admin')
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

    </div>

</nav>

<main>

    @yield('content')

</main>

<footer>

    <h3>AIC SHILOH</h3>

    <p>Growing in Faith, Hope and Love.</p>

    <br>

    <h4>Connect With Us</h4>

    <div class="social-icons">

        <a href="https://www.facebook.com/profile.php?id=61587668039761" target="_blank" title="Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>

        <a href="https://youtube.com/@aicshilohmlolongo?si=zmpGollHamOVtKFm" target="_blank" title="YouTube">
            <i class="fab fa-youtube"></i>
        </a>

        <a href="https://www.tiktok.com/@aic.shiloh.mlolon" target="_blank" title="TikTok">
            <i class="fab fa-tiktok"></i>
        </a>

    </div>

    <br>

    <h4>Tithes • Offerings • Thanksgiving</h4>

    <p><strong>LIPA NA M-PESA</strong></p>

    <p>Paybill: <strong>247247</strong></p>

    <p>Account: <strong>878797</strong></p>

    <br>

    <div style="text-align:right; margin-top:20px; font-size:13px; font-style:italic; opacity:0.8;">

    Website by
    <strong>Tasha Muindi</strong>

    |
    <a href="https://wa.me/254703206258"
       target="_blank"
       style="text-decoration:none;color:#FFD700;">
        WhatsApp
    </a>

</div>

</footer>
<!-- WhatsApp Floating Button -->

<a href="https://wa.me/254712105610"
   class="whatsapp-float"
   target="_blank"
   title="Chat with us on WhatsApp">

    <i class="fab fa-whatsapp"></i>

</a>
<script>

const slides = document.querySelectorAll('.slider img');

if (slides.length > 0) {

    let current = 0;

    slides[current].classList.add('active');

    setInterval(() => {

        slides[current].classList.remove('active');

        current = (current + 1) % slides.length;

        slides[current].classList.add('active');

    }, 5000);

}
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');

if(menuToggle){

    menuToggle.addEventListener('click', () => {

        navLinks.classList.toggle('active');

    });

}
</script>

<script>
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js')
        .then(() => console.log('Service Worker Registered'));
}
</script>
</body>
</html>