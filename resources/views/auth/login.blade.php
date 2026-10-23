@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="panel">
    <h1>Login Petugas</h1>
    <p class="subtitle">Masuk untuk mengelola laporan banjir.</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')<span class="error-text">{{ $message }}</span>@enderror
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')<span class="error-text">{{ $message }}</span>@enderror
        </div>
        <label class="checkbox">
            <input type="checkbox" name="remember"> Remember Me
        </label>
        <button type="submit" class="btn btn-block">Login</button>
    </form>
</div>
@endsection
