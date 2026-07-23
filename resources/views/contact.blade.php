@extends('layouts.app')

@section('content')

<section class="services">

    <h2>Contact Us</h2>

    <div class="announcement-card">

        <h3>AIC SHILOH</h3>

        <p>
            We would love to hear from you. Feel free to reach out or visit us during our services.
        </p>

        <br>

        <p><strong>📍 Address</strong></p>
        <p>Katani Road, Syokimau, Nairobi, Kenya</p>

        <br>

        <p><strong>📞 Phone</strong></p>
        <p>+254 712 105 610</p>

        <br>

        <p><strong>📧 Email</strong></p>
        <p>aicshilohmlolongo@gmail.com</p>

        <br>

        <p><strong>🕘 Office Hours</strong></p>
        <p>Wednesday: 9:00 AM – 5:00 PM</p>

        <br>

        <a href="https://wa.me/254712105610" target="_blank" class="btn">
            Chat on WhatsApp
        </a>

    </div>

</section>

<section class="location">

    <h2>📍 Find Us</h2>

    <div class="map-container">

        <iframe
            src="https://www.google.com/maps?q=-1.3780583,36.9493817&z=17&output=embed"
            width="100%"
            height="500"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>

    </div>

    <br>

    <a href="https://www.google.com/maps?q=-1.3780583,36.9493817"
       target="_blank"
       class="btn">
        Get Directions
    </a>

</section>

@endsection