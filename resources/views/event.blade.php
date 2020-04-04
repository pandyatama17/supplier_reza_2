@extends('layout.wrapper')
@section('content')
  <style media="screen">
    html{
      scroll-behavior: smooth;

    }
    .transp
    {
      position:absolute;
      left:0;
      top:0;
      background: rgba(0,0,0,.5);
      width:150%;
      height:100%;
      z-index: 1000;
  }
  .transp .desc h2
  {
    display: inline-block;
    text-align: center;
    color: #fff !important;
  }
  .transp .desc a
  {
    display: inline-block;
    text-align: center;
    color: #fff !important;
  }
  .transp > .desc
  {
    text-align: center;
    display: inline-block;
    top: 50%;
    position: absolute;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    margin: 0;
    color: #fff !important;
  }
  </style>
  <aside id="colorlib-hero">
    <div class="flexslider">
      <ul class="slides">
        <li style="background-image: url({{asset("img/events/".$e->id.".jpg")}});">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row animate-box">
              <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                <div class="slider-text-inner text-center">
                  <h1>{{$e->name}}</h1>
                  <h2><span><a href="index.html">Home</a> | <a href="/events">Jasa Dokumentasi</a> | {{$e->name}}</span></h2>
                </div>
              </div>
            </div>
          </div>
        </li>
        </ul>
      </div>
  </aside>

  <div class="colorlib-classes" style="overflow:visible">
    <div class="container" style="overflow:visible; width:90%">
      <div class="row" style="overflow:visible">
        <div class="col-md-8 animate-box">
          <div class="classes">
            <div class="classes-img classes-img-single" style="background-image: url({{asset("img/events/".$e->id.".jpg")}});"></div>
            <div class="desc">
              <h3><a href="#">{{$e->name}}</a></h3>
              <p>{{$e->description}}</p>
            </div>
          </div>
          <div class="classes-desc">
            <div class="row row-pb-lg">
              <div class="col-md-12">
                <h3>Fitur</h3>
              </div>
              <div class="col-md-6">
                <ul>
                  <li>
                    @if ($e->photographer > 0)
                      <i class="icon-check"></i> Fotografer
                    @else
                      <i class="icon-cross"></i> Fotografer
                    @endif
                  </li>
                  <li>
                    @if ($e->videographer > 0)
                      <i class="icon-check"></i> Videografer
                    @else
                      <i class="icon-cross"></i> Videografer
                    @endif
                  </li>
                  <li>
                    @if ($e->album > 0)
                      <i class="icon-check"></i> Album Foto
                    @else
                      <i class="icon-cross"></i> Album Foto
                    @endif
                  </li>
                  <li><i class="icon-check"></i> CD Video</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul>
                  <li>
                    @if ($e->printed_photo > 0)
                      <i class="icon-check"></i> Cetak Foto
                    @else
                      <i class="icon-cross"></i> Cetak Foto
                    @endif
                  </li>
                  <li>
                    @if (null !== $e->extras)
                      <i class="icon-check"></i> Photo Booth
                    @else
                      <i class="icon-cross"></i> Photo Booth
                    @endif
                  </li>
                </ul>
              </div>
            </div>
            <div class="row" id="book">
              <div class="col-md-12">
                @if (null === Auth::user())
                  <div class="transp">
                    <div class="desc">
                      <h2>Silahkan Login terlebih dahulu untuk melakukan booking atau pemesanan</h1>
                        <a href="/login">< Login ></a>
                    </div>
                  </div>
                @endif
                <h2 class="colorlib-heading-2">Data Booking</h2>
                <form action="{{action('EventController@storeEvent')}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="event_id" value="{{$e->id}}">
                  <input type="hidden" name="subtotal" value="{{$e->price}}">
                  <label>Penanggung Jawab</label>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <input type="text" name="pic_name" id="pic_name" class="form-control" placeholder="Nama Lengkap penanggung jawab Acara ">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                      {{-- <label for="pic">Penanggung Jawab</label> --}}
                      <input type="number" name="pic_phone" id="pic_phone" class="form-control phone" placeholder="Nomor Telpon penanggung jawab Acara ">
                    </div>
                  </div>

                  <label>Pelaksanaan Acara</label>
                  <div class="row form-group">
                    <div class="col-md-6">
                      <input type="text" name="event_date" id="event_date" class="form-control datepicker" placeholder="Tanggal Acara">
                    </div>
                    <div class="col-md-3">
                      <!-- <label for="email">Email</label> -->
                      {{-- <div class="input-group"> --}}
                        <input type="number" name="day_count" value="1" min="1" id="day_count" class="form-control" placeholder="" style="height:100%">

                        {{-- <span class="input-group-addon">Hari</span> --}}
                      {{-- </div> --}}
                    </div>
                    <div class="col-md-3">
                      <p class="form-control-static">Hari</p>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <!-- <label for="subject">Subject</label> -->
                      <input type="text" id="addess" name="event_address" class="form-control" placeholder="Lokasi Acara">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <!-- <label for="message">Message</label> -->
                      <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Deskripsi Acara"></textarea>
                    </div>
                  </div>
                  <p> <i>* Hanya malayani sejabodetabek</i> </p>
                  <p> <b>“ Harap melakukan pembayaran min 50% paling lambat 3 Hari Sebelum acara dimulai “</b> </p>
                  <div class="form-group">
                    <input type="submit" value="Book" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="side animate-box">
            <h3>Info Jasa</h3>
            <ul>
              <li><span>Fotografer:</span> <span>{{$e->photographer}} orang</span></li>
              <li><span>Videografer:</span> <span>{{$e->videographer}} orang</span></li>
              <li><span>Harga:</span> <span>{{rupiah($e->price)}}</span></li>
              <li><span>Cetak Album:</span> <span>{{$e->album}} album</span></li>
              <li><span>Cetak Foto:</span> <span>{{$e->printed_photo}} lembar</span></li>
              <li><span>Tambahan :</span> <span>
                @if (null == $e->extras)
                  -
                @else
                  {{ $e->extras }}
                @endif
              </span></li>
            </ul>
            <p><a href="#book" class="btn btn-primary" style="display: block">Booking</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <div id="colorlib-subscribe" class="subs-img" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="overlay"></div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
          <h2>Subscribe Newsletter</h2>
          <p>Subscribe our newsletter and get latest update</p>
        </div>
      </div>
      <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3">
          <div class="row">
            <div class="col-md-12">
            <form class="form-inline qbstp-header-subscribe">
              <div class="col-three-forth">
                <div class="form-group">
                  <input type="text" class="form-control" id="email" placeholder="Enter your email">
                </div>
              </div>
              <div class="col-one-third">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Subscribe Now</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
