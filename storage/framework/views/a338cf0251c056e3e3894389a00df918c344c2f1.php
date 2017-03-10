<?php echo $__env->make('frontend.giaodien7.includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.giaodien7.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('frontend.giaodien7.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>