@extends('frontend.giaodien6.layouts.default')
@section('content') 
<?php 
   $email = $customer->customer_email;
   $fullname = $customer->customer_fullname;
   $address = $customer->customer_address;
   $phone = $customer->customer_phone;
   $customer_province = $customer->customer_province;
   $customer_district = $customer->customer_district;

?>

<main class="padding-top-mobile">
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li><a href="/account" target="_self">Trang khách hàng</a></li>
                 
               </ol>
            </div>
         </div>
      </div>
   </div>
<div class="faq-area">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-lg-8 col-md-8 col-sm-8">
            <div class="faq-content">
               <h3 class="faq-title">Xin chào, {{!empty($fullname) ? $fullname : $email }}!</h3>
               <div class="faq-desc">
                  <h3>Cập nhật thông tin tài khoản của bạn để hưởng các chính sách của cửa hàng vào chế độ bảo mật tốt nhất</h3>
               </div>
            </div>
            <div class="faq-accordion">
               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  @if($orders)
                    @foreach($orders as $order)
                    <?php
                        $order_code = get_template_order_code( $order->order_code); 
                        $order_meta = decode_serialize($order->om_value);
                        $total = 0;
                     ?>
                    <div class="panel panel-default actives">
                     <div class="panel-heading" role="tab" id="heading{{$order->order_code}}">
                        <h4 class="panel-title">
                           <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$order->order_code}}" aria-expanded="true" aria-controls="collapse{{$order->order_code}}">
                           {{date('d/m/Y', $order->date_create)}} - Mã đơn hàng: {{$order_code}}
                           </a>
                        </h4>
                     </div>
                     <div id="collapse{{$order->order_code}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$order->order_code}}">
                        <div class="panel-body">
                           <div class="wishlist-table table-responsive">
                              <div class="coupon">
                                 <h3>Thông tin đơn hàng</h3>
                                 <p>Đơn hàng sẽ được giao đến: {{$order_meta['fullname']}}</p>
                                 <p>Địa chỉ: {{$order_meta['address']}}</p>
                                 <p>Điện thoại: {{$order_meta['phone']}}</p>
                                 <p>Tình trạng thanh toán : 
                                    <em style="font-size: 13px;">
                                    Đang xây dựng...
                                    -  <a href="{{url('customer/order/'.$order->order_code)}}">Xem chi tiết</a>
                                    </em>
                                 </p>
                              </div>
                              <table>
                                 <tbody>
                                      @foreach($products[$order->order_id] as $product)
                                      <?php 
                                          $title = $product->title;
                                          $slug  = $product->slug; 
                                          $price = $product->price;
                                          $image = $product->image;
                                          $quantity = $product->quantity_buy;
                                          $total += $price*$quantity;
                                       ?>
                                      <tr>
                                        <td style="width: 10%;" class="product-thumbnail"><a href="{{url('collections/'.$slug)}}"><img src="{{get_image_url($image)}}"></a></td>
                                         <td class="product-name"><a href="{{url('collections/'.$slug)}}">{{$title}}</a></td>
                                         <td class="product-price">
                                            <div class="price-box">
                                               <span class="special-price">
                                               {{ number_format($price,0,'.','.') }}₫
                                               </span>
                                            </div>
                                         </td>
                                         <td class="quantity">
                                            Số lượng : {{$quantity}}
                                         </td>
                                         <td class="product-price">
                                            <div class="price-box">
                                               <span class="special-price">
                                               {{ number_format($price*$quantity,0,'.','.') }}₫
                                               </span>
                                            </div>
                                         </td>
                                        </tr>
                                      @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                    @endforeach
                  @endif
        
               </div>
            </div>
            <nav class="pull-left pagination">
               <div>
                   {!! $orders->render() !!}
                </div>
            </nav>
         </div>
         <aside class="col-right sidebar col-sm-4">
            <div class="block block-account">
               <div class="block-title" style="padding:10px;"><span>Thông tin tài khoản</span></div>
               <div class="block-content">
                  <ul>
                     <li class="current"><a>Tên tài khoản: {{$fullname}}</a></li>
                     <li><a>Địa chỉ: {{$address}}</a></li>
                     <li><a>Tỉnh/Thành phố: {{$province_name}}</a></li>
                     <li><a>Quận/Huyện: {{$district_name}}</a></li>
                     <li><a>Số điện thoại: {{$phone}}</a></li>
                     <li><a href="{{url('customer/edit')}}">Thay đổi địa chỉ</a></li>
                  </ul>
               </div>
            </div>
         </aside>
      </div>
   </div>
</div>
</main>


<style>
.faq-area {
    margin-bottom: 110px;
}
h3.faq-title {
    color: #4c4c4c;
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 15px;
}
.faq-desc {
    margin-bottom: 45px;
}
.faq-desc h3 {
    color: #333;
    font-size: 18px;
}
.faq-accordion .panel.panel-default.actives {
    border: 1px solid #363533;
}
.faq-accordion .panel-default > .panel-heading {
    background-color: #f5f5f5;
}
.faq-accordion .panel-heading {
    padding: 0;
}
.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
}
.faq-accordion .panel.panel-default.actives .panel-title a {
    color: #363533;
}
.faq-accordion .panel-title a {
    display: block;
    position: relative;
    padding: 15px 10px 15px 25px;
    color: #222;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.5;
}
.faq-accordion .panel-title a.collapsed::before, .faq-accordion .panel-title a::after {
    content: "";
    font-family: fontawesome;
    position: absolute;
    right: 15px;
    top: 16px;
}


/*right*/
.block-account {
    background-color: #f8f8f8;
}
.block-account .block-title {
    padding-left: 10px;
    background-color: #363533;
    color: #fff;
    border: none;
}
.block-account .block-content {
    padding: 0 10px;
}
.block-account .block-content ul {
    margin-top: 5px;
    margin-bottom: 5px;
}
.sidebar .block-content li.current {
    font-weight: bold;
    color: #333;
}
.block-account .block-content li {
    padding: 10px 0px;
    border-top: 1px #fff solid;
    border-bottom: 1px #ddd solid;
}
.block-account .block-content li:first-child {
    border-top: none;
}
.block-account .block-content li:before {
    content: "\f105";
    font-family: FontAwesome;
    font-size: 10px;
    display: inline-block;
    position: absolute;
    cursor: pointer;
    line-height: 16px;
    color: #333;
}
.block-account .block-content li a {
    cursor: pointer;
    padding: 0 12px;
    transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s;
}


/*rieng*/
.paginations {text-align:center;}

@media (max-width: 768px) { 
  .faq-area .faq-accordion {display:none;}
  .faq-area .pagination{display:none;}
  .faq-area .block-title {margin-top:140px;}
}
</style>  

@stop