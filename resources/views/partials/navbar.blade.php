<nav class="navbar py-4" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="/">
		  Devosi
		  </a>

		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="burger-line"></span>
			<span class="burger-line"></span>
			<span class="burger-line"></span>
		  </button>

		  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a></li>
			  <li class="nav-item"><a class="nav-link {{ request()->is('khotbah') ? 'active' : '' }}" href="/khotbah">Khotbah</a></li>
			  <li class="nav-item d-none d-lg-block"><a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login">Login</a></li>
			</ul>
		  </div>
		</div>
	</nav>
