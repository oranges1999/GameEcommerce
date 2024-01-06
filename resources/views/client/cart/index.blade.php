@extends('client.frame')
@section('content')
@if(session("cart"))
<div class="d-flex justify-content-center">
        <table style="background-color: white" border="1">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Qty</th>
                    <th>Action</th>
                </th>
            </thead>
            <tbody>
                @php $total=0 @endphp
                @foreach(session("cart") as $key => $value)
                @php $total += $value['buyQty']*$value['price'] @endphp
                <tr>
                    <td>
                        <img width="300px" src="{{asset(str_replace("public","storage",$value['product_img']))}}" alt="">
                    </td>
                    <td>{{$value['product_name']}}</td>
                    <td>{{number_format($value['price'])}}VND</td>
                    <td>
                        <input type="number" name="{{$key}}" value="{{ $value['buyQty'] }}" class="form-control buyQty update-cart" min="1" oninput="validity.valid||(value='');"/>
                    </td>
                    <td>
                        <form action="{{route("client.cart.destroy",$key)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td colspan="2"><strong>{{number_format($total)}}VND</td>
                    </tr>
                </tfoot>
                    
            </tbody>
        </table>
</div>
<div class="d-flex justify-content-center">
    <div>
        <a href="{{route("client.homepage.index")}}"><button class="btn btn-warning"><i class="fa-solid fa-arrow-left"></i> Continue Shopping</button></a>
    </div>
    <div>
        <a href="{{route("client.order.index")}}"><button class="btn btn-success"><i class="fa-solid fa-arrow-right"></i> Check out</button></a>
    </div>
</div>
@else
<div>Empty</div>
@endif
@endsection