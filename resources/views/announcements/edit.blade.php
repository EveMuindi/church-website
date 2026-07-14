@extends('layouts.admin')

@section('content')

<div class="admin-container">

    <div class="sidebar">
        <h2>AIC SHILOH</h2>

        <a href="/admin">📊 Dashboard</a>
        <a href="/announcements">📢 Announcements</a>
    </div>

    <div class="main-content">

        <h2>Edit Announcement</h2>

        <form action="/announcements/{{ $announcement->id }}" method="POST">

            @csrf
            @method('PUT')

            <label>Title</label><br>
            <input type="text" name="title" value="{{ $announcement->title }}" required><br><br>

            <label>Date</label><br>
            <input type="date" name="announcement_date" value="{{ $announcement->announcement_date }}" required><br><br>

            <label>Content</label><br>
            <textarea name="content" rows="6" required>{{ $announcement->content }}</textarea><br><br>

            <button type="submit" class="btn">
                💾 Update Announcement
            </button>

        </form>

    </div>

</div>

@endsection