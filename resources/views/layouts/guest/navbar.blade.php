    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

          <h1 class="logo me-auto"><a href="{{ route('home') }}">LSFC</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
              <li><a class="nav-link scrollto" href="#cta">About</a></li>
              @guest
              <li><a class="getstarted scrollto" href="{{ route('login')}}">Login</a></li>
              @endguest
              @auth
                <li><a class="getstarted scrollto" href="{{ route('admin')}}">Dashboard</a></li>
              @endauth

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </header><!-- End Header -->
