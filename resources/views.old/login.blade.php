@include('layout.head')
@section('title','Login')
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/iCheck/square/blue.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="/">
        {{-- <img src="{{asset('images/logo.png')}}" width="35" height="35" class="d-inline-block align-top" alt=""> --}}
        Jannu Outdoor
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      @if (!$errors->isEmpty())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Alert!</h4>
          Error.
        </div>
      @endif
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{action('UsersController@doLogin')}}" method="post" id="loginForm">
        {{csrf_field()}}
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{-- <a href="#">I forgot my password</a><br> --}}
      {{-- <a href="/register" class="text-center">Register a new membership</a> --}}
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  @include('layout.foot')
  <script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
  <script src="{{asset('js/jquery.form.min.js')}}"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#loginForm').validate();
      $('#loginForm').ajaxForm(
      {
        url:$(this).attr('action'),
        type: 'POST',
        data: $(this).serialize(),
        success: function(data)
        {
          var obj = jQuery.parseJSON(data);
          if(obj.err == false)
          {
            swal(
            {
              title: "Login Success",
              text: obj.msg,
              type: "success",
              // confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok!",
              closeOnConfirm: false
            },function()
            {
              location.replace(obj.redirect);
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
            title: "Failed to attempt login!",
            text: "Server Error",
            type: "warning",
            confirmButtonText: "Ok!",
            closeOnConfirm: true
          });
        }
      })
    })
  </script>
</body>
