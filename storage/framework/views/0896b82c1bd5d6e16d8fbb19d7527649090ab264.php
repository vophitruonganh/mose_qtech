<?php $__env->startSection('content'); ?>
<!-- Slider -->
<div id="magik-slideshow" class="magik-slideshow" style="margin-top:0px;">
   <div class="fvc">
      <div id="coverage-slider">
         <?php $slider = isset($slider) ? $slider: []; ?>
         <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
         <div class="item">
            <a href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>" /></a>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
   </div>
</div>
<!-- end Slider --> 
<section class="main-container col1-layout home-content-container">
   <div class="container">
      <div class="std row">
         <!-- Right -->
         <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-push-3 col-lg-push-3 ">
            <div class="best-seller-pro">
               <?php $products = get_product_tax_limit($product_type_1,$product_slug_1,'24'); ?>
               <?php if($products): ?>
               <div class="slider-items-products">
                  <div class="new_title center">
                     <?php
                        $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
                        if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                     ?>
                     <h2><?php echo e($headingText); ?></h2>
                  </div>
                  <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                     <div class="slider-items slider-width-col4">
                        <?php $i=0; ?>
                        <?php $count =count($products); ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if( $i%8==0 ): ?>
                            <div class="product-item-slide  multi-columns-row">
                            <?php endif; ?>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 full_width480">
                                 <div class="col-item">
                                    <?php if($product['check_discount']): ?>
                                    <div class="sale-label sale-top-right">-<?php echo e($product['percentage']); ?>%</div>
                                    <?php endif; ?>
                                    <div class="product-image-area"> 
                                       <a class="product-image" title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"> 
                                       <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" class="img-responsive" alt="<?php echo e($product['product_title']); ?>" /> 
                                       </a>
                                    </div>
                                    <div class="hidden_mobile  hidden-sm hidden-xs">
                                       <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                         <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                         <input type="hidden" name="quantity" value="1" />
                                          <div class="hover_fly">
                                             <a class="exclusive ajax_add_to_cart_button btn-cart add_to_cart" onclick="order(<?php echo e($product['product_id']); ?>)" title="Cho vào giỏ hàng">
                                                <div><i class="icon-shopping-cart"></i><span>Mua hàng</span></div>
                                             </a>
                                             <input type="hidden" name="variantId" value="1850772" />
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
                                             <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                                <div class="actions">
                                                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                   <input type="hidden" name="quantity" value="1" />
                                                   <button class="button btn-cart btn-cart add_to_cart" title="Cho vào giỏ hàng" type="button"><span>Mua hàng</span></button>
                                                </div>
                                             </form>
                                          </div>
                                          <!--item-content--> 
                                       </div>
                                       <!--info-inner-->
                                       <div class="clearfix"></div>
                                    </div>
                                 </div>
                              </div>
                            <?php $i++; ?>
                            <?php if( $i%8==0): ?>
                            </div>
                            <?php elseif( $count == $i ): ?>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <!-- </div> -->
                     </div>
                  </div>
               </div>
               <?php endif; ?>
            </div> <!-- best seller -->
            <div class="banner_center_index">
               <?php $first_banner = isset($firstBanner) ? $firstBanner : []; ?>
               <?php if( count($first_banner) > 0 ): ?>
               <a href="<?php echo e($first_banner['url']); ?>"><img src="<?php echo e($first_banner['image']); ?>" ></a>
               <?php endif; ?>
            </div>
            <div class="best-seller-pro">
               <?php $products = get_product_tax_limit($product_type_2,$product_slug_2,'24'); ?>
               <?php if($products): ?>
               <div class="slider-items-products">
                  <div class="new_title center">
                     <?php
                        $headingText = get_taxonomy_name($product_type_2,$product_slug_2);
                        if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                     ?>
                     <h2><?php echo e($headingText); ?></h2>
                  </div>
                  <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                     <div class="slider-items slider-width-col4">
                        <?php $i=0; ?>
                        <?php $count =count($products); ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if( $i%8==0 ): ?>
                            <div class="product-item-slide  multi-columns-row">
                            <?php endif; ?>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 full_width480">
                                 <div class="col-item">
                                    <?php if($product['check_discount']): ?>
                                    <div class="sale-label sale-top-right">-<?php echo e($product['percentage']); ?>%</div>
                                    <?php endif; ?>
                                    <div class="product-image-area"> 
                                       <a class="product-image" title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"> 
                                       <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" class="img-responsive" alt="<?php echo e($product['product_title']); ?>" /> 
                                       </a>
                                    </div>
                                    <div class="hidden_mobile  hidden-sm hidden-xs">
                                       <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                         <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                         <input type="hidden" name="quantity" value="1" />
                                          <div class="hover_fly">
                                             <a class="exclusive ajax_add_to_cart_button btn-cart add_to_cart" onclick="order(<?php echo e($product['product_id']); ?>)" title="Cho vào giỏ hàng">
                                                <div><i class="icon-shopping-cart"></i><span>Mua hàng</span></div>
                                             </a>
                                             <input type="hidden" name="variantId" value="1850772" />
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
                                             <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                                <div class="actions">
                                                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                   <input type="hidden" name="quantity" value="1" />
                                                   <button class="button btn-cart btn-cart add_to_cart" title="Cho vào giỏ hàng" type="button"><span>Mua hàng</span></button>
                                                </div>
                                             </form>
                                          </div>
                                          <!--item-content--> 
                                       </div>
                                       <!--info-inner-->
                                       <div class="clearfix"></div>
                                    </div>
                                 </div>
                              </div>
                            <?php $i++; ?>
                            <?php if( $i%8==0): ?>
                            </div>
                            <?php elseif( $count == $i ): ?>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <!-- </div> -->
                     </div>
                  </div>
               </div>
               <?php endif; ?>
            </div> <!-- best seller -->
         </div>
         <!-- End right -->
         <!-- Left -->
         <div class="col-left sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12 col-md-pull-9 col-lg-pull-9">
            <?php $list_cat = get_taxonomy_product('product_category') ?>
            <?php if($list_cat): ?>
            <div class="box_collection_pr">
               <div class="title_st">
                  <h2>Danh mục sản phẩm</h2>
                  <span class="arrow_title visible-md visible-md"></span>
                  <div class="show_nav_bar hidden-lg hidden-md"></div>
               </div>
               <div class="list_item">
                  <ul>
                    <?php $__currentLoopData = $list_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li> <a href="<?php echo e(url('collections/'.$cat->taxonomy_slug)); ?>"><?php echo e($cat->taxonomy_name); ?></a> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
               </div>
            </div>
            <?php endif; ?>

            <?php $products = get_product_tax_limit($product_type_3,$product_slug_3,'5' ); ?>
            <?php if($products): ?>
            <div class="popular-posts widget widget__sidebar stl_list_item">
               <div class="title_st">
                  <?php
                     $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                     if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                  ?>
                  <h2><?php echo e($headingText); ?></h2>
                  <span class="arrow_title"></span>
               </div>
               <div class="widget-content">
                  <ul class="posts-list unstyled clearfix">
                     <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <li>
                        <figure class="featured-thumb" style="width:42%">
                           <a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                           <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>" style=" width: 100px;">
                           </a> 
                        </figure>
                        <!--featured-thumb-->
                        <h3><a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h3>
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
                     </li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
               </div>
               <!--widget-content--> 
            </div>
            <?php endif; ?>


         </div>
         <!-- End left -->
      </div> <!-- std row -->
   </div> <!-- end container -->
