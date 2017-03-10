<?php $__env->startSection('titlePage','Tạo tên miền'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Tạo tên miền',
    );
    $setion_heading = section_title($heading);
?>
    <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
	<form action="<?php echo e(url('admin/setting/domain/create')); ?>" method="post">
    <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <label>Tên miền</label>
        <input type="text" name="domain_name">
        <input type="submit" value="Lưu">
    
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>