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
  .flex {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
  flex-wrap: wrap;
}
.flex > [class*='col-'] {
  display: flex;
  flex-direction: column;
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
  #preview
  {
    display: block;
    max-width:180px;
    max-height:180px;
    width: auto;
    height: auto;
  }
  .input-group-text
  {
    height: 120%!important;
    background-color: white!important;
    border:none!important;
    font-size: 12pt!important;
  }
  </style>
  <aside id="colorlib-hero">
    <div class="flexslider">
      <ul class="slides">
        <li style="background-image: url({{asset("img/sewing_banner.jpg")}});">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row animate-box">
              <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                <div class="slider-text-inner text-center">
                  <h1>Jasa Konveksi</h1>
                  <h2><span><a href="index.html">Home</a> | Jasa Konveksi</span></h2>
                </div>
              </div>
            </div>
          </div>
        </li>
        </ul>
      </div>
  </aside>
  <div class="colorlib-trainers" style="overflow:visible; padding-top:0px">
    <div class="container" style="overflow:visible; width:90%">
      <div class="row flex">
        @foreach ($clothings as $c)
          <div class="col-md-4 col-sm-4 animate-box">
            <div class="trainers-entry">
              <div class="trainer-img" style="background-image: url({{asset("img/clothing/".$c->id.".jpg")}})"></div>
              <div class="desc">
                <h3>{{$c->name}}</h3>
                <div class="clearfix"></div>
                <span class="pull-left">{{$c->material}} |</span>
                <span class="pull-right">
                  {{rupiah($c->per_unit_price)}}/pcs <br>
                  {{rupiah($c->per_dozen_price/12)}}/lusin <br>
                  {{rupiah($c->per_score_price/24)}}/kodi <br>
                </span>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="colorlib-classes" style="overflow:visible">
    <div class="container" style="overflow:visible; width:90%">
      <div class="row" style="overflow:visible">
        <div class="col-md-8 animate-box">
          <div class="classes-desc">
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
                <h2 class="colorlib-heading-2">Data Pemesanan</h2>
                <form action="{{action('ClothingOrderController@addToCartForm')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{-- <div class="row form-group">
                    <div class="col-md-12">
                      <p class="form-control-static"><b>pemesanan barang atas nama :</b> @if (null!== Auth::user()) {{Auth::user()->name}} @endif</p>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <!-- <label for="subject">Subject</label> -->
                      <input type="text" id="addess" name="address" class="form-control" placeholder="Alamat Pengiriman">
                    </div>
                  </div> --}}
                  <label>Desain Gambar</label>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <div class="clearfix"></div>
                      <div class="col-md-6">
                        <div class="classes-desc">
                          <div class="row row-pb-lg">
                            <img id="preview" src="http://placehold.it/180">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <input type="file" accept="image/jpg"name="file" id="file" onchange="readURL(this)" class="form-control-file" placeholder="Foto ">
                      </div>
                    </div>
                  </div>

                  <label>Jenis Konveksi & Sablon</label>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <select class="form-control" name="item_id">
                        <option selected disabled>Pilih Jenis Clothing</option>
                        @foreach ($clothings as $c)
                          <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <select class="form-control" name="screening_type">
                        <option selected disabled>Pilih Jenis Sablonan</option>
                        @foreach ($st as $t)
                          <option value="{{$t->id}}">{{$t->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <label>Ukuran & Jumlah</label>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <select class="form-control" name="size">
                        <option selected disabled>Pilih Ukuran</option>
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                      </select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-4">
                      <div class="input-group input-group-lg">
                        <input type="number" name="per_unit_qty" value="0" min="0" class="form-control" placeholder="" style="height:100%; width:90%">
                        <div class="input-group-append">
                          <span class="input-group-text">Pcs</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-4">
                      <div class="input-group input-group-lg">
                        <input type="number" name="per_dozen_qty" value="0" min="0" class="form-control" placeholder="" style="height:100%; width:75%">
                        <div class="input-group-append">
                          <span class="input-group-text">Lusin</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-4">
                      <div class="input-group input-group-lg">
                        <input type="number" name="per_score_qty" value="0" min="0" class="form-control" placeholder="" style="height:100%; width:75%">
                        <div class="input-group-append">
                          <span class="input-group-text">Kodi</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p> <i>* Hanya malayani sejabodetabek</i> </p>
                  <p> <i>* Untuk Jenis Ukuran Yang Berbeda, silahkan melakukan order lagi sebelum check out</i> </p>
                  <p> <b>“ Harap melakukan pembayaran min 50% paling lambat 3 Hari setelah pemesanan“</b> </p>
                  <div class="form-group">
                    <input type="submit" value="Book" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
        function readURL(input)
        {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
@endsection
