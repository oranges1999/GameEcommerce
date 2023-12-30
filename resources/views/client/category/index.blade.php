@extends('client.frame')
@section('content')
<div class="container d-flex">
    <div class="col-md-2">
        <div>
            <h4 style="color:white">Category</h4>
        </div>
        <ul>
            @foreach($categories as $value)
                <li style="color:white"><a href="{{route("client.category.show",$value->id)}}">{{$value->category_name}}</a></li>
            @endforeach
        </ul>

    </div>
    <div>
        <div>
            <h3 style="color:white">{{$category->category_name}}</h3>
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
                        <div class="rate">
                            @if(round($product->comment->where("status","1")->avg("score"))==5)
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            @endif
                            @if(round($product->comment->where("status","1")->avg("score"))==4)
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-regular fa-star"></i>
                            @endif
                            @if(round($product->comment->where("status","1")->avg("score"))==3)
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            @endif
                            @if(round($product->comment->where("status","1")->avg("score"))==2)
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            @endif
                            @if(round($product->comment->where("status","1")->avg("score"))==1)
                            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            @endif                                   
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
    
</div>
@endsection