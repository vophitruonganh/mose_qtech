<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Họ tên</th>
            <th class="col-3">Email</th>
            <th class="col-4 text-nowrap text-xs-center">Số điện thoại</th>
            <th class="col-5 text-nowrap text-xs-center">Tình trạng</th>
        </tr>
    </thead>
    <tbody>
    <?php if( count($users) == 0 ): ?>
        <tr><th class="table-check"></th><td colspan="5"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
    <?php else: ?>
        <?php $i = 0; ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?php $i++; ?>
            <tr>
                <th class="col-1 table-check"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($user->user_id); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
                <td class="col-2"><div class="title-link"><a href="<?php echo e(url('admin/user/edit/'.$user->user_id)); ?>"><?php if(!$user->user_fullname): ?> <?php echo e($user->user_id); ?><?php else: ?> <?php echo e($user->user_fullname); ?> <?php endif; ?></a></div></td>
                <td class="col-3"><?php echo e($user->user_email); ?></td>
                <td class="col-4 text-nowrap text-xs-center"><?php echo e($user->user_phone); ?></td>
                <td class="col-5 text-nowrap text-xs-center"><?php if( $user->user_status == 0 ): ?> <span class="label label-danger">Vô hiệu hóa</span> <?php else: ?> <span class="label label-success">Kích hoạt</span> <?php endif; ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>
    </tbody>
</table>  