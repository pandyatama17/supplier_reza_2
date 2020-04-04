<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Supplier.com</title>
	<meta charset="UTF-8">
	<meta name="description" content="Photo Gallery HTML Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">


	<!-- photogallery Stylesheets -->
	<link rel="stylesheet" href="{{asset("photogallery/css/bootstrap.min.css")}}"/>
	<link rel="stylesheet" href="{{asset("photogallery/css/font-awesome.min.css")}}"/>
	<link rel="stylesheet" href="{{asset("photogallery/css/owl.carousel.min.css")}}"/>
	<link rel="stylesheet" href="{{asset("photogallery/css/animate.css")}}"/>

	<!-- alte Stylesheets -->
	<link rel="stylesheet" href="{{asset("adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}">

	<!--Robust Stylesheets-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900" rel="stylesheet">

	<link rel="stylesheet" href="{{asset("robust/css/icomoon.css")}}">
	<link rel="stylesheet" href="{{asset("robust/css/bootstrap.css")}}">
	<link rel="stylesheet" href="{{asset("robust/css/magnific-popup.css")}}">
	<link rel="stylesheet" href="{{asset("robust/css/flexslider.css")}}">
	<link rel="stylesheet" href="{{asset("robust/css/owl.theme.default.min.css")}}">
	<link rel="stylesheet" href="{{asset("robust/fonts/flaticon/font/flaticon.css")}}">
	<link rel="stylesheet" href="{{asset("robust/css/style.css")}}">

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{asset("photogallery/css/style.css")}}"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  <style media="screen">
    .owl-nav
    {
      display: none!important;
    }
		.custom-scroll::-webkit-scrollbar {
			width: 12px;
			background-color: #F5F5F5;
		}
		.custom-scroll::-webkit-scrollbar-thumb {
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
			background: rgba(245,14,34,1);
			background: -moz-linear-gradient(left, rgba(245,14,34,1) 0%, rgba(131,8,156,1) 99%, rgba(131,8,156,1) 100%);
			background: -webkit-gradient(left top, right top, color-stop(0%, rgba(245,14,34,1)), color-stop(99%, rgba(131,8,156,1)), color-stop(100%, rgba(131,8,156,1)));
			background: -webkit-linear-gradient(left, rgba(245,14,34,1) 0%, rgba(131,8,156,1) 99%, rgba(131,8,156,1) 100%);
			background: -o-linear-gradient(left, rgba(245,14,34,1) 0%, rgba(131,8,156,1) 99%, rgba(131,8,156,1) 100%);
			background: -ms-linear-gradient(left, rgba(245,14,34,1) 0%, rgba(131,8,156,1) 99%, rgba(131,8,156,1) 100%);
			background: linear-gradient(to right, rgba(245,14,34,1) 0%, rgba(131,8,156,1) 99%, rgba(131,8,156,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f50e22', endColorstr='#83089c', GradientType=1 );
		}
		.custom-scroll::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			background-color: #F5F5F5;
		}
		/* Hide HTML5 Up and Down arrows. */
		.phone::-webkit-outer-spin-button, .phone::-webkit-inner-spin-button {
		    -webkit-appearance: none;
		    margin: 0;
		}

		.phone {
		    -moz-appearance: textfield;
		}
  </style>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
		<!-- Top right elements -->
		@if (null === Auth::user())
			<div class="spacial-controls">
				<div class="search-switch">
					<a href="/login" style="color:white"><b>Login</b> <i class="fa fa-sign-in"></i></a>
				</div>
			</div>
		@endif
		<!-- Top right elements end -->
  	<div class="main-warp">
		<!-- header section -->
		<header class="header-section">
			<div class="header-close">
				<i class="fa fa-times"></i>
			</div>
			<div class="header-warp">
				<a href="" class="site-logo">
					<img src="{{asset("/img/logo.png")}}" alt="" style="width: 50%; height:50%">
				</a>
				<img src="{{asset("photogallery/img/menu-icon.png")}}" alt="" class="menu-icon">
				<ul class="main-menu">
					<li @if ($pagin->pagin == 'home') class="active" @endif><a href="/">Home</a></li>
					{{-- <li @if ($pagin->pagin == 'gallery') class="active" @endif><a href="/gallery">Galeri</a></li> --}}
					{{-- <li @if ($pagin->pagin == 'store') class="active" @endif><a href="/events">Toko</a></li> --}}
						<li @if ($pagin->pagin == 'clothing') class="active" @endif><a href="/clothing">Jasa Konveksi</a></li>
					<li @if ($pagin->pagin == 'cart') class="active" @endif><a href="/cart">Keranjang Belanja</a></li>
					{{-- <li><a href="./contact.html">Contact</a></li> --}}
					@if (null !== Auth::user())
						<li><a href="/logout" style="color:red">logout</a></li>
					@endif
				</ul>
					{{-- <div class="social-links-warp">
					<div class="social-links">
						<a href="http://www.instagram.com/andespay_project" target="_blank"><i class="fa fa-instagram"></i></a>
						<a href="http://www.youtube.com/channel/UCj6hD1VmHP0S7pGyeQK7PLQ" target="_blank"><i class="fa fa-youtube"></i></a>
					</div>
					<div class="social-text">Find us on</div>
				</div> --}}
			</div>
			<div class="copyright">Colorlib 2018  @ All rights reserved</div>
		</header>
		<!-- header section end -->

		@yield('content')


	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset("photogallery/js/jquery-3.2.1.min.js")}}"></script>
	<script src="{{asset("photogallery/js/bootstrap.min.js")}}"></script>
	<script src="{{asset("photogallery/js/owl.carousel.min.js")}}"></script>
	<script src="{{asset("photogallery/js/jquery.nicescroll.min.js")}}"></script>
	<script src="{{asset("photogallery/js/isotope.pkgd.min.js")}}"></script>
	<script src="{{asset("photogallery/js/imagesloaded.pkgd.min.js")}}"></script>
	<script src="{{asset("photogallery/js/circle-progress.min.js")}}"></script>
	<script src="{{asset("photogallery/js/main.js")}}"></script>

	<script src="{{asset("robust/js/jquery.easing.1.3.js")}}"></script>
	<script src="{{asset("robust/js/jquery.waypoints.min.js")}}"></script>
	<script src="{{asset("robust/js/jquery.stellar.min.js")}}"></script>
	<script src="{{asset("robust/js/jquery.flexslider-min.js")}}"></script>
	<script src="{{asset("robust/js/jquery.magnific-popup.min.js")}}"></script>
	<script src="{{asset("robust/js/magnific-popup-options.js")}}"></script>
	<script src="{{asset("robust/js/jquery.countTo.js")}}"></script>
	<script src="{{asset("robust/js/main.js")}}"></script>

	<script src="{{asset("adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('.datepicker').datepicker({
				autoclose: true
			});
			$("#findEvent").click(function()
      {
        var code = $("#email").val();
        window.location.replace("/event/order/"+code);
      });
			jQuery(document).ready( function($) {

	    // Disable scroll when focused on a number input.
	    $('form').on('focus', '.phone', function(e) {
	        $(this).on('wheel', function(e) {
	            e.preventDefault();
	        });
	    });

	    // Restore scroll on number inputs.
	    $('form').on('blur', '.phone', function(e) {
	        $(this).off('wheel');
	    });

	    // Disable up and down keys.
	    $('form').on('keydown', '.phone', function(e) {
	        if ( e.which == 38 || e.which == 40 )
	            e.preventDefault();
	    });

	});
		})
	</script>
	</body>
</html>
