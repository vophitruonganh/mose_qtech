<?php $__env->startSection('titlePage','Cấu hình vận chuyển'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Cấu hình vận chuyển'
    );
    $setion_heading = section_title($heading);
?>
<div>
    <?php $__currentLoopData = $array_shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div>
            <p>
                <span style="color:red;font-size:18px">+<?php echo e($shipping['shipping_name']); ?></span><a href="<?php echo e(url('admin/setting/shipping/delete/'.$shipping['shipping_id'])); ?>">Xóa</a>
                <div>
                    <ul>
                        <?php $__currentLoopData = $shipping['shipping_child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arr_c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li>
                            <?php echo e($arr_c['name']); ?> : 
                            <p><?php echo e($arr_c['rate_from']); ?> - <?php echo e($arr_c['rate_to']); ?></p>
                            <p>Loại: <?php echo e($arr_c['type']); ?></p>
                            <p>Giá: <?php echo e($arr_c['price']); ?></p>
                            <p>Điều chỉnh</p>
                            <div>
                                <form action="<?php echo e(url('admin/setting/shipping-rate/edit/'.$arr_c['shipping_id'])); ?>" method="post">
                                <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <dir>
                                        <label>Tên tỷ lệ vận chuyển</label>
                                        <input type="text" name="rate_name" value="<?php echo e($arr_c['name']); ?>">
                                    </dir>
                                    <dir>
                                        <label>Tiểu chuẩn tính phí</label>
                                        <select name="shipping_criteria">
                                            <option value="price" <?php echo e(($arr_c['type']=='price')? 'selected' : ''); ?>>Dựa trên giá sản phẩm</option>
                                            <option value="weight" <?php echo e(($arr_c['type']=='weight')? 'selected' : ''); ?>>Dựa trên khối lượng sản phẩm</option>
                                        </select>
                                        
                                        <label>Hạn mức đơn hàng khoảng</label>
                                        <input type="text" name="range_from" value="<?php echo e($arr_c['rate_from']); ?>">--<input type="text" name="range_to" value="<?php echo e($arr_c['rate_to']); ?>">
                                    </dir>
                                    <dir>
                                        <label>Giá vận chuyển</label>
                                        <input type="text" name="shipping_price" value="<?php echo e($arr_c['price']); ?>">
                                    </dir>
                                    <dir>
                                        <input type="submit" name="save-district-province" value="Lưu">
                                        <a href="<?php echo e(url('admin/setting/shipping/delete/'.$arr_c['shipping_id'])); ?>">Xóa</a>
                                    </dir>
                                </form>
                            </div>
                            <?php if(count($arr_c['district'])>0): ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Quận / Huyện</th>
                                        <th>Giá điều chỉnh</th>
                                        <th>Giá cuối cùng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="<?php echo e(url('admin/setting/shipping/edit/'.$shipping['shipping_id'])); ?>" method="post">
                                    <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <input type="hidden" name="place_id" value="<?php echo e($shipping['place_id']); ?>">
                                    <?php $__currentLoopData = $arr_c['district']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <input type="hidden" name="district_place_id[]" value="<?php echo e($district['place_id']); ?>">
                                    <input type="hidden" name="district_shipping_id[]" value="<?php echo e($district['shipping_id']); ?>">
                                    <tr>                                        
                                        <td><?php echo e($district['name']); ?></td>
                                        <td><input type="text" name="district_shipping[]" value="0"></td>
                                        <td><?php echo e($district['price']); ?>đ</td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <input type="submit" name="update" value="update">
                                    </form>
                                </tbody>
                            </table>
                            <?php endif; ?>
                            <ul>
                                
                            </ul>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            </p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>