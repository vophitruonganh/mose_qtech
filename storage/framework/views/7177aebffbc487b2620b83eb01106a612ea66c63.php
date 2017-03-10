 <?php if(count($product_list)>0): ?>
<ul id="box-search-result" class="clearfix product">
    <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    
        <li data-id="<?php echo e($product['product_id']); ?>">
            <div class="product-thumb tbl-cell"><img src="<?php echo e($product['product_image']); ?>"></div>
            <ul>
                <?php $__currentLoopData = $product['product_variant']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li data-id="<?php echo e($variant['variant_id']); ?>" data-price="" class="product-variant">
                    <div class="tbl">
                        <a class="product-variant-name tbl-cell"><span><?php echo e($variant['variant_title']); ?></span></a>
                        <div class="product-variant-price tbl-cell text-nowrap text-xs-right"><span class="price-new">
                        
                        <?php echo e($variant['price_new']); ?></span><span class="currency-symbols" data-type="VND">&#8363;</span></div>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>
<?php endif; ?>