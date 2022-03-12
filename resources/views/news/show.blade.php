@extends('layouts.app')
@section('content')
<!-- ======= News Section ======= -->
<br>
<section id="news" class="news">

    <div class="container" >
      <div class="row">

        <div class="col-lg-5 col-md-6">
          <div class="news-img" >
            <img src="{{ asset('assets/img/about-img.jpg') }}" alt="news_1 Image">
          </div>
        </div>

        <div class="col-lg-7 col-md-6">
          <div class="news-content" >
            <h2>{{ ($news->title) }}</h2>
            <p style="text-align: justify">{{ ($news->body) }}</p>
            
          </div>
        </div>
      </div>
    </div>

  </section><!-- End news Section -->

   <!-- ======= Latest News Section ======= -->
 <section id="news_latest" class="news_latest section-bg">
    <div class="container">

      <header class="section-header">
        <h3>Related News</h3>
        <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p>
      </header>

      <div class="row g-5">
         @forelse($relatedNews as $related)
        <div class="col-md-6 col-lg-4 wow bounceInUp">
            <div class="box">
                <div class="icon" style="background: #fceef3;"><i class="bi bi-binoculars" style="color: #3fcdc7;"></i></div>
                <h4 class="title">{{ ucfirst($related->title) }}</h4>
                <small style="float: left" class="text-muted">{{ $related->updated_at }}</small>
               <a style="color: #3fcdc7; float:right" class="btn btn-outline btn-sm float-right" href="/news/{{ $related->id }}">Read >></i></a>
                
            </div>
        </div> 
       @empty
        <p>No Related News Currently</p>
        @endforelse
    </div>

    </div>
  </section><!-- End news_latest Section -->
