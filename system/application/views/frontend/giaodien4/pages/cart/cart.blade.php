@extends('frontend.giaodien4.layouts.default')
@section('content')

<?php 

$xhtml = '';
$total = 0;
$order_cart = decode_serialize (Cookie::get('cart'));
if($order_cart){
  $xhtml .=       '<table>
                   <thead>
                      <tr>
                         <th class="image">&nbsp;</th>
                         <th class="item">Tên sản phẩm</th>
                         <th class="qty">Số lượng</th>
                         <th class="price">Giá tiền</th>
                         <th class="remove">&nbsp;</th>
                      </tr>
                   </thead>
                   <tbody>';
  foreach( $order_cart as $cart){
      $total_price = $cart['price'] * $cart['quantity'];
      $total+= $total_price;
      $xhtml .=          '<tr class="list-carts">
                             <td class="image">
                                <div class="product_image">
                                   <a href="'.url('collections/'.$cart['product_slug']).'">
                                   <img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'">
                                   </a>
                                </div>
                             </td>
                             <td class="item">
                                <a href="'.url('collections/'.$cart['product_slug']).'">
                                <strong>'.$cart['product_title'].'</strong>
                                <p>'.$cart['variant_meta'].'</p>
                                </a>
                             </td>
                             <td class="qty">
                                <input type="number" size="4" name="quantity['.$cart['variant_id'].']" min="1" id="updates_1004976101" value="'.$cart['quantity'].'" onfocus="this.select();" class="tc item-quantity">
                             </td>
                             <td class="price">'.number_format($total_price, 0, ',', '.') .'₫</td>
                             <td class="remove">
                                <a data-id="1004976101" onClick="deletePerItem('.$cart['variant_id'].')" class="cart click-delete">Xóa</a>
                             </td>
                          </tr>';
      }        
      $xhtml .=         '<tr class="summary">
                             <td class="image">&nbsp;</td>
                             <td>&nbsp;</td>
                             <td class="text-center"><b>Tổng cộng:</b></td>
                             <td class="price">
                                <span class="total" id="total-carts">
                                <strong>'.number_format($total, 0, ',', '.') .'₫</strong>
                                </span>
                             </td>
                             <td>&nbsp;</td>
                          </tr>
                       </tbody>
                    </table>
                    
                    <div class="col-md-6 cart-buttons inner-right inner-left">
                       <div class="buttons clearfix">
                          <button onclick="window.location= '."'".url('cart/checkout')."'".'" id="checkout" class="button-default button button-medium" name="checkout" type="button">Thanh toán</button>
                          <button type="submit" id="update-cart" class="button-default button button-medium" name="update" value="update_all">Cập nhật</button>
                       </div>
                    </div>
                    <div class="col-md-12">
                       <a href="'.url('collections').'">
                       <i class="fa fa-reply"></i> Tiếp tục mua hàng</a>
                    </div>';
  }else{
    $xhtml .= ' <p class="text-center">Không có sản phẩm nào trong giỏ hàng!</p>
                   <p class="text-center"><a href="'.url('collections').'"><i class="fa fa-reply"></i> Tiếp tục mua hàng</a></p>';//div
}

?>

<div id="cart">
   <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <!-- Begin empty cart -->
         <!-- Begin cart -->
         <div class="row">
            <div id="layout-page" class="col-md-12">
                 <span class="header-page clearfix">
                    <h1>Giỏ hàng</h1>
                 </span>
                
                <form action="{{url('cart')}}" method="post" id="cartformpage">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  {!! $xhtml !!}
               </form>
            </div>
             <!--gio hang rong-->
            
               <!--gio hang rong-->
             
             
            
               
            
         </div>
      </div>
   </div>
   <!-- End cart -->
</div>
@stop