@extends('admin.home')

@section('content')
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

<form action="{{ route("admin.products.update",$product->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->product_name}}" name="product_name">
  </div>
  <div class="form-group">
      <label for="category_id">Category</label>
      <select id="category_id" class="form-control" name="category_id">
      @foreach($categories as $key => $value)
        <option value="{{$value->id}}">{{$value->category_name}}</option>
      @endforeach
      </select> 
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Qty</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->qty}}" name="qty">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->price}}" name="price">
  </div>
  <div class="form-group">
    <label for="Status" >Status</label>
    <select id="Status" class="form-control" name="status">
      <option value="0"{{$product->status==0?"selected":""}}>Hidden</option>
      <option value="1"{{$product->status==1?"selected":""}}>Show</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password" name="product_img_url">
  </div>
  <div>
    <label for="content">Content</label>
    <textarea name="content" id="content" required>
      {{$product->content}}
    </textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection