<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <?php if(isset($data_arr['list_view']['title'])): ?><th class="col-2"><?php echo e($data_arr['list_view']['title']); ?></th><?php endif; ?>
            <?php if(isset($data_arr['list_view']['slug'])): ?><th class="col-3"><?php echo e($data_arr['list_view']['slug']); ?></th><?php endif; ?>
            <?php if(isset($data_arr['list_view']['count'])): ?>
                <th class="col-4"><?php echo e($data_arr['list_view']['count']); ?></th>
            <?php endif; ?>
            <?php if(isset($data_arr['list_view']['excerpt'])): ?><th class="col-5"><?php echo e($data_arr['list_view']['excerpt']); ?></th><?php endif; ?>
        </tr>
    </thead>
    <tbody>
    <?php if( count($taxonomy) == 0 ): ?>
        <tr><th class="table-check"></th><td colspan="5"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
    <?php else: ?>
        <?php $i = 0; ?>
        <?php $__currentLoopData = $taxonomy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php $i++; ?>
        <tr>
            <th class="col-1 table-check"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($tax['taxonomy_id']); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
            <?php if(isset($data_arr['list_view']['title'])): ?><td class="col-2"><div class="title-link"><a href="<?php echo e(url('admin/taxonomy/'.$data_arr['tax_slug'].'/edit/'.$tax['taxonomy_id'])); ?>"><?php echo e($tax['taxonomy_name']); ?></a></div></td><?php endif; ?>
            <?php if(isset($data_arr['list_view']['slug'])): ?><td class="col-3"><?php echo e($tax['taxonomy_slug']); ?></td><?php endif; ?>
            <?php if(isset($data_arr['list_view']['count'])): ?><td class="col-4"><?php echo e($tax['taxonomy_count']); ?></td><?php endif; ?>
            <?php if(isset($data_arr['list_view']['excerpt'])): ?><td class="col-5"><?php echo e($tax['taxonomy_excerpt']); ?></td><?php endif; ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>
    </tbody>
</table>  