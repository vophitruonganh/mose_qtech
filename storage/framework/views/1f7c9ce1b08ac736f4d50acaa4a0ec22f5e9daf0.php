<?php $__env->startSection('content'); ?>
<?php 
   $xhtml = '';
   $xhtmlCart = '';
   $total = 0; 
   $order_cart = decode_serialize (Cookie::get('cart'));
   if($order_cart){
      $xhtml .= '<section class="row">
                <form action="'.url('cart').'" method="post" novalidate>
                    <input type="hidden" name="_token" value="'.csrf_token().'" />
                    <div class="col-xs-12">
                        <div class="table table-responsive cart-summary">
                            <table>
                                <thead>
                                <tr>
                                    <td colspan="2">Product</td>
                                    <td class="width16">Options</td>
                                    <td class="width16">Quantity</td>
                                    <td class="text-right width16">Subtotal</td>
                                </tr>
                                </thead>
                                <tbody>';
      foreach($order_cart as $cart)
      {
           $total_price = $cart['price'] * $cart['quantity'];
           $total      += $total_price;
           $xhtml .= '<tr>
                          <td>
                              <a href="#">
                                  <img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'" alt="Shop item">
                              </a>
                          </td>
                          <td>
                              <h4><a href="'.url('collections/'.$cart['product_slug']).'">'.$cart['product_title'].'</a></h4>
                              <span class="price">'.number_format($cart['price'], 0, ',', '.') .'₫</span>
                              <br><br>
                              <a onclick="deletePerItem('.$cart['variant_id'].')">Remove</a>
                          </td>
                          <td>
                              <p class="features">'.$cart['variant_meta'].'</p>
                          </td>
                          <td>
                              <input class="" name="quantity['.$cart['variant_id'].']" id="quantity" type="number" value="'.$cart['quantity'].'">
                          </td>
                          <td class="text-right">
                              <strong>'.number_format($total_price, 0, ',', '.') .'₫</strong>
                          </td>
                      </tr>';
           
      }
      $xhtml .='</tbody>
                          </table>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4 form-inline">
                      <button type="submit" name="update" class="btn btn-primary btn-small">Cập nhật giỏ hàng</button>
                  </div>
                  <div class="col-sm-6 col-md-4 col-md-offset-4">
                      <div class="table">
                          <table class="price-calc">
                              <tbody>
                                  <tr>
                                      <th>Subtotal</th>
                                      <td class="text-right">
                                          <strong>'.number_format($total, 0, ',', '.') .'₫</strong>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="col-xs-12">
                      <button type="button" class="btn btn-default pull-left" onclick="window.location= '."'".url('collections')."'".'">Tiếp tục mua hàng</button>
                      <button type="button" class="btn btn-primary pull-right" onclick="window.location= '."'".url('cart/checkout')."'".'">Thanh toán</button>
                  </div>
              </form>
            </section>';
   }else{
      $xhtml.=' <div class="row shop-cart-empty">
              <div class="col-xs-12">

                  <h1 class="strong-header">
                      Shopping cart<br>
                      Is empty
                  </h1>
                  <p>
                      You have no items in your shopping cart.
                  </p>
                  <a href="'.url('collections').'" class="btn btn-primary">Tiếp tục mua hàng</a>
              </div>
          </div>';
   }
 ?>
      <div class="full-width section-emphasis-1 page-header">
          <div class="container">
              <header class="row">
                  <div class="col-md-12">
                      <h1 class="strong-header pull-left">
                          Shopping cart
                      </h1>
                      <!-- BREADCRUMBS -->
                      <ul class="breadcrumbs list-inline pull-right">
                          <li><a href="index.html">Home</a></li><!--
                      --><li><a href="03-shop-products.html">Shop</a></li><!--
                      --><li>Shopping cart</li>
                      </ul>
                      <!-- !BREADCRUMBS -->
                  </div>
              </header>
          </div>
      </div><!-- !full-width -->
      <div class="container">
          <!-- !FULL WIDTH -->
          <?php echo $xhtml; ?>

          
         
      </div>
   
  </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.decima_store.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>