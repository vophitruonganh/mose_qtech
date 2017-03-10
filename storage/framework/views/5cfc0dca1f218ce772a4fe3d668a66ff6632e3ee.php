<?php $__env->startSection('titlePage','Danh sách ứng dụng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách ứng dụng',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/plugin/create').'">Thêm mới</a>',
    );
    $setion_heading = section_title($heading);
?>
	<div class="section-plugin">
        <div class="form-alerts"></div>
        <form action="<?php echo e(url('admin/plugin')); ?>" method="post">
			<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <?php
                                $arr = array('activate'=> 'Kích hoạt','deactivate'=>'Vô hiệu hóa')
                            ?>
                            <?php echo tableActionForm($arr,'','','click: Plugin.TableAction'); ?>

                        </div>
                        <?php echo tableSearchForm('','<div class="pull-md-right">','</div>','click: Plugin.TableSearch'); ?>

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="customer-list data-list data-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
                                    <th>Tên ứng dụng</th>
                                    <th>Mô tả</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if( count($listPlugin) == 0 ): ?>
                                <tr><th class="table-check"></th><td colspan="3"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
                            <?php else: ?>
                                <?php $i = 0; ?>
                                <?php $__currentLoopData = $listPlugin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <th class="table-check"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($plugin['folderPlugin']); ?>::<?php echo e($plugin['fileNamePlugin']); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
                                        <td class="tbl-nowrap column-primary">
                                        	<p class="m-a-0 tbl-title-text <?php if( $plugin['activedPlugin'] == 0 ): ?> font-weight-normal <?php else: ?> font-weight-bold <?php endif; ?>"><?php echo e($plugin['pluginName']); ?></p>
    										<p class="m-a-0"><?php if( $plugin['activedPlugin'] == 0 ): ?> <a href="<?php echo e(url('admin/plugin/active/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin'])); ?>">Kích hoạt</a> <?php else: ?> <a href="<?php echo e(url('admin/plugin/deactive/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin'])); ?>">Vô hiệu hóa</a> <?php endif; ?> <?php if( $plugin['activedPlugin'] == 0 ): ?> <span class="spec">|</span> <a class="text-danger" href="<?php echo e(url('admin/plugin/delete/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin'])); ?>">Xóa ứng dụng</a> <a class="text-danger" href="<?php echo e(url('admin/plugin/delete/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin'].'/deleteAll')); ?>">Delete All ( include database )</a> <?php endif; ?></p>
                                        </td>
                                        <td>
                                            <p class="m-a-0"><?php echo e($plugin['pluginDescription']); ?></p>
                                            <p class="m-a-0"><?php if($plugin['pluginVersion']): ?> <i class="material-icons md-18">info</i> Phiên bản: <?php echo e($plugin['pluginVersion']); ?> <span class="spec">|</span> <?php endif; ?> <?php if($plugin['pluginAuthor']): ?> Nhà phát triển: <?php if($plugin['pluginAuthorUri']): ?><a target="_blank" href="<?php echo e($plugin['pluginAuthorUri']); ?>"><?php echo e($plugin['pluginAuthor']); ?></a> <?php else: ?> <?php echo e($plugin['pluginAuthor']); ?> <?php endif; ?> <span class="spec">|</span> <?php endif; ?> <?php if($plugin['pluginUri'] ): ?> <a target="_blank" href="<?php echo e($plugin['pluginUri']); ?>"><i class="material-icons md-16">link</i> Chi tiết</a> <?php endif; ?></p>
                                        </td>
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