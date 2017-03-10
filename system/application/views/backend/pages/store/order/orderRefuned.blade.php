@extends('backend.layouts.default')
@section('titlePage','Chi tiết đơn hàng')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Hoàn trả thanh toán',
        'heading_text' => 'Hoàn trả thanh toán',
    );
    
?>
    <form action="" method="post">
    @include('backend.includes.token')
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Đặt mua</th>
                    <th>Đã nhập trả</th>
                    <th>Nhập trả</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product_temp as $product)
                <?php 
                    $quantity_buy = $product->quantity_buy;
                    $quantity_refuned = $product->quantity_refuned;
                    $price = number_format($product->price, 0, ',', '.');
                    
                    
                 ?>
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$price}} đ</td>
                    <td>{{$quantity_buy}}</td>
                    <td>{{$quantity_refuned}}</td>
                    <td><input type="number" name="refund-quantity[{{$product->product_temp_id}}]"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <input type="submit" value="Hoàn trả">
    </form>
    Tổng số tiền có thể hoàn trả: {{number_format($order->amount_refuned, 0, ',', '.')}} đ
@stop