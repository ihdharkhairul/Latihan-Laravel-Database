@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="panel">
    <h1>Register Petugas</h1>
    <p class="subtitle">Buat akun petugas BPBD.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="field">
            <label for="name">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')<span class="error-text">{{ $message }}</span>@enderror
        </div>
        <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')<span class="error-text">{{ $message }}</span>@enderror
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')<span class="error-text">{{ $message }}</span>@enderror
        </div>
        <div class="field">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-block">Register</button>
    </form>
</div>
@endsection
