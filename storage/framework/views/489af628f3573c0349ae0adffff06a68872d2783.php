<?php $__env->startSection('content'); ?>

<?php 
      if(count($post)>0)
      {
            $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
            $date     = date('d/m/Y',$post->post_date);
            $time     = date('h:iA',$post->post_date);
      } 
               
            
 ?>
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home">
                  <a title="Quay lại trang chủ" href="/">Trang chủ</a>
               </li>
               /
               <li><a href="/tin-tuc">Tin tức</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
               <li class="cl_breadcrumb"><?php echo e($post->post_title); ?></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<section class="main-container col2-right-layout mg_top">
   <div class="main container">
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
              $products_tax = get_product_tax_limit($product_type_1,$product_slug_1,8);
              $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
              if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            <?php if( $products_tax ): ?>
            <div class="sanphambanchay block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5 class="fw600"><span><?php echo e($headingText); ?></span></h5>
               </div>
               <div class="block-content bd_old">
                  <div id="slideshowproboxwrapper">
                     <div class="slideshowprobox_best_sale_products">
                        <ul class="menu">
                          <?php $__currentLoopData = $products_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
              <!-- End left -->
      


         <div class="col-main col-sm-9" style="overflow: hidden;">
            <div class="blog-wrapper" id="main">
               <div class="site-content" id="primary">
                  <div role="main" id="content">
                     <article class="blog_entry clearfix wow bounceInLeft animated animated" id="203465" style="visibility: visible;">
                        <header class="blog_entry-header clearfix">
                           <div class="blog_entry-header-inner">
                              <h3 class="blog_entry-title fw600"><a href="<?php echo e(url('/'.$post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></h3>
                           </div>
                           <div class="cl_old">
                              <span style="margin-right: 20px;"><i class="fa fa-user" aria-hidden="true"></i> <?php echo e($username); ?></span>
                              <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo e($date); ?></span>
                           </div>
                           
                              <?php echo $post->post_content; ?>

                        </header>
                     </article>
                     <div class="new_post_loop_tag_share">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 post_tags pull-left">
                          <?php $list_tax = get_taxonomy_post_detail( 'post_tag', $post->post_slug) ?>
                           <?php if($list_tax): ?>
                           <span class="fw600 txt_u">Tags</span>:
                              <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <span class="tag_post"><a href="<?php echo e(url( $tax->taxonomy_slug)); ?>" title="<?php echo e($tax->taxonomy_slug); ?>"><?php echo e($tax->taxonomy_name); ?></a></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                           <?php endif; ?>
                        </div>
                        
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien7.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>