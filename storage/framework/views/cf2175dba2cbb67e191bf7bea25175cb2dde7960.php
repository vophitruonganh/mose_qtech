<?php $__env->startSection('content'); ?>
<div id="maincontainer">
    <div class="container">
        <div>
            <div class="col-md-9" id="layout-page">
                <h1 class="heading1"><span class="maintext"><?php echo e($page->post_title); ?></span></h1>
                <div class="content-page">
                     <?php echo preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>