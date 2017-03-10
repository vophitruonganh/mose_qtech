<?php $__env->startSection('content'); ?>

<?php 
   $xhtml = '';
   $_xhtml = '';
   $total = 0; 
   $order_cart = decode_serialize (Cookie::get('cart'));
   if($order_cart){
      $xhtml .= '<table class="data-table cart-table" id="shopping-cart-table">'; 
      $xhtml .= '<thead>
                           <tr class="first last">
                              <th rowspan="1">&nbsp;</th>
                              <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                              <th colspan="1" class="a-center"><span class="nobr">Giá</span></th>
                              <th class="a-center" rowspan="1">Số lượng</th>
                              <th colspan="1" class="a-center">Tổng tiền</th>
                              <th class="a-center" rowspan="1">&nbsp;</th>
                           </tr>
                        </thead>'; 
      $xhtml .= '<tfoot>
                           <tr class="first last">
                              <td class="a-right last" colspan="50"><button onclick="window.location='."'".url('collections')."'".'" class="button btn-continue" title="Continue Shopping" type="button"><span><span>Tiếp tục mua hàng</span></span></button>
                                 <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span><span>Cập nhật giỏ hàng</span></span></button>
                                 
                              </td>
                           </tr>
                        </tfoot>';
      $xhtml .= '<tbody>';
      foreach($order_cart as $cart)
      {
         $title      = $cart['product_title'];
         $total_price = $cart['price'] * $cart['quantity'];
         $total      += $total_price;
         $xhtml .= '<tr class="first odd">
                              <td class="image" style="text-align: center;"><a class="product-image" title="'.$cart['product_title'].'" href="'.url('collections/'.$cart['product_slug']).'"><img width="75" height="75" alt="'.$cart['product_title'].'" src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'"></a></td>
                              <td>
                                 <h2 class="product-name"> <a href="'.url('collections/'.$cart['product_slug']).'">'.$cart['product_title'].'</a></h2>
                                 <p>'.$cart['variant_meta'].'</p>
                              </td>
                              <td class="a-right"><span class="cart-price"> <span class="price">'.number_format($cart['price'], 0, ',', '.').'₫</span> </span></td>
                              <td class="a-center movewishlist"><input  maxlength="12" class="input-text qty" type="number" min="0" name="quantity['.$cart['variant_id'].']" id="updates_752499" value="'.$cart['quantity'].'"></td>
                              <td class="a-right movewishlist"><span class="cart-price"> <span class="price">'.number_format($total_price, 0, ',', '.').'₫</span> </span></td>
                              <td class="a-center last" style="text-align: center;"><a style="float:initial !important;" class="button remove-item" title="Remove item" onclick="deletePerItem('.$cart['variant_id'].')"><span><span>Remove item</span></span></a></td>
                           </tr>';
      }
      $xhtml .= '</tbody></table>';
      $_xhtml .= '<div class="cart-collaterals row">
            <div class="totals col-sm-4 col-xs-12" style="float:right">
               <h3><span>Tổng tiền</span></h3>
               <div class="inner">
                  <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                     <colgroup>
                        <col>
                        <col width="1">
                     </colgroup>
                     <tfoot>
                        <tr>
                           <td colspan="1" class="a-left" style=""><strong>Tổng</strong></td>
                           <td class="a-right" style=""><strong><span class="price">'.number_format($total, 0, ',', '.').'₫</span></strong></td>
                        </tr>
                     </tfoot>
                  </table>
                  <ul class="checkout">
                     <li>
                        <button onclick="window.location='."'".url('cart/checkout')."'".'" name="checkout" class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Thanh toán</span></button>
                     </li>
                  </ul>
               </div>
               <!--inner--> 
            </div>
         </div>';
   }else {
      $xhtml .= 'Bạn chưa chọn sản phẩm nào';
   }

?>
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><strong>Giỏ hàng</strong></li>
         </ul>
      </div>
   </div>
</div>
<section class="main-container col1-layout">
   <div class="main container">
      <div class="col-main">
         <div class="cart wow bounceInUp animated animated" style="visibility: visible;">
            <div class="page-title">
               <h2>Giỏ hàng</h2>
            </div>
            <div class="table-responsive">
               <form action="<?php echo e(url('cart')); ?>" method="post">
               <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" /> 
                  <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                  <fieldset>
                        <?php echo $xhtml; ?>

                        
                        
                        
                           
                           
                  </fieldset>
               </form>
            </div>
         </div>
         <!-- BEGIN CART COLLATERALS -->
         <?php echo $_xhtml; ?>

         

         <div class="crosssel wow bounceInUp animated animated" style="visibility: visible;">
            <?php $products = get_product_tax_limit('', '',4 ) ?>
            <?php if($products): ?>
            <div class="new_title center">
               <h2>Sản phẩm mới</h2>
            </div>
            <div class="category-products">
               <ul id="crosssell-products-list" class="products-grid first odd  hidden_btn_cart">
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <li class="item col-md-3 col-sm-4 col-xs-6">
                     <div class="col-item">
                        <?php if($product['check_discount']): ?>
                        <div class="sale-label sale-top-right">-<?php echo e($product['percentage']); ?>%</div>
                        <?php endif; ?>
                        <div class="product-image-area"> 
                           <a class="product-image" title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"> 
                           <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" class="img-responsive" alt="<?php echo e($product['product_title']); ?>"> 
                           </a>
                        </div>
                        <div class="hidden_mobile  hidden-sm hidden-xs">
                           <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                              <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                              <input type="hidden" name="quantity" value="1" />
                              <div class="hover_fly">
                                 <a class="exclusive ajax_add_to_cart_button btn-cart add_to_cart" onclick="order(<?php echo e($product['product_id']); ?>)" title="Cho vào giỏ hàng">
                                    <div><i class="icon-shopping-cart"></i><span>Mua hàng</span></div>
                                 </a>
                                 <input type="hidden" name="variantId" value="1850772">
                              </div>
                              <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" class="over_bg"></a>
                           </form>
                        </div>
                        <div class="info">
                           <div class="info-inner">
                              <div class="item-title">
                                 <h3><a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h3>
                              </div>
                              <!--item-title-->
                              <div class="item-content">
                                 <div class="price-box">
                                    <p class="special-price"> 
                                       <span class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span> 
                                    </p>
                                    <?php if($product['price_old']): ?>
                                    <p class="old-price"> 
                                       <span class="price-sep">-</span> 
                                       <span class="price"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</span> 
                                    </p>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              <div class="button_mobile hidden-lg hidden-md">
                                 <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="product-actions-1195911" enctype="multipart/form-data">
                                    <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                    <input type="hidden" name="quantity" value="1" />
                                    <div class="actions">
                                       <button class="button btn-cart btn-cart add_to_cart" title="Cho vào giỏ hàng" type="submit"><span>Mua hàng</span></button>
                                    </div>
                                 </form>
                              </div>
                              <!--item-content--> 
                           </div>
                           <!--info-inner-->
                           <div class="clearfix"> </div>
                        </div>
                     </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

               </ul>
            </div>
         <?php endif; ?>
         </div>
      </div>
   </div>
</section>
 <script type="text/javascript">
  function order(i)
    {
         $("#form_order_"+i).submit();   
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>