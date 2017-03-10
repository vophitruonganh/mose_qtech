@extends('frontend.giaodien20.layouts.default')
@section('content')


<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
         <span>Thanh toán - OneShop</span>
      </div>
   </nav>
   
   <style>
       /*THANH TOAN*/

.main {
    padding: 5px;
}

.m0 {
    margin: 0;
}

.mt10 {
    margin-top: 10px;
}

/*a {
    color: #2a9dcc;
    text-decoration: none;
    -webkit-transition: color 0.2s ease-in-out, background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    transition: color 0.2s ease-in-out, background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

    a:hover, a:focus {
        color: #2486ae;
        outline: 0;
    }*/

textarea.form-control {
    height: 70px;
}

hr.divider {
    margin-bottom: 10px;
    margin-top: 10px;
}

.slidedown-hidden {
    position: absolute;
    visibility: hidden;
    max-height: 0;
}

    .slidedown-hidden.slidedown-visible {
        -webkit-transition: max-height 1s;
        -moz-transition: max-height 1s;
        transition: max-height 1s;
        max-height: 1500px;
        position: relative;
        visibility: visible;
        overflow: hidden;
    }

.payment-method-description {
    margin-left: 26px;
}

.payment-method-list .radio > label {
    font-weight: 700;
}
.iradio_square.checked {
    background-position: -168px 0;
}
.icheckbox_square {
    background-position: 0 0;
}

    .icheckbox_square.checked {
        background-position: -48px 0;
    }

.radio > label {
    padding-left: 0;
}

.form-group .radio {
    margin-bottom: 20px;
}

.control-label {
    font-weight: normal;
}

.order-summary {
    background: #fafafa;
    border-top: 1px solid #e1e1e1;
    color: #777;
    border: 1px solid #dadada;
}

    .order-summary strong {
        font-weight: 500;
        color: #555;
    }

.order-summary-header {
    padding: 15px;
    border-top: none;
}

.order-summary .control-label {
    margin-bottom: 0;
}

.summary-section {
    border-top: 1px solid #e1e1e1;
    padding: 20px;
}

    .summary-section:first-of-type {
        border-top: 0;
    }

.product-info-name, .product-info-description {
    display: block;
}

.product-list .product {
    padding-bottom: 25px;
    padding-top: 25px;
    border-top: 1px solid #e7e7e7;
}

    .product-list .product:first-of-type {
        border-top: none;
    }

    .product-list .product .product-image {
        margin-right: 10px;
        width: 50px;
    }

.more {
    position: relative;
}

    .more:hover {
        text-decoration: none;
    }

    .more:after {
        content: "";
        position: absolute;
        height: 11px;
        width: 6px;
        right: -15px;
        top: 3px;
        -webkit-transition: -webkit-transform 0.2s ease-in-out;
        -moz-transition: -moz-transform 0.2s ease-in-out;
        transition: transform 0.2s ease-in-out;
    }

    .more:hover:after {
        -webkit-transform: translateX(0.5em);
        -moz-transform: translateX(0.5em);
        transform: translateX(0.5em);
    }

/*.product-info {
    max-width: 50%;
}*/

.summary-body {
    padding-top: 0;
}

.total-line {
    margin-bottom: 16px;
}

    .total-line:first-of-type {
        margin-bottom: 0;
    }

.total-line-total {
    border-top: 1px solid #e7e7e7;
    padding-top: 16px;
}

.checkbox label {
    padding-left: 0;
}

input[required] {
}

.form-control {
    padding-left: 22px;
}

    .form-control option {
        padding-left: 20px;
    }

    .form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857;
    color: #555555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 0px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}

