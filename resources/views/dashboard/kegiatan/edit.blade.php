@extends('dashboard.layout.main')
@section('container')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kegiatan</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/kegiatan/{{$kegiatans->id }}" class="mb-5" enctype="multipart/form-data">
      {{-- CSRF token for form submission --}}
      {{-- Method spoofing to use PUT for updating the post --}}
      @method('put') <!-- gunakan method put untuk update data -->
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Kegiatan</label>
        <input type="text" class="form-control @error('nama') is-invalid  @enderror" id="nama" name="nama" value="{{ old('nama', $kegiatans->nama) }}" required autofocus  >
        @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tempat" class="form-label">Tempat Kegiatan</label>
        <input type="text" class="form-control @error('tempat') is-invalid  @enderror" id="tempat" name="tempat" value="{{ old('tempat', $kegiatans->tempat) }}" required autofocus  >
        @error('tempat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
       <div class="mb-3">
        <label for="waktu" class="form-label">Tempat pelaksanaan</label>
        <input type="date" class="form-control @error('waktu') is-invalid  @enderror" id="waktu" name="waktu" value="{{ old('waktu', $kegiatans->waktu) }}" required autofocus  >
        @error('waktu')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <input type="hidden" name="oldImage" value="{{ $kegiatans->image }}">
        @if ($kegiatans->image)
          <img src="{{ asset('storage/' . $kegiatans->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
          <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @endif
        <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
        <input class="form-control  @error('image') is-invalid  @enderror" type="file" id="image" name="image" onchange="previewImage(event)">
         @error('image')
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
        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $kegiatans->deskripsi) }}">
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