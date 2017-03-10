<?php $__env->startSection('content'); ?>
     <div class="header-service">
         <div class="container">
            <div class="row">
              <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-3">
                <div class="content">
                  <h5 class="txt_u"><?php echo e($row['heading']); ?></h5>
                  <span class="cl_old"><?php echo e($row['text']); ?></span>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
         </div>
      </div>

<!--end header service-->

<div class="main-content index">
   <div class="container">
      <div class="row">
        <!-- Left -->
          <div class="col-lg-3 col-md-3 hidden-sm hidden-xs left-panel">
            <!-- Danh mục sản phẩm -->
            <?php $list_tax = get_taxonomy_product('product_category'); ?>
            <?php if( $list_tax ): ?>
            <div class="block bl_danhmucsanpham hidden-xs">
               <div class="block-title">
                  <h5>
                     <a href="collections/all">
                     <span>
                     <i class="fa fa-bars" aria-hidden="true"></i> &nbsp; Danh mục sản phẩm
                     </span>
                     </a>
                  </h5>
               </div>
               <div class="block-content">
                  <ul>
                    <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li class="level0 parent "><a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>"><i class="fa fa-caret-right" aria-hidden="true"></i><span><?php echo e($tax->taxonomy_name); ?></span></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
               </div>
            </div>
            <?php endif; ?>
            <!-- End Danh Mục Sản Phẩm -->
            <!-- Sản Phẩm Mới -->
            <?php
              $products = get_product_tax_limit($product_type_1,$product_slug_1,8);
              $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
              if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            <?php if( $products ): ?>
            <div class="sanphambanchay block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5 class="fw600"><span><?php echo e($headingText); ?></span></h5>
               </div>
               <div class="block-content bd_old">
                  <div id="slideshowproboxwrapper">
                     <div class="slideshowprobox_best_sale_products">
                        <ul class="menu">
                          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                           <li class="product-loop-list">
                              <div class="prd-loop-list">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 loop-img">
                                    <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                                    <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>">
                                    </a>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 loop-content">
                                    <p class="item-name"><a href="/benro-a1681tb0"><?php echo e($product['product_title']); ?></a></p>
                                    <p class="item-price cl_main fw600"><span><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span></p>
                                    <?php if( $product['price_old'] > 0 ): ?>
                                    <p class="item-price cl_old txt_line fs12"><span><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</span></p>
                                    <?php endif; ?>
                                 </div>
                              </div>
                           </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <!-- End Sản Phẩm Mới -->
            <!--
            <div class="hotrotructuyen block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5 class="fw600"><span>Hỗ trợ trực tuyến</span></h5>
               </div>
               <div class="block-content bd_old pd_10">
                  <div class="support_loop">
                     <p class="fw600">Hỗ trợ bán hàng</p>
                     <p>Hotline<span class="cl_main">1900 6750</span></p>
                     <div class="support_loop_content">
                        <div class="support_loop_img">
                           <img src="//bizweb.dktcdn.net/thumb/thumb/100/091/136/themes/137517/assets/skype.png?1468549824886" height="24" width="50" alt="Skype">
                        </div>
                        <div class="support_loop_chat">
                           <span class="support_loop_style">Chat ngay để nhận tư vấn</span>
                        </div>
                     </div>
                  </div>
                  <div class="support_loop">
                     <p class="fw600">Hỗ trợ bán hàng</p>
                     <p>Hotline<span class="cl_main">1900 6750</span></p>
                     <div class="support_loop_content">
                        <div class="support_loop_img">
                           <img src="//bizweb.dktcdn.net/thumb/thumb/100/091/136/themes/137517/assets/skype.png?1468549824886" height="24" width="50" alt="Skype">
                        </div>
                        <div class="support_loop_chat">
                           <span class="support_loop_style">Chat ngay để nhận tư vấn</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            -->
            <div class="fanpage_facebook block mg_bt mg_top hidden-xs">
               <div class="block-content">
                  <div class="fb-page" data-href="<?php echo e($facebook['url']); ?>" data-tabs="timeline" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                     <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/MOSEVN">
                           <a href="https://www.facebook.com/MOSEVN">Facebook</a>
                        </blockquote>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tin tức -->
            <?php
              $posts = get_post_cat_limit($post_slug_1,3);
              $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
              if( $headingText == '' ) $headingText = 'Bài viết Mới';
            ?>
            <?php if( $posts ): ?>
            <div class="news_blogs block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5><a href="tin-tuc"><span class="fw600"><?php echo e($headingText); ?></span></a></h5>
               </div>
               <div class="block-content bd_old pd_10">
                  <div id="owl-news-blog" class="owl-carousel owl-theme">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php
                      $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
                      $excerpt = !empty($post->post_excerpt) ? get_excerpt($post->post_excerpt,30) : get_excerpt($post->post_content,30);
                    ?>
                    <div class="item blog-post">
                        <div class="blog-image">
                           <a href="<?php echo e(url($post->post_slug)); ?>"><img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>"/></a>
                        </div>
                        <div>
                           <h5 class="fw600"><a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></h5>
                           <p class="cl_old fs13">
                              <span><i class="fa fa-user" aria-hidden="true"></i> <?php echo e($username); ?></span> &nbsp;
                              <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo e(date('d/m/Y',$post->post_date)); ?></span>
                           </p>
                           <p class="cl_old"><?php echo e($excerpt); ?></p>
                        </div>
                     </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <!-- End Tin Tức -->
        </div>
        <!-- End -->
        
        <!-- Right -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 right-panel">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide ">
                  <div id="magik-slideshow" class="magik-slideshow">
                     <div id="owl-slide" class="owl-carousel">
                        <?php $slider = isset($slider) ? $slider: []; ?>
                         <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                         <div class="item"><a href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>"></a></div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     </div>
                  </div>
               </div>
               <!-- Sản Phẩm Mới -->
               <?php
                  $products = get_product_tax_limit($product_type_2,$product_slug_2,12);
                  $headingText = get_taxonomy_name($product_type_2,$product_slug_2);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                <?php if( $products ): ?>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block pd_0 mg_bt sanphambankhuyenmai" style="margin-top: 20px;">
                  <div class="block-title  pd_bt_10">
                     <h5 class="fw600"><span><a href="<?php echo e(url('collections/'.$product_slug_2)); ?>"><?php echo e($headingText); ?></a></span></h5>
                  </div>
                  <div class="block-content prd-loop">
                     <div id="promo-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 row">
                            <?php
                              $i = 0;
                              $count = count($products);
                            ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if( $i%2 == 0 ): ?>
                           <div class="item">
                            <?php endif; ?>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pd0">
                                 <div class="prd-loop-grid" style="margin: 10px 0;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-img">
                                       <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" title="<?php echo e($product['product_title']); ?>" alt="<?php echo e($product['product_title']); ?>"></a>
                                       <div class="view_buy hidden_xs">
                                          <div class="actions">
                                             <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <button class="btn btn-buy btn-cus add_to_cart" onclick="order(<?php echo e($product['product_id']); ?>)" title="Mua ngay"><span>Mua ngay</span></button>
                                             </form>
                                          </div>
                                          <button class="btn btn-view btn-cus" onclick="location.href='<?php echo e(url('collections/'.$product['product_slug'])); ?>'" title="Xem sản phẩm"><span>Xem chi tiết</span></button>
                                       </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-content">
                                       <p class="item-name txt_center"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></p>
                                       <p class="prc">
                                          <span class="item-price cl_main fw600"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span>
                                          <?php if( $product['price_old'] > 0 ): ?>
                                          <span class="item-price cl_old txt_line"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</span>
                                          <?php endif; ?>
                                       </p>
                                    </div>
                                    <?php if($product['check_discount']): ?>
                                    <div class="on_sale">
                                       <span>-<?php echo e($product['percentage']); ?>%</span>
                                    </div>
                                    <?php endif; ?>
                                 </div>
                              </div>
                            <?php $i++; ?>
                            <?php if( $i%2==0): ?>
                            </div>
                            <?php elseif( $count == $i ): ?>
                            </div>
                            <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
               <!-- End Sản Phẩm Mới -->
               <div class="col-lg-6 col-md-6 hidden-sm hidden-xs block-quangcao bl-qc-1">
                  <a href="<?php echo e($firstBanner['url']); ?>"><img src="<?php echo e($firstBanner['image']); ?>" /></a>
               </div>
               <div class="col-lg-6 col-md-6 hidden-sm hidden-xs block-quangcao bl-qc-2">
                  <a href="<?php echo e($secondBanner['url']); ?>"><img src="<?php echo e($secondBanner['image']); ?>" /></a>
               </div>
                <!-- Khuyến Mãi -->
                <?php
                  $products = get_product_tax_limit($product_type_3,$product_slug_3,12);
                  $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                <?php if( $products ): ?>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block pd_0 mg_bt mg_top sanphammoi">
                  <div class="block-title pd_bt_10">
                     <h5 class="fw600"><span><a href="<?php echo e(url('collections/'.$product_slug_3)); ?>"><?php echo e($headingText); ?></a></span></h5>
                  </div>
                  <div class="block-content prd-loop">
                     <div id="new-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">
                            <?php
                              $i = 0;
                              $count = count($products);
                            ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if( $i%2 == 0 ): ?>
                           <div class="item">
                            <?php endif; ?>
                              <div class="prd-loop-grid" style="margin: 10px 0;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-img">
                                       <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" title="<?php echo e($product['product_title']); ?>" alt="<?php echo e($product['product_title']); ?>"></a>
                                       <div class="view_buy hidden_xs">
                                          <div class="actions">
                                             <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <button class="btn btn-buy btn-cus add_to_cart" onclick="order(<?php echo e($product['product_id']); ?>)" title="Mua ngay"><span>Mua ngay</span></button>
                                             </form>
                                          </div>
                                          <button class="btn btn-view btn-cus" onclick="location.href='<?php echo e(url('collections/'.$product['product_slug'])); ?>'" title="Xem sản phẩm"><span>Xem chi tiết</span></button>
                                       </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-content">
                                       <p class="item-name txt_center"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></p>
                                       <p class="prc">
                                          <span class="item-price cl_main fw600"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span>
                                          <?php if( $product['price_old'] > 0 ): ?>
                                          <span class="item-price cl_old txt_line"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</span>
                                          <?php endif; ?>
                                       </p>
                                    </div>
                                    <?php if($product['check_discount']): ?>
                                    <div class="on_sale">
                                       <span>-<?php echo e($product['percentage']); ?>%</span>
                                    </div>
                                    <?php endif; ?>
                                 </div>
                            <?php $i++; ?>
                            <?php if( $i%2==0): ?>
                            </div>
                            <?php elseif( $count == $i ): ?>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
               <!-- End Khuyến Mãi -->
               <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs block-quangcao bl-qc-3">
                  <a href="<?php echo e($thirdBanner['url']); ?>"><img src="<?php echo e($thirdBanner['image']); ?>"/></a>
               </div>

                <!-- Sản Phẩm Xem Nhiều -->
                <?php
                  $products = get_product_tax_limit($product_type_4,$product_slug_4,12);
                  $headingText = get_taxonomy_name($product_type_4,$product_slug_4);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                <?php if( $products ): ?>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block pd_0 mg_bt mg_top phukienbankem">
                  <div class="block-title pd_bt_10">
                     <h5 class="fw600"><span><a href="<?php echo e(url('collections/'.$product_slug_4)); ?>"><?php echo e($headingText); ?></a></span></h5>
                  </div>
                  <div class="block-content prd-loop">
                     <div id="sub-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">
                            <?php
                              $i = 0;
                              $count = count($products);
                            ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if( $i%3 == 0 ): ?>
                           <div class="item">
                            <?php endif; ?>
                              <div class="prd-loop-list">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 loop-img">
                                    <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                                    <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" title="<?php echo e($product['product_title']); ?>" alt="<?php echo e($product['product_title']); ?>">
                                    </a>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 loop-content">
                                    <p class="item-name"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></p>
                                    <p class="item-price cl_main fw600"><span><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span></p>
                                    <?php if( $product['price_old'] > 0 ): ?>
                                    <p class="item-price cl_old txt_line fs12"><span><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</span></p>
                                    <?php endif; ?>
                                 </div>
                              </div>
                           <?php $i++; ?>
                            <?php if( $i%3==0): ?>
                            </div>
                            <?php elseif( $count == $i ): ?>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                     </div>
                  </div>
               </div>
                <?php endif; ?>
                <!-- End Sản Phẩm Xem Nhiều -->
            </div>
<!-- End -->
         </div>
      </div>
   </div>
   <script>
      $(document).ready(function() {
         $("#owl-slide").owlCarousel({
             slideSpeed : 300,
             paginationSpeed : 400,
             pagination: false,
             itemsCustom : [
                 [0, 1],
                 [450, 1],
                 [600, 1],
                 [700, 1],
                 [1000, 1],
                 [1200, 1],
                 [1400, 1],
                 [1600, 1]
             ],
             autoPlay: true
         });
      });
   </script>
</div>
        <!-- End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien7.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>