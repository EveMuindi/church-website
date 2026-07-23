@extends('layouts.admin')

@section('content')

<div class="admin-container">

    <div class="sidebar">

        <h2>AIC SHILOH</h2>

        <a href="/admin">📊 Dashboard</a>
        <a href="/announcements">📢 Announcements</a>
        <a href="/members">👥 Members</a>
        <a href="/events">📅 Events</a>
        <a href="/sermons">🎤 Sermons</a>
        <a href="/gallery">📸 Gallery</a>
        <a href="/settings">⚙ Settings</a>

        <hr style="margin:30px 0;">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background:none;border:none;color:#ffcccc;cursor:pointer;">
                🚪 Logout
            </button>
        </form>

    </div>

    <div class="main-content">

        <div class="admin-topbar">

            <h2>📢 Church Announcements</h2>

            <a href="/announcements/create" class="btn">
                ➕ Add Announcement
            </a>

        </div>

        <div class="table-responsive">

            <table>

                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>

                @forelse($announcements as $announcement)

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

                @empty

                <tr>

                    <td colspan="4">
                        No announcements available.
                    </td>

                </tr>

                @endforelse

            </table>

        </div>

    </div>

</div>

@endsection