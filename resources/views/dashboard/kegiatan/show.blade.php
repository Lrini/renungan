@extends('dashboard.layout.main')
@section('container')
<div class="container">
    <div class="card mb-4">
            <div class="card-body">
                <img src="{{ asset('storage/' . $kegiatans->image) }}" alt="" class="img-fluid rounded " style="width: 1600px; height: 400px; object-fit: cover;">
                <h2 class="card-title">{{ $kegiatans->nama }}</h2>
                <div class="card-text">
                    <h6>Tempat kegiatan: {{ $kegiatans->tempat }} Tanggal : {{ $kegiatans->waktu }}</h6>
                    <br>
                    {!! $kegiatans->deskripsi !!}
                </div>
                <a href="/dashboard/kegiatan" class="btn btn-success mt-3"><span data-feather="arrow-left"></span> Back to posts</a>
                <a href="/dashboard/kegiatan/{{ $kegiatans->id }}/edit" class="btn btn-warning mt-3"><span data-feather="edit"></span >Edit</a>
                 <form action="/dashboard/renungan/{{ $kegiatans->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger mt-3" onclick="return confirm('Are you sure')"><span data-feather="x-circle"></span>Delete</button>
                    </form>
            </div>
        </div>
</div>
@endsection