<?php $__env->startSection('titlePage','Chi tiết đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Hoàn trả thanh toán',
        'heading_text' => 'Hoàn trả thanh toán',
    );
    
?>
    <form action="" method="post">
    <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Đặt mua</th>
                    <th>Đã nhập trả</th>
                    <th>Nhập trả</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $product_temp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php 
                    $quantity_buy = $product->quantity_buy;
                    $quantity_refuned = $product->quantity_refuned;
                    $price = number_format($product->price, 0, ',', '.');
                    
                    
                 ?>
                <tr>
                    <td><?php echo e($product->title); ?></td>
                    <td><?php echo e($price); ?> đ</td>
                    <td><?php echo e($quantity_buy); ?></td>
                    <td><?php echo e($quantity_refuned); ?></td>
                    <td><input type="number" name="refund-quantity[<?php echo e($product->product_temp_id); ?>]"></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
        
        <input type="submit" value="Hoàn trả">
    </form>
    Tổng số tiền có thể hoàn trả: <?php echo e(number_format($order->amount_refuned, 0, ',', '.')); ?> đ
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>