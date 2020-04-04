@extends('admin.layout.head')
@section('title','Rents')
@section('content')
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/jquery.form.min.js')}}"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  <style media="screen">
  .table-fit {
    width: 1px;
  }
  </style>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">{{$pagin['title']}} Data</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div style="width: 100%;">
            <div class="table-responsive">
              <table id="itemsTable" class="table table-striped table-hover table-responsive">
                <thead>
                  <tr>
                    <th>Item #</th>
                    <th>&nbsp;</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    {{-- <th>Weight Qty.</th> --}}
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $r)
                    @if ($r->id != 0)
                      <tr>
                        <td>#{{$r->id}}</td>
                        <td><img src="{{asset('img/products/'.$r->id.'.jpeg')}}" alt="" style="width:50px;height:50px;"></td>
                        <td>{{$r->name}}</td>
                        <td>{{$r->type}}</td>
                        <td>Rp. {{number_format($r->price,0,',','.')}},-</td>
                        {{-- <td>{{$r->address}}</td> --}}
                        <td>
                          <a href="/admin/item/edit/{{$r->id}}" class="text-black"><i class="fa fa-edit"></i><span> | Edit</span><a>
                          <br>
                          <a href="/admin/item/delete/{{$r->id}}" class="text-danger"><i class="fa fa-trash"></i><span> | Delete</span></a>
                          <br>
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <script type="text/javascript">
      $(document).ready(function()
      {
          var rentsTable = $("#itemsTable").DataTable({
            responsive: true,
            "sDom": '<"top"<"actions">lfpi<"clear">><"clear">rt<"bottom">'
          });
        });
      </script>
@endsection
