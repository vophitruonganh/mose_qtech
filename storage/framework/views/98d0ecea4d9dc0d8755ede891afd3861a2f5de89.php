<?php $__env->startSection('content'); ?>

<?php 
      if(count($post)>0)
      {
            $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
            $date     = date('d/m/Y',$post->post_date);
            $time     = date('h:iA',$post->post_date);
      }     
 ?>

<div class="banner-page">
    <img src="//hstatic.net/668/1000057668/1000083168/blog_news_banner.png?v=583" alt="Tin tức">
</div>

<div class="wrapper fix-width single-page page">
   <div id="primary" class="entry single">
      <header class="entry-header">
         <h1 class="entry-title"><?php echo e($post->post_title); ?></h1>
         <div class="entry-meta">
            <span class="date">
            Đăng lúc <?php echo e($time); ?> - <?php echo e($date); ?> </span>
         </div>
      </header>
      <div class="entry-content">
         <?php echo $post->post_content; ?>

      </div>
      <div class="social-sharing " data-permalink="<?php echo e(url($post->post_slug)); ?>">
         <a target="_blank" href="//www.facebook.com/sharer.php?u=<?php echo e(url($post->post_slug)); ?>" class="share-facebook">
         <span class="icon icon-facebook" aria-hidden="true"></span>
         <span class="share-title">Facebook</span>
         </a>
         <a target="_blank" href="//twitter.com/share?url=<?php echo e(url($post->post_slug)); ?>&amp;text=B%E1%BA%A5t%20ng%E1%BB%9D%20v%E1%BB%9Bi%20l%C3%BD%20do%20th%C3%A0nh%20l%E1%BA%ADp%20Facebook%20c%E1%BB%A7a%20Mark%20Zuckerberg" class="share-twitter">
         <span class="icon icon-twitter" aria-hidden="true"></span>
         <span class="share-title">Twitter</span>
         <span class="share-count">0</span>
         </a>
         <a target="_blank" href="//plus.google.com/share?url=<?php echo e(url($post->post_slug)); ?>" class="share-google">
            <!-- Cannot get Google+ share count with JS yet -->
            <span class="icon icon-google" aria-hidden="true"></span>
            <span class="share-count is-loaded">+1</span>
         </a>
      </div>
      <!-- End social buttons -->   
      <!-- Begin comments -->
      <!-- End comments -->
   </div>
   <div id="secondary">
      <!-- Begin sidebar -->
      <div class="widget news">

         <?php
          $posts = get_post_cat_limit($post_slug_2,5);
          $headingText = get_taxonomy_name($post_type_2,$post_slug_2);
          if( $headingText == '' ) $headingText = 'Bài viết Mới';
         ?>
         <h4 class="widget-title"><?php echo $headingText; ?></h4>
         <div class="widget-content">
         <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="article clear">
               <div class="thumb">
                  <div><img src="<?php echo e(get_image_url($post->post_image)); ?>" atl="<?php echo e($post->post_title); ?>"></div>
                  <?php echo e($post->post_excerpt); ?>

               </div>
               <div class="content">
                  <h3 class="entry-title"><a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></h3>
                  <p class="date"><?php echo e(date('d/m/Y',$post->post_date)); ?></p>
               </div>
            </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   
         </div>
      </div>
     <!--  <div class="widget support-online">
         <h4 class="widget-title">Hỗ Trợ Trực Tuyến</h4>
         <div class="widget-content">
            <div class="supports">
               <div class="people">
                  <p><span class="name">Mr. Tin</span></p>
                  <a href="ymsgr:sendIM?tinhuynhquoctin" class="yahoo"><img alt="yahoo" src="//hstatic.net/668/1000057668/1000083168/yahoo.png?v=583"></a>
                  <a href="skype:huynhtin_92?call" class="skype"><img alt="skype" src="//hstatic.net/668/1000057668/1000083168/skype.png?v=583"></a>
                  <p></p>
                  <p><span class="label">Điện thoại:</span><span class="tel">0985 984 021</span></p>
               </div>
               <h4 style="margin: 0; font-size: 14px; font-size: 1.4rem; border-top: 1px solid #eee">Thời gian làm việc</h4>
               Bất cứ khi nào bạn cần, hỗ trợ 24/7, 7 ngày trong tuần
            </div>
         </div>
      </div> -->
      <!-- End sidebar -->
   </div>
</div>


<?php $__env->stopSection(); ?>      

<?php echo $__env->make('frontend.giaodien9.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>