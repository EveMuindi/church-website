@extends('layouts.admin')

@section('content')

<div class="main-content">

    <h2>📸 Upload Gallery Images</h2>

    <form action="/gallery" method="POST" enctype="multipart/form-data">

        @csrf

        <label>Select Images</label>

        <input type="file" name="images[]" multiple required>

        <br><br>

        <button class="btn">
            📤 Upload Images
        </button>

    </form>

</div>

@endsection