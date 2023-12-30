@extends('client.frame')
@section('content')
{{-- @dd($orderDetails->product) --}}
<div class="container d-flex justify-content-center">
    <table style="background-color:white" border="1">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Ward</th>
                <th>District</th>
                <th>Cities/Provinces</th>
                <th>Total</th>
                <th>Status</th>
                <th>Placed At</th>
                <th>Payment Method</th>
                @if($orderDetails->payment_method=="COD"||$orderDetails->status==1)
                @else
                <th>Action</th>
                @endif
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$orderDetails->id}}</td>
                <td>{{$orderDetails->client->name}}</td>
                <td>{{$orderDetails->phone}}</td>
                <td>{{$orderDetails->client->address}}</td>
                <td>{{$orderDetails->ward}}</td>
                <td>{{$orderDetails->district}}</td>
                <td>{{$orderDetails->city}}</td>
                <td>{{$orderDetails->total}}</td>
                <td>{{$orderDetails->status==0?"Chưa thanh toán":"Đã thanh toán"}}</td>
                <td>{{$orderDetails->created_at}}</td>
                <td>{{$orderDetails->payment_method}}</td>
                @if($orderDetails->payment_method=="COD"||$orderDetails->status==1)
                @else
                <td>
                    <form action="{{route('client.setupPayment')}}" method="post">
                        @csrf
                        <input type="text" name="id" value="{{$orderDetails->id}}" hidden>
                        <button type="sumbit" name="redirect" class="btn btn-primary">Pay</button>
                    </form>
                </td>
                @endif
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
            @foreach($orderDetails->product as $key => $orderDetail)
            @php $total+=$orderDetail->pivot->qty*$orderDetail->pivot->price @endphp
            <tr>
                <td><img width="100px" src="{{asset(str_replace("public","storage",$orderDetail->product_img_url))}}" alt=""></td>
                <td>{{$orderDetail->product_name}}</td>
                <td>{{$orderDetail->pivot->qty}}</td>
                <td>{{$orderDetail->pivot->price}}</td>
                <td>{{$orderDetail->pivot->qty*$orderDetail->pivot->price}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td colspan="2">{{number_format($total)}} VND</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection