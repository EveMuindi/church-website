@extends('layouts.admin')

@section('content')

<div class="main-content">

    <div class="admin-topbar">
        <h2>👥 Church Members</h2>

        <a href="/members/create" class="btn">
            ➕ Add Member
        </a>
    </div>

    <table>

        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Ministry</th>
            <th>Actions</th>
        </tr>

        @forelse($members as $member)

        <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->ministry }}</td>

            <td>

                <a href="/members/{{ $member->id }}/edit" class="edit-btn">
                    ✏ Edit
                </a>

                <form action="/members/{{ $member->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="delete-btn"
                        onclick="return confirm('Delete this member?')">
                        🗑 Delete
                    </button>
                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="5">No members found.</td>
        </tr>

        @endforelse

    </table>

</div>

@endsection