.form-group {
    position: relative;
    margin-top: 15px;
}
input[type="email"] {
    height: 34px;
}
.product-list { list-style-type: none;}
.product-list{overflow:hidden;margin-bottom:30px;border-top:#ddd 0px solid;border-left:#ddd 0px solid}@media (min-width:768px) and (max-width:992px) {.search{margin-top:40px;padding:0}.search_input{padding:0 10px}}

   </style>
   <div class="grid text-center contact-box">
      <div class="container">
          
         <div class="row">
            <form method="post" action="{{ url('cart/checkout') }}" data-toggle="validator" class="formCheckout">
              <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <div context="checkout" class="container">
                  <div class="main">
                     <div class="wrap clearfix">
                        <div class="row">
                           <div class="col-md-5 col-sm-6">
                              <div class="form-group m0">
                                 <h2>
                                    <label class="control-label">Thông tin mua hàng</label>
                                 </h2>
                              </div>
                              <div class="form-group">
                                 <a href="{{url('user/register')}}">Đăng ký tài khoản mua hàng</a>
                                 |
                                 <a href="{{url('user/login')}}">Đăng nhập </a>
                              </div>
                              <hr class="divider">
                              <!--thông tin mua hang-->
                              @if( count($errors) > 0 )   
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach( $errors->all() as $error )
                                        <li><strong>{{ $error }}</strong></li>
                                        @endforeach
                                    </ul>
                                </div>
                              @endif
                              <div class="form-group">
                                 <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                              </div>
                              <div class="form-group">
                                 <input class="form-control" name="nickname" id="nickname" placeholder="Họ và tên" value="{{old('nickname')}}">
                              </div>
                              <div class="form-group">
                                 <input class="form-control" name="phone" id="phone" placeholder="Số điện thoại" value="{{old('phone')}}">
                              </div>
                              <div class="form-group">
                                 <input name="address" id="address" class="form-control" placeholder="Địa chỉ" value="{{old('address')}}">
                              </div>
                              <div class="form-group">
                                 <select name="gender" class="form-control">
                                    <option value="choise">— Chọn giới tính —</option>
                                    <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                                    <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                                    <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
                                 </select>
                              </div>
                              <hr class="divider">
                              <div class="form-group">
                                 <textarea name="note" value="" class="form-control" placeholder="Ghi chú">{{old('note')}}</textarea>
                              </div>
                              <!-- end thông tin mua hang-->
                           </div>
                           <div class="col-md-5 col-sm-6">
                              <div class="order-summary order-summary--custom-background-color ">
                                 <div class="order-summary-header">
                                    <h2>
                                       <label class="control-label">Đơn hàng</label>
                                    </h2>
                                 </div>
                                 <div class="summary-body  summary-section">
                                    <div class="summary-product-list">
                                       <ul class="product-list">
                                        @if(!empty($orderCart))
                                             <?php 
                                                 $total = 0;
                                             ?>
                                                @foreach ($orderCart as $key => $value)
                                                   <?php 
                                                       $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
                                                       $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
                                                       $total      += $totalPrice;
                                                       $post_meta  = decode_serialize($value->meta_value);
                                                   ?>
                                                <li class="product product-has-image clearfix">
                                                   <img src="{{loadFeatureImage($post_meta['post_featured_image'])}}" alt="{{$title}}" class="pull-left product-image">
                                                   <div class="product-info pull-left">
                                                      <span class="product-info-name">
                                                      <strong>{{$title}}</strong> x {{$quantity[$value->post_id]}}
                                                      </span>
                                                      <!-- <span class="product-info-description">
                                                      Hồng
                                                      </span> -->
                                                   </div>
                                                   <strong class="product-price pull-right">
                                                   {{ number_format($totalPrice, 0, ',', '.') }}₫
                                                   </strong>
                                                </li>
                                                @endforeach
                                        @endif
                                      

                                       </ul>
                                    </div>
                                 </div>
                                 <div class="summary-section">
                                    <div class="total-line total-line-subtotal clearfix">
                                       <span class="total-line-name pull-left">
                                       Tạm tính
                                       </span>
                                       <span class="total-line-subprice pull-right"> {{ number_format($total, 0, ',', '.') }}₫</span>
                                    </div>
                                    <div class="total-line total-line-shipping clearfix" bind-show="requiresShipping">
                                       <span class="total-line-name pull-left">
                                       Phí ship
                                       </span>
                                       <span class="total-line-shipping pull-right">0₫</span>
                                    </div>
                                    <div class="total-line total-line-total">
                                       <span class="total-line-name pull-left">
                                       Tổng cộng
                                       </span>
                                       <span class="total-line-price pull-right">{{ number_format($total, 0, ',', '.') }}₫</span>
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
   </div>


</main>
<script type="text/javascript">
$('form.formCheckout input:text').change(function (){
   var email      = $('input#email').val();
   var phone      = $('input#phone').val();
   var token      = $('input[name="_token"]').val();
   var url        = 'checkout-pending';
   
   if(email != '' && phone == ''){
      data = {
         'email' : email,
      };
   }else if(email == '' && phone != ''){
      data = {
         'phone' : phone,
      };
   }
   
   $.ajax({
      type      : "POST",
      url       : url,
        dataType  : 'html',
        data      : {"_token" : token,"data" : data},
      success: function(data){
               
      },
   });

});
</script>


@stop

