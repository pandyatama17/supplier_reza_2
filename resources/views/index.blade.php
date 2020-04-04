@extends('layout.wrapper')
@section('content')
  <!-- Page section -->
  <div class="page-section home-page">
    <div class="hero-slider owl-carousel">
      @php
        $i = 1;
      @endphp
      @foreach ($gallery as $g)
        <div class="slider-item d-flex align-items-center set-bg" data-setbg="{{asset("img/gallery/".$g->id.".jpg")}}" data-hash="slide-{{$i}}">
          <div class="si-text-box">
            <span>{{$g->category}}</span>
            <h2>{{$g->title}}</h2>
            <p>{{$g->description}}</p>
            <a href="/gallery/{{$g->id}}" class="site-btn">Read More</a>
          </div>
          <div class="next-slide-show set-bg" data-setbg="{{asset("img/gallery/".($g->id+1).".jpg")}}">
            <a href="#slide-{{$i+1}}" class="ns-btn">Next</a>
          </div>
        </div>
        @php
          $i++;
        @endphp
      @endforeach
    </div>
    <div id="snh-1"></div>
  </div>
  <!-- Page section end-->
  </div>

  <!-- Search model -->
  <div class="search-model">
  <div class="h-100 d-flex align-items-center justify-content-center">
    <div class="search-close-switch">x</div>
    <form class="search-moderl-form">
      <input type="text" id="search-input" placeholder="Search here.....">
    </form>
  </div>
  </div>
  <!-- Search model end -->
@endsection
