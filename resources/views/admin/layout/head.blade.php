<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | Andespay Project</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/datetimepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/swal/sweetalert.css')}}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('js/jquery.form.min.js')}}"></script>
  <script src="{{asset('plugins/swal/sweetalert.min.js')}}"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script> --}}
  <!-- iCheck 1.0.1 -->
  <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
  <style media="screen">
  .phone::-webkit-outer-spin-button,
  .phone::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
  }
  .phone {
      -moz-appearance: textfield;
  }
  </style>
</head>
@isset($pagin)
  <!DOCTYPE html>
  <html>
  @if (Auth::user())
    <body class="hold-transition skin-red">
  @else
    <body class="hold-transition skin-blue sidebar-collapse">
  @endif
  <div class="wrapper">
    @include('admin.layout.nav')
    @if ($pagin['title']!='Homepage')
      @if (Auth::user())
        @include('admin.layout.menu')
      @endif
      {{-- @include('admin.layout.menu') --}}
    @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @if ($pagin['title']!='client')
        <section class="content-header">
          <h1>
            {{$pagin['title']}}
            <small>{{$pagin['subtitle']}}</small>
          </h1>
          <ol class="breadcrumb">
            <?php
              $i = 0;
              $len = count($pagin['steps']);
            ?>
            @foreach ($pagin['steps'] as $li)
              <li @if ($i == $len - 1)
                class="active"
              @endif>
                <a href="#">
                  @if ($i==0)
                    <i class="{{$pagin['icon']}}"></i>
                  @endif
                  {{$li}}
                </a>
              </li>
              <?php $i++; ?>
            @endforeach
          </ol>
        </section>
      @endif
      <!-- Main content -->
      <section class="content"
      @if ($pagin['title']=='client')
        style="padding:0px;"
      @endif>
        @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2019 <a href="#">Andespay Project</a>.</strong> All rights
      reserved.
    </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    {{-- <div class="control-sidebar-bg"></div> --}}
  </div>
  <!-- ./wrapper -->

  @include('admin.layout.foot')
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
@endisset
