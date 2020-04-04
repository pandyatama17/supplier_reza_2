@extends('layout.wrapper')
@section('content')
  <style media="screen">
    .colorlib-classes
    {
      transform: rotateX(180deg);
      padding-top: 0px!important;
      background-color: #ececec;
    }
    .colorlib-classes > .container
    {
      transform: rotateX(180deg);
      padding-top: 5px!important;
      margin-top: 5px!important;
    }
    .colorlib-classes > .container .col-md-4
    {
      background-color: #fff;
      padding-top: 5px;
    }
  </style>
  <aside id="colorlib-hero" style="height:200px">
    <div class="flexslider">
      <ul class="slides">
        <li style="background-image: url({{asset("img/3.jpg")}});">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                <div class="slider-text-inner text-center">
                  <h1>Dokumentasi</h1>
                  <h2><span><a href="index.html">Home</a> | Jasa Dokumentasi</span></h2>
                </div>
              </div>
            </div>
          </div>
        </li>
        </ul>
      </div>
  </aside>

  <div class="colorlib-classes custom-scroll" style="overflow:auto; padding:0px">
    <div class="container" style="padding:0px">
      <div class="row">
        @foreach ($events as $e)
          <div class="col-md-4 animate-box">
            <div class="classes">
              <div class="classes-img" style="background-image: url({{asset("img/events/".$e->id.".jpg")}});">
                <span class="price text-center">Rp. {{thousandsToK($e->price)}}<br><small>/hari</small></span>
              </div>
              <div class="desc">
                <h3><a href="#">{{$e->name}}</a></h3>
                <p>{{$e->description}}</p>
                <p><a href="/event/{{$e->id}}" class="btn-learn">Lebih Lanjut <i class="icon-arrow-right3"></i></a></p>
              </div>
            </div>
          </div>
        @endforeach
        <div class="col-md-4 animate-box">
          <div class="classes">
            <div class="classes-img" style="background-image: url({{asset("img/events/etc.jpg")}});">
              <span class="price text-center">Price By Confirm</span>
            </div>
            <div class="desc">
              <h3><a href="#">Lainnya</a></h3>
              <p>(By confirm via admin or contact Admin)</p>
              <p><a href="#" class="btn-learn">Lebih Lanjut <i class="icon-arrow-right3"></i></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="colorlib-subscribe" class="subs-img" style="background-image: url({{asset("robust/images/img_bg_1.jpg")}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
          <h2>Periksa Pemesanan</h2>
          <p>Masukkan nomor pemesanan anda dibawah untuk mengecek pemesanan anda</p>
        </div>
      </div>
      <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3">
          <div class="row">
            <div class="col-md-12">
            <form class="form-inline qbstp-header-subscribe">
              <div class="col-three-forth">
                <div class="form-group">
                  <input type="text" class="form-control" id="email" placeholder="Nomor Pemesanan Anda">
                </div>
              </div>
              <div class="col-one-third">
                <div class="form-group">
                  <button type="button" id="findEvent" class="btn btn-primary">Cari</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
