@extends('frontend.giaodien5.layouts.default')
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
      
  <main class="main-content">
   <section id="columns" class="columns-container">
      <div class="container">
         <div class="row">
            <form method="post" action="{{ url('cart/checkout') }}" data-toggle="validator" class="formCheckout">
               <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input type="hidden" name="code_discount" id="code_discount" value="" />
               <div context="checkout" class="container">
                  <div class="main">
                     <div class="wrap clearfix">
                        <div class="row">
                            <div class="col-md-2 hidden-sm"></div>
                            
                           <div class="col-md-4 col-sm-6">
                              <div class="form-group m0">
                                 <h2>
                                    <label class="control-label">Thông tin mua hàng</label>
                                 </h2>
                              </div>
                              <div class="form-group">
                                 <a href="{{ url('customer/register') }}">Đăng ký tài khoản mua hàng</a>
                                 |
                                 <a href="{{ url('customer/login') }}">Đăng nhập </a>
                              </div>
                              @if( count($errors) > 0 )
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach( $errors->all() as $error )
                                        <li><strong>{{ $error }}</strong></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                              <hr class="divider">
                              <!--thông tin mua hang-->   
                              <div class="form-group">
                                 <input type="email" class="form-control" name="email" id="BillingAddress_Email" placeholder="Email" value="{{old('email',$email)}}">
                              </div>
                              <div class="form-group">
                                 <input class="form-control" name="fullname" id="BillingAddress_LastName" placeholder="Họ và tên" value="{{old('fullname',$fullname)}}">
                              </div>
                              <div class="form-group">
                                 <input class="form-control" name="phone" id="BillingAddress_Phone" placeholder="Số điện thoại" value="{{old('phone',$phone)}}">
                              </div>
                              <div class="form-group">
                                 <input name="address" id="BillingAddress_Address1" class="form-control" placeholder="Địa chỉ" value="{{old('address',$address)}}">
                              </div>
                              <div class="form-group">
                                <select name="gender" class="form-control">
                                    <option value="choise">— Chọn giới tính —</option>
                                    <option value="1" @if($gender == '1' )selected="selected"@endif >Nam</option>
                                    <option value="2" @if($gender == '2' )selected="selected"@endif >Nữ</option>
                                    <option value="3" @if($gender == '3' )selected="selected"@endif >Khác</option>
                                </select>
                              </div>
                              <div class="form-group">
                                  <select id="provinces" name="province" class="form-control">
                                      <option value="">— Chọn Tỉnh/Thành Phố —</option>
                                      @foreach( $provincesList as $provinceList )
                                      <option value="{{ $provinceList->province_id }}" @if( $province == $provinceList->province_id )selected="selected"@endif >{{ $provinceList->province_name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <select id="districts" name="district" class="form-control">
                                      <option value="">— Chọn Quận/Huyện —</option>
                                      @foreach( $districtsList as $districtList )
                                      <option  value="{{ $districtList->district_id }}" @if( $district == $districtList->district_id )selected="selected"@endif >{{ $districtList->district_name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <hr class="divider">
                              <div class="form-group">
                                 <textarea name="note" value="" class="form-control" placeholder="Ghi chú">{{old('note')}}</textarea>
                              </div>
                              <!-- end thông tin mua hang-->   
                           </div>
                           
                           <div class="col-md-4 col-sm-6">
                              <div class="order-summary order-summary--custom-background-color ">
                                 <div class="order-summary-header">
                                    <h2>
                                       <label class="control-label">Đơn hàng</label>
                                    </h2>
                                 </div>
                                 <div class="summary-body  summary-section">
                                    <div class="summary-product-list">
                                       <ul class="product-list">
                                       @if($cart_order)
                                          <?php
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
                                              <li class="product product-has-image clearfix">
                                                  <img src="{{set_image_size(get_image_url($cart['variant_image']),'thumb')}}" alt="{{$title}}" class="pull-left product-image">
                                                  <div class="product-info pull-left">
                                                     <span class="product-info-name">
                                                      <strong>{{$title}}</strong> x {{ $cart['quantity'] }}
                                                     </span>
                                                     <span class="product-info-description">
                                                          {{ $cart['variant_meta']}}
                                                     </span>
                                                  </div>
                                                  <strong class="product-price pull-right">
                                                  {{ number_format($total_price, 0, ',', '.') }}₫
                                                  </strong>
                                            </li>  
                                          @endforeach
                                       @endif
                                       </ul>
                                    </div>
                                 </div>
                                 <?php $cart_meta = promotionOrder($variants); ?>
                                 <div class="summary-section">
                                    <div class="form-group m0">
                                        <div class="input-group pull-right discount-code">
                                            <input bind="code" name="code" id="code" type="text" class="form-control" placeholder="Nhập mã giảm giá">
                                            <span class="input-group-btn">
                                            <button bind-event-click="caculateShippingFee()" onclick="change_code()" class="btn btn-primary event-voucher-apply" type="button">Áp dụng</button>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="total-line total-line-subtotal clearfix">
                                       <span class="total-line-name pull-left">
                                       Tạm tính
                                       </span>
                                       <span class="total-line-subprice pull-right">{{ number_format($total_temp, 0, ',', '.') }}₫</span>
                                    </div>
                                    <div class="total-line total-line-shipping clearfix" bind-show="requiresShipping">
                                       <span class="total-line-name pull-left discount-title">
                                       {{ $cart_meta['title'] }}
                                       </span>
                                       <span class="total-line-shipping pull-right discount-price">@if($cart_meta['title'])- {{ number_format($cart_meta['discount_price'], 0, ',', '.') }}₫ @endif</span>
                                    </div>
                                    <div class="total-line total-line-total clearfix">
                                       <span class="total-line-name pull-left">
                                       Tổng cộng
                                       </span>
                                       <span class="total-line-price total-price pull-right">{{ number_format($cart_meta['total'], 0, ',', '.') }}₫</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group clearfix">
                                 <input class="btn btn-primary col-md-12 mt10" type="submit" value="ĐẶT HÀNG">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
          
         </div>
      </div>
   </section>
</main>  
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
                $('#code_discount').val(code);
                $('.total-price').html(value['total']+'đ');
               
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