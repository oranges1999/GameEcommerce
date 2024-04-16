@extends('admin.home')

@section('content')
{{-- @dd($categories) --}}
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Products</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<form action="{{ route("admin.products.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="product_name">
    </div>
    <div class="form-group">
        <label for="selection">Category</label>
        <select id="selection" class="form-control" aria-label="Default select example" name="category_id">
        @foreach($categories as $key => $value)
          <option value="{{$value->id}}">{{$value->category_name}}</option>
        @endforeach
        </select> 
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Price</label>
      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price" name="price">
    </div>
    <div class="form-group">
      <label for="selection" >Status</label>
      <select id="selection" class="form-control" aria-label="Default select example" name="status">
        <option value="0">Hidden</option>
        <option value="1">Show</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Image</label>
      <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password" name="product_img_url">
    </div>
    <div>
      <label for="content">Content</label>
      <textarea name="content" id="content" required>
      </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection