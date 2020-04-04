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
      <div class="box
        @if ($pagin['title'] == 'Pending Deliveries')
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
              <table id="rentsTable" class="table table-striped table-hover table-responsive">
                <thead>
                  <tr>
                    <th>Invoice #</th>
                    @if ($pagin['title'] == "Finished Rents")
                      <th data-hide="phone,tablet">Date Created</th>
                    @endif
                    <th>Code</th>
                    <th>Client Name</th>
                    <th>Client Phone</th>
                    <th>Client Adress</th>
                    {{-- <th>Weight Qty.</th> --}}
                    @if ($pagin['title'] == 'Rents')
                      <th data-hide="phone,tablet">Status</th>
                    @endif
                    @if ($pagin['title'] == "Finished Rents")
                      <th data-hide="phone,tablet">Date Out</th>
                    @endif
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rents as $r)
                    @if ($r->id != 0)
                      <tr>
                        <td>#{{$r->id}}</td>
                        @if ($pagin['title'] == "Finished Rents")
                          <td>{{ $r->date_created }}</td>
                        @endif
                        <td id="date_col_{{$r->id}}">{{$r->code}}</td>
                        <td>{{$r->name}}</td>
                        <td>{{$r->phone}}</td>
                        <td>{{$r->address}}</td>
                        <td>
                          @if ($r->confirm == 0)
                            <span class="label label-danger">Pending</span>
                          @else
                            <span class="label label-success">Confirmed</span>
                          @endif
                        </td>
                        <td>
                          <a href="/rental/{{$r->id}}" class="text-black"><i class="fa fa-search"></i><span> | Details</span><a>
                          <br>
                          <span id="action_col_{{$r->id}}">
                            @if ($r->confirm == 0)
                              <a href="/admin/rents/confirm/{{$r->id}}" class="text-primary process"><i class="fa fa-refresh"></i><span> | Confirm</span></a>
                              <br>
                            @endif
                          </span>
                        </td>
                      </tr>
                      <script>
                        $(document).ready(function()
                        {
                          $('.btn-success').click(function(e, params) {
                            var localParams = params || {};

                            if (!localParams.send) {
                              e.preventDefault();
                            }

                            swal({
                                title: $(this).closest("div.input-group").find("input[name='weight']").val()+"Kg",
                                text: "is the correcct weight?",
                                type: "info",
                                showCancelButton: true,
                                confirmButtonColor: "#6A9944",
                                confirmButtonText: "Yes",
                                cancelButtonText: "Cancel",
                                closeOnConfirm: true
                              },
                              function(isConfirm) {
                                if (isConfirm) {
                                  $(e.currentTarget).trigger(e.type, {'send': true});
                                }
                              }
                            );
                          });

                          $('#form{{$r->id}}').validate();
                          $('#form{{$r->id}}').ajaxForm(
                          {
                            url:$(this).attr('action'),
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(data)
                            {
                              console.log(obj);
                              var obj = jQuery.parseJSON(data);
                              if(obj.err == false)
                              {
                                console.log('bisa cuyyy');
                                swal(
                                {
                                  title: "Well Done!",
                                  text: obj.msg,
                                  type: "success",
                                  confirmButtonText: "Ok!",
                                  },function()
                                {
                                  location.reload();
                                  {{--$("#weight_col_{{$r->id}}").html(obj.new_val+" Kg.");
                                  $("#date_col_{{$r->id}}").html(obj.date_received);
                                  $("#status_col_{{$r->id}}").html('<span class="label label-info">Queued</span>');
                                  $("#action_col_{{$r->id}}").html('');
                                  $("#action_col_{{$r->id}}").html('<a href="/admin/laundry/process/{{$r->id}}" class="text-black"><i class="fa fa-refresh"></i><span> | Process</span></a><br>');--}}
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
                                title: "Failed to Create Data!",
                                text: obj.msg,
                                type: "success",
                                confirmButtonText: "Ok!",
                                closeOnConfirm: false
                              });
                            }
                          })
                        });
                      </script>
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
        var rentsTable = $("#rentsTable").DataTable({
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
