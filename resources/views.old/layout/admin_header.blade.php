<!DOCTYPE html>
<html>
@include('layout.head')
@if (Auth::user()->isAdmin)
  <body class="hold-transition skin-red">
@else
  <body class="hold-transition skin-blue">
@endif
<div class="wrapper">
  @include('layout.nav')
  @if ($pagin['title']!='Homepage')
    @if (Auth::user()->isAdmin)
      @include('layout.admin_menu')
    @else
      @include('layout.client_menu')
    @endif
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
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">kimochiinside</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  {{-- <div class="control-sidebar-bg"></div> --}}
</div>
<!-- ./wrapper -->

@include('layout.foot')
</body>
</html>
