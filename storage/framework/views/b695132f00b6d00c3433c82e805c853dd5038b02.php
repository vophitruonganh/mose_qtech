<?php $__env->startSection('titlePage','Thêm mới đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Danh sách đơn hàng',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <form action="<?php echo e(url('admin/order/saveOrder')); ?>" method="post">
        <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $__currentLoopData = $array_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row">
            <select name="variant_id[]">
                <?php $__currentLoopData = $product['product_variant']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($variant['variant_id']); ?>"><?php echo e($product['product_name']); ?>:<?php echo e($variant['variant_title']); ?> - Giá : <?php echo e($variant['price_new']); ?>đ</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
            <input type="text" name="product_id[]" value="<?php echo e($product['product_id']); ?>">
            <input type="text" name="variant_number[]">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <div class="row">
            <label>Order Content</label>
            <textarea name="order_content"></textarea>
            <select name="order_status">
                <option value="0">Đơn hàng nháp</option>
                <option value="1">Chưa thanh toán</option>
                <option value="2">Đã thanh toán</option>
            </select>
        </div>
        <div class="row">
            <span>Thông tin khách hàng</span><br>
            <label>Customer id</label>
            <input type="text" name="customer_id" value="16">
            <label>Email</label>
            <input type="text" name="email" value="theanh_ks@giaodien10.com">
            <label>Full name</label>
            <input type="text" name="fullname" value="thế anh">
            <label>Phone</label>
            <input type="text" name="phone" value="01234567890">
            <label>Address</label>
            <input type="text" name="address" value="To Hien Thanh p13">
            <label>Province</label>
            <input type="text" name="province" value="79">
            <label>District</label>
            <input type="text" name="district" value="566">
        </div>
        <div class="row">
            <input type="submit" value="ok">
        </div>
    </form>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>