{{-- @dd($products, $comments, $orders) --}}
@extends('admin.home')

@section('content')
<div class="container d-flex">
    <div class=" col-md-4">
        <a class="bg-warning common-home-admin d-flex justify-content-center align-items-center" href="{{route("admin.logistic.index")}}">
            <div class="product-status ">
                @php
                    $count=0;
                    $dataProducts=[];
                @endphp
                @foreach($products as $product)
                    @php
                        $totalOrder=0;
                        $totalLogistic=0;
                        foreach ($product->logistic as $logistic) {
                            $totalLogistic += $logistic->pivot->qty;
                        }
                        foreach ($product->order as $order) {
                            $totalOrder += $order->pivot->qty;
                        }
                        if($totalLogistic-$totalOrder<10){
                            ++$count;
                            $dataProducts[$product->product_name]=$totalLogistic-$totalOrder;
                        }
                    @endphp
                @endforeach
                <div class="text-center font-weight-bold">
                    {{$count}}
                </div>
                <div class="text-center font-weight-bold">
                    Low on stock
                </div> 
            </div>
        </a>
        @if(!empty($dataProducts))
            <table class="table common-home-admin">
                <thead>
                    <th scope="col">Product Name</th>
                    <th scope="col">Qty</th>
                </thead>
            @foreach($dataProducts as $key => $value)
                <tbody>
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$value}}</td>
                    </tr>
                </tbody>
            @endforeach
            </table>
        @endif
    </div>
    <div class="col-md-4">
        <a class="bg-success common-home-admin d-flex justify-content-center align-items-center" href="{{route("admin.comments.index")}}">
            <div class="">       
                @php
                    $comment=count($comments);
                @endphp
                <div class="text-center font-weight-bold">
                    {{$comment}}
                </div>
                <div class="text-center font-weight-bold">
                    New comment
                </div>
            </div>
        </a>
        @if($comment>0)
        <table class="table common-home-admin">
            <thead>
                <th scope="col">Customers</th>
                <th scope="col">Product Review</th>
                <th scope="col">Score</th>
            </thead>
        @foreach($comments as $comment)
            <tbody>
                <tr>
                    <td>{{$comment->client->name}}</td>
                    <td>{{$comment->product->product_name}}</td>
                    <td>{{$comment->score}}</td>
                </tr>
            </tbody>
        @endforeach
        </table>
        @endif
    </div>
    <div class="col-md-4">
        <a class="bg-primary common-home-admin d-flex justify-content-center align-items-center" href="{{route("admin.orders.index")}}">
            <div class="">
                @php
                    $order=count($orders);
                @endphp
                <div class="text-center font-weight-bold">
                    {{$order}}
                </div>
                <div class="text-center font-weight-bold">
                    New order
                </div>
            </div>
        </a>
        @if($order>0)
        <table class="table common-home-admin">
            <thead>
                <th scope="col">Customers</th>
                <th scope="col">Payment</th>
                <th scope="col">Total</th>
            </thead>
        @foreach($orders as $order)
            <tbody>
                <tr>
                    <td>{{$order->client->name}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>{{$order->total}}</td>
                </tr>
            </tbody>
        @endforeach
        </table>
        @endif
    </div>
</div>
@endsection