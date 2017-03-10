@extends('backend.layouts.default')
@section('titlePage','Cấu hình thanh toán')
@section('content')
<?php
    $heading = array(
        'heading_text' => 'Cấu hình thanh toán'
    );
    $setion_heading = section_title($heading);
?>

<div>
    <span>Tài khoản khách hàng</span>
    <form action="{{ url('admin/setting/checkout/updateCustomerAccount') }}" method="post">
        @include('backend.includes.token')
        <div>
            <div>
                <label>
                    <input type="radio" name="checkoutAccoutType" value=1 style=" position: static; left: -9999px; opacity: 1; filter: alpha(opacity=0); " 
                        {{($option_checkout_setting==1)? 'checked' : ''}}
                    >
                    Vô hiệu hóa chức năng tài khoản
                </label>
                <p style=" color: #9fafba; ">Khách hàng có hể mua hàng không cần tài khoản.</p>
            </div>
            <div>
                <label>
                    <input type="radio" name="checkoutAccoutType" value=2 style=" position: static; left: -9999px; opacity: 1; filter: alpha(opacity=0); " 
                        {{($option_checkout_setting==2)? 'checked' : ''}}
                    >
                    Bắt buộc phải có tài khoản mua hàng
                </label>
                <p style=" color: #9fafba; ">Khách hàng phải đăng ký tài khoản mua hàng trước khi thanh toán.</p>
            </div>
            <div>
                <label>
                    <input type="radio" name="checkoutAccoutType" value=3 style=" position: static; left: -9999px; opacity: 1; filter: alpha(opacity=0); "
                        {{($option_checkout_setting==3)? 'checked' : ''}}
                    >
                    Không ràng buộc về tài khoản mua hàng
                </label>
                <p style=" color: #9fafba; ">Khách hàng có thể tạo tài khoản khi hoàn tất thanh toán.</p>
            </div>
        </div>
        <input type="submit" name="updateCustomerAccount" value="Lưu thay đổi">
    </form>
</div>
@stop