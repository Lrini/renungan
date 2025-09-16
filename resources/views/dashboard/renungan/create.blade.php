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
        <label for="body" class="form-label">Body</label>
        @error('body')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
      </div>
      <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
    });
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