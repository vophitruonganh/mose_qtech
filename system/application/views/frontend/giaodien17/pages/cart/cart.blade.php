@extends('frontend.giaodien17.layouts.default')
@section('content')


<?php
    $xhtml       = '';
    $xhtmlUpdate = '';
    $xhtmlCart   = ''; 
    $total = 0;
    
    //CODE CHEN TABLE CART SESSION
    if(!empty($orderCart)){
        $xhtmlCart .= '<table class="shop_table">
                           <thead>
                              <tr>
                                 <th class="product-image">HÌNH ẢNH</th>
                                 <th class="name">THÔNG TIN SẢN PHẨM</th>
                                 <th class="porduct-quantity">ĐƠN GIÁ</th>
                                 <th class="product-price">SỐ LƯỢNG</th>
                                 <th class="product-total">THÀNH TIỀN</th>
                                 <th class="product-remove">XÓA</th>
                              </tr>
                           </thead>
                           <tbody>';
         
            
        foreach ($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtmlCart .=    '<tr class="cart_table_item">
                                 <td class="product-img">
                                    <a title="'.$title.'" href="'.url('collections/'.$value->post_slug).'"><img class="wp-post-image" alt="'.$title.'" src="'.loadFeatureImage($post_meta['post_featured_image']).'"></a>
                                 </td>
                                 <td class="product-name">
                                    <a href="'.url('collections/'.$value->post_slug).'">'.$title.'</a>
                                 </td>
                                 <td class="product-price">
                                    <span class="price">'.number_format($priceHeader[$value->post_id], 0, ',', '.').'₫</span>
                                 </td>
                                 <td class="product-quantity">
                                    <input  maxlength="12" class="input-text qty" type="number" min="1" name="quantity['.$value->post_id.']" id="updates_853029" value="'.$quantity[$value->post_id].'">
                                 </td>
                                 <td class="product-subtotal">
                                    <span class="price">'.number_format($totalPrice, 0, ',', '.').'₫</span>
                                 </td>
                                 <td class="product-remove">
                                    <a title="Xóa sản phẩm" class="remove" onClick="deletePerItem('.$value->post_id.')"><i class="fa fa-trash-o"></i></a>
                                 </td>
                              </tr>';
                              
         }   
         $xhtmlCart .=      '</tbody>
                           <tfoot>
                              <tr class="first last">
                                 <td class="a-right last" colspan="50" style="padding: 15px;">
                                    <button style="float:left;" onclick="window.location='."'".url('collections')."'".'" name="checkout" class="btn tz-view-more2 tz-view-style2 check_414" title="Tiếp tục mua hàng" type="button"><span>Tiếp tục mua hàng</span></button>
                                    <button class="btn tz-view-more2 tz-view-style2" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span><span>Cập nhật giỏ hàng</span></span></button>
                                    
                                 </td>
                              </tr>
                           </tfoot>
                        </table>';
         $xhtmlCart .= '<div class="cart-totals row" style="float: right;margin: 30px -15px;">
               <table>
                  <tbody>
                     <tr class="order-total" style="background: #fff;border: 1px solid #ebebeb;">
                        <th style="font-size: 14px;font-family: Roboto; border-right: 1px solid #ebebeb;padding: 15px 20px;text-transform: uppercase;">Tổng tiền thanh toán</th>
                        <td style="padding: 15px 19px;color: #bda87f;font-size: 16px;font-weight: bold;">
                           <span class="amount">'.number_format($total, 0, ',', '.').'₫</span>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <div class="clear"></div>
               <div class="proceed-to-checkout">
                  <button onclick="window.location='."'".url('cart/checkout')."'".'" name="checkout" class="button btn-proceed-checkout" title="Thanh toán" type="button"><span>Thanh toán</span></button>
               </div>
            </div>';
    }else{
       $xhtmlCart .= 'Chưa có sản phẩm trong giỏ hàng';
    }
    //END CODE 
?>
<div class="fvc" style="float:left;width:100%;">
   <div class="banner_page_list">
      <h1>Giỏ hàng</h1>
   </div>
   <div class="breadcrumbs">
      <div class="container">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ &nbsp;</a></li>
            <li><strong>Giỏ hàng</strong></li>
         </ul>
      </div>
   </div>
    
<!--    <section class="tzcheckout-wrap">
	
	<div class="alert alert-warning fade in green-alert container" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		Chưa có sản phẩm nào trong giỏ hàng của bạn !
	</div>
	
    </section>-->
   <section class="tzcheckout-wrap">
      <div class="container">
         <form action="{{ url('cart') }}" method="post">
            <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
            {!! $xhtmlCart !!}
            
         </form>
         <div class="col-xs-12 col-lg-12 col-md-12 ">
            
         </div>
      </div>
      <!--end class container-->
   </section>
   <!--end class tzblog-wrap-->
</div>


@stop