<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home">
                  <a title="Quay lại trang chủ" href="<?php echo e(url('/')); ?>">Trang chủ</a>
               </li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li class="cl_breadcrumb"><?php echo e($slug_name); ?></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 news mg_top">
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



         <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12 news_posts">
            <h3 class="fw600 txt_u"><?php echo e($slug_name); ?></h3>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog-posts">
               <?php $__currentLoopData = $dataNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <?php 
                      $username = (!empty($data->user_fullname)) ? $data->user_fullname : $data->user_email;
                      $date     = date('d/m/Y',$data->post_date);
                      $time     = date('h:iA',$data->post_date);
                      $excerpt = !empty($data->post_excerpt) ? get_excerpt($data->post_excerpt,30) : get_excerpt($data->post_content,30)
                  ?>
                     <div class="news_post_loop ">
                        <div class="news_post_loop_img"><a href="<?php echo url($data->post_slug); ?>">
                           <img src="<?php echo e(get_image_url($data->post_image)); ?>" alt="<?php echo e($data->post_title); ?>">
                           </a>
                        </div>
                        <div class="news_post_loop_title">
                           <a href="<?php echo url($data->post_slug); ?>"><h3><?php echo e($data->post_title); ?></h3></a>
                        </div>
                        <div class="news_post_loop_info cl_old">
                           <p>
                              <span><i class="fa fa-user" aria-hidden="true"></i> <?php echo e($username); ?> </span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo e($date); ?></span>
                           </p>
                        </div>
                        <div class="news_post_loop_content cl_old"><?php echo e($excerpt); ?></div>
                        <div class="news_post_loop_more mg_20_0">
                           <button class="btn btn_readmore bdr0" onclick="location.href='<?php echo url($data->post_slug); ?>'">Đọc thêm <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                        </div>
                     </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            

               
               <div class="paginate-pages pull-right">
                  <?php echo e($dataNews->links()); ?>

               </div>
               <?php
               /*
               <div class="paginate-pages">
                  <div class="pager">
                     <div class="pages">
                        <ul class="pagination">
                            @if($dataNews->currentPage() != 1)
                                <li>
                                    <a href="{{ $dataNews->url($dataNews->currentPage()-1) }}">Trang Trước</a>
                                </li>
                                @endif
                                @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
                                    <li class="{{ ($dataNews->currentPage() == $i) ? 'active' : '' }}">
                                        <a href="{{ $dataNews->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if($dataNews->currentPage() != $dataNews->lastPage())
                                <li>
                                    <a href="{{ $dataNews->url($dataNews->currentPage()+1) }}" >Trang Sau</a>
                                </li>
                                @endif
                        </ul>
                     </div>
                  </div>
               </div>
               */
               ?>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien7.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>