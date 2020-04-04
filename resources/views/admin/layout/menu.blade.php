<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Event Bookings</li>
      <li>
        <a href="/admin/bookings/">
          <i class="fa fa-archive"></i>
          <span>All Data</span>
        </a>
      </li>
      <li>
        <a href="/admin/bookings/pending">
          <i class="fa fa-hourglass text-warning"></i>
          <span>Pending Bookings</span>
          <span class="pull-right-container">
            @if (!empty(DB::table('event_orders')->where('confirm_start', 0)->where('id','!=','0')->count()))
              <span class="label label-warning pull-right">
                  {{DB::table('event_orders')->where('confirm_start', 0)->where('id','!=','0')->count()}} pending
              </span>
            @endif
          </span>
        </a>
      </li>
      <li>
        <a href="/admin/bookings/confirmed">
          <i class="fa fa-refresh text-blue"></i>
          <span>Confirmed Bookings</span>
        </a>
      </li>
      <li>
        <a href="/admin/bookings/finished">
          <i class="fa fa-check text-success"></i>
          <span>Finished Bokings</span>
        </a>
      </li>
      <li class="header">Clothing Orders</li>
      <li>
        <a href="/admin/clothing_orders/">
          <i class="fa fa-archive"></i>
          <span>All Data</span>
        </a>
      </li>
      <li>
        <a href="/admin/clothing_orders/pending">
          <i class="fa fa-hourglass text-warning"></i>
          <span>Pending Orders</span>
          <span class="pull-right-container">
            @if (!empty(DB::table('clothing_orders')->where('confirm_start', 0)->where('id','!=','0')->count()))
              <span class="label label-warning pull-right">
                  {{DB::table('clothing_orders')->where('confirm_start', 0)->where('id','!=','0')->count()}} pending
              </span>
            @endif
          </span>
        </a>
      </li>
      <li>
        <a href="/admin/clothing_orders/confirmed">
          <i class="fa fa-refresh text-blue"></i>
          <span>Confirmed Orders</span>
        </a>
      </li>
      <li>
        <a href="/admin/clothing_orders/finished">
          <i class="fa fa-check text-success"></i>
          <span>Finished Orders</span>
        </a>
      </li>
      <li class="header">Management</li>
      {{-- <li>
        <a href="/admin/clothing">
          <i class="fa fa-list"></i>
          <span>Clothing Data</span>
        </a>
      </li>
      <li>
        <a href="/admin/item/add">
          <i class="fa fa-plus"></i>
          <span>Add Clothing</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li> --}}
      <li>
        <a href="/admin/gallery/add">
          <i class="fa fa-image"></i>
          <span>Add Gallery</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
