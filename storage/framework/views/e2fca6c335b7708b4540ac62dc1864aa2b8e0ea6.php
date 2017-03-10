<?php $__env->startSection('titlePage','Chỉnh sửa tập tin'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/attachment"),
        'heading_link_text' => 'Danh sách tập tin',
        'heading_text' => 'Chỉnh sửa',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/attachment/create').'">Thêm mới tập tin</a>'
    );
    $setion_heading = section_title($heading);
?>  
    <div class="section-attachment">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form id="attachment-form" action="<?php echo e(url('admin/attachment/edit/'.$attachment->attachment_id)); ?>" method="post" enctype="multipart/form-data" data-bind="form: disable">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p">
                        <div class="form-group">
                            <label>Tên tập tin</label>
                            <input name="title" type="text" class="form-control" value="<?php echo e(old('title',$attachment->attachment_title)); ?>" />
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="sr-only">Đường dẫn tập tin</label>
                                <input type="text" value="<?php echo e($attachment->attachment_url); ?>" id="attachmenturl" class="form-control" readonly="readonly" />
                                <span class="input-group-btn"><button type="button" class="btn btn-secondary" data-plugin="clipboard" data-clipboard-action="copy" data-clipboard-target="#attachmenturl"><i class="font-icon material-icons md-16">link</i></button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea rows="3" name="content" class="form-control"><?php echo e(old('content',$attachment->attachment_content)); ?></textarea>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="details-image"><img src="<?php echo e(imageRepresent($attachment->attachment_type,$attachment->attachment_url)); ?>" /></div>
                        </div>
                        <?php if($attachment->attachment_type == 'image'): ?>
                        <div class="attachment-actions m-t-1 hidden-xs-up"><button type="button" class="btn btn-secondary">Chỉnh sửa hình ảnh</button></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link text-danger" href="<?php echo e(url('admin/attachment/delete/'.$attachment->attachment_id)); ?>">Xóa tập tin</a>
                                <button id="attachment-update-btn" type="submit" class="btn btn-primary waves-effect" data-bind="click: Attachment.Update">Cập nhật</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="proj-page-subtitle"><h3>Thông tin tập tin</h3></div>
                            <div class="misc-actions">
                                <div class="misc-group">
                                    <label class="misc-label m-b-0">Tên đính kèm:</label>
                                    <label class="misc-label-text m-b-0 attachment-name-lbl"><?php echo e($attachment->attachment_name); ?></label>
                                </div>
                                <div class="misc-group">
                                    <label class="misc-label m-b-0">Ngày tải lên:</label>
                                    <label class="misc-label-text m-b-0"><?php echo e(date('H:i d/m/Y',$attachment->attachment_date)); ?></label>
                                </div>
                                <div class="misc-group">
                                    <label class="misc-label m-b-0">Loại tập tin:</label>
                                    <label class="misc-label-text m-b-0"><?php echo e($attachment->attachment_type); ?></label>
                                </div>
                                <div class="misc-group">
                                    <?php
                                        if($attachment->user_fullname){
                                            $author = $attachment->user_fullname;
                                        }else{
                                            $author = $attachment->user_id;
                                        }
                                    ?>
                                    <label class="misc-label m-b-0">Tải lên bởi:</label>
                                    <label class="misc-label-text m-b-0"><?php echo e($author); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>