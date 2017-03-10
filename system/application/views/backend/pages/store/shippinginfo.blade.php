@extends('backend.layouts.default')
@section('titlePage','Cập nhật địa chỉ')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Cập nhật địa chỉ',
        'heading_text' => 'Cập nhật địa chỉ',
    );
    $setion_heading = section_title($heading);
    $fullname = isset($order_meta['fullname']) ? $order_meta['fullname'] : '';
    $company = isset($order_meta['company']) ? $order_meta['company'] : '';
    $phone = isset($order_meta['phone']) ? $order_meta['phone'] : '';
    $address = isset($order_meta['address']) ? $order_meta['address'] : '';
?>
    <form action="" method="post">
        @include('backend.includes.token')
        <div class="row">
            <div>
                <label>Tên khách hàng</label>
                <input type="text" name="fullname" value="{{$fullname}}">
            </div>
            <div>
                <label>Công ty</label>
                <input type="text" name="company" value="{{$company}}">
            </div>
        </div>
        <div class="row">
            <div>
                <label>Số điện thoại</label>
                <input type="text" name="phone" value="{{$phone}}">
            </div>
            <div>
                <label>Địa chỉ</label>
                <input type="text" name="address" value="{{$address}}">
            </div>
        </div>
        <div class="row">
          <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tỉnh/Thành phố</label>
                    <?php $customer_province = old('province'); ?>
                    <select name="province" id="provinces" class="form-control" data-bind="change: General.GetDistricts">
                        <option value="0">Chọn tỉnh/thành phố</option>
                        @foreach( $provinces as $province )
                        <option @if( $customer_province == $province->province_id ) selected @endif value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Quận/Huyện</label>
                    <?php $customer_district = old('district'); ?>
                    <select name="district" id="districts" class="form-control">
                        <option value="0">Chọn quận/huyện</option>     
                        @foreach( $districts as $district )
                        <option @if( $customer_district == $district->district_id ) selected @endif value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                        @endforeach                
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row">
            <input type="submit" value="ok">
        </div>
    </form>
    <script>

    $(document).on('change','#provinces', function() {
        var id_province = $('#provinces').val();
        $.ajax({
            method: 'get',
            url: '/cart/get_district/'+id_province,
            success: function(data){
                $('#districts').html(data);
            }
        });
    });
</script>
    @stop