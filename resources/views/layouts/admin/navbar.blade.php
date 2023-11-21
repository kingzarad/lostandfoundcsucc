 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center ">
         <a href="{{ route('admin') }}" class="logo d-flex align-items-center">
             <img src="assets/img/logo.png" alt="">
             <span class="d-none d-lg-block">LSFC</span>
         </a>
         <i class="bi bi-list d-flex toggle-sidebar-btn m-0" style="margin-left: -95px !important "></i>
     </div><!-- End Logo -->
     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">
             <li class="nav-item dropdown pe-3">

                 <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                     data-bs-toggle="dropdown">
                     <img src="{{ asset('assets_admin/img/avatar.png') }}" alt="Profile" class="rounded-circle">
                     <span class="d-none d-md-block dropdown-toggle ps-2">
                         @auth
                             {{ Str::ucfirst(Auth::user()->name) }}
                         @endauth
                     </span>
                 </a><!-- End Profile Iamge Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                         @auth
                             <h6>{{ Auth::user()->name }}</h6>

                         @endauth
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li>
                         <form action="{{ route('logout') }}" method="post">
                             @csrf
                             <button class="dropdown-item d-flex align-items-center" type="submit">
                                 <i class="bi bi-box-arrow-right"></i>
                                 <span>Sign Out</span>
                             </button>
                         </form>
                     </li>

                 </ul><!-- End Profile Dropdown Items -->
             </li><!-- End Profile Nav -->

         </ul>
     </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->
