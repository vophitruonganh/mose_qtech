<?php $__env->startSection('titlePage','Thêm phí vận chuyển'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Thêm phí vận chuyển'
    );
    $setion_heading = section_title($heading);
?>
<div>
    <?php echo e($shipping->name); ?>

    <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
    <form id="order-form" action="<?php echo e(url('admin/setting/shipping-rate/create')); ?>" method="post">
        <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div>
            <?php /*
            <select name="shipping">
            @foreach($list_shipping as $shipping)
                <option value="{{$shipping->shipping_id}}">{{$shipping->name}}</option>
            @endforeach*/
            ?>
            </select>
            <input type="hidden" name="shipping" value="<?php echo e($shipping->shipping_id); ?>">
            <label>Tên tỷ lệ vận chuyển</label>
            <input type="text" name="rate_name">
        </div>
        <div>
            <label>Tiêu chuẩn tính phí</label>
            <select name="shipping_criteria">
                <option value="price">Dựa trên giá sản phẩm</option>
                <option value="weight">Dựa trên khối lượng sản phẩm</option>
            </select>
        </div>
        <div>
            <label>Đơn hàng khoảng</label>
            <input type="text" name="range_from">------<input type="text" name="range_to">
        </div>
        <div>
            <label>Giá vận chuyển</label>
            <input type="text" name="shipping_price">
        </div>
        <div>
            <input type="submit" name="ok" value="Lưu">
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>