@extends('layouts.app')

@section('content')

<section class="features">

    <h2>📅 Upcoming Church Events</h2>

    @forelse($events as $event)

        <div class="announcement-card">

            <h3>{{ $event->title }}</h3>

            <p><strong>Date:</strong>
                {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
            </p>

            <p><strong>Location:</strong>
                {{ $event->location }}
            </p>

            @if($event->description)
                <p>{{ $event->description }}</p>
            @endif

        </div>

    @empty

        <div class="announcement-card">
            <p>No upcoming events at the moment.</p>
        </div>

    @endforelse

</section>

@endsection