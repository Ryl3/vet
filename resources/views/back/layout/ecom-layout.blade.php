<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  
  <title>@yield('pageTitle')</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="/assets petology/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="/assets petology/css/style.css" rel="stylesheet" />
  
  <!-- responsive style -->
  <link href="/assets petology/css/responsive.css" rel="stylesheet" />
  
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
  
  <!-- Main CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #f8f9fa;
      padding-top: ;
      transform: translateX(-250px);
      transition: transform 0.3s ease;
      z-index: 1000;
      height: 800px;
    }

    .sidebar.open {
      transform: translateX(0);
      height: 800px;
    }

    .sidebar .closebtn {
      position: absolute;
      top: 20px;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
      cursor: pointer;
    }

    .content {
      margin-left: 250px;
      transition: margin-left 0.3s ease;
    }

    .content.shift {
      margin-left: 0;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: 100%;
        transform: translateX(-100%);
      }

      .sidebar.open {
        transform: translateX(0);
      }

      .content {
        margin-left: 0;
      }

      .content.shift {
        margin-left: 0;
      }
      .dashboard-widget{
        height: 800px;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div id="mySidebar" class="sidebar">
    <span class="closebtn" onclick="closeNav()">&times;</span>
    <div class="profile-sidebar">
      <!-- Sidebar Content -->
      <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
          <a href="#" class="booking-doc-img">
            <img src="assets/img/patients/central.png" alt="User Image">
          </a>
          @if (Auth::check())
            <div class="profile-det-info">
              <h3>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h3>
              <div class="patient-details">
                @if (Auth::user()->birthDate)
                  @php
                    $birthDate = new DateTime(Auth::user()->birthDate);
                    $today = new DateTime();
                    $age = $today->diff($birthDate)->y;
                  @endphp
                  <h5><i class="fas fa-birthday-cake"></i> {{ $birthDate->format('d M Y') }}, {{ $age }} years</h5>
                @endif
                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ Auth::user()->province }}, {{ Auth::user()->barangay }}, {{ Auth::user()->city }}</h5>
              </div>
            </div>
          @endif
        </div>
      </div>
      <div class="dashboard-widget">
        <nav class="dashboard-menu">
          <ul>
            <li><a href="{{route('showDashboard')}}"><i class="fas fa-columns"></i><span>Dashboard</span></a></li>
            <li><a href="{{route('customer')}}"><i class="fas fa-bookmark"></i><span>Reservation</span></a></li>
            <li><a href="{{ route('shop.index') }}"><i class="fas fa-store"></i><span>Shop</span></a></li>
            <li><a href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart"></i><span>Cart</span></a></li>
            <li><a href="{{ route('purchase.history') }}"><i class="fas fa-history"></i><span>Purchase History</span></a></li>
            <li><a href="{{ route('mapping.index') }}"><i class="fas fa-map"></i><span>Mapping</span></a></li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div id="main">
    <button class="btn btn-primary" onclick="openNav()">&#9776;</button>
    <div class="content">
      @yield('content')
    </div>
  </div>

  <script type="text/javascript" src="/assets petology/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="/assets petology/js/bootstrap.js"></script>

  <!-- jQuery -->
  <script src="assets/js/jquery.min.js"></script>
  
  <!-- Bootstrap Core JS -->
  <script src="assets/back/js/popper.min.js"></script>
  <script src="assets/back/js/bootstrap.min.js"></script>
  
  <!-- Sticky Sidebar JS -->
  <script src="assets/back/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
  <script src="assets/back/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
  
  <!-- Custom JS -->
  <script src="assets/back/js/script.js"></script>

  <script>
    function openNav() {
      document.getElementById("mySidebar").classList.add("open");
      document.getElementById("main").classList.add("shift");
    }

    function closeNav() {
      document.getElementById("mySidebar").classList.remove("open");
      document.getElementById("main").classList.remove("shift");
    }
  </script>
</body>
</html>
