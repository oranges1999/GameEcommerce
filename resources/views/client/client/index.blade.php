@extends('client.frame')
@section('content')
<form action="{{route("client.client.update",$user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container d-flex">
        <div class="col-md-4 align-items-center">
            <img width="200px" src="{{asset(str_replace("public","storage",$user->avatar))}}" alt="">
            <input type="file" name="avatar">
        </div>
        <div class="col-md-8 d-flex justify-content-center">
            <table border="1" style="background-color:white">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="{{$user->name}}" required></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value="{{$user->phone}}" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="{{$user->email}}" required></td>
                </tr>
                <tr>
                    <td>Citys/Provinces</td>
                    <td>
                        <select class="js-example-basic-single" name="city" id="city">
                            <option>Select a city</option>
                            @foreach($cities as $city)
                                <option data-id="{{$city["code"]}}" value="{{$city["name"]}}" {{$user->city==$city["name"]?"selected":""}}>{{$city["name"]}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>District</td>
                    <td>
                        <select class="js-example-basic-single" name="district" id="district">
                            <option value="{{$user->district}}">{{$user->district}}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ward</td>
                    <td>
                        <select class="js-example-basic-single" name="ward" id="ward">
                            <option value="{{$user->ward}}">{{$user->ward}}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" value="{{$user->address}}" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button class="btn btn-primary" type="submit">Change Infomation</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
@endsection