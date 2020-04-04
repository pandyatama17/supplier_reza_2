@extends('admin.layout.head')
@section('content')
  <style media="screen">
  #preview
  {
    display: block;
    max-width:500px;
    max-height:500px;
    width: auto;
    height: auto;
  }
  </style>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form" action="{{action('AdminController@storeGallery')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-6">
              <div class="form-group col-md-12">
                <label>Image File</label>
                <input type="file" accept="image/jpg"name="file" id="file" onchange="readURL(this)" class="form-control" placeholder="Foto ">
              </div>
              <div class="form-group col-md-12">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group col-md-12">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>Date Taken</label>
                <input type="text" name="date" class="form-control datepicker">
              </div>
              <div class="form-group col-md-12">
                <label>Category</label>
                <select class="form-control select2" name="category">
                  <option selected disabled>Select a Category..</option>
                  @foreach ($categories as $c)
                    <option value="{{$c->category}}">{{$c->category}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-12">
                <label>Photographer</label>
                <input type="text" name="photographer" class="form-control">
              </div>
              <div class="form-group col-md-12">
                <label>Tags</label>
                <input type="text" name="tags" class="form-control">
              </div>
              <div class="col-md-12">
                <input type="submit" value="Submit" class="btn btn-primary pull-right">
              </div>
            </div>
            <div class="col-md-6">
              <img id="preview" src="http://placehold.it/500">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  function readURL(input)
  {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#preview')
                  .attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
      }
  }
  </script>
@endsection
