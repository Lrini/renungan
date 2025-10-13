<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">
  <meta name="author" content="themefisher.com">
  <title>Devosi</title>
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
<!-- Header Start --> 
<header class="navigation">
    <!--halaman untuk menu-->
    @include('partials.navbar')
    <!--halaman untuk menu-->
</header>
<!-- Header Close --> 
<!--halaman utama-->    
 <main class="container mt-4">
            @yield('container') {{-- yield berguna untuk menentukan bahwa bagian dengan nama container yang akan diisi --}}
 </main>

<div class="main-wrapper ">
<!-- footer Start -->
@include('partials.footer')
</div>
<!--halaman utama-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
