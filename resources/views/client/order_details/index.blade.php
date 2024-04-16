@extends('client.frame')
@section('content')
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $key=>$value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->client->name}}</td>
                <td>{{$value->client->address}}</td>
                <td>{{$value->status==0?"Chưa thanh toán":"Đã thanh toán"}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->payment_method}}</td>
                <td>
                    <a href="{{route("client.orderdetails.show",$value->id)}}"><button class="btn btn-primary">Details</button></a>
                    {{-- <button>Pay</button> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {!! $order->links() !!}
</div>

@endsection