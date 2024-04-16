@extends('client.frame')
@section('content')
<div class="container d-flex">
    <div class="col-md-4">
        <img width="100%" src="{{asset(str_replace("public","storage",$product->product_img_url))}}" alt="">
    </div>
    <div class="col-md-8 text-light">
        <h1> {{$product->product_name}}</h1>
        <div class="rate">
            @php
                $score=round($product->comment->where("status","1")->avg("score"));
            @endphp
            @if($score==5)
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            @endif
            @if($score==4)
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-regular fa-star"></i>
            @endif
            @if($score==3)
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            @endif
            @if($score==2)
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            @endif
            @if($score==1)
            <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            @endif                                   
        </div>
        <h4> {{number_format($product->price)}}VND</h4>
        @php
            $totalOrder=0;
            $totalLogistic=0;
            foreach ($product->logistic as $logistic) {
                $totalLogistic += $logistic->pivot->qty;
            }
            foreach ($product->order as $order) {
                $totalOrder += $order->pivot->qty;
            }
        @endphp
        @if($totalLogistic-$totalOrder > 0)
        <h4>
            <form action="{{route("client.cart.store")}}" method="POST">
                @csrf
                <input type="text" name="id" value="{{$product->id}}" hidden> 
                <button type="submit">Add to cart</button>
            </form>
        </h4>
        @else
        <h4 style="color:red">Out Of Stock</h4>
        @endif
    </div>
</div>
<div class="container">
    <div>
        <h4 style="color:white">Content</h4>
    </div>
    <div class="content text-light text-wrap">
        {!!$product->content!!}
    </div>
</div>
@if(Auth::check())
<div class="container">
    <form action="{{route("client.comment.store")}}" method="POST">
        @csrf
        <div style="color:white">Rate</div>
        <div class="rating">
            <label>
                <input type="radio" name="score" value="1" />
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
            </label>
            <label>
                <input type="radio" name="score" value="2" />
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>

            </label>
            <label>
                <input type="radio" name="score" value="3" />
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
   
            </label>
            <label>
                <input type="radio" name="score" value="4" />
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>

            </label>
            <label>
                <input type="radio" name="score" value="5" />
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                <span class="icon"><i class="fa-sharp fa-solid fa-star"></i></span>

            </label>
        </div>
        <br>
        <input type="text" name="product_id" value="{{$product->id}}" hidden>
        <label for="comment" style="color:white">Comment</label>
        <textarea class="comment"  name="comment" id="comment">
        </textarea>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</div>
@endif
<div class="container" style="background-color:white">
    <div>
        <h4>Review</h4>
    </div>
    @foreach($product->comment as $comment)
        @if(!($comment->status==0))
        <div class="d-flex">
            <div class="col-md-2">
                <div>
                    <img style="width:75px" src="{{$comment->client->avatar}}" alt="">
                </div>
                <div>
                    {{$comment->client->name}}
                </div>
            </div>
            <div class="col-md-10">
                <div>
                    {!!$comment->comment!!}
                </div>
                <div>
                    Rated: 
                    @if($comment->score==5)
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    @endif
                    @if($comment->score==4)
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-regular fa-star"></i>
                    @endif
                    @if($comment->score==3)
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    @endif
                    @if($comment->score==2)
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    @endif
                    @if($comment->score==1)
                    <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    @endif
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>

@endsection