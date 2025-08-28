@extends('layouts.main')

@section('container')
    <div class="row justify-content-center align-items-center">
			<div class="col-lg-6 col-md-6">
				<div class="about-item pr-3 mb-5 mb-lg-0">
					@foreach ($renungans as $renungan )
						<span class="h6 text-color">Renungan Harian</span>
						<h2 class="mt-3 mb-4 position-relative content-title">{{ $renungan->judul }}</h2>
						<p class="mb-5">{{ $renungan->isi }}</p>
						<a href="/renungan/{{ $renungan->id }}" class="btn btn-main btn-round-full">Read more...</a>
					@endforeach
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="about-item-img">
					<img src="/images/home-7.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
		<br><br>
		<div class="container">
		<div class="row">
			<div class="col-lg-7 ">
				<div class="section-title">
					<span class="h6 text-color">GKPKR KUPANG</span>
					<h2 class="mt-3 content-title">Kegiatan Dan Seminar</h2>
				</div>
			</div>
		</div>
	</div>
	 <div class="row">
            @if(isset($kegiatans) && count($kegiatans) > 0)
                @foreach($kegiatans as $kegiatan)
                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="blog-item h-100 d-flex flex-column">
                            <img src="/images/1.jpg" alt="Kegiatan" 
                                 class="img-fluid rounded" height="250px" style="object-fit: cover;">
                            <div class="blog-item-content bg-white p-4 d-flex flex-column flex-grow-1">
                                <h3 class="mt-3 mb-3">
                                    <a href="#">{{$kegiatan->nama}}</a>
                                </h3>
                                <p class="mb-4 flex-grow-1">{{$kegiatan->slug}}</p>
                                <a href="/kegiatan/{{ $kegiatan->id }}" class="btn btn-small btn-main btn-round-full mt-auto">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="text-center p-5">
                        <h4>Tidak ada kegiatan untuk ditampilkan</h4>
                        <p class="text-muted">Belum ada kegiatan atau seminar yang tersedia saat ini.</p>
                    </div>
                </div>
            @endif
        </div>
@endsection
