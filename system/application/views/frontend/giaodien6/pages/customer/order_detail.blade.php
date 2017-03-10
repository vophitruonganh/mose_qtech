@extends('frontend.giaodien6.layouts.default')
@section('content') 
<?php 
    $order_code = get_template_order_code( $order->order_code); 
    $email = $order_meta['email'];
    $fullname = $order_meta['fullname'];
    $address = $order_meta['address'];
    $phone = $order_meta['phone'];
    $province = $order_meta['province'];
    $district = $order_meta['district'];
 ?>


<main class="padding-top-mobile">
<div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li><a href="/account" target="_self">Chi tiết đơn hàng</a></li>
                 
               </ol>
            </div>
         </div>
      </div>
   </div>


<div class="container">
  <div id="customer-order">
    <div class="row">
      <div class="col-md-12">
        <h2>Đơn hàng {{$order_code}}</h2>Ngày tạo <span class="note order_date">— {{date('d/m/Y',$order->date_create)}}</span>     
      </div>
    </div>

    <div class="row">
      <div id="order_payment" class="col-xs-12 col-md-6">
        <h3 class="order_section_title">Địa chỉ thanh toán</h3>
        <p>
          <span class="note">Tình trạng thanh toán:</span> 
          <span class="status_pending"><strong style="color:#f26522">
            Đang xây dựng
            </strong>
          </span>
        </p>
        <div class="address note">
          <p>Tên : <strong style="color:#f26522">  {{$fullname}} </strong></p>
          <p>Địa chỉ :<strong style="color:#f26522"> {{$address}} </strong></p>
          <p>Tỉnh/Thành phố :<strong style="color:#f26522"> {{$province}} </strong></p>
          <p>Quận/Huyện : <strong style="color:#f26522">  {{$district}} </strong></p>
          <p>Số điện thoại :<strong style="color:#f26522">  0987654321 </strong></p>
        </div>
      </div>
      
      <div id="order_shipping" class="col-xs-12 col-md-6">
        <h3 class="order_section_title">Địa chỉ giao hàng</h3>
        <p>
          <span class="note">Tình trạng giao hàng:</span> 
          <span class="status_unfulfilled"><strong style="color:#f26522">
            Đang xây dựng
          </strong>
          </span>
        </p>
        <div class="address note">
          <p>Tên : <strong style="color:#f26522"> {{$fullname}} </strong></p>
          <p>Địa chỉ : <strong style="color:#f26522"> {{$address}} </strong></p>
          <p>Tỉnh/Thành phố : <strong style="color:#f26522"> {{ $province}} </strong></p>
          <p>Quận/Huyện : <strong style="color:#f26522"> {{$district}} </strong></p>
          <p>Số điện thoại : <strong style="color:#f26522"> 0987654321 </strong></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="table-responsive cc_table" style="border-top: 1px solid #ccc; margin: 15px;">
        <table class="table" style="border: 1px solid #ccc; border-top:0px;">
          <thead>
            <tr>
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th class="center">Số lượng</th>
              <th class="total">Tổng </th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
              <?php 
                  $title = $product->title;
                  $variant_name = $product->variant_name;
                  $slug  = $product->slug; 
                  $price = $product->price;
                  $image = $product->image;
                  $quantity = $product->quantity_buy;
               ?>
              <tr id="3283122" class="even">
                <td>
                  <a href="{{url('collections/'.$slug)}}">{{$title}}</a>
                  <p>{{$variant_name}}</p>
                </td>
                <td class="money">{{number_format($price,0,'.','.')}}</td>
                <td class="quantity cente">{{$quantity}}</td>
                <td class="total money">{{number_format($price*$quantity,0,'.','.')}}</td>
              </tr>
            @endforeach
            
            
          </tbody>
          <tfoot>
            <tr class="order_summary note" style="color:red">
              <td colspan="3">Tạm tính</td>
              <td class="total money">{{number_format($order->amount_order,0,'.','.')}}</td>
            </tr>
            <!-- <tr class="order_summary note" style="color:red;">
              <td colspan="4">Phí vận chuyển ():</td>
              <td class="total money">40.000₫</td>
            </tr> -->
            @if($order->order_discount_notes)
            <tr class="order_summary note" style="color:red">
              <td colspan="3">{{$order->order_discount_notes}}</td>
              <td class="total money">{{number_format($order->amount_discount,0,'.','.')}}</td>
            </tr>
            @endif
            <tr class="order_summary order_total" style="color:red">
              <td colspan="3">Tổng</td>
              <td class="total money">{{number_format($order->amount_payment,0,'.','.')}} </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <a class="btn_order" href="{{url('customer')}}">Quay lại trang thông tin tài khoản</a>
  </div>  
</div>
</main>
<style>

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
.form-list input.input-text {
    border: 1px solid #c1bfbf;
  }
input[type="text"]:focus {
    border-color: rgba(82, 168, 236, 0.8) !important;
    outline: 0;
    outline: thin dotted \9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6)!important;
}
   

  }
</style>  

@stop