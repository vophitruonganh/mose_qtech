<?php $__env->startSection('titlePage','Cập nhật đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Hủy đơn hàng',
        'heading_text' => 'Hủy đơn hàng',
    );
    $setion_heading = section_title($heading);
    
?>
    <form action="<?php echo e(url('admin/order/trash/'.$order->order_code)); ?>" method="post">
    <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div>
            <label>Lý do bạn hủy đơn hàng này?</label>
            <select name="CancelReasonOrder">
                <option value="1">Khách hàng đổi ý</option>
                <option value="2">Đơn hàng giả mạo</option>
                <option value="3">Hết hàng</option>
                <option value="4">Khác</option>
            </select>
        </div>
        <div>
            <label>Ghi chú</label>
            <textarea name="CancelNote"></textarea>
        </div>
        <div>
            <input type="submit" value="Hủy đơn hàng">
        </div>
    </form>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>