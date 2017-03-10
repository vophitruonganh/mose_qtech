 <?php if(count($customer_list)>0): ?>
<ul id="box-search-result" class="clearfix customer">
 <?php $__currentLoopData = $customer_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li data-id="<?php echo e($customer->user_id); ?>">
        <div class="tbl">
            <div class="customer-thumb tbl-cell"><img src="<?php echo e($cdn_domain_image.'/not-found.png'); ?>" /></div>
            <div class="customer-name tbl-cell"><?php if($customer->user_nickname): ?><p class="name"><?php echo e($customer->user_nickname); ?></p><?php endif; ?> <?php if($customer->user_email): ?><p class="email text-muted"><?php echo e($customer->user_email); ?></p><?php endif; ?></div>
        </div>
    </li>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>
<?php endif; ?>