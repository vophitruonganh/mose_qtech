@extends('frontend.giaodien15.layouts.default')
@section('content')

<main class="wrapper main-content" role="main">
  
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <img src="//hstatic.net/033/1000104033/1000147703/bg-breadcrumb.jpg?v=55" alt="">
      <div class="inner">
         <div class="breadcrumb-list">
            <a href="/" title="Quay lại trang chủ">Trang chủ</a>
            <span aria-hidden="true">/</span>
            <span>Thanh Toán</span>
         </div>
         <h3 class="page_name">Thanh Toán</h3>
      </div>
   </nav>
   
   <div class="grid text-center contact-box">
      <div class="container">
         <div class="row">
            <form method="post" action="{{ url('cart/checkoutLogin') }}" data-toggle="validator" class="formCheckout">
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
                               @if( count($errors) > 0 )   
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach( $errors->all() as $error )
                                        <li><strong>{{ $error }}</strong></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                              <!--thông tin mua hang-->
                              <div class="form-group">
                                 <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{$user->user_email }}" disabled>
                              </div>
                              
                              <div class="form-group">
                                 <input type="text"  class="form-control" name="phone" id="phone" placeholder="Số điện thoại" value="{{ $user->user_telephone }}" disabled>
                              </div>
                              <div class="form-group">
                                 <input type="text" name="address" id="BillingAddress_Address1" class="form-control" placeholder="Địa chỉ" value="{{ $address }}" disabled>
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
                                       <span class="total-line-subprice pull-right">{{ number_format($total, 0, ',', '.') }}₫</span>
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

@stop

       