<?php $__env->startSection('titlePage','Danh sách nhân viên'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách nhân viên',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/user/create').'">Thêm mới nhân viên</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-user">
        <div class="form-alerts"></div>
        <form id="account-form" action="<?php echo e(url('admin/user')); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <div class="form-group">
                                <select name="user_status" id="action_status" class="form-control" data-bind="change: Table.StatusChange">
                                    <option selected="selected" value="">Chọn tình trạng</option>
                                    <option <?php if($user_status == '1'): ?> selected="selected" <?php endif; ?> value="1">Đã Kích hoạt</option>
                                    <option <?php if($user_status == '0'): ?> selected="selected" <?php endif; ?> value="0">Vô hiệu hóa</option>
                                </select>
                            </div>
                            <?php
                                $arr = array('activate'=> 'Kích hoạt','disable'=>'Vô hiệu hóa','edit'=>'Chỉnh sửa','delete'=>'Xóa')
                            ?>
                            <?php echo tableActionForm($arr,'','','click: Table.Action'); ?>

                        </div>
                        <?php echo tableSearchForm($search,'<div class="pull-md-right">','</div>','click: User.TableSearch'); ?>

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="user-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <?php echo $__env->make('backend.pages.account.user.listViewUser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
     <?php echo pagination($users,$pagination); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>