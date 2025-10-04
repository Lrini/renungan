@extends('dashboard.layout.main')
@section('container')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New User</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/admin" class="mb-5" enctype="multipart/form-data">
      {{-- CSRF token for form submission --}}
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid  @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus  >
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid  @enderror" id="username" name="username" value="{{ old('username') }}" required  >
        @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid  @enderror" id="email" name="email" value="{{ old('email') }}" required  >
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid  @enderror" id="password" name="password" required  >
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection