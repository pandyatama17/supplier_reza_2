<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset("adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("adminlte/bower_components/font-awesome/css/font-awesome.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset("adminlte/bower_components/Ionicons/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("adminlte/dist/css/AdminLTE.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset("adminlte/plugins/iCheck/square/blue.css")}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js")}}"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js")}}"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="/"><i class="glyphicon glyphicon-send"></i> <b>Andespay</b> Project</a>
    </div>
    <!-- /.login-logo -->
    <div class="register-box-body">
      @if (!$errors->isEmpty())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Alert!</h4>
          Error.
        </div>
      @endif
      <p class="register-box-msg">Register a new membership</p>

      <form action="{{action('UsersController@doRegister')}}" method="post" id="registerForm">
        {{csrf_field()}}
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="name" placeholder="Full name" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <span class="help-block"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <span class="help-block"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="number" class="form-control phone" name="phone" placeholder="Phone Number" required>
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          <span class="help-block"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="address" placeholder="Address" required>
          <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
          <span class="help-block"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" id="passwordTxt" name="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <span class="help-block"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="retype_password" placeholder="Retype password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          <span class="help-block"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input name="terms" type="checkbox"> I agree to the <a href="#" data-toggle="modal" data-target="#tocModal">terms</a>
              </label>
              <span class="help-block"></span>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="submitBtn" disabled>Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.login-box-body -->
  </div>
  <script src="{{asset("adminlte/bower_components/jquery/dist/jquery.min.js")}}"></script>
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
      $('#registerForm').validate(
      {
        rules :
        {
          "name" :{ minlength: 3 ,required: true },
          "email" : "required",
          "address" : "required",
          "phone" : { minlength: 6 ,required: true },
          "password" : { minlength: 5 ,required: true },
          "password_retype" :{required:true, equalTo:"#passwordTxt"},
        },
        messages: {
            name: {
                required: "Please give us your name"
            },
            address: {
                required: "Please provide your address"
            },

            email: {
                regex: "Please enter a valid email address"
            },
            phone: {
                required: "Please provide your phone number",
                minlength : "Please provide 5 or more characters"
            },
            password_retype: {
                required: "Please provide a password",
                minlength : "Please provide 5 or more characters"
            },
            password_retype:
            {
              required: "Please retype the password",
              equalTo: "Password does not match"
            },
        },
        errorPlacement: function(error, element) {
            element.parent().addClass("has-error");
            element.parent().removeClass("has-success");
            error.appendTo(element.parent());
        },
        success: function(element) {
            element.parent().addClass("has-success");
            element.parent().removeClass("has-error");
        }
      });
      $('#registerForm').ajaxForm(
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
            swal(
            {
              title: "Registration Success",
              text: obj.msg,
              type: "success",
              // confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok!",
              closeOnConfirm: false
            },function()
            {
              location.replace('/login');
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
            title: "Failed to register!",
            text: "Unknown error detected",
            type: "error",
            confirmButtonText: "Ok!",
          });
        }
      })
      var $form = $("#registerForm");
      var $submitbutton = $("#submitBtn");

      $form.on("blur", "input", () => {
        if ($form.valid()) {
          $submitbutton.removeAttr("disabled");
        } else {
          $submitbutton.attr("disabled", "disabled");
        }
      });
    })
  </script>
</body>
</html>