</section>
<!-- Bán chạy -->
<section class="featured-pro bg_spc">
<?php $products = get_product_tax_limit($product_type_4,$product_slug_4,'12'); ?>
   <?php if($products): ?>
   <div class="slider-items-products container">
      <div class="new_title center">
         <?php
            $headingText = get_taxonomy_name($product_type_4,$product_slug_4);
            if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
         ?>
         <h2><?php echo e($headingText); ?></h2>
         <span></span>
      </div>
      <div id="featured-slider" class="product-flexslider hidden-buttons block_btn_cart">
         <div class="slider-items slider-width-col4">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                 <div class="item">
               <div class="col-item">
                  <?php if($product['check_discount']): ?>
                 <div class="sale-label sale-top-right">-<?php echo e($product['percentage']); ?>%</div>
                 <?php endif; ?>
                  <div class="product-image-area"> 
                     <a class="product-image" title="<?php echo e($product['product_title']); ?>" href="<?php echo e($product['product_title']); ?>"> 
                     <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" class="img-responsive" alt="<?php echo e($product['product_title']); ?>" /> 
                     </a>
                  </div>
                  <div class="hidden_mobile  hidden-sm hidden-xs">
                     <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <input type="hidden" name="quantity" value="1" />
                        <div class="hover_fly">
                           <a class="exclusive ajax_add_to_cart_button btn-cart add_to_cart" onclick="order(<?php echo e($product['product_id']); ?>)" title="Cho vào giỏ hàng">
                              <div><i class="icon-shopping-cart"></i><span>Mua hàng</span></div>
                           </a>
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
                           <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                              <div class="actions">
                                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                  <input type="hidden" name="quantity" value="1" />
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
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
         </div>
      </div>
   </div>
   <?php endif; ?>
