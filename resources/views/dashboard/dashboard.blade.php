@extends('dashboard.layouts.main')
@section('content')
    <p>Halo {{ auth()->user()->name }}, Selamat datang di halaman dashboard.</p>
@endsection