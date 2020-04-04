@extends('layout.wrapper')
@section('content')
  @php
    $total = 0;
  @endphp
  @foreach(session('cart') as $id => $details)
    @php
      $total += $details['price'] * $details['quantity']
    @endphp
  @endforeach
  <div class="hero-wrap hero-bread" style="background-image: url('{{asset('/modist/images/bg_6.jpg')}}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-0 bread">Checkout</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span><span class="mr-2"><a href="/cart">/  Cart</a></span> <span>/  Checkout</span></p>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8 ftco-animate">
          <form method="post" action="{{action('PurchasementController@store')}}" id="checkoutForm"class="billing-form bg-light p-3 p-md-5">
            <h3 class="mb-4 billing-heading">Billing Details</h3>
            <div class="row align-items-end">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="firstname">Name</label>
                  <input type="text" name="name" class="form-control" placeholder=" Your Full Name">
                </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="streetaddress">Address</label>
                  <textarea name="address" class="form-control" placeholder="Full Adress"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="postcodezip">Postcode / ZIP *</label>
                  <input type="text" name="zipcode" class="form-control" placeholder="">
                </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="emailaddress">Email Address</label>
                  <input type="email" name="email" class="form-control" placeholder="">
                </div>
              </div>
              <div class="w-100"></div>
            </div>
            <div class="row mt-5 pt-3 d-flex">
              <div class="col-md-6 d-flex">
                <div class="cart-detail cart-total bg-light p-3 p-md-4">
                  <h3 class="billing-heading mb-4">Cart Total</h3>
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
              </div>
              <div class="col-md-6">
                <div class="cart-detail bg-light p-3 p-md-4">
                  <h3 class="billing-heading mb-4">Payment Method</h3>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio">
                         <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Transfer</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio">
                         <label><input type="radio" name="optradio" class="mr-2"> COD </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="checkbox">
                         <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                      </div>
                    </div>
                  </div>
                  {{ csrf_field() }}
                  <input type="hidden" name="subtotal" value="{{$total}}">
                  <p><input type="submit" class="btn btn-primary py-3 px-4" value="Place order"></p>
                </div>
              </div>
            </div>
          </form><!-- END -->
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->
  <script type="text/javascript">
    $(document).ready(function()
    {
      $('#checkoutForm').ajaxForm(
      {
        url:$(this).attr('action'),
        type: 'POST',
        data: $(this).serialize(),
        success: function(data)
        {
          var obj = jQuery.parseJSON(data);
          if(obj.err == false)
          {
            console.log('bisa cuyyy');
            swal({
              title: "Well Done!",
              text: obj.msg,
              icon: "success"
            ).then((e)=>
            {
              location.replace('/purchasement/'+obj.redirect);
            });
          }
          else{
              swal("Opps!", obj.msg, "error");
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
          swal(
          {
            title: "Failed to Create order!",
            text: obj.msg,
            icon: "error",
          });
        }
      });
    });
  </script>
@endsection
