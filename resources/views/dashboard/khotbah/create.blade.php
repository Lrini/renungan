@extends('dashboard.layout.main')
@section('container')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">New Post Khotbah</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/khotbah" class="mb-5" enctype="multipart/form-data">
      {{-- CSRF token for form submission --}}
      @csrf
      <div class="mb-3">
        <label for="judul" class="form-label">Judul Khotbah</label>
        <input type="text" class="form-control @error('judul') is-invalid  @enderror" id="judul" name="judul" value="{{ old('judul') }}" required autofocus  >
        @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="pengkhotbah" class="form-label">Pengkhotbah</label>
        <input type="text" class="form-control @error('pengkhotbah') is-invalid  @enderror" id="pengkhotbah" name="pengkhotbah" value="{{ old('pengkhotbah') }}" required  >
        @error('pengkhotbah')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="youtube_url" class="form-label">Link Youtube</label>
        <input type="text" class="form-control @error('youtube_url') is-invalid  @enderror" id="youtube_url" name="youtube_url" value="{{ old('youtube_url') }}" required  >
        @error('youtube_url')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal Khotbah</label>
        <input type="date" class="form-control @error('tanggal') is-invalid  @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required  >
        @error('tanggal')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi khotbah</label>
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

    // Live preview for Trix editor
    document.addEventListener('trix-change', function(e) {
        const preview = document.getElementById('deskripsi-preview');
        preview.innerHTML = e.target.value;
    });
    

</script>
@endsection