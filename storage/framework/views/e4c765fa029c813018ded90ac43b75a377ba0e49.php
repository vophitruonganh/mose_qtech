 <?php if(count($product_list)>0): ?>
<ul id="box-search-result" class="clearfix product" data-type="product">
    <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    
        <li data-product-id="<?php echo e($product['product_id']); ?>">
            <div class="product-thumb tbl-cell"><img src="<?php echo e($product['product_image']); ?>"></div>
            <div class="product-name table-cell"><?php echo e($product['product_title']); ?> </div>
            <ul>
                <?php $__currentLoopData = $product['variant']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li class="search-item" data-id="<?php echo e($variant['variant_id']); ?>">
                    <div class="tbl">
                        <a class="product-variant-name tbl-cell"><span><?php echo e($variant['variant_name']); ?></span></a>
                        <div class="product-variant-price tbl-cell text-nowrap text-xs-right"><span class="price-new"><?php echo e(number_format($variant['price_new'])); ?></span> <span class="currency-symbols" data-type="VND">&#8363;</span></div>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>
<?php else: ?>
<div class="p-a-1">Không tìm thấy sản phẩm</div>
<?php endif; ?>