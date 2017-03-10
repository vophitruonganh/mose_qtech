<div class="b-t-p">
<?php if( count($attachments) == 0 ): ?>
    <?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
<ul id="attachment-grid" class="clearfix">
    <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li class="attachment-item attachment-item-<?php echo e($attachment->attachment_id); ?> col-xl-2 col-lg-3 col-md-2 col-sm-3 col-xs-4">
        <div class="attachment-preview thumbnail-preview">
            <div class="thumbnail">
                <div class="centered"><img src="<?php echo e(imageRepresent($attachment->attachment_type,$attachment->attachment_url)); ?>" alt="<?php echo e($attachment->attachment_title); ?>" /></div>
            </div>
            <div class="attachment-hover-layout">
                <div class="attachment-hover-layout-in">
                    <div class="attachment-info">
                        <div class="filename"><?php echo e($attachment->attachment_title); ?></div>
                        <div class="btn-group">
                            <a href="<?php echo e(url('admin/attachment/edit/'.$attachment->attachment_id)); ?>" class="btn"><label class="sr-only">Sửa</label><i class="font-icon material-icons md-24">link</i></a>
                            <a href="javascript:;" target="_blank" class="btn attacment-delete" data-id="<?php echo e($attachment->attachment_id); ?>"><label class="sr-only">Xóa</label><i class="font-icon material-icons md-24">delete_forever</i></a>
                        </div>
                        <div class="attachment-date"><?php echo e(timeAgo($attachment->attachment_date)); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>
</div>
<?php endif; ?>