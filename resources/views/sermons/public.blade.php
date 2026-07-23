@extends('layouts.app')

@section('content')

<section class="announcements">

    <h2>📖 Sermons</h2>

    @forelse($sermons as $sermon)

        <div class="announcement-card">

            <h3>{{ $sermon->title }}</h3>

            <p><strong>Preacher:</strong> {{ $sermon->preacher }}</p>

            <p>
                <strong>Date:</strong>
                {{ \Carbon\Carbon::parse($sermon->sermon_date)->format('d M Y') }}
            </p>

            @if($sermon->file)

                <br>

                <a href="{{ asset('storage/'.$sermon->file) }}"
                   class="btn"
                   target="_blank">
                    📥 Download Sermon
                </a>

            @endif

        </div>

    @empty

        <div class="announcement-card">
            <p>No sermons have been uploaded yet.</p>
        </div>

    @endforelse

</section>

@endsection