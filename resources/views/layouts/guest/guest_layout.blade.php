<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'LSFC')</title>
    @include('layouts.guest.libs.csslib')
    <style>
        .image-container {
          width: 100%;
          height: 0;
          padding-bottom: 100%;
          /* This creates a square aspect ratio */
          position: relative;
          overflow: hidden;
      }

      .image-container img {
          position: absolute;
          width: 100%;
          height: 100%;
          object-fit: cover;
          /* Ensures the image covers the container without stretching */
      }
  </style>
</head>

<body>
    @include('layouts.guest.navbar')
    @include('hero')
    <main id="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>LSFC</h3>
                        <p>
                            sagittis felis efficitur <br>
                            Lorem ipsum dolor sit amet, <br>
                            <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">

                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Lorem ipsum dolor sit amet, </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis felis efficitur</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>2023</span></strong>. All Rights Reserved
            </div>

        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    @include('layouts.guest.libs.jslib')
</body>

</html>
