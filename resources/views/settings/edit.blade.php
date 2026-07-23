@extends('layouts.admin')

@section('content')

<div class="main-content">

    <div class="admin-topbar">
        <h2>⚙ Website Settings</h2>
    </div>

    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:15px;border-radius:8px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="/settings" method="POST">

        @csrf

        <label>Church Name</label>
        <input type="text" name="church_name" value="{{ old('church_name', $setting->church_name) }}">

        <label>Church Email</label>
        <input type="email" name="church_email" value="{{ old('church_email', $setting->church_email) }}">

        <label>Phone Number</label>
        <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}">

        <label>Church Address</label>
        <input type="text" name="address" value="{{ old('address', $setting->address) }}">

        <label>Facebook</label>
        <input type="text" name="facebook" value="{{ old('facebook', $setting->facebook) }}">

        <label>YouTube</label>
        <input type="text" name="youtube" value="{{ old('youtube', $setting->youtube) }}">

        <label>TikTok</label>
        <input type="text" name="tiktok" value="{{ old('tiktok', $setting->tiktok) }}">

        <label>M-Pesa Paybill</label>
        <input type="text" name="paybill" value="{{ old('paybill', $setting->paybill) }}">

        <label>Account Number</label>
        <input type="text" name="account_number" value="{{ old('account_number', $setting->account_number) }}">

        <br><br>

        <button type="submit" class="btn">
            💾 Save Settings
        </button>

    </form>

</div>

@endsection