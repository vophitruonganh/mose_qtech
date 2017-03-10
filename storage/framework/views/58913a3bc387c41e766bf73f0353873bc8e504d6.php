<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Tên khách hàng</th>
            <th class="col-3">Số điện thoại</th>
            <th class="col-4 text-nowrap text-xs-center">Đơn hàng</th>
            <th class="col-5 text-nowrap text-xs-center">Đơn hàng gần nhất</th>
            <th class="col-6">Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
    <?php if( count($customers) == 0 ): ?>
        <tr><th class="table-check"></th><td colspan="5"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
    <?php else: ?>
    <?php $i = 0; ?>
    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php $i++; ?>
        <tr>
            <th class="col-1 table-check"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($customer['customer_id']); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
            <td class="col-2"><div class="table-title"><a href="<?php echo e(url('admin/customer/edit/'.$customer['customer_id'])); ?>"><?php if($customer['customer_fullname']): ?><?php echo e($customer['customer_fullname']); ?> <?php elseif($customer['customer_email']): ?><?php echo e($customer['customer_email']); ?> <?php else: ?> <?php echo e($customer['customer_id']); ?> <?php endif; ?></a></div></td>
            <td class="col-3"><?php echo e($customer['customer_phone']); ?></td>
            <td class="col-4 text-nowrap text-xs-center"><?php echo e($customer['count_order']); ?></td>
            <td class="col-5 text-nowrap text-xs-center"><a href="<?php echo e(url('admin/order/detail/'.$customer['order_id'])); ?>"><?php echo e(get_template_order_code($customer['order_new'])); ?></a></td>
            <td class="col-6 text-nowrap"><div class=""><span class=""><?php echo e(number_format($customer['price'])); ?></span> <span class="currency-symbols" data-type="VND"></span></div></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>
    </tbody>
</table>  