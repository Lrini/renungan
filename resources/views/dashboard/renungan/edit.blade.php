@extends('dashboard.layout.main')
@section('container')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Renungan</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/renungan/{{$renungans->id }}" class="mb-5" enctype="multipart/form-data">
      {{-- CSRF token for form submission --}}
      {{-- Method spoofing to use PUT for updating the post --}}
      @method('put') <!-- gunakan method put untuk update data -->
      @csrf
      <div class="mb-3">
        <label for="judul" class="form-label">judul</label>
        <input type="text" class="form-control @error('judul') is-invalid  @enderror" id="judul" name="judul" value="{{ old('judul', $renungans->judul) }}" required autofocus  >
        @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ayat" class="form-label">ayat</label>
        <input type="text" class="form-control @error('ayat') is-invalid  @enderror" id="ayat" name="ayat" value="{{ old('ayat', $renungans->ayat) }}" required autofocus  >
        @error('ayat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <input type="hidden" name="oldImage" value="{{ $renungans->image }}">
        @if ($renungans->image)
          <img src="{{ asset('storage/' . $renungans->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
        <label for="isi" class="form-label">Isi</label>
        @error('isi')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="isi" type="hidden" name="isi" value="{{ old('isi', $renungans->isi) }}">
        <trix-editor input="isi"></trix-editor>
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