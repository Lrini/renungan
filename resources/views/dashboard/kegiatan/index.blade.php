@extends('dashboard.layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Kegiatan</h1>
 </div>
 @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
 @endif
 <a href="/dashboard/kegiatan/create" class="btn btn-primary mb-3" >Create new kegiatan</a>
 <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Acara</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $kegiatans as $kegiatan )
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kegiatan->nama}}</td>
                <td>{{ $kegiatan->waktu }}</td>
                <td>
                    <a href="/dashboard/kegiatan/{{$kegiatan->id}}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/kegiatan/{{$kegiatan->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/kegiatan/{{ $kegiatan->id}}" method="post" class="d-inline">
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