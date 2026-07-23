@extends('layouts.admin')

@section('content')

<div class="admin-container">

    <div class="sidebar">

        <h2>AIC SHILOH</h2>

        <a href="/admin">📊 Dashboard</a>
        <a href="/prayer">🙏 Prayer Requests</a>
        <a href="/announcements">📢 Announcements</a>
        <a href="/members">👥 Members</a>
        <a href="/admin/events">📅 Events</a>
        <a href="/sermons">🎤 Sermons</a>
        <a href="/gallery">📸 Gallery</a>
        <a href="/settings">⚙ Settings</a>

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

        <div class="dashboard-cards">

            <div class="dashboard-card prayers">
                <div>
                    <h5>Prayer Requests</h5>
                    <h2>{{ $prayerRequests->count() }}</h2>
                </div>
                <span>🙏</span>
            </div>

            <div class="dashboard-card announcements">
                <div>
                    <h5>Announcements</h5>
                    <h2>{{ $announcementCount }}</h2>
                </div>
                <span>📢</span>
            </div>

            <div class="dashboard-card events">
                <div>
                    <h5>Events</h5>
                    <h2>{{ $eventCount }}</h2>
                </div>
                <span>📅</span>
            </div>

            <div class="dashboard-card members">
                <div>
                    <h5>Members</h5>
                    <h2>{{ $memberCount ?? 0 }}</h2>
                </div>
                <span>👥</span>
            </div>

        </div>

        <div class="admin-topbar" style="margin-top:30px;">
            <h2>⚡ Quick Actions</h2>
        </div>

        <div class="services-container">

            <a href="/announcements/create" class="service-card" style="text-decoration:none;">
                <h3>📢 New Announcement</h3>
                <p>Create a church announcement.</p>
            </a>

            <a href="/events/create" class="service-card" style="text-decoration:none;">
                <h3>📅 New Event</h3>
                <p>Add an upcoming church event.</p>
            </a>

            <a href="/gallery" class="service-card" style="text-decoration:none;">
                <h3>🖼 Gallery</h3>
                <p>Manage church photos.</p>
            </a>

            <a href="/prayer" class="service-card" style="text-decoration:none;">
                <h3>🙏 Prayer Page</h3>
                <p>Open the public prayer request page.</p>
            </a>

        </div>

        <h2 style="margin-top:40px;">Prayer Requests</h2>

        <div class="table-responsive">

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

                            <button class="delete-btn"
                                onclick="return confirm('Delete this prayer request?')">
                                🗑 Delete
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" style="text-align:center;">
                        No prayer requests found.
                    </td>
                </tr>

                @endforelse

            </table>

        </div>

        <h2 style="margin-top:40px;">📢 Latest Announcements</h2>

        <div class="table-responsive">

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
                    <td colspan="2" style="text-align:center;">
                        No announcements available.
                    </td>
                </tr>

                @endforelse

            </table>

        </div>

    </div>

</div>

@endsection