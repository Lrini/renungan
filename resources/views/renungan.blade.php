@extends('layouts.main')

@section('container')
<div class="col-12 mb-5">
		<article class="single-blog-item">
			<img src="{{ asset('storage/' . $renungan->image) }}" alt="" class="img-fluid rounded w-100" style="max-height: 400px; object-fit: cover;">

			<div class="blog-item-content bg-white p-3 p-md-5">
				<div class="blog-item-meta bg-gray py-1 px-2 meta-flex">
					<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i><strong> Ayat :{{ $renungan->ayat }}</strong></span>
					<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>Tanggal: {{ $renungan->tanggal }}</span>
				</div>

				<h2 class="mt-3 mb-4">{{ $renungan->judul }}</h2>
				 {!! $renungan->isi !!}
				 <br>
                <a href="/" class="btn btn-main btn-round-full mt-3">Back to home</a>
			</div>
		</article>
	</div>
@endsection
