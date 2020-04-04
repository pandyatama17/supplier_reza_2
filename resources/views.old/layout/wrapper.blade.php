<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Modist - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('modist/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('modist/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('modist/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('modist/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('modist/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('modist/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('modist/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('modist/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('modist/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('modist/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('modist/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('modist/css/style.css')}}">

    <script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/jquery.form.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">Jannu Outdor Shop</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                @foreach ($categories as $c)
                  <a class="dropdown-item" href="/category/{{$c->name}}">{{$c->name}}</a>
                @endforeach
              </div>
            </li>
	          <li class="nav-item"><a href="/products" class="nav-link">Products</a></li>
	          <li class="nav-item cta cta-colored">
              <a href="/cart" class="nav-link">
                <span class="icon-shopping_cart"></span>
                @if(null !== Session::get('cart'))
                    [{{count(Session::get('cart'))}}]
                  @else
                    [0]
                  @endif
              </a>
            </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

		@yield('content')




  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('modist/js/jquery.min.js')}}"></script>
  <script src="{{asset('modist/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('modist/js/popper.min.js')}}"></script>
  <script src="{{asset('modist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('modist/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('modist/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('modist/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('modist/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('modist/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('modist/js/aos.js')}}"></script>
  <script src="{{asset('modist/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('modist/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('modist/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('modist/js/google-map.js')}}"></script>
  <script src="{{asset('modist/js/main.js')}}"></script>
  </body>
</html>
