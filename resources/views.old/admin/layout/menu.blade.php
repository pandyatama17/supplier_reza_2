<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    @if (Auth::check())
    <div class="user-panel">
      <div class="pull-left image">
        {{-- <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"> --}}
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
  @endif
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Rents</li>
    <li>
        <a href="/admin/rents/">
          <i class="fa fa-archive"></i>
          <span>All Rents</span>
        </a>
      </li>
      <li>
        <a href="/admin/rents/pending">
          <i class="fa fa-hourglass text-warning"></i>
          <span>Pending</span>
          <span class="pull-right-container">
            @if (!empty(DB::table('rental')->where('confirm', 0)->where('id','!=','0')->count()))
              <span class="label label-warning pull-right">
                  {{DB::table('rental')->where('confirm', 0)->where('id','!=','0')->count()}} pending
              </span>
            @endif
          </span>
        </a>
      </li>
      <li>
        <a href="/admin/rents/confirmed">
          <i class="fa fa-check text-success"></i>
          <span>Finished</span>
        </a>
      </li>
      <li class="header">Inventory</li>
      <li>
        <a href="/admin/items">
          <i class="fa fa-list"></i>
          <span>Items</span>
        </a>
      </li>
      <li>
        <a href="/admin/item/add">
          <i class="fa fa-plus"></i>
          <span>Add Item</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
