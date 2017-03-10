<?php $__env->startSection('titlePage','Chỉnh sửa tiện ích'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/widget"),
        'heading_link_text' => 'Danh sách tiện ích',
        'heading_text' => $pluginName,
    );
    $setion_heading = section_title($heading);
?>
<?php echo $widgetForm; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>