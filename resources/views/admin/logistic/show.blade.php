
@extends('admin.home')

@section('content')
{{-- @dd($admin->all()) --}}
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Logistics</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Logistics</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div>
  <a class="btn btn-danger" href="{{route("admin.logistic.index")}}">Back</a>
  <a href="{{route("admin.logistic.edit",$logistic->id)}}"><button type="button" class="btn btn-warning">Edit</button></a>
</div>
<div>
    <div class="d-flex">
        <h5>Creator:</h5>
        <h5><strong> {{$logistic->admin->name}}</strong></h5>
    </div>
    <div class="d-flex">
        <h5>Note: </h5>
        <h5><strong> {{$logistic->note}}</strong></h5>
    </div>
    <div class="d-flex">
        <h5>Created At: </h5>
        <h5><strong> {{$logistic->created_at}}</strong></h5>
    </div>
    <div class="d-flex">
        <h5>Updated At: </h5>
        <h5><strong> {{$logistic->updated_at}}</strong></h5>
    </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>          
      <th scope="col">Product image</th>
      <th scope="col">Product name</th>
      <th scope="col">Qty</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
    </tr>
  </thead>
  <tbody>
    @foreach($logistic->products as $key=>$product)
      <tr>
        <td scope="row">{{++$key}}</td>
        <td><img width="100px" src="{{asset(str_replace("public","storage",$product->product_img_url))}}" alt=""></td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->pivot->qty}}</td>
        <td>{{$product->pivot->created_at}}</td>
        <td>{{$product->pivot->updated_at}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection