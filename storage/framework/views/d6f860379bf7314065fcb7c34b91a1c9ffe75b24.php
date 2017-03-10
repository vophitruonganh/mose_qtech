<?php $__env->startSection('titlePage','Tạo khu vực vận chuyển'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Tạo khu vực vận chuyển'
    );
    $setion_heading = section_title($heading);
?>
<div>
    <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
    <form id="order-form" action="<?php echo e(url('admin/setting/shipping/create')); ?>" method="post">
        <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <label>Nhập khu vực vận chuyển</label>
        <select name="province_shipping">
            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <option value="<?php echo e($p['id']); ?>"><?php echo e($p['name']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </select>
        <input type="submit" name="ok" value="create">
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>