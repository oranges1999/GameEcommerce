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

<a href="{{route("admin.products.create")}}"><button class="btn btn-primary">Create Products</button></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>      
      <th scope="col">Image</th>      
      <th scope="col">Product Name</th>
      <th scope="col">Category</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Created By</th>
      <th scope="col">Status</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th colspan="2" scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $key => $value)
      @php
          $totalOrder=0;
          $totalLogistic=0;
          foreach ($value->logistic as $logistic) {
              $totalLogistic += $logistic->pivot->qty;
          }
          foreach ($value->order as $order) {
              $totalOrder += $order->pivot->qty;
          }
      @endphp
      <tr>
        <td scope="row">{{++$key}}</td>
        <td><img width="100px" src="{{asset(str_replace("public","storage",$value->product_img_url))}}" alt=""></td>
        <td>{{$value->product_name}}</td>
        <td>{{$value->category->category_name}}</td>
        <td>{{$totalLogistic-$totalOrder}}</td>
        <td>{{number_format($value->price)}}</td>
        <td>{{$value->admin->name}}</td>
        <td>{{$value->status}}</td>
        <td>{{$value->created_at}}</td>
        <td>{{$value->updated_at}}</td>
        <td>
          <a href="{{route("admin.products.edit",$value->id)}}"><button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></a>
        </td>
        <td>
          <form action="{{route("admin.products.destroy",$value->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
  {!! $products->links() !!}
</div>
@endsection