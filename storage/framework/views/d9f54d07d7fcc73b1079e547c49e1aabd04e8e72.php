<?php $__env->startSection('content'); ?>
    <div id="trangchu">
         <div id="slideshow">
            <div class="slider-container ">
               <ul id="sliderlayer" class="slides clearfix">
                  <?php $slider = isset($slider) ? $slider: []; ?>
                  <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <li>
                     <a href="<?php echo e($row['url']); ?>" class="slide-link">
                        <img class="img-responsive" alt="Slider index" src="<?php echo e($row['image']); ?>" />
                     </a>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
               </ul>
            </div>
         </div>
      </div>
      <!-- Dịch vụ -->
      <div class="section primary-section dichvu-bg" id="dichvu">
         <div class="container">
            <div class="title">
               <h2><?php echo e($service['heading']); ?></h2>
               <p><?php echo e($service['description']); ?></p>
            </div>
            <div class="row">
               <?php
                  unset($service['heading']);
                  unset($service['description']);
               ?>
               <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
               <div class="col-xs-12 col-sm-4">
                  <div class="centered service">
                     <div class="circle-border zoom-in">
                        <img class="img-circle" src="<?php echo e($row['image']); ?>" alt="<?php echo e($row['text']); ?>">
                     </div>
                     <h3><?php echo e($row['text']); ?></h3>
                     <p><?php echo e($row['content']); ?></p>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
         </div>
      </div>
     <!-- End Dịch vụ -->

      <!-- Dự án start -->
      <div class="section secondary-section duan-bg" id="duan">
      <?php $products = get_product_tax_limit('','',4 ) ?>
         <?php if($products): ?>
         <div class="container">
            <div class=" title">
               <h2>Sản phẩm</h2>
               <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum gravida pharetra. Morbi interdum dapibus dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
            </div>
            <div id="single-project">
               <div class="row">
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="col-xs-12 col-sm-6 col-md-3">
                     <div class="product-loop">
                        <!-- Add code html -->
                        <div class="product-thumbnail-preview">
                           <div class="product-thumbnail">
                                 <div class="centered">
                                    <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                                       <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>">
                                    </a>
                                 </div>
                            </div>
                        </div>
                        <!-- End -->
                        <!--
                        <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                        <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>">
                        </a>
                        -->
                        <div class="product-info clearfix">
                           <h3><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h3>
                           <p class="price ">
                              <span class="new-price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span>
                           </p>
                           <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post">
                              <!-- Begin product options -->
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                              <input id="quantity" type="hidden" name="quantity" value="1" class="tc item-quantity">
                              <button type="submit" class="add-to-cart btn-fix" name="add">Giỏ Hàng</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

               </div>
            </div>
            <div class="viewmore text-center">
               <a href="<?php echo e(url('collections')); ?>">Xem thêm</a>
            </div>
         </div>
         <?php endif; ?>
      </div>
      <!-- Dự án end -->

      <!-- Nhân Sự -->
      <div class="section primary-section gioithieu-bg" id="gioithieu">
         <div class="container">
            <div class="title">
               <h2><?php echo e($personnel['heading']); ?></h2>
               <p><?php echo e($personnel['text']); ?></p>
            </div>
            <div class="row team">
               <?php
                  unset($personnel['heading']);
                  unset($personnel['text']);
               ?>
               <?php $__currentLoopData = $personnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
               <div class="col-xs-12 col-sm-6 col-md-3 mb10">
                  <div class="thumbnail">
                     <img src="<?php echo e($row['image']); ?>" alt="<?php echo e($row['name']); ?>">
                     <div class="thumbnail-info">
                        <p><?php echo e($row['name']); ?></p>
                        <span><?php echo e($row['job']); ?></span>
                     </div>
                     <ul class="social">
                        <li>
                           <a href="<?php echo e($row['facebook']); ?>" target="_blank">
                           <span class="fa fa-facebook-square"></span>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo e($row['twitter']); ?>" target="_blank">
                           <span class="fa fa-twitter-square"></span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
         </div>
      </div>
      <!-- End Nhân Sự -->
      
      <!-- Nhận xét khách hàng start -->
      <div id="nhanxet2" class="preview">
         <div class="section primary-section nhanxet-bg">
            <div class="container">
               <div class="row">

                  <!-- About -->
                  <div class="col-xs-12 col-sm-6">
                     <div class="about-text title">
                        <h2><?php echo e($about['heading']); ?></h2>
                        <p><?php echo e($about['text']); ?></p>
                     </div>
                  </div>
                  <!-- End About -->

                  <!-- Testimonial -->
                  <div class="col-xs-12 col-sm-6">
                     <div class="title">
                        <h2><?php echo e($testimonial['heading']); ?></h2>
                     </div>
                     <div class="slider-container ">
                        <ul class="slides clearfix">
                           <?php unset($testimonial['heading']); ?>
                           <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                           <li>
                              <div class="testimonial">
                                 <p>"<?php echo e($row['content']); ?>"</p>
                                 <div class="whopic">
                                    <img src="<?php echo e($row['image']); ?>" class="centered" alt="<?php echo e($row['name']); ?>">
                                    <strong><?php echo e($row['name']); ?></strong>
                                 </div>
                              </div>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                     </div>
                  </div>
                  <!-- End Testimonial -->

               </div>
            </div>
         </div>
      </div>

      <!-- Widget fff -->
      <div class="section secondary-section blog-bg" id="blog-index">
         <?php $posts = get_post_cat_limit( '',4) ?>
         <?php if($posts): ?>
         <div class="container">
            <div class="title">
               <h2>
                  <a href="<?php echo e(url('tin-chinh')); ?>">Tin tức</a>
               </h2>
            </div>
            <div class="row">
               <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
               <div class="col-xs-12 col-sm-12">
                  <div class="blog-loop clearfix">
                     <div class="blog-img pull-left">
                        <a href="<?php echo e(url($post->post_slug)); ?>">
                        <img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>">
                        </a>
                     </div>
                     <div class="blog-info pull-right">
                        <h3>
                           <a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a>
                        </h3>
                        <p>
                          <?php echo e(!empty($post->post_excerpt) ? $post->post_excerpt : get_excerpt($post->post_content , 30)); ?>

                        </p>
                        <a href="<?php echo e(url($post->post_slug)); ?>" class="readmore">Xem thêm ...</a>
                     </div>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </div>
         </div>
         <?php endif; ?>
      </div>
      <!-- End Widget fff -->
   

      <!-- Widget ggg -->
      <div class="section primary-section doitac-bg" id="doitac">
         <div class="container centered">
            <div class="sub-section">
               <div class="title">
                  <h2><?php echo e($doitac['heading']); ?></h2>
               </div>
               <div class="index-slider">
                  <ul class="row client-slider" id="client-slider">
                     <?php unset($doitac['heading']); ?>
                     <?php $__currentLoopData = $doitac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <li>
                        <a href="<?php echo e($row['url']); ?>" target="_blank"><img src="<?php echo e($row['image']); ?>"></a>
                     </li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
                  <ul class="client-nav ">
                     <li id="client-prev"></li>
                     <li id="client-next"></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- End Widget ggg -->
     
               
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien5.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>