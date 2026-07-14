@extends('layouts.app')

@section('content')

<section class="services">

    <h2>We Would Love to Pray With You 🙏</h2>
    @if(session('success'))

<div style="background:#d4edda; color:#155724; padding:15px; margin:20px 0; border-radius:8px;">
    {{ session('success') }}
</div>

@endif

    <div class="announcement-card">

    <form action="/prayer" method="POST">

    @csrf

    <label><strong>Full Name</strong></label><br><br>
    <input type="text" name="name" placeholder="Enter your full name"><br><br>

    <label><strong>Phone Number (Optional)</strong></label><br><br>
    <input type="text" name="phone" placeholder="07XXXXXXXX"><br><br>

    <label><strong>Email Address (Optional)</strong></label><br><br>
    <input type="email" name="email" placeholder="example@email.com"><br><br>

    <label><strong>Your Prayer Request</strong></label><br><br>

    <textarea name="prayer_request" rows="6" placeholder="Write your prayer request here..."></textarea><br><br>

    <button class="btn">Submit Prayer Request</button>

</form>

</div>

</section>

@endsection