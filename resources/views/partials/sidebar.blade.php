<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <!-- <li class="nav-item">
        <a class="nav-link active" href="{{ url('/user') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Manajemen User</span>
        </a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link {{ explode('/', request()->url())[count(explode('/', request()->url())) -1] == 'perangkat' ? 'active' : '' }}" href="{{ url('perangkat') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-settings text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Manajemen Perangkat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ explode('/', request()->url())[count(explode('/', request()->url())) -1] == 'log' ? 'active' : '' }}" href="{{ url('log') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Log Peminjaman </span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link " href="{{ url('peminjaman') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Peminjaman</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link {{ explode('/', request()->url())[count(explode('/', request()->url())) -1] == 'log-akses' ? 'active' : '' }}" href="{{ url('log-akses') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-lock-circle-open text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Log Akses</span>
        </a>
      </li>
    </ul>
  </div>