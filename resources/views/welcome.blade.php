@extends('layouts.app')

@section('content')

<div class="hero">

    <img src="/images/church1.jpg" alt="AIC SHILOH">

    <div class="hero-text">
        <h2>Welcome to AIC SHILOH</h2>
        <p>Growing in Faith, Hope and Love.</p>

        <a href="#" class="btn">Join Us This Sunday</a>
    </div>

</div>

<section class="services">

    <h2>Service Times</h2>

    <div class="services-container">

        <div class="service-card">
            <h3>Sunday Worship Service</h3>
            <p>9:30 AM - 12:30 PM</p>
        </div>

        <div class="service-card">
            <h3>Miracle Service</h3>
            <p>Every Wednesday</p>
            <p>5:30 PM - 7:00 PM</p>
        </div>

    </div>

</section>

<section class="announcements">

    <h2>Church Service Schedule</h2>

    <div class="announcement-card">

        <h3>Sunday Services</h3>

        <p><strong>Morning Glory:</strong> 6:00 AM - 7:30 AM</p>
        <p><strong>Kingdom Empowerment Class:</strong> 7:30 AM - 8:45 AM</p>
        <p><strong>Main Service:</strong> 9:00 AM - 12:00 PM</p>
        <p><strong>CED Classes:</strong> 12:00 PM - 12:45 PM</p>

    </div>

    <div class="announcement-card">

        <h3>Weekly Services</h3>

        <h4>Wednesday</h4>

        <p><strong>Miracle Service:</strong> 5:30 PM - 7:00 PM</p>
        <p><strong>Pastor's Office Day:</strong> 10:00 AM - 5:00 PM</p>

        <h4>Saturday</h4>

        <p><strong>Tukuza Choir:</strong> 3:00 PM - 5:00 PM</p>
        <p><strong>Chosen Generation:</strong> 4:00 PM - 5:00 PM</p>
        <p><strong>Sifa Choir:</strong> 5:00 PM - 6:00 PM</p>
        <p><strong>Praise & Worship:</strong> 6:00 PM - 7:00 PM</p>

    </div>

</section>

<!-- Dynamic Announcements -->
<section class="announcements">

    <h2>Latest Announcements</h2>

    @forelse($announcements as $announcement)

    <div class="announcement-card">

        <h3>{{ $announcement->title }}</h3>

        <small>
            {{ \Carbon\Carbon::parse($announcement->announcement_date)->format('d M Y') }}
        </small>

        <p style="margin-top:15px;">
            {{ $announcement->content }}
        </p>

    </div>

    @empty

    <div class="announcement-card">
        <p>No announcements available.</p>
    </div>

    @endforelse

</section>

<section class="features">

    <h2>Explore AIC SHILOH</h2>

    <div class="features-container">

        <div class="feature-card">
            <h3>📖 Our Vision</h3>
            <p>Discover our mission, vision, and foundation in Christ.</p>
            <a href="/about" class="btn">Learn More</a>
        </div>

        <div class="feature-card">
            <h3>🙏 Prayer Request</h3>
            <p>Share your prayer requests and let us stand with you in prayer.</p>
            <a href="/prayer" class="btn">Submit Prayer</a>
        </div>

        <div class="feature-card">
            <h3>📅 Upcoming Events</h3>
            <p>Stay updated with church programs, conferences and fellowships.</p>
            <a href="#" class="btn">View Events</a>
        </div>

    </div>

</section>

@endsection