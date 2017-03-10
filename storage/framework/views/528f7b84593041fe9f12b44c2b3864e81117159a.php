<?php $__env->startSection('content'); ?>
         <?php echo $__env->make('frontend.shop.includes.main_slide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         <div class="clearfix"></div>
         <div class="container_fullwidth">
            <div class="container">
               <!-- Hot product -->
               <?php
                  $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
               ?>
               <div class="hot-products">
                  <h3 class="title"><strong><?php echo e($headingText); ?></strong> </h3>
                  <div class="control"><a id="prev_hot" class="prev" href="#">&lt;</a><a id="next_hot" class="next" href="#">&gt;</a></div>
                  <ul id="hot">
                     <?php
                        $product1= get_product_tax_limit($product_type_1,$product_slug_1,16);
                        $count_check = count($product1);
                        $i = 0;
                     ?>
                     <?php $__currentLoopData = $product1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <?php if($i%4==0): ?>
                     <li>
                        <div class="row">
                     <?php endif; ?>
                           <div class="col-md-3 col-sm-6">
                              <div class="products">
                              <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                <input type="hidden" name="quantity" value="1" />
                                 <?php if($product['check_discount']): ?>
                                 <div class="offer">- %<?php echo e($product['percentage']); ?></div>
                                 <?php endif; ?>
                                 <div class="thumbnail"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>"></a></div>
                                 <div class="productname"><?php echo e($product['product_title']); ?></div>
                                 <h4 class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</h4>
                                 <div class="button_group"><button class="button add-cart" type="button" onclick="order(<?php echo e($product['product_id']); ?>)">Add To Cart</button></div>
                                 </form>
                              </div>
                           </div>
                     <?php $i++; ?>
                     <?php if($i%4==0): ?>
                        </div>
                     </li>
                     <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                     <!-- Đóng div khi tổng sp ko chia hết cho 4 -->
                     <?php if($count_check%4!=0): ?>
                        </div>
                     </li>
                     <?php endif; ?>
                     <!-- end  -->
                  </ul>
               </div>
               <div class="clearfix"></div>
               <!-- End hot product -->

               <!-- Featured product -->
               <?php
                  $headingText = get_taxonomy_name($product_type_2,$product_slug_2);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                  $i=0;
               ?>
               <div class="featured-products">
                  <h3 class="title"><strong><?php echo e($headingText); ?> </strong> </h3>
                  <div class="control"><a id="prev_featured" class="prev" href="#">&lt;</a><a id="next_featured" class="next" href="#">&gt;</a></div>
                  <ul id="featured">
                  <?php $product2 = get_product_tax_limit($product_type_2,$product_slug_2,16); ?>
                  <?php $__currentLoopData = $product2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <?php if($i%4==0): ?>
                     <li>
                        <div class="row">
                     <?php endif; ?>
                           <div class="col-md-3 col-sm-6">
                              <div class="products">
                              <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                <input type="hidden" name="quantity" value="1" />
                                 <?php if($product['check_discount']): ?>
                                 <div class="offer">- %<?php echo e($product['percentage']); ?></div>
                                 <?php endif; ?>
                                 <div class="thumbnail"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>"></a></div>
                                 <div class="productname"><?php echo e($product['product_title']); ?></div>
                                 <h4 class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</h4>
                                 <div class="button_group"><button class="button add-cart" type="button" onclick="order(<?php echo e($product['product_id']); ?>)">Add To Cart</button></div>
                                 </form>
                              </div>
                           </div>
                     <?php $i++; ?>
                     <?php if($i%4==0): ?>
                        </div>
                     </li>
                     <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                     <!-- Đóng div khi tổng sp ko chia hết cho 4 -->
                     <?php if($count_check%4!=0): ?>
                        </div>
                     </li>
                     <?php endif; ?>
                     <!-- end  -->

                  </ul>
               </div>
               <!-- End featured product -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.shop.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>