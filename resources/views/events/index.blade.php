@extends('layouts.admin')

@section('content')

<div class="admin-container">

    <div class="sidebar">
        <h2>AIC SHILOH</h2>

        <a href="/admin">📊 Dashboard</a>
        <a href="/announcements">📢 Announcements</a>
        <a href="/events">📅 Events</a>

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
            <h2>📅 Church Events</h2>

            <a href="/events/create" class="btn">
                ➕ Add Event
            </a>
        </div>

        <table>

            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>

            @forelse($events as $event)

            <tr>

                <td>{{ $event->title }}</td>

                <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>

                <td>{{ $event->location }}</td>

                <td>

                    <a href="/events/{{ $event->id }}/edit" class="edit-btn">
                        ✏ Edit
                    </a>

                    <form action="/events/{{ $event->id }}" method="POST" style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="delete-btn"
                            onclick="return confirm('Delete this event?')">
                            🗑 Delete
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="4">No events available.</td>
            </tr>

            @endforelse

        </table>

    </div>

</div>

@endsection