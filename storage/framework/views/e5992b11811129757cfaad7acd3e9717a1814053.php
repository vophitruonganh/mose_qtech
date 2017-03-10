<?php $__env->startSection('content'); ?>
<div id="maincontainer">
   <div class="container">
      <div class="row">
         <!-- San pham moi nhat -->
         <div class="col-lg-9">
            <!-- Slider Start-->
            <section class="slider">
               <div class="c-carousel">
                  <div id="sliderindex5">
                     <?php $slider = isset($slider) ? $slider: []; ?>
                     <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <div>
                        <a href="<?php echo e($row['url']); ?>">
                           <img src="<?php echo e($row['image']); ?>" />
                        </a>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </div>
                  <div id="pager" class="sliderindex5pager">
                     <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <a href="#" class=""><span></span></a>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </div>
               </div>
            </section>
            <!-- Slider End-->
            <!-- Slider -->
            <?php
            /*
            {!! showWidget('Block left top content 1') !!}
            */
            ?>
            <!-- End -->
            <!-- Widget 33333 -->
            <?php
            /*
            {!! showWidget('Block left bottom content 1') !!}
            */
            ?>
            <!-- End Widget 33333 -->
            <section class="row mt30" id="featured">
               <?php
                  $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
               ?>
               <h1 class="heading1"><span class="maintext"><?php echo e($headingText); ?></span></h1>
               <ul class="thumbnails">
                  <?php $product_new = get_product_tax_limit($product_type_1,$product_slug_1,6); ?>
                  <?php $__currentLoopData = $product_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <li class="col-lg-4 col-sm-6">
                     <a class="prdocutname" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><?php echo e($product['product_title']); ?></a>
                     <div class="thumbnail">
                        <?php if($product['check_discount']): ?>
                        <span class="sale tooltip-test">Sale</span>
                        <?php endif; ?>
                        <!-- Add code html -->
                        <div class="image-thumbnail-preview">
                           <div class="image-thumbnail">
                                 <div class="centered">
                                    <a class="img-product" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                                       <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>"/>
                                    </a>
                                 </div>
                            </div>
                        </div>
                        <!-- End -->
                        <!--
                        <a class="img-product" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                           <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>"/>
                        </a>
                        -->
                        <div class="pricetag">
                           <span class="spiral"></span><a href="#" onclick="order(<?php echo e($product['product_id']); ?>)" class="productcart">Mua ngay</a>
                           <div class="price">
                              <div class="pricenew"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</div>
                              <?php if($product['price_old']): ?>
                              <div class="priceold"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</div>
                              <?php endif; ?>
                           </div>
                           <form id="formOrder<?php echo e($product['product_id']); ?>" action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post">
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                              <input type="hidden" name="quantity" value="1" />
                          </form>
                        </div>
                     </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
               </ul>
               <div class="row">
                  <div class="col-lg-12 pull-center">
                  </div>
               </div>
            </section>
            <!-- Nhom san pham -->
            <section class="row mt30" id="featured">
               <?php
                  $headingText = get_taxonomy_name($product_type_2,$product_slug_2);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
               ?>
               <h1 class="heading1"><span class="maintext"><?php echo e($headingText); ?></span></h1>
               <ul class="thumbnails">
                  <?php $products = get_product_tax_limit($product_type_2,$product_slug_2,6); ?>
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <li class="col-lg-4 col-sm-6">
                     <a class="prdocutname" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><?php echo e($product['product_title']); ?></a>
                     <div class="thumbnail">
                        <?php if($product['check_discount']): ?>
                        <span class="sale tooltip-test">Sale</span>
                        <?php endif; ?>
                        <!-- Add code html -->
                        <div class="image-thumbnail-preview">
                           <div class="image-thumbnail">
                                 <div class="centered">
                                    <a class="img-product" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                                       <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>"/>
                                    </a>
                                 </div>
                            </div>
                        </div>
                        <!-- End -->
                        <!--
                        <a class="img-product" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                           <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>"/>
                        </a>
                        -->
                        <div class="pricetag">
                           <span class="spiral"></span><a href="#" onclick="order(<?php echo e($product['product_id']); ?>)" class="productcart">Mua ngay</a>
                           <div class="price">
                              <div class="pricenew"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</div>
                              <?php if($product['price_old']): ?>
                              <div class="priceold"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</div>
                              <?php endif; ?>
                           </div>
                           <form id="formOrder<?php echo e($product['product_id']); ?>" action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post">
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                              <input type="hidden" name="quantity" value="1" />
                          </form>
                        </div>
                     </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
               </ul>
               <div class="row">
                  <div class="col-lg-12 pull-center">
                  </div>
               </div>
            </section>
         <!-- End -->
         </div>
         <!-- End -->
         <aside class="col-lg-3">
            <!-- Category-->
             <?php  $list_cat = get_taxonomy_product( 'product_category') ?>
             <?php if($list_cat): ?>
               <div class="sidewidt">
               <h2 class="heading2"><span>Danh Mục sản phẩm</span></h2>
               <ul class="nav nav-list categories">
               <?php $__currentLoopData = $list_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <li class="item  first">
                     <a href="<?php echo e(url('collections/'.$cat->taxonomy_slug)); ?>"><?php echo e($cat->taxonomy_name); ?></a>
                  </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
               </ul>
            </div>
               
             <?php endif; ?>

            <?php $product_new = (get_product_tax_limit($product_type_3,$product_slug_3,'5')) ?>
            <?php if($product_new): ?>
               <div class="sidewidt">
                  <div class="product-list clearfix ">
                     <?php
                        $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                        if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                     ?>
                     <h2 class="heading2"><?php echo e($headingText); ?></h2>
                     <ul class="bestseller">
                        <?php $__currentLoopData = $product_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                           <li>
                              <a class="productname" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                                 <img width="50" height="50"  src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>" />
                              </a>
                              <a class="productname" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><?php echo e($product['product_title']); ?></a>
                              <span class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span>
                              <?php if($product['price_old']): ?>
                              <p class="priceold"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</p>
                              <?php endif; ?>
                              <div class="clear"></div>
                           </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     </ul>
                  </div>
               </div>
            <?php endif; ?>
            
            <!-- BMust Have-->
            <?php $miniSlider = isset($mini_slider) ? $mini_slider: []; ?>
            <div class="sidewidt mt20">
               <div class="flexslider" id="mainsliderside">
                  <ul class="slides">
                     <?php $__currentLoopData = $miniSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <li>
                        <a href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>" ></a>
                     </li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
               </div>
            </div>
         </aside>
         <!--end right-->
      </div>
      <style>
         .c-carousel a{display:inline-block;}
      </style>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>