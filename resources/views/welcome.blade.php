@extends('datasiswa.layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="display-4">Selamat Datang di Sistem Data Siswa</h1>
            <p class="lead">Platform untuk mengelola data siswa dengan mudah dan efisien.</p>
            <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-lg mt-3">Lihat Data Siswa</a>
        </div>
    </div>
</div>
@endsection
