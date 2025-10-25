@extends('dashboard.layout.main')
@section('container')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post Khotbah</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/khotbah/{{$khotbahs->id }}" class="mb-5" enctype="multipart/form-data">
      {{-- CSRF token for form submission --}}
      {{-- Method spoofing to use PUT for updating the post --}}
      @method('put') <!-- gunakan method put untuk update data -->
      @csrf
      <div class="mb-3">
        <label for="judul" class="form-label">Judul Khotbah</label>
        <input type="text" class="form-control @error('judul') is-invalid  @enderror" id="judul" name="judul" value="{{ old('judul', $khotbahs->judul) }}" required autofocus  >
        @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
       <div class="mb-3">
        <label for="pengkhotbah" class="form-label">Pengkhotbah</label>
        <input type="text" class="form-control @error('pengkhotbah') is-invalid  @enderror" id="pengkhotbah" name="pengkhotbah" value="{{ old('pengkhotbah', $khotbahs->pengkhotbah) }}" required autofocus  >
        @error('pengkhotbah')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Link Youtube</label>
        <input type="text" class="form-control @error('tanggal') is-invalid  @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $khotbahs->youtube_url) }}" required autofocus  >
        @error('tanggal')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal khotbah</label>
        <input type="date" class="form-control @error('tanggal') is-invalid  @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $khotbahs->tanggal) }}" required autofocus  >
        @error('tanggal')
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
        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $khotbahs->deskripsi) }}">
        <trix-editor input="deskripsi"></trix-editor>
      </div>
      <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
<!-- Script untuk mengubah slug otomatis berdasarkan judul -->
<script>
    document.addEventListener('trix-file-accept', function(e) {// mencegah file yang tidak diizinkan untuk diunggah
        e.preventDefault();// mencegah perilaku default dari trix-editor
        alert("File not allowed!");// menampilkan alert bahwa file tidak diizinkan
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