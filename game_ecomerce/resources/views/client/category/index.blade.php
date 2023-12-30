@extends('client.frame')
@section('content')
<div class="container d-flex">
    <div class="col-md-2">
        <ul>
            @foreach($categories as $value)
                <li style="color:white"><a href="{{route("client.category.show",$value->id)}}">{{$value->category_name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-10 d-flex flex-wrap">
        @foreach($category->products as $product)
        <div class="feature-item fi col-6 col-md-3 col-sm-6">
            <a href="{{route("client.product.show",$product->id)}}">
                <div class="">
                    <img class="" width="100%" src="{{asset(str_replace("public","storage",$product->product_img_url))}}" alt="">
                </div>
                <div>
                    <div class="feature-name">
                        {{$product->product_name}}
                    </div>
                    <div class="rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star unchecked"></span>
                    </div>
                    <div class="feature-price d-flex justify-content-start">
                        <div class="price-after">{{number_format($product->price)}}VND</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection