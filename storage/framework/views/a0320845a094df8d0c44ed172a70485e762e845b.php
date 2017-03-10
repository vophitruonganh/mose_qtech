<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Mã đơn hàng</th>
            <th class="col-3">Ngày đặt</th>
            <th class="col-4">Khách hàng</th>
            <th class="col-5 text-nowrap">Tổng tiền</th>
            <th class="col-6 text-nowrap text-xs-center">Tình trạng</th>
        </tr>
    </thead>
    <tbody> 
    <?php if( count($list_order) == 0 ): ?>
        <tr><th class="table-check"></th><td colspan="4"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
    <?php else: ?>
    <?php $i = 0; ?>
    <?php $__currentLoopData = $list_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php $i++; 
        $order_code=$order_prefix.$order['order_code'].$order_suffix;
    ?>
    <tr>
        <th class="col-1 table-check"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($order['order_code']); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
        <?php if($order['order_status']==4): ?>
            <td class="col-2"><div class="title-text"><?php echo e($order_code); ?></div></td>
        <?php else: ?>
            <td class="col-2"><div class="title-link"><a href="<?php echo e(url('admin/order/detail/'.$order['order_code'])); ?>"><?php echo e($order_code); ?></a></div></td>
        <?php endif; ?>
        <td class="col-3"><?php echo e(date('d-m-Y H:i',$order["order_date"])); ?></td>
        <td class="col-4"><a href="<?php echo e(url('admin/order?user_id='.$order['customer_id'])); ?>" ><?php echo e($order["customer_fullname"]); ?></a></td>
        <td class="col-5 text-nowrap"><?php echo e(number_format($order["amount_payment"],0,',',',')); ?> ₫</td>
        <td class="col-6 text-nowrap text-xs-center"><?php if( $order["order_status"]==0 ): ?> <span class="label label-success">Đã thanh toán</span> <?php elseif( $order["order_status"]==1 ): ?> <span class="label label-primary">Chưa thanh toán</span> <?php elseif( $order["order_status"]==3 ): ?> <span class="label label-default">Nháp</span> <?php endif; ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>
    </tbody>
</table>