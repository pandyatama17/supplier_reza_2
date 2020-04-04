@extends('layout.wrapper')
@section('content')
	<div class="hero-wrap hero-bread" style="background-image: url('{{asset('modist/images/bg_6.jpg')}}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-0 bread">My Rental History</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-cart">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <h1>Rental code : <i>{{$rental->code}}</i></h1>
          <h5><i>*show this code to shopkeeper to redeem your order</i></h5>@if ($rental->confirm == false)
            <p style="text-color:red"><i>this order has not confirmed by our store</i></p>
          @endif
          <div class="cart-list">
              <table class="table">
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>&nbsp;</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($details as $d)
                      <tr class="text-center">
                        {{-- <input type="hidden" class="id" value="{{$id}}"> --}}
                        {{-- <td class="product-remove">
                          <a href="/remove-from-cart/{{$details['id']}}"><span class="ion-ios-close"></span></a>
                        </td> --}}
                        <td class="image-prod"><div class="img" style="background-image:url({{asset('img/products/'.$d->item_id.'.jpeg')}});"></div></td>
                        <td class="product-name">
                          <h3>{{DB::table('items')->where('id', $d->item_id)->pluck('name')[0]}}</h3>
                          <p>Far far away, behind the word mountains, far from the countries</p>
                        </td>
                        <td class="price">IDR. {{number_format(DB::table('items')->where('id', $d->item_id)->pluck('price')[0],0,',','.')}},-</td>
                        <td class="quantity">
                          {{$d->qty}}
                        </td>
                        <td class="total">IDR. {{number_format(DB::table('items')->where('id', $d->item_id)->pluck('price')[0]*$d->qty,0,',','.')}},-</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
          <div class="cart-total mb-3">
            <h3>Cart Totals</h3>
            <p class="d-flex">
              <span>Subtotal</span>
              <span>IDR. {{number_format($rental->total,0,',','.')}},-</span>
            </p>
            <p class="d-flex">
              <span>Fees</span>
              <span>IDR. {{number_format($rental->fees,0,',','.')}},-</span>
            </p>
            <hr>
            <p class="d-flex total-price">
              <span>Total</span>
              <span>IDR. {{number_format($rental->total,0,',','.')}},-</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
