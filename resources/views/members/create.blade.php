@extends('layouts.admin')

@section('content')

<div class="main-content">

    <h2>👥 Add New Member</h2>

    <form action="/members" method="POST">

        @csrf

        <label>Full Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>Phone</label>
        <input type="text" name="phone" value="{{ old('phone') }}">

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">

        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}">

        <label>Gender</label>
        <select name="gender">
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        </select>

        <label>Ministry</label>
        <input type="text" name="ministry" value="{{ old('ministry') }}">

        <br><br>

        <button type="submit" class="btn">
            💾 Save Member
        </button>

    </form>

</div>

@endsection