<nav class="navbar navbar-expand-lg  py-4" id="navbar">
		<div class="container">
		  <a class="navbar-brand">
		  	GKPKR Kupang
		  </a>
	  
		  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a></li>
			  <li class="nav-item"><a class="nav-link {{ request()->is('khotbah') ? 'active' : '' }}" href="/khotbah">Khotbah</a></li>
			  <li class="nav-item"><a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login">Login</a></li>
			</ul>
		  </div>
		</div>
	</nav>