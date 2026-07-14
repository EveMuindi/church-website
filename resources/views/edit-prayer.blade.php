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
            <h2>✏ Edit Prayer Request</h2>
        </div>

        <div class="announcement-card">

            <form action="/prayer/{{ $prayer->id }}" method="POST">

                @csrf
                @method('PUT')

                <label><strong>Name</strong></label><br><br>
                <input type="text" name="name" value="{{ $prayer->name }}"><br><br>

                <label><strong>Phone</strong></label><br><br>
                <input type="text" name="phone" value="{{ $prayer->phone }}"><br><br>

                <label><strong>Email</strong></label><br><br>
                <input type="email" name="email" value="{{ $prayer->email }}"><br><br>

                <label><strong>Prayer Request</strong></label><br><br>

                <textarea name="prayer_request" rows="6">{{ $prayer->prayer_request }}</textarea><br><br>

                <button class="btn">💾 Update Prayer Request</button>

            </form>

        </div>

    </div>

</div>

@endsection