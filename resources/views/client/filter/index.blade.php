@extends('client.frame')
@section('content')
<div class="container d-flex">
    <div class="col-md-2">
        <div>
            <h4 style="color:white">Category</h4>
        </div>
        <ul>
            @foreach($categories as $category)
            <li id="{{$category->id}}"><a href="#" class="category_filter" data-id="{{$category->id}}">{{$category->category_name}}</a></li>                 
            @endforeach
        </ul>
        <div>
            <h4 style="color:white">Price</h4>
        </div>
        <div>
            <input type="text" type="number" id="min" placeholder="min">
            <input type="text" type="number" id="max" placeholder="max">
            <button id="price_filter" class="btn btn-primary">Filter</button>
        </div>
    </div>
    <div class="col-md-10">
        <div class="d-flex justify-content-between">
            <select name="" id="sort">
                <option data-name="default" value="2">...</option>
                <option data-name="id" value="1">Newest</option>
                <option data-name="price" value="0">Price ascend</option>
                <option data-name="price" value="1">Price descend</option>
            </select>
            <div id="show-btn" class="hide">
                <button id="show-products" class="btn btn-primary">Show all products</button>
            </div>
        </div>
        <div class="col-md-12 d-flex flex-wrap" id="filter_body">
        </div>
    </div>
</div>
@endsection