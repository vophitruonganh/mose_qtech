<div class="table-responsive">
    <table class="table">
        <thead>
            <th class="col-1"></th>
            <th class="col-2 text-xs-center text-nowrap"></th>
            <!-- <th class="col-3">Tiêu đề</th>
            <th class="col-4">Kích thước</th>
            <th class="col-5 text-xs-center text-nowrap">Màu sắc</th>
            <th class="col-6 text-xs-center text-nowrap">Mã sản phẩm</th>
            
            <th class="col-8 text-xs-center text-nowrap">Số lượng</th> -->
            <?php $i=3?>
            <?php $__currentLoopData = $array_title_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <th class="col-<?php echo e($i); ?> text-nowrap"><span class="variant-option text-inline-hidden"><?php echo e($value); ?></span></th>
            <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <th class="col-6 text-xs-center text-nowrap">Mã sản phẩm</th>
            <th class="col-7 text-nowrap">Giá</th>
            <th class="col-8 text-nowrap">Số lượng</th>
            <th class="col-9 text-xs-center"></th>
        </thead>
        <tbody>
        <?php $__currentLoopData = $variant_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr data-id="<?php echo e($variant['variant_id']); ?>">
                <th class="col-1 table-check"><input id="variant-id-<?php echo e($variant['variant_id']); ?>" class="filled-tbl" type="checkbox" name="variant_id[]" value="<?php echo e($variant['variant_id']); ?>" checked /><label for="variant-id-<?php echo e($variant['variant_id']); ?>"></label></th>
                <td class="col-2 text-xs-center"><span class="variant-thumb"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="http://mosecdn.com/1/1/uploads/2016/11/samsung_galaxy_a5_2016_5_300x300_thumb.jpg"></div></div></div><i class="font-icon material-icons md-20 hidden-xs-up">photo_camera</i></span></td>
                <?php if(count($variant['option1'])>0): ?>
                <td class="col-3"><span class="variant-title text-primary variant-option text-nowrap text-inline-hidden"><?php echo e($variant['option1']['variant_value']); ?></span></td>
                <?php endif; ?>
                <?php if(count($variant['option2'])>0): ?>
                <td class="col-4"><span class="variant-option text-nowrap text-inline-hidden"><?php echo e($variant['option2']['variant_value']); ?></span></td>
                <?php endif; ?>
                <?php if(count($variant['option3'])>0): ?>
                <td class="col-5"><span class="variant-option text-nowrap text-inline-hidden"><?php echo e($variant['option3']['variant_value']); ?></span></td>
                <?php endif; ?>
                <td class="col-6 text-nowrap"><span class="variant-sku text-inline-hidden"><?php echo e($variant['variant_sku']); ?></span></td>
                <td class="col-7 text-nowrap"><span class="variant-price text-inline-hidden"><?php echo e(number_format($variant['variant_price'])); ?></span> <span class="currency-symbols" data-type="VND"></span></td>
                <td class="col-8 text-nowrap"><span class="variant-quantity text-inline-hidden"><?php echo e($variant['variant_quantity']); ?></span></td>
                <td class="col-9 text-xs-center text-nowrap"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-secondary btn-edit">Chỉnh sửa</button><button type="button" class="btn btn-secondary btn-delete"><i class="font-icon material-icons md-16">delete_forever</i></button></div></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
</div>