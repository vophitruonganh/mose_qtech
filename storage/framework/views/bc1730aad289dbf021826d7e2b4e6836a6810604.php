<?php $__env->startSection('titlePage','Danh sách ứng dụng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/plugin"),
        'heading_link_text' => 'Danh sách ứng dụng',
        'heading_text' => 'Thêm mới ứng dụng',
    );
    $setion_heading = section_title($heading);
?>
    <?php echo $__env->make('backend.layouts.building', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>