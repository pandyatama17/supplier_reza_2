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
      @if ($eo->confirm_start == 0 && $eo->confirm_finish == 0)
        <h3 class="title_confirmation">Pesanan Anda Telah Diterima.</h3>
        <p style="color:red"><b>“ Harap melakukan pembayaran min 50% paling lambat 3 Hari setelah booking “</b></p>
      @elseif ($eo->confirm_start == 1 && $eo->confirm_finish == 0)
        <h3 class="title_confirmation">Pesanan Anda Telah Diterima.</h3>
        <p style="color:green">“Pembayaran 50% telah dilunasi. harap melakukan pelunasan setelah acara selesai“</p>
      @else
        <h3 class="title_confirmation">Terima kasih telah menggunakan jasa kami.</h3>
      @endif
      <div class="row order_d_inner">
  				<div class="col-lg-6">
  					<div class="details_item">
  						<h4>Info Pemesanan</h4>
  						<ul class="list">
  							<li><a href="#"><span>No. Pemesanan</span> : {{$eo->code}}</a></li>
  							<li><a href="#"><span>Tanggal Acara</span> : {{$eo->event_date}}</a></li>
  							<li><a href="#"><span>Total</span> : {{rupiah($eo->subtotal)}}</a></li>
  							<li><a href="#"><span>Client</span> : {{$user->name}}</a></li>
  						</ul>
  					</div>
  				</div>
  				<div class="col-lg-6">
  					<div class="details_item">
  						<h4>Info Jasa</h4>
  						<ul class="list">
  							<li><a href="#"><span>Jenis Jasa</span> : Dokumentasi {{$event->name}}</a></li>
  							<li><a href="#"><span>Lamaya</span> : {{$eo->day_count}} Hari</a></li>
  							<li><a href="#"><span>Lokasi</span> : {{$eo->event_address}}</a></li>
  							<li><a href="#"><span>Penanggung Jawab </span> : {{$eo->pic_name}}</a></li>
  						</ul>
  					</div>
          </div>
          <div class="col-lg-12">
            <div class="details_item">
              <h4>Catatan : </h4>
              <ul class="list">
                <li><p>{{$eo->description}}</p></li>
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
                <th scope="col"><h5>Jasa</h5></th>
								<th scope="col"></th>
								<th scope="col"><h5>Harga</h5></th>
							</tr>
						</thead>
						<tbody>
              <tr>
								<td>
									<p>Dokumentasi {{$event->name}}</p>
								</td>
								<td>

								</td>
								<td>
									<p>{{rupiah($event->price)}}</p>
								</td>
							</tr>
              <tr>
								<td>
									<p>Biaya Tambahan</p>
								</td>
								<td>

								</td>
								<td>
									<p>{{rupiah($event->fees)}}</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>{{rupiah($eo->subtotal+$eo->fees)}}</p>
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
