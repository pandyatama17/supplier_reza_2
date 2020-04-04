@extends('layout.wrapper')
@section('content')
  <!-- Page section -->
  <div class="page-section gallery-page">
    <ul class="portfolio-filter">
      <li class="filter all active" data-filter="*">All</li>
      @foreach ($categories as $cat)
        <li class="filter" data-filter=".{{strtolower($cat->category)}}">{{$cat->category}}</li>
      @endforeach
    </ul>
    <div class="portfolio-gallery">
      @foreach ($gallery as $g)
        <div class="gallery-item {{strtolower($g->category)}}">
          <img src="{{asset("img/gallery/".$g->id.".jpg")}}" alt="">
          <div class="hover-links">
            <a href="" class="site-btn sb-light">Next</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <!-- Page section end-->
@endsection
