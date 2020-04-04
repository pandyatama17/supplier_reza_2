@extends('layout.wrapper')
@section('content')
  <!-- Page section -->
  <div class="page-section gallery-single-page">
    <div class="gallery-single-warp">
      <div class="row">
        <div class="col-xl-6 p-0">
          <div class="gallery-single-slider owl-carousel">
            <img src="{{asset('img/gallery/'.$gallery->id.'.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-xl-6 p-0">
          <div class="gallery-single-text">
            <span>Dokumentasi {{$gallery->category}}</span>
            <h2>{{$gallery->title}}</h2>
            <ul>
              <li><span>Fotografer:</span>{{$gallery->photographer}}</li>
              <li><span>Date:</span>{{$gallery->date}}</li>
              <li><span>Kategori:</span>Dokumentasi {{$gallery->category}}</li>
              <li><span>Tags:</span>{{$gallery->tags}}</li>
            </ul>
            <p>{{$gallery->description}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page section end-->
@endsection
