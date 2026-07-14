@extends('layouts.admin')

@section('content')

<div class="admin-container">

    <div class="sidebar">
        <h2>AIC SHILOH</h2>

        <a href="/admin">📊 Dashboard</a>
        <a href="#">🙏 Prayer Requests</a>
        <a href="#">👥 Members</a>
        <a href="#">📅 Events</a>
        <a href="#">🎤 Sermons</a>
        <a href="#">📸 Gallery</a>
        <a href="#">⚙ Settings</a>

        <hr style="margin:30px 0;">

        <a href="/" style="color:#ffcccc;">🚪 Logout</a>

        <div style="position:absolute; bottom:20px; left:20px; color:#ddd; font-size:14px;">
            AIC SHILOH CMS<br>
            Version 1.0
        </div>
    </div>

    <div class="main-content">

        <div class="admin-topbar">
            <h2>🙏 Prayer Request Details</h2>
        </div>

        <div class="announcement-card">

            <p><strong>Name:</strong> {{ $prayer->name }}</p>

            <p><strong>Phone:</strong> {{ $prayer->phone }}</p>

            <p><strong>Email:</strong> {{ $prayer->email }}</p>

            <p><strong>Prayer Request:</strong></p>

            <p>{{ $prayer->prayer_request }}</p>

            <p><strong>Date Submitted:</strong>
                {{ $prayer->created_at->format('d M Y, h:i A') }}
            </p>

            <br>

            <a href="/admin" class="btn">⬅ Back to Dashboard</a>

        </div>

    </div>

</div>

@endsection