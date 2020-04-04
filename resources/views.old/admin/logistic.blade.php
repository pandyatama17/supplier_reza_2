@extends('layout.head')
@section('title','Assignments')
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
      <div class="box
        @if ($pagin['title'] == 'Pick Up Assignments')
          box-warning
        @elseif ($pagin['title'] == 'Finished Deliveries')
          box-success
        @else
          box-primary
        @endif
      ">
        <div class="box-header">
          <h3 class="box-title">{{$pagin['title']}} Data</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div style="width: 100%;">
            <div class="table-responsive">
              <table id="laundriesTable" class="table table-striped table-hover table-responsive">
                <thead>
                  <tr>
                    <th>Assignment #</th>
                    @if ($pagin['title'] == "All Assignments")
                      <th data-hide="phone,tablet">Assignment Type</th>
                    @endif
                    <th>Status</th>
                    <th>Client Name</th>
                    <th>Adress</th>
                    <th>Date Received</th>
                    @if ($pagin['title'] == "Deliver Assignments")
                      <th>Date Sent</th>
                    @endif
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($assignments as $a)
                    <tr>
                      <td>#{{$a->id}}</td>
                      @if ($pagin['title'] == "All Assignments")
                        <td>
                          @if ($a->type == 'pick')
                            <i class="fa fa-reply text-green"></i> | Pick
                          @else
                            <i class="fa fa-share text-blue"></i> | Deliver
                          @endif
                        </td>
                      @endif
                      <td id="status_col_{{$a->id}}">
                          @if ($a->status == 'pending')
                            <span class="label label-danger">Pending</span>
                          @else
                            <span class="label label-success">Finished</span>
                          @endif
                      </td>
                      <td>
                        {{DB::table('laundries')->where('id','=', $a->parent_id)->pluck('client_name')[0]}}
                      </td>
                      <td>
                        {{DB::table('laundries')->where('id','=', $a->parent_id)->pluck('client_address')[0]}}
                      </td>
                      <td>
                        @if (!empty(DB::table('laundries')->where('id','=', $a->parent_id)->pluck('date_received')[0]))
                          {{DB::table('laundries')->where('id','=', $a->parent_id)->pluck('date_received')[0]}}
                        @else
                          -
                        @endif
                      </td>
                      @if ($pagin['title'] == "Deliver Assignments")
                        <td>
                          {{DB::table('laundries')->where('id','=', $a->parent_id)->pluck('date_out')[0]}}
                        </td>
                        @endif
                      <td>
                        <span id="action_col_{{$a->id}}">
                          @if ($a->status == 'pending')
                            <a href="/admin/assignment/finish/{{$a->id}}" class="text-green finish"><i class="fa fa-flag-checkered"></i><span> | Finish</span></a>
                          @endif
                        </span>
                      </td>
                    </tr>
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
        var laundriesTable = $("#laundriesTable").DataTable({
          responsive: true,
          "sDom": '<"top"<"actions">lfpi<"clear">><"clear">rt<"bottom">'
        });
        $('.finish').click(function(e, params)
        {
          var localParams = params || {};
          var originalUrl = $(this).attr('href');
          if (!localParams.send) {
            e.preventDefault();
          }

          swal({
              title: "Are you sure?",
              text: "Your this delivery will be finished.",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#6A9944",
              confirmButtonText: "Yes",
              cancelButtonText: "Cancel",
              closeOnConfirm: true
            },
            function(isConfirm) {
              if (isConfirm) {
                // $(e.currentTarget).trigger(e.type, {'send': true});
                window.location=originalUrl;
              }
            }
          );
        });
    })
  </script>
@endsection
