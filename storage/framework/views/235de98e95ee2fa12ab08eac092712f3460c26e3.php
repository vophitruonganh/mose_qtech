<?php $__env->startSection('content'); ?>

<?php 
   $xhtml = '';
   $xhtmlCart = '';
   $total = 0; 
   $order_cart = decode_serialize(Cookie::get('cart'));
   if($order_cart){
         $xhtml .='<thead>
                     <tr>
                        <th class="image">Hình ảnh</th>
                        <th class="item">Tên sản phẩm</th>
                        <th class="qty">Số lượng</th>
                        <th class="price">Giá tiền</th>
                        <th class="remove">Xoá</th>
                     </tr>
                  </thead>
                  <tbody>';
         foreach ($order_cart as $cart){
               $total_price = $cart['price'] * $cart['quantity'];
               $total      += $total_price;  
               $xhtml .= '<tr class="item">
                           <td class="image">
                              <div class="product_image">
                              <a href="'.url('collections/'.$cart['product_slug']).'">
                                 <img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'" alt="'.$cart['product_title'].'">
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
                              <input type="number" size="4" name="quantity['.$cart['variant_id'].']" min="1" id="updates_1007674664" value="'.$cart['quantity'].'" onfocus="this.select();" class="tc item-quantity">
                           </td>
                           <td class="price">'.number_format($total_price, 0, ',', '.').' ₫</td>
                           <td class="remove">
                              <a onclick="deletePerItem('.$cart['variant_id'].')" class="cart"></a>
                           </td>
                        </tr>';
         }
         $xhtml .= '<tr class="summary">
                     <td class="image">&nbsp;</td>
                     <td>&nbsp;</td>
                     <td style="font-size: 20px; text-transform: uppercase;">Tổng tiền</td>
                     <td class="price">
                        <span class="total" style="font-size: 25px;">
                        <strong>'.number_format($total, 0, ',', '.').' ₫</strong>
                        </span>
                     </td>
                     <td>&nbsp;</td>
                  </tr>
                  </body>';
   }else{
      $xhtml.= 'Bạn chưa chọn sản phẩm nào';
   }
?>
  

<div id="cart" class="mt60">
<div class="container">
<div class="row">
   <div id="layout-page" class="col-md-12">
      <span class="header-page clearfix">
         <h1>Giỏ hàng</h1>
      </span>
      <form action="<?php echo e(url('cart')); ?>" method="post" id="cartformpage">
      <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
         <table class="cart cart-hidden">
            <?php echo $xhtml; ?>

               
           
         </table>
      
      
         <div class="cart-buttons inner-right inner-left">
            <div class="buttons clearfix pull-right">
               <button type="submit" id="update-cart" class="button-default" name="update" value="">Cập nhật</button>
               <button type="button" onclick="window.location= '<?php echo e(url('cart/checkout')); ?>'" id="checkout" class="button-default" name="checkout" value="">Thanh toán</button>

            </div>
         </div>
      </form>
   </div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien5.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>