 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/renungan">
              <span data-feather="file-text"></span>
              Renungan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/kegiatan">
              <span data-feather="file-text"></span>
              Kegiatan
            </a>
          </li>
        </ul> 
      </div>
    </nav>