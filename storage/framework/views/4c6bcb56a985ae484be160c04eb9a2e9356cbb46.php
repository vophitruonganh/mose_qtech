<?php echo $__env->make('frontend.giaodien23.includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.giaodien23.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('frontend.giaodien23.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>