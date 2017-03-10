@extends('frontend.giaodien20.layouts.default')
@section('content')

<?php
    $xhtml       = '';
    $xhtmlUpdate = '';
    $xhtmlCart   = ''; 
    $total = 0;
    
    //CODE CHEN TABLE CART SESSION
    if(!empty($orderCart)){
        $xhtmlCart .= ' <table class="cart-table full table--responsive">
                              <thead class="cart__row cart__header-labels">
                                 <tr>
                                    <th colspan="2" class="text-center">Sản phẩm</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-right">Tổng</th>
                                 </tr>
                              </thead>
                              <tbody>';
        foreach ($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtmlCart .=    '<tr class="cart__row table__section">
                                       <td data-label="Sản phẩm">
                                          <a href="'.url('collections/'.$value->post_slug).'" class="cart__image">
                                          <img src="'.loadFeatureImage($post_meta['post_featured_image']).'" alt="'.$title.'">
                                          </a>
                                       </td>
                                       <td>
                                          <a href="'.url('collections/'.$value->post_slug).'" class="h6">
                                          '.$title.'
                                          </a>
                                          <a onClick="deletePerItem('.$value->post_id.')" class="cart__remove">
                                          <small>Xóa</small>
                                          </a>
                                       </td>
                                       <td data-label="Giá">
                                          <span class="h6">
                                          '.number_format($priceHeader[$value->post_id], 0, ',', '.').'₫
                                          </span>
                                       </td>
                                       <td data-label="Số lượng">
                                          <div class="js-qty">
                                              <input type="number" name="quantity['.$value->post_id.']" min="1" max="50" value="'.$quantity[$value->post_id].'">
                                          </div>
                                       </td>
                                       <td data-label="Tổng" class="text-right">
                                          <span class="h6">
                                          '.number_format($totalPrice, 0, ',', '.').'₫
                                          </span>
                                       </td>
                                    </tr> ';
         }   
         $xhtmlCart .=      ' </tbody>
                              </table>

                              <div class="grid cart__row">
                                <!--
                                 <div class="grid__item two-thirds small--one-whole">
                                    <label for="CartSpecialInstructions">Ghi chú đơn hàng</label>
                                    <textarea name="note" class="input-full" id="CartSpecialInstructions"></textarea>
                                 </div>
                                -->
                                 <div class="grid__item text-right one-third small--one-whole">
                                    <p>
                                       <span class="cart__subtotal-title">Tổng</span>
                                       <span class="h3 cart__subtotal">'.number_format($total, 0, ',', '.').'₫</span>
                                    </p>
                                    <p><em>Giao hàng &amp; tính thuế khi bán hàng</em></p>
                                    <input type="submit" name="update" class="btn--secondary update-cart" value="Cập nhật giỏ hàng">
                                    <input type="button" name="checkout" class="btn" value="Thanh toán" onclick="window.location='."'".url('cart/checkout')."'".'">
                                 </div>
                              </div>';
         
    }else{
       $xhtmlCart .= 'Chưa có sản phẩm trong giỏ hàng';
    }
    //END CODE 
?>

<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
         <span>Giỏ hàng của bạn - OneShop</span>
      </div>
   </nav>
   <!-- /templates/cart.liquid -->
   <h3 class="page_name">Giỏ hàng</h3>
   
<!--   <p>Giỏ hàng của bạn đang trống.</p>
   <p>Tiếp tục xem <a href="/collections/all">tại đây</a>.</p>-->
   
   <form action="{{ url('cart') }}" method="post" novalidate="" class="cart table-wrap">
      <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" /> 
      {!! $xhtmlCart !!}
  

   </form>

</main>



@stop
