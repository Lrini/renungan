@extends('dashboard.layout.main')
@section('container')
<div class="container">
    <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">{{ $khotbahs->judul }}</h2>
                <div class="card-text">
                    <h6>Pengkhobah: {{ $khotbahs->pengkhotbah }} Tanggal : {{ $khotbahs->tanggal }}</h6>
                    <br>
                    {!! $khotbahs->deskripsi !!}
                </div>
                <a href="/dashboard/khotbah" class="btn btn-success mt-3"><span data-feather="arrow-left"></span> Back to posts</a>
                <a href="/dashboard/khotbah/{{ $khotbahs->id }}/edit" class="btn btn-warning mt-3"><span data-feather="edit"></span >Edit</a>
                 <form action="/dashboard/khotbah/{{ $khotbahs->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger mt-3" onclick="return confirm('Are you sure')"><span data-feather="x-circle"></span>Delete</button>
                    </form>
            </div>
        </div>
</div>
@endsection