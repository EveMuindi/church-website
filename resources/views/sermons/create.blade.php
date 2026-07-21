@extends('layouts.admin')

@section('content')

<div class="main-content">

<h2>🎤 Add Sermon</h2>

<form action="/sermons" method="POST" enctype="multipart/form-data">

@csrf

<label>Title</label>
<input type="text" name="title" required>

<label>Preacher</label>
<input type="text" name="preacher" required>

<label>Date</label>
<input type="date" name="sermon_date" required>

<label>Upload PDF / Audio</label>
<input type="file" name="file">

<br><br>

<button class="btn">
💾 Save Sermon
</button>

</form>

</div>

@endsection