</section>
<!-- End bán chạy -->
<!-- Xem nhiều -->
<section class="middle-slider container">
   <div class="row">
      <?php $products = get_product_tax_limit($product_type_5,$product_slug_5,'12'); ?>
      <?php if($products): ?>
      <div class="col-md-4 col-sm-4">
         <div class="new_title center">
            <?php
               $headingText = get_taxonomy_name($product_type_5,$product_slug_5);
               if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            <h2><?php echo e($headingText); ?></h2>
         </div>
         <div class="widget-content" id="shoes-slider">
            <ul class="posts-list slider-items-products unstyled clearfix slider-items">
              <?php $i=0; ?>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              
              <?php if($i%2==0): ?>    
              <li class="product-item-slide">
              <?php endif; ?>
                  <div class="box_width">
                    <figure class="featured-thumb">
                      <a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                        <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>" style=" width: 100px;">
                      </a> 
                    </figure>
                    <!--featured-thumb-->
                      <h3><a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h3>
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
              <?php $i++; ?>
              <?php if($i%2==0): ?>    
              </li>
              <?php endif; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </ul>
         </div>
      </div>
      <?php endif; ?>

      <?php $products = get_product_tax_limit($product_type_6,$product_slug_6,'13'); ?>
      <?php if($products): ?>
      <div class="col-md-4 col-sm-4">
         <div class="new_title center">
            <?php
               $headingText = get_taxonomy_name($product_type_6,$product_slug_6);
               if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            <h2><?php echo e($headingText); ?></h2>
         </div>
         <div class="widget-content" id="shoes-slider">
            <ul class="posts-list slider-items-products unstyled clearfix slider-items">
              <?php $i=0; ?>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              
              <?php if($i%2==0): ?>    
              <li class="product-item-slide">
              <?php endif; ?>
                  <div class="box_width">
                    <figure class="featured-thumb">
                      <a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                        <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>" style=" width: 100px;">
                      </a> 
                    </figure>
                    <!--featured-thumb-->
                      <h3><a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h3>
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
              <?php $i++; ?>
              <?php if($i%2==0): ?>    
              </li>
              <?php endif; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </ul>
         </div>
      </div>
      <?php endif; ?>

      <?php $products = get_product_tax_limit($product_type_7,$product_slug_7,'7'); ?>
      <?php if($products): ?>
      <div class="col-md-4 col-sm-4">
         <div class="new_title center">
            <?php
               $headingText = get_taxonomy_name($product_type_7,$product_slug_7);
               if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            <h2><?php echo e($headingText); ?></h2>
         </div>
         <div class="widget-content" id="shoes-slider">
            <ul class="posts-list slider-items-products unstyled clearfix slider-items">
              <?php $i=0; ?>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              
              <?php if($i%2==0): ?>    
              <li class="product-item-slide">
              <?php endif; ?>
                  <div class="box_width">
                    <figure class="featured-thumb">
                      <a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                        <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>" style=" width: 100px;">
                      </a> 
                    </figure>
                    <!--featured-thumb-->
                      <h3><a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h3>
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
              <?php $i++; ?>
              <?php if($i%2==0): ?>    
              </li>
              <?php endif; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </ul>
         </div>
      </div>
      <?php endif; ?>


   </div>
</section>
<!-- End xem nhiều -->
<!-- Tin tức -->
<section class="latest-blog container">
<?php
   $posts = get_post_cat_limit($post_slug_1,3);
   $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
   if( $headingText == '' ) $headingText = 'Bài viết Mới';
?>
<?php if($posts): ?>
   <div class="col-xs-12">
      <div class="new_title center">
         <h2><span><?php echo e($headingText); ?></span></h2>
      </div>
   </div>
   <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php 
      $user_name = !empty($post->user_fullname) ? $post->user_fullname : $post->user_email;
      $excerpt = !empty($post->post_excerpt) ? get_excerpt($post->post_excerpt,30) : get_excerpt($post->post_content,30) ;
    ?>
   <div class="col-xs-12 col-sm-4">
      <div class="blog-img">
         <a href="<?php echo e(url($post->post_slug)); ?>">
         <img alt="<?php echo e($post->post_title); ?>" src="<?php echo e(get_image_url($post->post_image)); ?>">
         </a>
         <div class="mask"> <a class="info" href="<?php echo e(url($post->post_slug)); ?>">Xem thêm</a> </div>
      </div>
      <div class="box_content_blog">
         <h2><a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></h2>
         
         <div class="post-date"><i class="fa fa-calendar"></i> <?php echo e(date('d/m/Y',$post->post_date)); ?> - <i class="fa fa-user"></i> <?php echo e($user_name); ?> <?php if($post->comment_status == 'yes'): ?>- <i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="<?php echo e(url($post->post_slug)); ?>"></span>  bình luận  <?php endif; ?></div>
        
         <p>
         <p style="text-align: justify;"><?php echo e($excerpt); ?></p>
         </p>
         <a style="font-weight: normal;font-size: 13px;" href="<?php echo e(url($post->post_slug)); ?>">Đọc thêm <i class="fa fa-angle-right"></i></a>
      </div>
   </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>
</section>
<!-- End tin tức -->

<script type="text/javascript">
   function order(i)
     {
          $("#form_order_"+i).submit();   
     }
</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1136963499687042";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(".comments").on('click', function() {
    var btn = $(this);
    // alert($(btn).attr('slug')) 
   $(".fb-comments-"+ $(btn).attr('slug')).toggle();

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>