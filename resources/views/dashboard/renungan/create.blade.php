@extends('dashboard.layout.main')
@section('container')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Renungan</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/renungan" class="mb-5" enctype="multipart/form-data">
      {{-- CSRF token for form submission --}}
      @csrf
      <div class="mb-3">
        <label for="Judul" class="form-label">Judul</label>
        <input type="text" class="form-control @error('judul') is-invalid  @enderror" id="judul" name="judul" value="{{ old('judul') }}" required autofocus  >
        @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ayat" class="form-label">Ayat</label>
        <input type="text" class="form-control @error('ayat') is-invalid  @enderror" id="ayat" name="ayat" value="{{ old('ayat') }}" required  >
        @error('ayat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control  @error('image') is-invalid  @enderror" type="file" id="image" name="image" onchange="previewImage(event)">
         @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control @error('tanggal') is-invalid  @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required  >
        @error('tanggal')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="isi" class="form-label">Isi</label>
        @error('isi')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="isi" type="hidden" name="isi" value="{{ old('isi') }}">
        <trix-editor input="isi"></trix-editor>
      </div>
      <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
        alert("File not allowed!");
    });

    function previewImage(event) {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        const file = image.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            imgPreview.src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection