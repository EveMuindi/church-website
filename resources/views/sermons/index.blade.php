@extends('layouts.admin')

@section('content')

<div class="main-content">

    <div class="admin-topbar">
        <h2>🎤 Sermons</h2>

        <a href="/sermons/create" class="btn">
            ➕ Add Sermon
        </a>
    </div>

    <table>

        <tr>
            <th>Title</th>
            <th>Preacher</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>

        @forelse($sermons as $sermon)

        <tr>

            <td>{{ $sermon->title }}</td>
            <td>{{ $sermon->preacher }}</td>
            <td>{{ \Carbon\Carbon::parse($sermon->sermon_date)->format('d M Y') }}</td>

            <td>

                @if($sermon->file)
                    <a href="{{ asset('storage/'.$sermon->file) }}" class="view-btn" target="_blank">
                        📄 View
                    </a>
                @endif

                <a href="/sermons/{{ $sermon->id }}/edit" class="edit-btn">
                    ✏ Edit
                </a>

                <form action="/sermons/{{ $sermon->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="delete-btn"
                        onclick="return confirm('Delete this sermon?')">
                        🗑 Delete
                    </button>
                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="4">No sermons available.</td>
        </tr>

        @endforelse

    </table>

</div>

@endsection