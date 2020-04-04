<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | Jannu Outdoor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('css/skins/skin-blue.min.css')}}"> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{-- <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->--}}
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Date Time Picker -->
  <link rel="stylesheet" href="{{asset('css/datetimepicker.min.css')}}">
  <!-- Daterange picker -->
  {{--<link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}"> --}}
  <!--swal-->
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css"> --}}
  {{-- <link rel="stylesheet" href="{{asset('plugins/swal2/sweetalert2.min.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('plugins/swal/sweetalert.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
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
      <strong>Copyright &copy; 2019 <a href="#">Nikit4</a>.</strong> All rights
      reserved.
    </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    {{-- <div class="control-sidebar-bg"></div> --}}
  </div>
  <!-- ./wrapper -->

  @include('admin.layout.foot')
  </body>
  </html>
@endisset
