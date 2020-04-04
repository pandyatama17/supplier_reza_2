@extends('layout.wrapper')
@section('content')
  @php
    $total = 0;
    $pretotal = 0;
  @endphp
	<div class="hero-wrap hero-bread" style="background-image: url('{{asset('modist/images/bg_6.jpg')}}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-0 bread">My Cart</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-cart">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <div class="cart-list">
            @if (null !== Session::get('cart'))
              <table class="table">
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                      @php
                        $total += $details['price'] * $details['quantity']
                      @endphp
                      <tr class="text-center">
                        <input type="hidden" class="id" value="{{$id}}">
                        <td class="product-remove">
                          <a href="/remove-from-cart/{{$details['id']}}"><span class="ion-ios-close"></span></a>
                        </td>
                        <td class="image-prod"><div class="img" style="background-image:url({{asset('img/products/'.$details['id'].'.jpeg')}});"></div></td>
                        <td class="product-name">
                          <h3>{{$details['name']}}</h3>
                          <p>{{DB::table('items')->where('id', $details['id'])->pluck('description')[0]}}</p>
                        </td>
                        <td class="price">IDR. {{number_format($details['price'],0,',','.')}},-</td>
                        <td class="quantity">
                          {{$details['quantity']}}
                        </td>
                        <td class="total">IDR. {{number_format($details['price']*$details['quantity'],0,',','.')}},-</td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            @else
              <h5>Your cart is empty! check out our awesome products to buy!</h5>
              <a href="/products"><i class="fa fa-angle-left"></i> go to products</a>
              <br>&nbsp;
            @endif
          </div>
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
          <div class="cart-total mb-3">
            <h3>Cart Totals</h3>
            <p class="d-flex">
              <span>Subtotal</span>
              <span>IDR. {{number_format($total,0,',','.')}},-</span>
            </p>
            <p class="d-flex">
              <span>Delivery</span>
              <span>IDR. 0,-</span>
            </p>
            <hr>
            <p class="d-flex total-price">
              <span>Total</span>
              <span>IDR. {{number_format($total,0,',','.')}},-</span>
            </p>
          </div>
          <p class="text-center"><a href="/checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
        </div>
      </div>
    </div>
  </section>
@endsection
