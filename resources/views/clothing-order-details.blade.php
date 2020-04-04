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
  <section class="order_details section_gap">
		<div class="container">
      @if ($co->confirm_start == false && $co->confirm_finish == false)
        <h3 class="title_confirmation">Pesanan Anda Telah Diterima.</h3>
        <p style="color:red"><b>“ Harap melakukan pembayaran min 50% paling lambat 3 Hari setelah order, produksi segera dimulai setelah pembayaran 50% dilakukan “</b></p>
      @elseif ($co->confirm_start == true && $co->confirm_finish == false)
        <h3 class="title_confirmation">Pesanan Anda Telah Diterima.</h3>
        <h4 class="title_confirmation">“Pembayaran 50% telah dilunasi, produksi telah dimulai. harap melakukan pelunasan setelah barang selesai diproduksi“</h4>
      @else
        <h3 class="title_confirmation">Terima kasih telah menggunakan jasa kami.</h3>
      @endif
      @php
        $subtotal = 0;
      @endphp
      @foreach($clothing_order_details as $index => $cod)
        @php
          if ($cod->per_unit_qty != 0)
          {
            $subtotal += $cod->per_unit_qty * App\Clothing::where('id',$cod->item_id)->value("per_unit_price");
          }
          if($cod->per_dozen_qty != 0)
          {
            $subtotal += $cod->per_dozen_qty * App\Clothing::where('id',$cod->item_id)->value("per_dozen_price");
          }
          if($cod->per_score_qty != 0)
          {
            $subtotal += $cod->per_score_qty * App\Clothing::where('id',$cod->item_id)->value("per_score_price");
          }
        @endphp
      @endforeach
      @php
        $total = $subtotal + $cod->fees
      @endphp
      <div class="row order_d_inner">
  				<div class="col-lg-6">
  					<div class="details_item">
  						<h4>Info Pemesanan</h4>
  						<ul class="list">
  							<li><a href="#"><span>No. Pemesanan</span> : {{$co->code}}</a></li>
  							<li><a href="#"><span>Total</span> : {{rupiah($total)}}</a></li>
  							<li><a href="#"><span>Client</span> : {{$user->name}}</a></li>
  						</ul>
  					</div>
  				</div>
  				<div class="col-lg-6">
  					<div class="details_item">
  						<h4>Info Pengiriman</h4>
  						<ul class="list">
  							<li><a href="#"><span>Alamat</span> : Dokumentasi {{$co->address}}</a></li>
  							<li><a href="#"><span>No. Telepon</span> : {{$co->phone}}</a></li>
  							<li><a href="#"><span>Tracking Number</span> : {{$co->tracking_number}}</a></li>
  						</ul>
  					</div>
          </div>

				</div>
				<div class="order_details_table">
				<h2>Detail Pemesanan</h2>
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
                <th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
              @foreach($clothing_order_details as $index => $cod)
                <tr>
                  <td>
                    <img src="{{asset("img/clothing_orders/".$cod->id.".jpg")}}" alt="" style="max-height: 100px; max-width:100px">
                  </td>
                  <td>
                    <p>{{App\Clothing::where('id',$cod->item_id)->value("name")}}</p>
                  </td>
                  <td>
                    {{strToUpper($cod->size)}}
                  </td>
                  <td>
                    <p>{{App\ScreeningType::find($cod->screening_type)->value('name')}}</p>
                  </td>
                  <td>
                    <ul class="list">
                      @if ($cod->per_unit_qty != 0)
                        <li>{{rupiah(App\Clothing::where('id',$cod->item_id)->value("per_unit_price"))}}/unit</li>
                      @endif
                      @if ($cod->per_dozen_qty != 0)
                        <li>{{rupiah((App\Clothing::where('id',$cod->item_id)->value("per_dozen_price"))/12)}}&#64;unit/lusin</li>
                      @endif
                      @if ($cod->per_score_qty != 0)
                        <li>{{rupiah((App\Clothing::where('id',$cod->item_id)->value("per_score_price"))/24)}}&#64;unit/kodi</li>
                      @endif
                    </ul>
                  </td>
                  <td>
                    @if ($cod->per_unit_qty != 0)
                      <h5>{{$cod->per_unit_qty}} Unit</h5>
                    @endif
                    @if ($cod->per_dozen_qty != 0)
                      <h5>{{$cod->per_dozen_qty}} Lusin</h5>
                    @endif
                    @if ($cod->per_score_qty != 0)
                      <h5>{{$cod->per_score_qty}} Kodi</h5>
                    @endif
                  </td>
                  <td>
                    @if ($cod->per_unit_qty != 0)
                      <p>{{rupiah($cod->per_unit_qty*App\Clothing::where('id',$cod->item_id)->value('per_unit_price'))}}</p>
                    @endif
                    @if ($cod->per_dozen_qty != 0)
                      <p>{{rupiah($cod->per_dozen_qty*App\Clothing::where('id',$cod->item_id)->value('per_dozen_price'))}}</p>
                    @endif
                    @if ($cod->per_score_qty != 0)
                      <p>{{rupiah($cod->per_score_qty*App\Clothing::where('id',$cod->item_id)->value('per_score_price'))}}</p>
                    @endif
                  </td>
                </tr>
              @endforeach
              <tr>
                <td colspan="5"></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <p>{{rupiah($total)}}</p>
                </td>
              </tr>
              <tr>
                <td colspan="5"></td>
                <td>
                  <h5>Biaya Tambahan</h5>
                </td>
                <td>
                  <p>{{rupiah($cod->fees)}}</p>
                </td>
              </tr>
              <tr>
                <td colspan="5"></td>
                <td>
                  <h5>Total</h5>
                </td>
                <td>
                  <p>{{rupiah($total)}}</p>
                </td>
              </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->
@endsection
