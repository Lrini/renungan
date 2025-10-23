@extends('layouts.main')

@section('container')
<div class="col-12 mb-5">
		<article class="single-blog-item">
			<div class="ratio ratio-16x9 mb-3">
				<iframe
					src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($khotbah->youtube_url, 'v=') }}"
					title="{{ $khotbah->judul }}"
					allowfullscreen>
				</iframe>
			</div>

			<div class="blog-item-content bg-white p-3 p-md-5">
				<div class="blog-item-meta bg-gray py-1 px-2 meta-flex">
					<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i><strong> Pengkhotbah :{{ $khotbah->pengkhotbah }}</strong></span>
					<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>Tanggal: {{ $khotbah->tanggal }}</span>
				</div>

				<h2 class="mt-3 mb-4">{{ $khotbah->judul }}</h2>
				 {!! $khotbah->deskripsi !!}
				 <br>
                <a href="/khotbah" class="btn btn-main btn-round-full mt-3">Back to khotbah</a>
			</div>
		</article>
	</div>
@endsection
