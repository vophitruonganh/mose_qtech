 <?php if(count($product_list)>0): ?>
<ul id="box-search-result" class="clearfix product">
<?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
 <?php $product_image = decode_serialize($product->product_image); ?>
    <li data-id="<?php echo e($product->product_id); ?>">
        <div class="tbl">
            <div class="product-thumb tbl-cell"><?php if($product->product_image): ?> <img src="<?php echo e($product->product_image); ?>" title="<?php echo e($product->product_name); ?>" /> <?php else: ?> <img src="<?php echo e($cdn_domain_image.'/not-found.png'); ?>" /> <?php endif; ?></div>
            <div class="product-name tbl-cell"><?php echo e($product->product_title); ?></div>
        </div>
        <?php if($product->product_variant): ?>
        <ul>
            <?php $__currentLoopData = $product->product_variant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li data-id="<?php echo e($variant->variant_id); ?>" data-price="" class="product-variant">
                <div class="tbl">
                    <a class="product-variant-name tbl-cell"><span><?php echo e($variant->variant_title); ?></span></a>
                    <div class="product-variant-price tbl-cell text-nowrap text-xs-right"><span class="price-new"><?php echo e($variant->price_new); ?></span><span class="currency-symbols" data-type="VND">&#8363;</span></div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>
<?php endif; ?>