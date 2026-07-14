@extends('layouts.admin')

@section('content')

<div class="admin-container">

    <div class="sidebar">
        <h2>AIC SHILOH</h2>

        <a href="/admin">📊 Dashboard</a>
        <a href="/announcements">📢 Announcements</a>
        <a href="#">👥 Members</a>
        <a href="#">📅 Events</a>
        <a href="#">🎤 Sermons</a>
        <a href="#">📸 Gallery</a>
        <a href="#">⚙ Settings</a>

        <hr style="margin:30px 0;">

        <a href="/">🚪 Logout</a>
    </div>

    <div class="main-content">

        <div class="admin-topbar">
            <h2>📢 Church Announcements</h2>

            <a href="/announcements/create" class="btn">
                ➕ Add Announcement
            </a>
        </div>

        <table>

    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Content</th>
        <th>Actions</th>
    </tr>

    @foreach($announcements as $announcement)

    <tr>
        <td>{{ $announcement->title }}</td>
        <td>{{ $announcement->announcement_date }}</td>
        <td>{{ $announcement->content }}</td>

        <td>

            <a href="/announcements/{{ $announcement->id }}/edit" class="edit-btn">
                ✏ Edit
            </a>

            <form action="/announcements/{{ $announcement->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button class="delete-btn"
                    onclick="return confirm('Delete this announcement?')">
                    🗑 Delete
                </button>
            </form>

        </td>

    </tr>

    @endforeach

</table>

    </div>

</div>

@endsection