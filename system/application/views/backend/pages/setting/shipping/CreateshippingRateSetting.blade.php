@extends('backend.layouts.default')
@section('titlePage','Thêm phí vận chuyển')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Thêm phí vận chuyển'
    );
    $setion_heading = section_title($heading);
?>
<div>
    {{$shipping->name}}
    <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
    <form id="order-form" action="{{ url('admin/setting/shipping-rate/create') }}" method="post">
        @include('backend.includes.token')
        <div>
            <?php /*
            <select name="shipping">
            @foreach($list_shipping as $shipping)
                <option value="{{$shipping->shipping_id}}">{{$shipping->name}}</option>
            @endforeach*/
            ?>
            </select>
            <input type="hidden" name="shipping" value="{{$shipping->shipping_id}}">
            <label>Tên tỷ lệ vận chuyển</label>
            <input type="text" name="rate_name">
        </div>
        <div>
            <label>Tiêu chuẩn tính phí</label>
            <select name="shipping_criteria">
                <option value="price">Dựa trên giá sản phẩm</option>
                <option value="weight">Dựa trên khối lượng sản phẩm</option>
            </select>
        </div>
        <div>
            <label>Đơn hàng khoảng</label>
            <input type="text" name="range_from">------<input type="text" name="range_to">
        </div>
        <div>
            <label>Giá vận chuyển</label>
            <input type="text" name="shipping_price">
        </div>
        <div>
            <input type="submit" name="ok" value="Lưu">
        </div>
    </form>
</div>
@stop