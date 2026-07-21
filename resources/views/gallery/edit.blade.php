@extends('layouts.admin')

@section('content')

<div class="main-content">

<h2>✏ Edit Image</h2>

<form action="/gallery/{{ $gallery->id }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<label>Title</label>
<input type="text" name="title" value="{{ $gallery->title }}" required>

<label>Replace Image</label>
<input type="file" name="image">

<br><br>

<button class="btn">
💾 Update
</button>

</form>

</div>

@endsection