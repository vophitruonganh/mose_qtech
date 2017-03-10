<?php echo $__env->make('frontend.decima_store.includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.decima_store.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('frontend.decima_store.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>