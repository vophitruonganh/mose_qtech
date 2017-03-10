<?php $__env->startSection('content'); ?>


<div class="container">
   <div class="col-md-12" id="layout-page">
      <span class="header-page clearfix">
         <h1><?php echo e($page->post_title); ?></h1>
      </span>
      <div class="content-page">
          <?php echo preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content); ?>

      </div>
   </div>
</div>		

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>