@extends('frontend.giaodien18.layouts.default')
@section('content')

<?php
    $xhtml       = '';
    $xhtmlUpdate = '';
    $xhtmlCart   = ''; 
    $total = 0;
    
    //CODE CHEN TABLE CART SESSION
    if(!empty($orderCart)){
        $xhtmlCart .= '<table width="100%" class="table">
                  <thead>
                     <tr>
                        <th class="image">Sản phẩm</th>
                        <th class="item">Tên sản phẩm</th>
                        <th class="qty">Số lượng</th>
                        <th class="price">Giá tiền</th>
                     </tr>
                  </thead>
                  <tbody>';
            
        foreach ($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtmlCart .=    ' <tr>
                                 <td class="image">
                                    <div class="product_image">
                                       <a href="'.url('collections/'.$value->post_slug).'">
                                       <img src="'.loadFeatureImage($post_meta['post_featured_image']).'" alt="'.$title.'">
                                       </a>
                                    </div>
                                 </td>
                                 <td class="item">
                                    <a href="'.url('collections/'.$value->post_slug).'">
                                    <strong>'.$title.'</strong>
                           
                                    </a>
                                 </td>
                                 <td class="qty">
                                    <input type="number" size="4" name="quantity['.$value->post_id.']" min="1" id="updates_1003061552" onfocus="this.select();" class="tc item-quantity" value = "'.$quantity[$value->post_id].'">
                                    <a onClick="deletePerItem('.$value->post_id.')" class="cart"><i class="fa fa-trash"></i></a>
                                 </td>
                                 <td class="price">'.number_format($totalPrice, 0, ',', '.').'₫</td>
                              </tr>';
                              
         }   
         $xhtmlCart .=      '<tr class="summary">
                                 <td colspan="3" style="font-weight: bold; font-size: 20px;">Tổng tiền:</td>
                                 <td class="price">
                                    <span class="total">
                                    <strong>'.number_format($total, 0, ',', '.').'₫</strong>
                                    </span>
                                 </td>
                              </tr>';
         $xhtmlCart .=      ' </tbody></table>';
         $xhtmlCart .=      ' <!--<div class="col-md-6 inner-left inner-right">
                                 <div class="checkout-buttons clearfix">
                                    <textarea id="note" name="note" rows="8" cols="50" placeholder="Ghi chú"></textarea>
                                 </div>
                              </div>-->
                              <div class="col-md-6 cart-buttons inner-right inner-left">
                                 <div class="buttons clearfix">
                                    <button type="submit" id="update-cart" class="button-default" name="update" value="">Cập nhật </button>
                                    <button type="button" onclick="window.location='."'".url('cart/checkout')."'".'" id="checkout" class="button-default" name="checkout" value="">Thanh toán <i class="fa fa-chevron-right"></i></button>                 
                                 </div>
                              </div>';
         
    }else{
       $xhtmlCart .= 'Chưa có sản phẩm trong giỏ hàng';
    }
    //END CODE 
?>

<div id="wrap-cart">
   <!-- Begin empty cart -->
   <div id="layout-page-card" class="container">
       
<!--       <div id="layout-page-first" class="col-md-12">
                <span class="header-page clearfix">
                        <h1 class="title-cart">Giỏ hàng</h1></span>
                <p class="text-center">
                        Không có sản phẩm nào trong giỏ hàng!</p>
                <p class="text-center"><a href="/collections/all">
                        <i class="fa fa-reply"></i> Tiếp tục mua hàng</a>
                </p>
        </div>-->
      <div class="container">
         <span class="header-page clearfix">
            <h1 class="title-cart">Giỏ hàng</h1>
         </span>
         <form action="{{ url('cart') }}" method="post" id="cartformpage">
             <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="table-responsive">
               {!! $xhtmlCart !!}

              

            </div>
         </form>
      </div>
      <!-- End cart -->
   </div>
</div>


@stop
        
        
           
          
        