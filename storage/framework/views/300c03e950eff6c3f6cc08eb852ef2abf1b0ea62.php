<?php $__env->startSection('titlePage','Danh sách menu'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách menu',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/navigation/create').'">Thêm mới</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-navigation">
        <div class="form-alerts"></div>
        <form action="<?php echo e(url('admin/navigation')); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action clearfix">
                        <div class="pull-md-left">
                             <?php echo tableActionForm('','','',''); ?>

                        </div>
                        <?php echo tableSearchForm($search,'<div class="pull-md-right">','</div>',''); ?>

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="navigation-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <table class="table table-hover tbl-typical">
                            <thead>
                                <tr>
                                    <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
                                    <th class="col-2">Tên menu</th>
                                    <th class="col-3 text-nowrap text-xs-center">Vị trí hiển thị</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( !is_array($navigation_data) && count($navigation_data) < 0 ): ?>
                                    <tr><th class="table-check"></th><td colspan="3"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
                                <?php else: ?>
                                    <?php $i = 0; ?>
                                    <?php $__currentLoopData = $navigation_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $arries): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <th class="col-1 table-check"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($key); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
                                        <td class="col-2"><div class="title-link"><a href="<?php echo e(url('admin/navigation/edit/'.$key)); ?>"><?php echo e($arries['menu_name']); ?></a></div></td>
                                        <?php if( !in_array($key,$navigation_load) ): ?>
                                            <td class="col-3 text-nowrap text-xs-center"><span class="label label-default">Chưa xác định</span></td>
                                        <?php else: ?> 
                                            <?php $keyNavigationLoad = array_search($key,$navigation_load); ?>
                                            <?php if( !isset($registerNavigation[$keyNavigationLoad]) ): ?>
                                            <td class="col-3 text-nowrap text-xs-center"><span class="label label-default">Chưa xác định</span></td>
                                            <?php endif; ?>
                                            <td class="col-3 text-nowrap text-xs-center"><span class="label label-success"><?php echo e($registerNavigation[$keyNavigationLoad]); ?></span></td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>