<?php $__env->startSection('titlePage','Danh sách trang'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách trang',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/page/create').'">Thêm mới trang</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-post">
        <div class="form-alerts"></div>
        <form id="post-form" action="<?php echo e(url('admin/page')); ?>" method="post" data-bind="form: disable">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
            <div class="box-typical">
                 <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action clearfix">
                        <div class="pull-md-left">
                            <?php if($post_count['all'] > 0 || $post_count['trash'] > 0): ?>
                            <div class="form-group">
                                <select name="post_status" id="action_status" class="form-control" data-bind="change: Table.ActionChange, change: Table.StatusChange">
                                    <?php if($post_count['all'] > 0): ?><option <?php if($post_status=='all'): ?> selected="selected" <?php endif; ?> value="all">Tất cả (<?php echo e($post_count['all']); ?>)</option><?php endif; ?>
                                    <?php if($post_count['public'] > 0): ?><option <?php if($post_status=='public'): ?> selected="selected" <?php endif; ?> value="public">Công khai (<?php echo e($post_count['public']); ?>)</option><?php endif; ?>
                                    <?php if($post_count['pending'] > 0): ?><option <?php if($post_status=='pending'): ?> selected="selected" <?php endif; ?> value="pending">Đang chờ duyệt (<?php echo e($post_count['pending']); ?>)</option><?php endif; ?>
                                    <?php if($post_count['draft'] > 0): ?><option <?php if($post_status=='draft'): ?> selected="selected" <?php endif; ?> value="draft">Nháp (<?php echo e($post_count['draft']); ?>)</option><?php endif; ?>
                                    <?php if($post_count['trash'] > 0): ?><option <?php if($post_status=='trash'): ?> selected="selected" <?php endif; ?>  value="trash">Xóa (<?php echo e($post_count['trash']); ?>)</option><?php endif; ?>
                                </select>
                            </div>
                            <?php endif; ?>
                            <?php
                                $arr = array();
                                if($post_status == 'trash'){
                                    $arr = array('restore'=> 'Khôi phục','delete'=>'Xóa vĩnh viễn');
                                }
                            ?>
                            <?php echo tableActionForm($arr,'','','click: Table.Action'); ?>

                        </div>
                        <?php echo tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Post.TableSearch'); ?>

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="page-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <?php echo $__env->make('backend.pages.website.page.listViewPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </form>    
    </div>
    <?php echo pagination($posts,$pagination); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>