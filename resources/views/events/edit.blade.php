@extends('layouts.admin')

@section('content')

<div class="main-content">

    <h2>Edit Event</h2>

    <form action="/events/{{ $event->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Event Title</label>
        <input type="text" name="title" value="{{ $event->title }}" required>

        <label>Description</label>
        <textarea name="description" rows="5" required>{{ $event->description }}</textarea>

        <label>Event Date</label>
        <input type="date" name="event_date" value="{{ $event->event_date }}" required>

        <label>Location</label>
        <input type="text" name="location" value="{{ $event->location }}">

        <br><br>

        <button type="submit" class="btn">
            💾 Update Event
        </button>

    </form>

</div>

@endsection