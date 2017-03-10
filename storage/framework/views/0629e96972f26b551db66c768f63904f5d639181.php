<?php echo $__env->make('backend.includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
/*
Session::get('user_level');
Session::get('user_id');
*/
?>
<?php echo $__env->make('backend.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('backend.includes.bottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('backend.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>