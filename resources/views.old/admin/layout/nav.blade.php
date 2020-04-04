<header class="main-header">
  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
      <img src="{{asset('img/main.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
    </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">
      {{-- <img src="{{asset('img/main.png')}}" width="30" height="30" class="d-inline-block align-top" alt=""> --}}
      <b><i>Jannu</i> </b>Outdoor Shop
      @if (Auth::user())
        <b>Admin</b>
      @endif
    </span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    @if (Auth::user())
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    @endif

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        @if (Auth::check())
        {{-- @if(Session::has('user')) --}}
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              {{-- <img src="{{asset('/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"> --}}
              <span class="hidden-xs">{{Auth::user()->name}}</span>
              {{-- <span class="hidden-xs">{{Session::get('user')["name"]}}</span> --}}
            </a>

            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}}
                  <small>{{Auth::user()->phone}}</small>
                  {{-- {{Session::get('user')['name']}}
                  <small>{{Session::get('user')['phone']}}</small> --}}
                </p>
              </li>
              <li class="user-footer">
                {{-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> --}}
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        @else
          <li class="dropdown">
            <a href="/">
              <i class="fa fa-arrow-left"></i> Back to Main Page
            </a>
          </li>
        @endif
      </ul>
    </div>
  </nav>
</header>
