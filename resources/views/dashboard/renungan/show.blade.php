@extends('dashboard.layout.main')
@section('container')
<div class="container">
    <div class="card mb-4">
            <div class="card-body">
                <img src="{{ asset('storage/' . $renungans->image) }}" alt="" class="img-fluid rounded " style="width: 1600px; height: 400px; object-fit: cover;">
                <h2 class="card-title">{{ $renungans->judul }}</h2>
                <h6>Ayat: {{ $renungans->ayat }} Tanggal : {{ $renungans->tanggal }}</h6>
                    <br>
                <div class="card-text">
                   {!! $renungans->isi !!}
                </div>
                <a href="/dashboard/renungan" class="btn btn-success mt-3"><span data-feather="arrow-left"></span> Back to posts</a>
                <a href="/dashboard/renungan/{{ $renungans->id }}/edit" class="btn btn-warning mt-3"><span data-feather="edit"></span >Edit</a>
                 <form action="/dashboard/renungan/{{ $renungans->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger mt-3" onclick="return confirm('Are you sure')"><span data-feather="x-circle"></span>Delete</button>
                    </form>
            </div>
        </div>
</div>
@endsection