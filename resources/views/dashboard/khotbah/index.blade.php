@extends('dashboard.layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Info Khotbah</h1>
 </div>
 @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
 @endif
 <a href="/dashboard/khotbah/create" class="btn btn-primary mb-3" >New Post Khotbah</a>
 <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $khotbahs as $khotbah )
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $khotbah->judul}}</td>
                <td>{{ $khotbah->tanggal }}</td>
                <td>
                    <a href="/dashboard/khotbah/{{$khotbah->id}}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/khotbah/{{$khotbah->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/khotbah/{{ $khotbah->id}}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure')"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
                </tr>   
            @endforeach
          </tbody>
        </table>
      </div>
@endsection