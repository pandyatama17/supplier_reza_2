<!-- Page Preloder -->
<div id="preloder">
  <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section">
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 text-center text-lg-left">
          <!-- logo -->
          <a href="./index.html" class="site-logo">
            <img src="{{asset('images/logo.jpg')}}" class="img-logo">
          </a>
        </div>
        <div class="col-xl-6 col-lg-5"></div>
        <div class="col-xl-4 col-lg-5">
          <div class="user-panel">
            <div class="up-item">
              <i class="flaticon-profile"></i>
              @if (Auth::check())
                <a href="/logout">Logout</a>
              @else
                <a href="/login">Sign</a> In or <a href="/register">Create Account</a>
              @endif
            </div>
            <div class="up-item">
              <div class="shopping-card">
                <i class="flaticon-bag"></i>
                <span>
                  @if(null !== Session::get('cart'))
                    {{count(Session::get('cart'))}}
                  @else
                    0
                  @endif
                </span>
              </div>
              <a href="/cart">Shopping Cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="main-navbar">
    <div class="container">
      <!-- menu -->
      <ul class="main-menu">
        <li><a href="/">Home</a></li>
        <li><a href="/products">Products</a></li>
        {{-- <li><a href="#">Jewelry
          <span class="new">New</span>
        </a></li> --}}
        <li><a href="#">Categories</a>
          <ul class="sub-menu">
            @foreach ($categories as $c)
              <li><a href="/category/{{$c->name}}">{{$c->name}}</a></li>
            @endforeach
          </ul>
        </li>
        <li><a href="#">Forum</a></li>
      </ul>
    </div>
  </nav>
</header>
<!-- Header section end -->
