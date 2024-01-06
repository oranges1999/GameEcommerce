@extends('client.frame')
@section('content')
<div class="container d-flex justify-content-around">
    <div>
        <table style="background-color: white" border="1">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Qty</th>
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
                    <td>{{$value['price']}}$</td>
                    <td>{{$value['buyQty'] }}</td>
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <td colspan="2">Total</td>
                        <td colspan="2"><strong>{{$total}}VND</td>
                    </tr>
                </tfoot> 
            </tbody>
        </table>
    </div>
    <form action="{{route("client.order.store")}}" method="POST">
        @csrf
        <div>
            <table border="1" style="background-color: white">
                <thead>
                    <th>User Infomation</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{Auth::user()->email}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>
                            <input type="text" name="phone" placeholder="Enter phone number" value="{{Auth::user()->phone}}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>
                            <select class="js-example-basic-single" name="city" id="city">
                                <option>Select a city</option>
                                @foreach($cities as $city)
                                    <option data-id="{{$city["code"]}}" value="{{$city["name"]}}" {{Auth::user()->city==$city["name"]?"selected":""}}>{{$city["name"]}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td>
                            <select class="js-example-basic-single" name="district" id="district">
                                <option value="{{Auth::user()->district}}">{{Auth::user()->district}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ward</td>
                        <td>
                            <select class="js-example-basic-single" name="ward" id="ward">
                                <option value="{{Auth::user()->ward}}">{{Auth::user()->ward}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" placeholder="Enter address" value="{{Auth::user()->address}}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td>
                            <input type="radio" name="payment" value="0">
                            <label>Cash On Delivery</label><br>
                            <input type="radio" name="payment" value="1">
                            <label>VNPay</label><br>  
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <input type="text" name="total" id="" value="{{$total}}" hidden>
                <button class="btn btn-primary" type="submit" name="redirect">Place order</button>
            </div>
        </div>
    </form>
</div>
@endsection