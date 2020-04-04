@extends('layout.wrapper')
@section('content')
  <link rel="stylesheet" href="{{asset("karma/css/linearicons.css")}}">
	<link rel="stylesheet" href="{{asset("karma/css/owl.carousel.css")}}">
	<link rel="stylesheet" href="{{asset("karma/css/themify-icons.css")}}">
	<link rel="stylesheet" href="{{asset("karma/css/font-awesome.min.css")}}">
	<link rel="stylesheet" href="{{asset("karma/css/nice-select.css")}}">
	<link rel="stylesheet" href="{{asset("karma/css/nouislider.min.css")}}">
	<link rel="stylesheet" href="{{asset("karma/css/bootstrap.css")}}">
	<link rel="stylesheet" href="{{asset("karma/css/main.css")}}">

  <!--================Cart Area =================-->
  @php
    $total = 0;
    $pretotal = 0;
  @endphp
  <section class="cart_area">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Gambar Desain</th>
                <th scope="col">Jenis Baju</th>
                <th scope="col">Size</th>
                <th scope="col">Jenis Sablon</th>
                <th scope="col">Harga Dasar</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col" colspan="2">Total</th>
              </tr>
            </thead>
            <tbody>
              @if(session('cart'))
                @foreach(session('cart') as $index => $details)
                  @php
                    $c = (object) $details;
                    if ($c->per_unit_qty != 0)
                    {
                      $total += $c->per_unit_qty * App\Clothing::where('id',$c->item_id)->value("per_unit_price");
                    }
                    if($c->per_dozen_qty != 0)
                    {
                      $total += $c->per_dozen_qty * App\Clothing::where('id',$c->item_id)->value("per_dozen_price");
                    }
                    if($c->per_score_qty != 0)
                    {
                      $total += $c->per_score_qty * App\Clothing::where('id',$c->item_id)->value("per_score_price");
                    }
                  @endphp
                  <tr>
                    <td>
                      <img src="{{asset("img/clothing_orders/cart_caches/".$c->imgname)}}" alt="" style="max-height: 100px; max-width:100px">
                    </td>
                    <td>
                      <p>{{App\Clothing::where('id',$c->item_id)->value("name")}}</p>
                    </td>
                    <td>
                      {{strToUpper($c->size)}}
                    </td>
                    <td>
                      <p>{{App\ScreeningType::find($c->screening_type)->value('name')}}</p>
                    </td>
                    <td>
                      <ul class="list">
                        @if ($c->per_unit_qty != 0)
                          <li>{{rupiah(App\Clothing::where('id',$c->item_id)->value("per_unit_price"))}}/unit</li>
                        @endif
                        @if ($c->per_dozen_qty != 0)
                          <li>{{rupiah((App\Clothing::where('id',$c->item_id)->value("per_dozen_price"))/12)}}&#64;unit/lusin</li>
                        @endif
                        @if ($c->per_score_qty != 0)
                          <li>{{rupiah((App\Clothing::where('id',$c->item_id)->value("per_score_price"))/24)}}&#64;unit/kodi</li>
                        @endif
                      </ul>
                    </td>
                    <td>
                      @if ($c->per_unit_qty != 0)
                        <h5>{{$c->per_unit_qty}} Unit</h5>
                      @endif
                      @if ($c->per_dozen_qty != 0)
                        <h5>{{$c->per_dozen_qty}} Lusin</h5>
                      @endif
                      @if ($c->per_score_qty != 0)
                        <h5>{{$c->per_score_qty}} Kodi</h5>
                      @endif
                    </td>
                    <td>
                      @if ($c->per_unit_qty != 0)
                        <p>{{rupiah($c->per_unit_qty*App\Clothing::where('id',$c->item_id)->value('per_unit_price'))}}</p>
                      @endif
                      @if ($c->per_dozen_qty != 0)
                        <p>{{rupiah($c->per_dozen_qty*App\Clothing::where('id',$c->item_id)->value('per_dozen_price'))}}</p>
                      @endif
                      @if ($c->per_score_qty != 0)
                        <p>{{rupiah($c->per_score_qty*App\Clothing::where('id',$c->item_id)->value('per_score_price'))}}</p>
                      @endif
                    </td>
                    <td>
                      <a href="/clothing/remove-from-cart/{{$index}}" class="btn btn-danger"><i class="fa fa-close"></i> </a>
                    </td>
                  </tr>
                @endforeach
              @endif
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td colspan="2">
                  <h5>{{rupiah($total)}}</h5>
                </td>
              </tr>
              </tbody>
            </table>
            @if (null !== Session::get('cart'))
              <div class="row">
                <div class="col-md-12">
                  <form class="form" action="{{action('ClothingOrderController@storeOrder')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="subtotal" value="{{$total}}">
                    <div class="form-group">
                      <div class="col-md-6">
                        <label>Pemesanan Atas Nama :</label>
                      </div>
                      <div class="col-md-6">
                        <p class="form-control-static">{{strToUpper(Auth::user()->name)}}</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6">
                        <label>Alamat Pengiriman :</label>
                      </div>
                      <div class="col-md-6">
                        <div class="mt-10">
          								<textarea name="address" class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Pengiriman'"
          								 required></textarea>
          							</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6">
                        <label>No. Telepon :</label>
                      </div>
                      <div class="col-md-6">
                        <input type="number" class="single-input phone" name="phone" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6"></div>
                      <div class="col-md-6">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Lakukan Pemesanan">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            @endif
          </div>
        </div>
    </div>
  </section>
  <!--================End Cart Area =================-->
@endsection
