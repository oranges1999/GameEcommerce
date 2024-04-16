@extends('admin.home')

@section('content')
{{-- Có thể dùng {{(name đã đặt ở file web), {{$category->id}}}} Thay cho đường link phía dưới --}}
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Categories</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Categories</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<form action="{{ route("admin.categories.update",$category->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->category_name}}" name="category_name">
  </div>
  <div class="form-group">
    <label for="selection" >Status</label>
    <select id="selection" class="form-control" aria-label="Default select example" name="status">
      <option value="0"{{$category->status==0?"selected":""}}>Hidden</option>
      <option value="1"{{$category->status==1?"selected":""}}>Show</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Avatar</label>
    <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password" name="image_url">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection