@extends('layouts.admin')

@section('content')

<div class="admin-container">

    <div class="main-content">

        <h2>Add Church Announcement</h2>

        <form action="/announcements" method="POST">

            @csrf

            <label>Title</label><br><br>

            <input type="text" name="title"><br><br>

            <label>Date</label><br><br>

            <input type="date" name="announcement_date"><br><br>

            <label>Announcement</label><br><br>

            <textarea
                name="content"
                rows="6"></textarea><br><br>

            <button class="btn">
                Save Announcement
            </button>

        </form>

    </div>

</div>

@endsection