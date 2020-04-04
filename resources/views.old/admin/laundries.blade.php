@extends('layout.head')
@section('title','Laundries')
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
              <table id="laundriesTable" class="table table-striped table-hover table-responsive">
                <thead>
                  <tr>
                    <th>Invoice #</th>
                    @if ($pagin['title'] == "Finished Laundries")
                      <th data-hide="phone,tablet">Date Created</th>
                    @endif
                    <th>Date Received</th>
                    <th>Client Name</th>
                    <th>Client Phone</th>
                    <th>Client Adress</th>
                    <th>Weight Qty.</th>
                    @if ($pagin['title'] == 'Laundries')
                      <th data-hide="phone,tablet">Status</th>
                    @endif
                    @if ($pagin['title'] == "Finished Laundries")
                      <th data-hide="phone,tablet">Date Out</th>
                    @endif
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($laundries as $l)
                    @if ($l->id != 0)
                      <tr>
                        <td>#{{$l->id}}</td>
                        @if ($pagin['title'] == "Finished Laundries")
                          <td>{{ $l->date_created }}</td>
                        @endif
                        <td id="date_col_{{$l->id}}">
                          @if ($l->date_received != "")
                            {{$l->date_received}}
                          @else
                        </td>
                          @endif
                        <td>{{$l->client_name}}</td>
                        <td>{{$l->client_phone}}</td>
                        <td>{{$l->client_address}}</td>
                        <td id="weight_col_{{$l->id}}">
                          @if (!empty($l->weight_qty))
                            {{$l->weight_qty}} kg.
                          @else
                            <form class="form" action="{{action('AdminController@addWeight')}}" method="post" role="form" id="form{{$l->id}}">
                              {{csrf_field()}}
                              <input type="hidden" name="id" value="{{$l->id}}">
                              <div class="input-group input-group-sm">
                                <input type="number" class="form-control" name="weight">
                                <span class="input-group-btn">
                                  <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i></button>
                                </span>
                              </div>
                            </form>
                          @endif
                        </td>
                        @if ($pagin['title'] == 'Laundries')
                          <td id="status_col_{{$l->id}}">
                            @if ($l->status == 'pending')
                              <span class="label label-danger">Pending</span>
                            @elseif ($l->status == 'queued')
                              <span class="label label-info">Queued</span>
                            @elseif ($l->status == 'on_progress')
                              <span class="label label-primary">On Process</span>
                            @else
                              <span class="label label-success">Finished</span>
                            @endif
                          </td>
                        @endif
                        @if ($pagin['title'] == "Finished Laundries")
                          <td>{{$l->date_out}}</td>
                        @endif
                        <td>
                          <a href="/laundry/details/{{$l->id}}" class="text-black"><i class="fa fa-search"></i><span> | Details</span><a>
                          <br>
                          {{-- @if (\App\Assignment::where('delivery_id',$d->id)->pluck('status')->first() == 'sending')
                            <br><a href="/admin/delivery/finish/{{$d->id}}" class="text-info"><i class="fa fa-flag-checkered"></i><span> | Finish Delivery</span><a>
                          @endif --}}
                          <span id="action_col_{{$l->id}}">
                            {{-- @if ($l->status == 'pending')
                              <a href="/admin/laundry/queue/{{$l->id}}" class="text-warning"><i class="fa fa-download"></i><span> | Confirm Retrieve</span></a>
                              <br> --}}
                            @if ($l->status == 'queued')
                              <a href="/admin/laundry/process/{{$l->id}}" class="text-primary process"><i class="fa fa-refresh"></i><span> | Process</span></a>
                              <br>
                            @elseif ($l->status == 'on_progress')
                              <a href="/admin/laundry/finish/{{$l->id}}" class="text-green finish"><i class="fa fa-flag-checkered"></i><span> | Finish</span></a>
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

                          $('#form{{$l->id}}').validate();
                          $('#form{{$l->id}}').ajaxForm(
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
                                  {{--$("#weight_col_{{$l->id}}").html(obj.new_val+" Kg.");
                                  $("#date_col_{{$l->id}}").html(obj.date_received);
                                  $("#status_col_{{$l->id}}").html('<span class="label label-info">Queued</span>');
                                  $("#action_col_{{$l->id}}").html('');
                                  $("#action_col_{{$l->id}}").html('<a href="/admin/laundry/process/{{$l->id}}" class="text-black"><i class="fa fa-refresh"></i><span> | Process</span></a><br>');--}}
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
