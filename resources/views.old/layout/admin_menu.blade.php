<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    @if (Auth::check())
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
  @endif
    <!-- search form -->
    {{-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> --}}
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Delivery</li>
      <li>
        <a href="/admin/delivery/new"><i class="fa fa-plus"></i> <span>New Delivery</span></a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-truck"></i> <span>Deliveries Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/deliveries"><i class="fa fa-archive"></i>All Deliveries</a></li>
          <li><a href="/admin/deliveries/finished"><i class="fa fa-check text-green"></i>Finished Deliveries</a></li>
          {{-- <li><a href="index2.html"><i class="fa fa-hourglass"></i>
            <span>Pending Delivery</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"{4</span>
            </span>
          </a></li> --}}
        </ul>
      </li>
      <li>
        <a href="/admin/deliveries/pending">
          <i class="fa fa-hourglass"></i>
          <span>Pending Deliveries</span>
          <span class="pull-right-container">
            <span class="label label-warning pull-right">{{DB::table('deliveries')->where('status', 'pending')->count()}}</span>
          </span>
        </a>
      </li>
      <li class="header">Administrative</li>
      <li>
        <a href="/admin/couriers"><i class="fa fa-users"></i> <span>Couriers</span></a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-list"></i>Assignments
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/assignments"><i class="fa fa-list-ul"></i> <span>All Data</span></a></li>
          <li><a href="/admin/assignments/pending"><i class="fa fa-circle-o text-orange"></i> <span>Pending</span></a></li>
          <li><a href="/admin/assignments/sending"><i class="fa fa-circle-o text-aqua"></i> <span>Sending</span></a></li>
          <li><a href="/admin/assignments/done"><i class="fa fa-circle-o text-green"></i> <span>Done</span></a></li>
        </ul>
      </li>
      <li>
        <a href="/admin/settings"><i class="fa fa-gears"></i> <span>Settings</span></a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
