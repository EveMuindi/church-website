@extends('layouts.admin')

@section('content')

<div class="main-content">

    <h2>✏ Edit Member</h2>

    <form action="/members/{{ $member->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Full Name</label>
        <input type="text" name="name" value="{{ $member->name }}" required>

        <label>Phone</label>
        <input type="text" name="phone" value="{{ $member->phone }}">

        <label>Email</label>
        <input type="email" name="email" value="{{ $member->email }}">

        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" value="{{ $member->date_of_birth }}">

        <label>Gender</label>
        <select name="gender">
            <option value="Male" {{ $member->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $member->gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>

        <label>Ministry</label>
        <input type="text" name="ministry" value="{{ $member->ministry }}">

        <br><br>

        <button type="submit" class="btn">
            💾 Update Member
        </button>

    </form>

</div>

@endsection