@extends('frontend.giaodien4.layouts.default')
@section('content')
<?php 
    $xhtml = '';
    $_xhtml_cart ='';
    $total = 0;
    $xhtml_cart= '';
    $_xhtml = '';
 ?>
<?php
   
   $xhtml .='<div id="cart"><div class="container">'; 
   $xhtml .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="row">';
?>
<?php 
  
   $_xhtml_cart .=' <div id="layout-page" class="col-md-12"><span class="header-page clearfix">';

   $_xhtml_cart .= "<h1>Giỏ hàng</h1>";
   if(empty($orderCart))
   {
      $_xhtml_cart .= ' <p class="text-center">Không có sản phẩm nào trong giỏ hàng!</p>';
      $_xhtml_cart .= '<p class="text-center"><a href="'.url('/').'"><i class="fa fa-reply"></i> Tiếp tục mua hàng</a></p>';
      $_xhtml_cart .='</span></div>';
   }
?>
<?php 
   
   if(!empty($orderCart))
   {
        $xhtml_cart .= '<thead><tr>';
        $xhtml_cart .= '<th class="image">&nbsp;</th><th class="item">Tên sản phẩm</th><th class="qty">Số lượng</th>
                       <th class="price">Giá tiền</th>
                           <th class="remove">&nbsp;</th>
                        ';
       foreach ($orderCart as $key => $value)
       {
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            
            $xhtml_cart .= '</tr></thead>';
            $xhtml_cart .= '<tr class="list-carts">';
            $xhtml_cart .='<td class="image"><div class="product_image">
                            <a href="'.url('product-detail/'.$value->post_slug.'.html').'">
                            <img src="'.asset('template/giaodien4/images/t15bk_bywv1rxrhcrk_482x482_ca12a6b6-b3b5-4ddd-61e9-7e68e0f716db_small.jpg').'"></a></div></td>';
            $xhtml_cart .= '<td class="item"><a href="'.url('product-detail/'.$value->post_slug.'.html').'">
                              <strong>'.$title.'</strong></a></td>';
            $xhtml_cart .= '<td class="qty">
                              <input type="number" size="4" name="quantity['.$value->post_id.']" min="1" id="updates_1004976101" value="'.$quantity[$value->post_id].'" onfocus="this.select();" class="tc item-quantity">
                           </td>';
            $xhtml_cart .= '<td class="price">'.number_format($totalPrice, 0, ',', '.').'</td>';
            $xhtml_cart .= ' <td class="remove">
                              <a data-id="1004976101" onClick="deletePerItem('.$value->post_id.')" class="cart click-delete">Xóa</a>
                           </td>';
       }
        $xhtml_cart .= '</tr>';
   }
 ?>
<?php 
   
   $_xhtml .='</div></div>'; 
   $_xhtml .= '</div></div>'
?>
<?php echo $xhtml; ?>
<?php echo $_xhtml_cart; ?>
               <form action="{{ url('cart.html') }}" method="post" novalidate="" id="cartformpage">
                <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <table>
                     <tbody>
                           <?php echo $xhtml_cart; ?>
                        <tr class="summary">
                           <td class="image">&nbsp;</td>
                           <td>&nbsp;</td>
                           <td class="text-center"><b>Tổng cộng:</b></td>
                           <td class="price">
                              <span class="total" id="total-carts">
                              <strong>{{number_format($total, 0, ',', '.') }}</strong>
                              </span>
                           </td>
                           <td>&nbsp;</td>
                        </tr>
                     </tbody>
                  </table>
                  <!--
                  <div class="col-md-6 inner-left inner-right">
                     <div class="checkout-buttons clearfix">
                        <label for="note">Ghi chú </label><br>
                        <textarea id="note" name="note" rows="8" cols="50"></textarea>
                     </div>
                  </div>
                  -->
                  <div class="col-md-6 cart-buttons inner-right inner-left">
                     <div class="buttons clearfix">
                        <button type="button" id="checkout" class="button-default button button-medium" name="checkout" value="" onclick="window.location='{{url('cart/checkout.html')}}'">Thanh toán</button>
                        <button type="submit" id="update-cart" class="button-default button button-medium" name="update" value="">Cập nhật</button>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <a href="{{ url('/') }}">
                     <i class="fa fa-reply"></i> Tiếp tục mua hàng</a>
                  </div>
               </form>     
  <?php echo $_xhtml; ?>
@stop