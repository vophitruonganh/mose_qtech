<?php $__env->startSection('content'); ?>
<!-- ROW 1 -->
 <div class="product-area">
    <!-- BREADCRUMB -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"> <a href="/" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                        <li><strong><?php echo e($page->post_title); ?></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMB -->
    
    <!-- SHOW CONTENT -->
    <div class="container">
        <div class="content_page_info">
            <h1><?php echo e($page->post_title); ?></h1>
            <div class="rte">
                <?php echo preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content); ?>

            </div>
        </div>
    </div>
     <!-- END CONTENT -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien3.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>