@extends('layouts.app')
@section('title', 'Profil Petugas')
@section('content')
<div class="panel">
    <h1>Profil Petugas</h1>
    <p class="subtitle">Data akun yang sedang login.</p>

    <div class="detail"><span>Nama</span><strong>{{ Auth::user()->name }}</strong></div>
    <div class="detail"><span>Email</span><strong>{{ Auth::user()->email }}</strong></div>
    <div class="detail"><span>Akun dibuat</span><strong>{{ Auth::user()->created_at->diffForHumans() }}</strong></div>
</div>
@endsection
