<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Tập tin</th>
            <th class="col-3 text-nowrap text-xs-center">Người đăng</th>
            <th class="col-4">Ngày tải lên</th>
        </tr>
    </thead>
    <tbody>
    <?php if( count($attachments) == 0 ): ?>
        <tr><th class="table-check"></th><td colspan="3"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
    <?php else: ?>
    <?php $i = 0; ?>
    <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php $i++; ?>
    <tr>
        <th class="col-1 table-check"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($attachment->attachment_id); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
        <td class="col-2">
            <div class="table-image"><div class="thumbnail"><div class="centered"><img src="<?php echo e(imageRepresent($attachment->attachment_type,$attachment->attachment_url)); ?>" alt="<?php echo e($attachment->attachment_title); ?>" /></div></div></div>
            <div class="table-title"><a href="<?php echo e(url('admin/attachment/edit/'.$attachment->attachment_id)); ?>"><?php echo e($attachment->attachment_title); ?></a></div>
        </td>
        <td class="col-3 text-nowrap text-xs-center"><?php echo e($attachment->user_fullname); ?></td>
        <td class="col-4"><?php echo e(date('H:i d/m/Y',$attachment->attachment_date)); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
    <?php endif; ?>
</table>