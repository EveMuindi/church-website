@extends('layouts.admin')

@section('content')

<div class="admin-container">

    <div class="sidebar">
        <h2>AIC SHILOH</h2>

        <a href="/admin">📊 Dashboard</a>
        <a href="#">🙏 Prayer Requests</a>
        <a href="/announcements">📢 Announcements</a>
        <a href="#">👥 Members</a>
        <a href="/events">📅 Events</a>
        <a href="#">🎤 Sermons</a>
        <a href="#">📸 Gallery</a>
        <a href="#">⚙ Settings</a>

        <hr style="margin:30px 0;">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background:none;border:none;color:#ffcccc;cursor:pointer;font-size:16px;padding:0;">
                🚪 Logout
            </button>
        </form>

        <div style="position:absolute; bottom:20px; left:20px; color:#ddd; font-size:14px;">
            AIC SHILOH CMS<br>
            Version 1.0
        </div>
    </div>

    <div class="main-content">

        <div class="admin-topbar">
            <h2>🛡️ AIC SHILOH Admin Panel</h2>
            <p>Welcome, Administrator</p>
        </div>

        <h1>Admin Dashboard</h1>

        <div class="services-container">

            <div class="service-card">
                <h3>🙏 Prayer Requests</h3>
                <h1>{{ $prayerRequests->count() }}</h1>
            </div>

            <div class="service-card">
                <h3>📢 Announcements</h3>
                <h1>{{ $announcementCount }}</h1>
            </div>

            <div class="service-card">
            <h3>📅 Events</h3>
            <h1>{{ $eventCount }}</h1>
            </div>

        </div>

        <h2 style="margin-top:40px;">Prayer Requests</h2>

        <table>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Prayer Request</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            @forelse($prayerRequests as $request)
            <tr>
                <td>{{ $request->name }}</td>
                <td>{{ $request->phone }}</td>
                <td>{{ $request->email }}</td>
                <td>{{ $request->prayer_request }}</td>
                <td>{{ $request->created_at->format('d M Y') }}</td>
                <td>
                    <a href="/prayer/{{ $request->id }}" class="view-btn">👁 View</a>
                    <a href="/prayer/{{ $request->id }}/edit" class="edit-btn">✏ Edit</a>

                    <form action="/prayer/{{ $request->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn" onclick="return confirm('Delete this prayer request?')">
                            🗑 Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;">No prayer requests found.</td>
            </tr>
            @endforelse
        </table>

        <h2 style="margin-top:40px;">📢 Latest Announcements</h2>

        <table>
            <tr>
                <th>Title</th>
                <th>Date</th>
            </tr>

            @forelse($announcements as $announcement)
            <tr>
                <td>{{ $announcement->title }}</td>
                <td>{{ \Carbon\Carbon::parse($announcement->announcement_date)->format('d M Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2" style="text-align:center;">No announcements available.</td>
            </tr>
            @endforelse
        </table>

    </div>

</div>

@endsection