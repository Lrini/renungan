@extends('dashboard.layout.main')
@section('container')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kegiatan</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/admin/{{$users->id }}" class="mb-5" enctype="multipart/form-data">
      {{-- CSRF token for form submission --}}
      {{-- Method spoofing to use PUT for updating the post --}}
      @method('put') <!-- gunakan method put untuk update data -->
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid  @enderror" id="name" name="name" value="{{ old('name', $users->name) }}" required autofocus  >
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="Username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid  @enderror" id="username" name="username" value="{{ old('username', $users->username) }}" required autofocus  >
        @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
       <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid  @enderror" id="email" name="email" value="{{ old('email', $users->email) }}" required autofocus  >
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password (leave blank to keep current)</label>
        <input type="password" class="form-control @error('password') is-invalid  @enderror" id="password" name="password" value="{{ old('password') }}"  >
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection