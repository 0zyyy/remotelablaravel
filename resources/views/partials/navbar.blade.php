<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="/dashboard" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo-its.png') }}" alt="">
        <span class="d-none d-lg-block" style="margin-left: 10px; font-size:15px;">Remote Laboratory <h6>Praktikum Online</h6></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
  
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <a class="nav-link nav-profile d-flex align-items-center pe-0 mr-3" href="#" data-bs-toggle="dropdown">
          <img src= "{{ asset('img/boy.png') }}" alt="Profile" class="rounded-circle border border-dark">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name}}</span>
        </a>
  
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ auth()->user()->name }}</h6>
            <span>{{ auth()->user()->nrp }}</span>
            <br>
            <span>{{ strtoupper(auth()->user()->hak) }}</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
  
          <li>
            <hr class="dropdown-divider">
          </li>
  
          <li>
            <a class="dropdown-item d-flex align-items-center" href="/settings">
              <i class="bi bi-gear"></i>
              <span>Pengaturan Akun</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
  
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modal">
              <i class="bi bi-box-arrow-right"></i>
              <span>Keluar</span>
            </a>
          </li>
        </ul>
      </ul>
    </nav>
  </header>