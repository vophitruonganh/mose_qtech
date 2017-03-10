<?php $__env->startSection('content'); ?>

<section id="blog" class="archive archive-news wrapper">
   <div class="banner-page">
      <img src="//hstatic.net/668/1000057668/1000083168/blog_news_banner.png?v=583" alt="Tin tức">
   </div>
   <div class="fix-width home-section ">
      <div class="section-header no-border">
         <h3 class="section-title wow fadeInUp" style="visibility: visible; animation-name: none;">Tin tức</h3>
         <div class="section-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: none;">
         </div>
      </div>
      <!-- Begin content -->
      <div class="section-content articles">
          <?php $__currentLoopData = $dataNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <?php 
                      $username = (!empty($data->user_nickname)) ? $data->user_nickname : $data->user_email;
                      $date     = date('d/m/Y',$data->post_date);
                      $time     = date('h:iA',$data->post_date);
                      $value    = decode_serialize($data->meta_value);
                  ?>

            <div class="article entry clear">
               <a class="thumb" href="<?php echo e(url($data->post_slug)); ?>">
                  <div><img src="<?php echo e(get_image_url($data->post_image)); ?>" alt="<?php echo e($data->post_title); ?>"></div>
               </a>
               <div class="section-content clearfix">
                  <h2 class="entry-title">
                     <a title="Website có quảng cáo dụ cài ứng dụng di động sẽ bị google phạt" href="<?php echo e(url($data->post_slug)); ?>"><?php echo e($data->post_title); ?></a>
                  </h2>
                  <div class="meta">
                     <p class="date">
                        <?php echo e($time); ?> - <?php echo e($date); ?>

                     </p>
                     <p class="category">
                        <span class="category-name"><?php echo e($slug_name); ?></span>
                     </p>
                  </div>
                  <div class="excerpt">
                    <?php echo e(get_excerpt($data->post_content,20)); ?>

                  
                    <?php 
                    /*
                    bb{{ get_excerpt($data->post_content,20) }}bb
                     aa{{ !empty($data->post_excerpt ) ? get_excerpt($data->post_excerpt,20) : get_excerpt($data->post_content,20) }}aa
                     */
                     ?>
                     <p class="readmore">
                        <a rel="bookmark" href="<?php echo e(url($data->post_slug)); ?>">Xem chi tiết</a>
                     </p>
                  </div>
               </div>
            </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        


         <div class="navigation clearfix">
            <?php if($dataNews->currentPage() != 1): ?>
                  <a class="prev" href="<?php echo e($dataNews->url($dataNews->currentPage()-1)); ?>">Trang Trước</a>
              <?php endif; ?>
              <?php for($i = 1; $i <= $dataNews->lastPage(); $i++): ?>
                      <?php if($dataNews->currentPage() == $i): ?>
                          <span class="page-node page-number current"><?php echo e($i); ?></span>
                      <?php else: ?>
                          <a class="<?php echo e(($dataNews->currentPage() == $i) ? 'page-node page-number' : ''); ?> " href="<?php echo e($dataNews->url($i)); ?>"><?php echo e($i); ?></a>
                      <?php endif; ?>
              <?php endfor; ?>
              <?php if($dataNews->currentPage() != $dataNews->lastPage()): ?>
             
                  <a class="next" href="<?php echo e($dataNews->url($dataNews->currentPage()+1)); ?>" >Trang Sau</a>
             
              <?php endif; ?>
         </div>
      </div>
     
   </div>
   <!-- End content -->
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien9.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>