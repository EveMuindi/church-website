@extends('layouts.admin')

@section('content')

<div class="main-content">

    <h2>Add New Event</h2>

    <form action="/events" method="POST">

        @csrf

        <label>Event Title</label>
        <input type="text" name="title" required>

        <label>Description</label>
        <textarea name="description" rows="5" required></textarea>

        <label>Event Date</label>
        <input type="date" name="event_date" required>

        <label>Location</label>
        <input type="text" name="location">

        <br><br>

        <button type="submit" class="btn">
            💾 Save Event
        </button>

    </form>

</div>

@endsection