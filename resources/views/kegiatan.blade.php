@extends('layouts.main')

@section('container')
<div class="col-lg-12 mb-5">
		<div class="single-blog-item">
			<img src="/images/2.jpg" alt="" class="img-fluid rounded">

			<div class="blog-item-content bg-white p-5">
				<div class="blog-item-meta bg-gray py-1 px-2">
					<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i><strong> Tempat :{{ $kegiatan->tempat }}</strong></span>
					<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>Waktu: {{ $kegiatan->waktu }}</span>
				</div> 

				<h2 class="mt-3 mb-4">{{ $kegiatan->nama }}</h2>
				<p>{{ $kegiatan->deskripsi }}</p>
                <a href="/" class="btn btn-main btn-round-full mt-3">Back to home</a>
			</div>
		</div>
	</div>
@endsection
