<?php $__env->startSection('titlePage','Danh sách giao diện'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách giao diện',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-template">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
            <div class="row" >
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <form action="<?php echo e(url('admin/template')); ?>" method="post">
                    <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="item col-lg-4 col-sm-6 col-xs-12">
                        <div class="box-typical b-t-m">
                            <div class="item-thumb">
                                <div class="thumbnail"><div class="centered"><img src="<?php echo e(url($value['screenshot'])); ?>" alt="<?php echo e($key); ?>" /></div></div>
                            </div>
                            <div class="item-info">
                                <h4><?php echo e($value['infoTemplateName']); ?> <small class="text-muted">Version: <?php echo e($value['infoTemplateVersion']); ?></small></h4>
                                <?php if( $activeTemplate == $key ): ?>
                                <span class="label label-primary">Đang sử dụng</span>
                                <?php else: ?>
                                <span class="label label-default">Không sử dụng</span>
                                <?php endif; ?>
                                <p class="font-lg-size card-text">Giao diện cung cấp bởi <b>QM Tech</b></p>
                                <?php if( $activeTemplate !== $key ): ?>
                                <button class="btn btn-secondary" type="submit">Kích hoạt</button><input type="hidden" name="template" value="<?php echo e($key); ?>" />
                                <?php endif; ?>
                                <?php if( $themeOption && $activeTemplate == $key ): ?><a class="btn btn-secondary" href="<?php echo e(url('admin/template/option')); ?>"><i class="material-icons md-16">settings</i> Thiết lập</a><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>