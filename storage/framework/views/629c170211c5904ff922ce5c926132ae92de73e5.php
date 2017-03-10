<?php $__env->startSection('content'); ?>

      
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><strong<?php echo e($page->post_title); ?></strong></li>
         </ul>
      </div>
   </div>
</div>
<div class="container">
   <div class="content_page_info">
      <h1<?php echo e($page->post_title); ?></h1>
      <div class="sidebar-line"><span></span></div>
      <div class="rte">
         <?php echo preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content); ?>

      </div>
   </div>
</div>
     
      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>