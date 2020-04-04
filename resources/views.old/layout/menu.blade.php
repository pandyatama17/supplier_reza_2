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
      <li class="header">Laundry</li>
      {{-- <li>
        <a href="/admin/delivery/new"><i class="fa fa-plus"></i> <span>New Delivery</span></a>
      </li> --}}
      {{-- <li class="treeview">
        <a href="#">
          <i class="fa fa-shopping-cart"></i> <span>Laundries Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/laundries"><i class="fa fa-archive"></i>All Laundries</a></li>
          <li><a href="/admin/laundries/finished"><i class="fa fa-check text-green"></i>Finished Laundries</a></li>
        </ul>
      </li> --}}
      <li>
        <a href="/admin/laundries/">
          <i class="fa fa-archive"></i>
          <span>All Laundries</span>
        </a>
      </li>
      <li>
        <a href="/admin/laundries/pending">
          <i class="fa fa-hourglass text-warning"></i>
          <span>Pending</span>
          <span class="pull-right-container">
            @if (!empty(DB::table('laundries')->where('status', 'pending')->where('id','!=','0')->count()))
              <span class="label label-warning pull-right">
                  {{DB::table('laundries')->where('status', 'pending')->where('id','!=','0')->count()}} pending
              </span>
            @endif
          </span>
        </a>
      </li>
      <li>
        <a href="/admin/laundries/queued">
          <i class="fa fa-sort-amount-asc text-info"></i>
          <span>Queue</span>
          <span class="pull-right-container">
            @if (!empty(DB::table('laundries')->where('status', 'queued')->count()))
              <span class="label label-info pull-right">
                  {{DB::table('laundries')->where('status', 'queued')->count()}} queued
              </span>
            @endif
          </span>
        </a>
      </li>
      <li>
        <a href="/admin/laundries/on_progress">
          <i class="fa fa-refresh text-primary"></i>
          <span>On Progress</span>
          <span class="pull-right-container">
            @if (!empty(DB::table('laundries')->where('status', 'on_progress')->count()))
              <span class="label label-primary pull-right">
                  {{DB::table('laundries')->where('status', 'on_progress')->count()}} on progress
              </span>
            @endif
          </span>
        </a>
      </li>
      <li>
        <a href="/admin/laundries/finished">
          <i class="fa fa-check text-success"></i>
          <span>Finished</span>
        </a>
      </li>
      <li class="header">Jobs</li>
      <li>
        <a href="/admin/assignment/pick">
          <i class="fa fa-reply"></i>
          <span>Pick Up Laundry</span>
          <span class="pull-right-container">
            @if (!empty(DB::table('logistics')->where('type', 'pick')->where('status', 'pending')->count()))
              <span class="label label-warning pull-right">
                {{DB::table('logistics')->where('type', 'pick')->where('status', 'pending')->count()}} pending
              </span>
            @endif
          </span>
        </a>
      </li>
      <li>
        <a href="/admin/assignment/deliver">
          <i class="fa fa-share"></i>
          <span>Deliver Laundries</span>
          <span class="pull-right-container">
            <span class="label label-warning pull-right">
              {{-- @php $pends = DB::table('laundries')->where('deliver', true)->where('status','!=','finished')->count() @endphp --}}
              {{-- {{DB::table('logistics')->where('type', 'deliver')->where('status', 'pending')->count()}} pending --}}
              {{-- @php
                $ls = DB::table('logistics')->where('type', 'deliver')->where('status', 'pending')->get();
                $i = 0;
                foreach ($ls as $l)
                {
                  $ll = DB::table('laundries')->where('id','=',$l->parent_id)->get();
                  if ($ll[0]->status=='done')
                  {
                    $i++;
                  }
                }
              @endphp --}}
              {{-- {{$i}} pending --}}
              {{DB::table('laundries')->where('deliver', true)->where('status','!=','done')->count()}} pending
            </span>
          </span>
        </a>
      </li>
      {{-- <li class="header">Administrative</li>
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
      </li> --}}
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
