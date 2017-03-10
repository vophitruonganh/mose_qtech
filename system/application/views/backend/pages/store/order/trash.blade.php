@extends('backend.layouts.default')
@section('titlePage','Cập nhật đơn hàng')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Hủy đơn hàng',
        'heading_text' => 'Hủy đơn hàng',
    );
    $setion_heading = section_title($heading);
    
?>
    <form action="{{ url('admin/order/trash/'.$order->order_code) }}" method="post">
    @include('backend.includes.token')
        <div>
            <label>Lý do bạn hủy đơn hàng này?</label>
            <select name="CancelReasonOrder">
                <option value="1">Khách hàng đổi ý</option>
                <option value="2">Đơn hàng giả mạo</option>
                <option value="3">Hết hàng</option>
                <option value="4">Khác</option>
            </select>
        </div>
        <div>
            <label>Ghi chú</label>
            <textarea name="CancelNote"></textarea>
        </div>
        <div>
            <input type="submit" value="Hủy đơn hàng">
        </div>
    </form>
    @stop