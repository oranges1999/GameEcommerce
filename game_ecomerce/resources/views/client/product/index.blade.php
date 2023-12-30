@extends('client.frame')
@section('content')
<div class="container d-flex">
    <div class="col-md-4">
        <img width="100%" src="{{asset(str_replace("public","storage",$product->product_img_url))}}" alt="">
    </div>
    <div class="col-md-8 text-light">
        <h1> {{$product->product_name}}</h1>
        <h4> {{number_format($product->price)}}VND</h4>
        <h4>
            <form action="{{route("client.cart.store")}}" method="POST">
                @csrf
                <input type="text" name="id" value="{{$product->id}}" hidden> 
                <button type="submit">Add to cart</button>
            </form>
        </h4>
    </div>
</div>

@endsection