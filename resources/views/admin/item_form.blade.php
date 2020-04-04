@extends('admin.layout.head')
@section('content')
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$pagin['title']}}</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" action="
        @if ($pagin['title'] == 'Edit Item')
          {{action('AdminController@updateItem')}}
        @else
          {{action('AdminController@storeItem')}}
        @endif
      ">
        {{ csrf_field() }}
        @if ($pagin['title'] == 'Edit Item')
          <input type="hidden" name="id" value="{{$item->id}}">
        @endif
        <div class="box-body">
          <div class="form-group">
            <label for="nameInput">Name</label>
            <input name="name" type="text" class="form-control" id="nameInput" placeholder="Item Name"
            @if ($pagin['title'] == 'Edit Item')
              value = {{$item->name}}
            @endif>
          </div>
          <div class="form-group">
            <label for="priceInput">Price</label>
            <input name="price" type="number" class="form-control" id="priceInput" placeholder="Price"
            @if ($pagin['title'] == 'Edit Item')
              value = {{$item->price}}
            @endif>
          </div>
          <div class="form-group">
            <label for="categoryInput">Category</label>
            <select name="type" type="number" class="form-control select2" id="categoryInput" placeholder="Category">
              <option value="" selected disabled>Category</option>
              @foreach ($categories as $c)
                <option value="{{$c->name}}">{{$c->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" rows="8" cols="65">
            @if ($pagin['title'] == 'Edit Item')
              {{$item->description}}
            @endif</textarea>
          </div>
          {{-- <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile">

            <p class="help-block">Example block-level help text here.</p>
          </div> --}}
          {{-- <div class="checkbox">
            <label>
              <input type="checkbox"> Check me out
            </label>
          </div> --}}
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function()
    {
      $('.select2').select2(
    })
  </script>
  <!-- /.box -->
@endsection
