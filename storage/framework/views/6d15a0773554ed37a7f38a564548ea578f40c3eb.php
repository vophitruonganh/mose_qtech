<?php $__env->startSection('content'); ?>

<main class="padding-top-mobile">
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="<?php echo e(url('/')); ?>" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li class="active"><span><?php echo e($page->post_title); ?></span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div class="layout-page">
      <div class="container">
         <div class="row">
            <div class="col-md-2 pd-none-r hidden-sm hidden-xs">
               <ul class="sidebar-page-left">
                  <li class="active"><a href="<?php echo e(url('pages/gioi-thieu')); ?>"><?php echo e($page->post_title); ?></a></li>
                  <li class=""><a href="<?php echo e(url('pages/contact')); ?>">Liên hệ</a></li>
               </ul>
            </div>
            <div class="col-md-10 col-xs-12 page-border-left pd5">
               <?php echo preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content); ?>

            </div>
         </div>
      </div>
   </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien6.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>