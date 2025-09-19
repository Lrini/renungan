@extends('dashboard.layout.main')
@section('container')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Kegiatan</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/kegiatan" class="mb-5" enctype="multipart/form-data">
      {{-- CSRF token for form submission --}}
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Kegiatan</label>
        <input type="text" class="form-control @error('nama') is-invalid  @enderror" id="nama" name="nama" value="{{ old('nama') }}" required autofocus  >
        @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tempat" class="form-label">Tempat kegiatan</label>
        <input type="text" class="form-control @error('tempat') is-invalid  @enderror" id="tempat" name="tempat" value="{{ old('tempat') }}" required  >
        @error('tempat')
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
        <label for="waktu" class="form-label">Tanggal pelaksanaan</label>
        <input type="date" class="form-control @error('waktu') is-invalid  @enderror" id="waktu" name="waktu" value="{{ old('waktu') }}" required  >
        @error('waktu')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi kegiatan</label>
        @error('deskripsi')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
        <trix-editor input="deskripsi"></trix-editor>
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