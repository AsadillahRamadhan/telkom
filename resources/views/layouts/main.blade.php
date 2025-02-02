<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/argon') }}/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('/argon') }}/assets/img/favicon.png">
  <title>
    Telkom
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('/argon') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('/argon') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('/argon') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('/datatable/dataTables.min.css') }}">
  <script src="{{ asset('/datatable/jquery.min.js') }}"></script>
  <script src="{{ asset('/datatable/dataTables.min.js') }}"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/argon') }}/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <img src="{{ asset('/favicon.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Telkom</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    @include('partials.sidebar')
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">{{ $title }}</h6>
        </nav>
      </div>
      <div>
        <form id="logout" action="{{ route('logout') }}" method="POST">
          @csrf
          <div onclick="document.querySelector('#logout').submit()" class="text-white cursor-pointer">Logout</div>
        </form>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @yield('container')
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('/argon') }}/assets/js/core/popper.min.js"></script>
  <script src="{{ asset('/argon') }}/assets/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('/argon') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{ asset('/argon') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="{{ asset('/argon') }}/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/argon') }}/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>