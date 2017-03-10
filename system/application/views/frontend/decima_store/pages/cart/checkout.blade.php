@extends('frontend.decima_store.layouts.default')
@section('content')

<?php 
$cart_order = decode_serialize(Cookie::get('cart')); 
$email = isset($customer->customer_email) ? $customer->customer_email : '';
$fullname = isset($customer->customer_fullname) ? $customer->customer_fullname : '';
$phone = isset($customer->customer_phone) ? $customer->customer_phone : '';
$address = isset($customer->customer_address) ? $customer->customer_address : '';
$gender = isset($customer->customer_gender) ? $customer->customer_gender : '';
$province = isset($customer->customer_province) ? $customer->customer_province : '';
$district = isset($customer->customer_district) ? $customer->customer_district : '';
?>

    <div class="full-width section-emphasis-1 page-header">
        <div class="container">
            <header class="row">
                <div class="col-md-12">
                    <h1 class="strong-header pull-left">
                        Checkout
                    </h1>
                    <!-- BREADCRUMBS -->
                    <ul class="breadcrumbs list-inline pull-right">
                        <li><a href="{{url('/')}}">Home</a></li><!--
                        --><li><a href="{{url('collections')}}">Shop</a></li><!--
                        --><li>Checkout</li>
                    </ul>
                    <!-- !BREADCRUMBS -->
                </div>
            </header>
        </div>
    </div><!-- !full-width -->
    <div class="container">
        <!-- !FULL WIDTH -->
        <!-- !SECTION EMPHASIS 1 -->

        <div class="row">
            <div class="col-md-7">
                <!-- ALERT BOX INFO -->
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <a href="{{url('customer/login')}}">Login</a> or <a href="{{url('customer/register')}}">create an account</a> for faster checkout
                </div>
                <!-- !ALERT BOX INFO -->
            </div>
            <div class="clearfix space-30"></div>
            <div class="col-sm-5 col-sm-push-7 space-left-30">
                <section class="order-summary element-emphasis-weak">
                    <h3 class="strong-header element-header pull-left">
                        Order summary
                    </h3>
                    <a href="{{url('cart')}}" class="pull-right">
                        Edit cart
                    </a>
                    <div class="clearfix"></div>
                    
                    @if($cart_order)
                    <?php 
                           $total = 0; 
                           $variants = [];  
                           $total_temp = 0;
                    ?>
                        @foreach($cart_order as $cart)
                        <?php 
                            $title = $cart['product_title'];
                            $total_price = $cart['price'] * $cart['quantity'];
                            $total_temp += $total_price;
                            $arr = [
                                'variant_id'    => $cart['variant_id'], 
                                'quantity'      => $cart['quantity'],
                            ];
                            array_push($variants,$arr);
                         ?>
                         <div class="shop-summary-item">
                              <img src="{{set_image_size(get_image_url($cart['variant_image']),'thumb')}}"  alt="{{ $title }}" style="width: 70px; height: 89px">
                              <header class="item-info-name-features-price">
                                  <h4><a href="{{url('collections/'.$cart['product_slug'])}}">{{ $title }}</a></h4>
                                  <span class="features">{{ $cart['variant_meta']}}</span><br>
                                  <span class="quantity">{{ $cart['quantity'] }}</span><b>&times;</b><span class="price">{{ number_format($total_price, 0, ',', '.') }} ₫</span>
                              </header>
                          </div>
                        @endforeach
                    @endif    

                    <?php 
                      $cart_meta = promotionOrder($variants);
                   ?>
                    <!-- !SHOP SUMMARY ITEM -->
                    <dl class="order-summary-price">
                        <dt>Tạm tính</dt>
                        <dd><strong>{{ number_format($total_temp, 0, ',', '.') }}₫</strong></dd>
                        <dt>  
                            <input bind="code" name="code" id="code" type="text" class="form-control" placeholder="Nhập mã giảm giá">
                            <span class="input-group-btn">
                        </dt>
                        <dd> <button bind-event-click="caculateShippingFee()" onclick="change_code()" class="btn btn-code" type="button">Áp dụng</button>
                            </span></dd>
                        <dt>{{ $cart_meta['title'] }}</dt>
                        <dd>@if($cart_meta['title'])- {{ number_format($cart_meta['discount_price'], 0, ',', '.') }}₫ @endif</dd>
                        <dt class="total-price">Tổng cộng</dt>
                        <dd class="total-price total-number"><strong>{{ number_format($cart_meta['total'], 0, ',', '.') }}₫</strong></dd>
                    </dl>
                </section>
            </div>
            <div class="clearfix visible-xs space-30"></div>
            <div class="col-sm-7 col-sm-pull-5">
                <section class="checkout checkout-step-1 checkout-step-current element-emphasis-strong clearfix">
                    <h2 class="strong-header element-header">
                        1. Billing address
                    </h2>
                    @if( count($errors) > 0 )   
                    <div class="alert alert-danger">
                        <ul>
                            @foreach( $errors->all() as $error )
                            <li><strong>{{ $error }}</strong></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form role="form" action="{{ url('cart/checkout') }}" method="post" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="code_discount" id="code_discount" value="" />
                        
                         <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email',$email) }}">
                        </div>

                        <div class="row">
                              <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="first-name">Họ tên</label>
                                    <input type="text" class="form-control" id="first-name" name="fullname" value="{{ old('fullname',$fullname) }}">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="first-name">Giới tính</label>
                                    <select name="gender" class="form-control form-gender">
                                        <option value="choise">— Chọn giới tính —</option>
                                        <option value="1" @if($gender == '1' )selected="selected"@endif >Nam</option>
                                        <option value="2" @if($gender == '2' )selected="selected"@endif >Nữ</option>
                                        <option value="3" @if($gender == '3' )selected="selected"@endif >Khác</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                         <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone',$phone) }}">
                        </div>

                        <div class="form-group">
                            <label for="street-address">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" placeholder="Địa chỉ" name="address" value="{{ old('address',$address) }}">
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="first-name">Tỉnh/Thành Phố</label>
                                    <select id="provinces" name="province" class="form-control">
                                        <option value="">— Chọn Tỉnh/Thành Phố —</option>
                                        @foreach( $provincesList as $provinceList )
                                        <option value="{{ $provinceList->province_id }}" @if( $province == $provinceList->province_id )selected="selected"@endif >{{ $provinceList->province_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="first-name">Quận Huyện</label>
                                    <select id="districts" name="district" class="form-control">
                                        <option value="">— Chọn Quận/Huyện —</option>
                                        @foreach( $districtsList as $districtList )
                                        <option  value="{{ $districtList->district_id }}" @if( $district == $districtList->district_id )selected="selected"@endif >{{ $districtList->district_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <textarea name="note" value="" class="form-control" placeholder="Ghi chú"></textarea>
                        </div>

                       
                       
                        <button type="submit" class="btn btn-primary pull-right">Thanh toán</button>
                        <div class="clearfix"></div>
                    </form>
                </section>
            </div>
        </div>

    </div>
</section>


<script>
    function change_code(){
        var code = '';
        code = $('#code').val();
        if(code==''){
            code = '0';
        }
        $.ajax({
            method: 'get',
            url: '/cart/get_discount_code/'+code,
            success: function(data){
                value = data;
                $('.discount-title').html(value['title']);
                $('.discount-price').html(' <span class="pull-right"> - '+value['discount_price']+ 'đ'+'</span>');
                $('.total-number').html(value['total']+'đ');
                $('#code_discount').val(code);
            }
        });
    }

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