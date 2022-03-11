@extends('layouts.app')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Get latest News from <br>{{ 'News Hub ' }} <span>anywhere, anytime!</span></h2>
          <div>
            <a href="{{ '/news' }}" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>

        <div class="col-lg-6 intro-img order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('assets/img/intro-img.svg') }}" alt="Background Image" class="img-fluid">
        </div>
      </div>

    </div>
    
  </section><!-- End Hero -->
  <section id="news" class="news">
    <div class="container" data-aos="fade-up">
        <div class="row">
          <h1 class="">We are working</h1>
        </div>
      </div>
  </section>
@endsection