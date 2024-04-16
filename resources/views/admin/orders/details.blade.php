@extends('admin.home')

@section('content')
{{-- @dd($categories->all()) --}}
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
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
  <div class="container d-flex justify-content-center">
    <table style="background-color:white" border="1">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Status</th>
                <th>Placed At</th>
                <th>Payment Method</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$orderDetails->id}}</td>
                <td>{{$orderDetails->client->name}}</td>
                <td>{{$orderDetails->client->address}}</td>
                <td>{{$orderDetails->status==0?"Chưa thanh toán":"Đã thanh toán"}}</td>
                <td>{{$orderDetails->created_at}}</td>
                <td>{{$orderDetails->payment_method}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="container d-flex justify-content-center">
    <table style="background-color:white" border="1">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Buy Qty</th>
                <th>Current Price</th>
                <th>Total</th>
            </tr>
        </thead>
        @php $total=0 @endphp
        <tbody>
            {{-- @dd($orderDetails->product) --}}
            @foreach($orderDetails->product as $key => $orderDetail)
            @php $total+=$orderDetail->pivot->qty*$orderDetail->pivot->price @endphp
            <tr>
                <td><img width="100px" src="{{asset(str_replace("public","storage",$orderDetail->product_img_url))}}" alt=""></td>
                <td>{{$orderDetail->product_name}}</td>
                <td>{{$orderDetail->pivot->qty}}</td>
                <td>{{number_format($orderDetail->pivot->price)}}</td>
                <td>{{$orderDetail->pivot->qty*$orderDetail->pivot->price}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td colspan="2">{{number_format($total)}}</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection