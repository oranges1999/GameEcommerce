@extends('admin.home')

@section('content')
{{-- @dd($categories->all()) --}}
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Orders</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Orders</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>      
            <th scope="col">Customer Name</th>      
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Payment method</th>
            <th scope="col">Total</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $key => $order)
            <tr>
                <td scope="row">{{++$key}}</td>
                <td>{{$order->client->name}}</td>
                <td>{{$order->client->address}}</td>
                <td>{{$order->client->phone}}</td>
                <td>{{$order->status==0?"Chưa thanh toán":"Đã thanh toán"}}</td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->updated_at}}</td>
                <td>
                    <a href="{{route("admin.orders.show",$order->id)}}"><button class="btn btn-primary">Details</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
  {!! $orders->links() !!}
</div>

@endsection