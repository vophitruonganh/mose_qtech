<?php if(count($customer_list)>0): ?>
<ul id="box-search-result" class="clearfix customer" data-type="customer">
 <?php $__currentLoopData = $customer_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li class="search-item" data-id="<?php echo e($customer->customer_id); ?>">
        <div class="tbl">
            <div class="customer-thumb tbl-cell"><?php if($customer->avatar): ?><img src="<?php echo e($customer->avatar); ?>" /><?php else: ?> <i class="font-icon material-icons">account_circle</i> <?php endif; ?></div>
            <div class="customer-name tbl-cell"><?php if($customer->customer_fullname): ?><p class="name"><?php echo e($customer->customer_fullname); ?></p><?php endif; ?> <?php if($customer->customer_email): ?><p class="email text-muted"><?php echo e($customer->customer_email); ?></p><?php endif; ?></div>
        </div>
    </li>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>
<?php else: ?>
<div class="p-a-1">Không tìm thấy khách hàng</div>
<?php endif; ?>