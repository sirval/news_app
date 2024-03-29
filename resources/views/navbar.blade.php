
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="../">News Hub</a></h1>
      
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="../">Home</a></li>
          <li><a class="nav-link scrollto" href="/news">News</a></li>
          <li><a class="nav-link scrollto" href="/admin">Upload News</a></li>
          <li class="dropdown"><a href="#"><span>Make Payment</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('paymentPage') }}">Paystack</a></li>
              
              <li><a href="#">Flutterwave</a></li>
              
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
          <li><a class="nav-link scrollto" href="https://github.com/sirval/news_app">Get Source Code</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>

    </div>
  </header><!-- End Header -->