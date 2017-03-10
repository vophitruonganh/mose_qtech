<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-md-6">Tên ứng dụng</th>
            <th class="col-md-4 text-nowrap text-xs-center">Tình trạng</th>
            <th class="col-md-2 text-nowrap text-xs-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if( count($pluginInWidget) == 0 ): ?>
            <tr><td colspan="3"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
        <?php else: ?>
            <?php $i = 0; ?>
            <?php $__currentLoopData = $pluginInWidget; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?php $i++; ?>
            <tr data-id="<?php echo e($i); ?>" data-path="<?php echo e($row['folderPlugin']); ?>">
                <th class="table-title column-primary <?php if( $row['enableEditButton'] == 1): ?> tbl-title-text <?php endif; ?>"><?php echo e($row['pluginName']); ?></th>
                <td class="text-nowrap text-xs-center"><?php if( $row['enableEditButton'] == 1): ?> <span class="label label-success">Đang hoạt động</span> <?php else: ?> <span class="label label-default">Không hoạt động</span> <?php endif; ?></td>
                <td class="text-nowrap text-xs-center">
                    <div class="table-btn btn-group btn-group-sm">
                        <input type="hidden" name="plugin[<?php echo e($widget); ?>][<?php echo e($i); ?>]" value="<?php echo e($row['folderPlugin']); ?>">
                        <button type="button" class="btn plugin-widget-edit" <?php if( $row['enableEditButton'] !== 1): ?>disabled="disabled"<?php endif; ?>><i class="material-icons md-18">mode_edit</i></button>
                        <button type="button" class="btn plugin-widget-remove"><i class="material-icons md-18">delete</i></button>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
    </tbody>
</table> 