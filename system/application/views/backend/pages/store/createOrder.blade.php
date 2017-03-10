@extends('backend.layouts.default')
@section('titlePage','Thêm mới đơn hàng')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Danh sách đơn hàng',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <form action="{{ url('admin/order/saveOrder') }}" method="post">
        @include('backend.includes.token')
        @foreach($array_product as $product)
        <div class="row">
            <select name="variant_id[]">
                @foreach($product['product_variant'] as $variant)
                <option value="{{$variant['variant_id']}}">{{$product['product_name']}}:{{$variant['variant_title']}} - Giá : {{$variant['price_new']}}đ</option>
                @endforeach
            </select>
            <input type="text" name="product_id[]" value="{{$product['product_id']}}">
            <input type="text" name="variant_number[]">
        </div>
        @endforeach
        <div class="row">
            <label>Order Content</label>
            <textarea name="order_content"></textarea>
            <select name="order_status">
                <option value="0">Đơn hàng nháp</option>
                <option value="1">Chưa thanh toán</option>
                <option value="2">Đã thanh toán</option>
            </select>
        </div>
        <div class="row">
            <span>Thông tin khách hàng</span><br>
            <label>Customer id</label>
            <input type="text" name="customer_id" value="16">
            <label>Email</label>
            <input type="text" name="email" value="theanh_ks@giaodien10.com">
            <label>Full name</label>
            <input type="text" name="fullname" value="thế anh">
            <label>Phone</label>
            <input type="text" name="phone" value="01234567890">
            <label>Address</label>
            <input type="text" name="address" value="To Hien Thanh p13">
            <label>Province</label>
            <input type="text" name="province" value="79">
            <label>District</label>
            <input type="text" name="district" value="566">
        </div>
        <div class="row">
            <input type="submit" value="ok">
        </div>
    </form>
    @stop