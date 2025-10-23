@extends('layouts.main')

@section('container')
<div class="col-12 mb-5">
		<article class="single-blog-item">
			<span class= "h6 text-color">Khotbah Mingguan</span>
			@foreach ($khotbahs as $khotbah )
				<h2 class="mt-3 mb-4 position-relative content-title">{{ $khotbah->judul }}</h2>
				<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i><strong> Pengkotbah :{{ $khotbah->pengkhotbah }}</strong></span>
				<br></br>
				<p>{{$khotbah->deskripsi}}</p>
				
				@php
					$url = $khotbah->youtube_url;
					if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $url, $matches)){// ekstrak ID video dari URL YouTube
						$video_id = $matches[1];
					} else {
						$video_id = '';
					}
				@endphp
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video_id }}" frameborder="0" allowfullscreen></iframe>
				</div>
			@endforeach
			
		</article>
	</div>
@endsection
