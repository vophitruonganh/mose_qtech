@extends('frontend.giaodien19.layouts.default')
@section('content')

<?php
    $xhtml       = '';
    $xhtmlUpdate = '';
    $xhtmlCart   = ''; 
    $total = 0;
    
    //CODE CHEN TABLE CART SESSION
    if(!empty($orderCart)){
        $xhtmlCart .= ' <div class="table-responsive">
                     <table class="table cart">
                        <thead>
                           <tr>
                              <th class="cart-product-thumbnail hidden-xs">&nbsp;</th>
                              <th class="cart-product-name hidden-xs">Sản phẩm</th>
                              <th class="cart-product-name hidden-lg hidden-md hidden-sm" colspan="2">Sản phẩm</th>
                              <th class="cart-product-price">Đơn giá</th>
                              <th class="cart-product-quantity">Số lượng</th>
                              <th class="cart-product-subtotal">Thành tiền</th>
                              <th class="cart-product-remove">Xoá</th>
                           </tr>
                        </thead>
                        <tbody>';
                           
                           


                     
            
        foreach ($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtmlCart .=    '<tr class="cart_item">
                              <td class="cart-product-thumbnail">
                                 <a href="'.url('collections/'.$value->post_slug).'"><img src="'.loadFeatureImage($post_meta['post_featured_image']).'" alt="'.$title.'"></a>
                              </td>
                              <td class="cart-product-name">
                                 <a href="'.url('collections/'.$value->post_slug).'">'.$title.'</a>
                               
                              </td>
                              <td class="cart-product-price">
                                 <span class="amount">'.number_format($priceHeader[$value->post_id], 0, ',', '.').'₫</span>
                              </td>
                              <td class="cart-product-quantity">
                                 <div class="quantity clearfix">
                                    <span class="hidden-sm hidden-md hidden-lg">x</span> <input type="text" name="quantity['.$value->post_id.']" value="'.$quantity[$value->post_id].'" class="qty" id="product-quantity2updates_1005484136">
                                 </div>
                              </td>
                              <td class="cart-product-subtotal">
                                 <span class="amount">'.number_format($totalPrice, 0, ',', '.').'₫</span>
                              </td>
                              <td class="cart-product-remove">
                                 <a onClick="deletePerItem('.$value->post_id.')" class="remove" title="Remove this item"><i class="fa fa-trash"></i></a>
                              </td>
                           </tr>';
                              
         }   
         $xhtmlCart .=      '<tr class="cart_bottom" style="text-align:center;">
                                    <td class="hidden-xs">&nbsp;</td>
                                    <td class="hidden-xs">&nbsp;</td>
                                    <td class="hidden-xs">&nbsp;</td>
                                    <td class="hidden-xs">&nbsp;</td>
                                    <td>
                                       <h4 style="margin-bottom:0px;">Tổng tiền </h4>
                                    </td>
                                    <td class="hidden-xs"><span class="amount color lead"><strong>'.number_format($total, 0, ',', '.').'₫</strong></span></td>
                                    <td class="hidden-lg hidden-md hidden-sm" colspan="2"><span class="amount color"><strong>'.number_format($total, 0, ',', '.').'₫</strong></span></td>
                                 </tr>
                                 
                              </tbody>
                           </table>
                        </div>

                  <div class="row clearfix">
                    <!--
                     <div class="col-md-6 col-sm-6 col-xs-12 nopadding" style="margin-top:-20px!important">
                        <div class="checkout-buttons clearfix">
                           <label for="note">Ghi chú </label>
                           <textarea style="height:85px" id="note" class="sm-form-control" name="note" rows="8" cols="50"></textarea>
                        </div>
                     </div>
                    -->
                     <div class="col-md-6 col-sm-6 col-xs-12 topmargin nopadding">
                        <button name="update" class="cart_update_btn button button-3d nomargin fright" type= "submit">Cập nhật giỏ hàng</button>
                        <button onclick="window.location='."'".url('cart/checkout')."'".'" name="checkout" class="cart_checkout_btn button button-3d notopmargin fright" type="button">Gửi đơn hàng</button>
                     </div>
                  </div>';
         
    }else{
       $xhtmlCart .= 'Chưa có sản phẩm trong giỏ hàng';
    }
    //END CODE 
?>

<section id="content" class="f-cart">
   <div class="content-wrap">
      <div class="container clearfix">
         <form action="{{ url('cart') }}" method="post" id="cartformpage">
            <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               {!! $xhtmlCart !!}
         </form>
         <script type="text/javascript">
            function minus_quantity(item_id) {
            var quantity = parseInt($('#product-quantity2updates_'+item_id).val());
            if (quantity > 0) {
            quantity -= 1;
            }
            else {
            quantity = 0;
            }
            $('#product-quantity2updates_'+item_id).val(quantity);
            }
            function plus_quantity(item_id) {
            var quantity = parseInt($('#product-quantity2updates_'+item_id).val());
            if (quantity < 100) {
            									 quantity += 1;
            									 }
            									 else {
            									 quantity = 100;
            									 }
            									 $('#product-quantity2updates_'+item_id).val(quantity);
            									 }
            									 
         </script>
      </div>
   </div>
</section>

@stop

          