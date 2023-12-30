@extends('client.frame')
@section('content')
{{-- @dd($result) --}}
<div class="result-window container d-flex justify-content-center">
    @if($_GET["vnp_ResponseCode"]=="00")
    <div class="success text-align-center">
        <h1 style="color: white">Thanh toán thành công</h1>
        <h2 style="color: white">Đơn hàng được đặt thành công</h2>
        <p style="color: white">Kiểm tra đơn hàng <a href="{{route("client.orderdetails.show",$_GET["vnp_TxnRef"])}}">tại đây</a></p>
    </div>
    @else
    <div class="success text-align-center">
        <h1 style="color: white">Thanh toán thất bại</h1>
        <h2 style="color: white">Đã xảy ra lỗi khi thanh toán</h2>
        <p style="color: white">Bạn có thể thanh toán lại đơn hàng tại đây <a href="{{route("client.orderdetails.show",$_GET["vnp_TxnRef"])}}">tại đây</a></p>
    </div>
    @endif
</div>

@endsection