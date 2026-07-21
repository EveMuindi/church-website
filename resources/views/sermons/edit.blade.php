@extends('layouts.admin')

@section('content')

<div class="main-content">

<h2>✏ Edit Sermon</h2>

<form action="/sermons/{{ $sermon->id }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<label>Title</label>
<input type="text" name="title" value="{{ $sermon->title }}" required>

<label>Preacher</label>
<input type="text" name="preacher" value="{{ $sermon->preacher }}" required>

<label>Date</label>
<input type="date" name="sermon_date" value="{{ $sermon->sermon_date }}" required>

<label>Replace File</label>
<input type="file" name="file">

<br><br>

<button class="btn">
💾 Update Sermon
</button>

</form>

</div>

@endsection