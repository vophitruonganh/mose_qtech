<?php $__env->startSection('titlePage','Danh sách giao diện'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách giao diện',
        'heading_button' =>'<a class="btn btn-primary waves-effect" href="'.url('admin/themes/install').'">Thêm mới giao diện</a>'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-themes">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form action="<?php echo e(url('admin/themes')); ?>" method="get">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="list-theme">
                <div class="row" >
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="box-typical m-b-2">
                                <div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="<?php echo e(url($value['screenshot'])); ?>" alt="<?php echo e($key); ?>" /></div></div></div>
                                <div class="theme-info">
                                    <h4><?php echo e($value['infoTemplateName']); ?> <small class="text-muted">Version: <?php echo e($value['infoTemplateVersion']); ?></small></h4>
                                    <?php if( $activeTemplate == $key ): ?> <span class="label label-primary">Đang sử dụng</span> <?php else: ?> <span class="label label-default">Không sử dụng</span> <?php endif; ?>
                                    <p>Giao diện cung cấp bởi <b>QM Tech</b></p>
                                    <?php if( $activeTemplate !== $key ): ?> <a class="btn btn-secondary" href="<?php echo e(url('admin/themes/active/'.$key)); ?>">Kích hoạt</a> <?php endif; ?>
                                    <?php if( $themeOption && $activeTemplate == $key ): ?><a class="btn btn-secondary" href="<?php echo e(url('admin/themes/option')); ?>"><i class="material-icons md-16">settings</i> Thiết lập</a><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>