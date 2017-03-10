<?php $__env->startSection('content'); ?>

<?php 
   $xhtml = '';
   $total = 0; 
   if(!empty($orderCart))
   {
      $xhtml .= '<table>';
      $xhtml .= '<thead>
                     <tr>
                        <th class="image">Ảnh</th>
                        <th class="item">&nbsp;</th>
                        <th class="qty">Số lượng</th>
                        <th class="price">Đơn giá</th>
                        <th class="remove">&nbsp;</th>
                     </tr>
                  </thead>';
      $xhtml .= '<tbody>';
      foreach($orderCart as $key => $value)
      {
         $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
         $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
         $total      += $totalPrice;
         $post_meta  = decode_serialize($value->meta_value);
         $xhtml      .= ' <tr>
                           <td class="image">
                              <div class="product_image">
                                 <a href="'.url('collections/'.$value->post_slug).'">
                                 <img src="'.loadFeatureImage($post_meta['post_featured_image']).'" alt="'.$value->post_title.'">
                                 </a>
                              </div>
                           </td>
                           <td class="item">
                              <a href="'.url('collections/'.$value->post_slug).'">
                              <strong>'.$value->post_title.'</strong>
                              </a>
                              <a onClick="deletePerItem('.$value->post_id.')" class="cart">Xóa</a>
                           </td>
                           <td class="qty">
                              <input type="text" size="4" name="quantity['.$value->post_id.']" id="updates_1004984988" value="'.$quantity[$value->post_id].'" onfocus="this.select();" class="tc item-quantity">
                           </td>
                           <td class="price">
                              '.number_format($totalPrice, 0, ',', '.').'₫
                           </td>
                           <td class="remove"><a onClick="deletePerItem('.$value->post_id.')" class="cart">Xóa</a></td>
                        </tr>';
      }
      $xhtml .= '</tbody></table>';
      $xhtml .= '<table>
                  <tbody>
                     <tr class="summary">
                        <td class="price">
                           <span class="total">
                           <span class="label">Tổng</span>
                           <span class="h3"><strong>'.number_format($total, 0, ',', '.').'₫</strong></span>
                           </span>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <!--
               <div class="notices">
                  <div class="checkout-buttons clearfix">
                     <label for="note">Ghi chú</label>
                     <textarea id="note" name="note" rows="10" cols="50"></textarea>
                  </div>
               </div>
               -->
               <div class="cart-buttons">
                  <p class="cart-subtotal__note"><em>Phí vận chuyển, thuế, giảm giá sẽ được tính lúc thanh toán</em></p>
                  <div class="buttons clearfix">
                     <input type="button" id="checkout" onclick="window.location= '."'".url('cart/checkout')."'".'" class="btn" name="checkout" value="Thanh toán">
                     <input type="submit" id="update-cart" class="btn" name="update" value="Cập nhật">
                  </div>
               </div>';
   }else
   {
      $xhtml .= 'Bạn chưa chọn sản phẩm nào';
   }

?>

<div id="cart" class="page wrapper">
   <div class="fix-width">
      <header class="page-header">
         <h1 class="page-title">Giỏ Hàng</h1>
      </header>
      <div class="entry-content page-content clear">
         <!-- Begin empty cart -->
         <form action="<?php echo e(url('cart')); ?>" method="post" id="cartform">
            <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" /> 
            
            <?php echo $xhtml; ?>
               
               
                 
                  
            
            
         </form>
         <!-- End cart -->
      </div>
   </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien9.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>