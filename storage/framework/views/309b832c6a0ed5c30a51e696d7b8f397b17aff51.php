<?php $__env->startSection('titlePage','Thêm mới trang'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/page"),
        'heading_link_text' => 'Danh sách trang',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-post">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form action="<?php echo e(url('admin/page/create')); ?>" method="post" data-bind="form: disable">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p b-t-m">
                        <div class="form-group">
                            <label>Tiêu đề trang</label>
                            <input type="text" class="form-control meta-title" name="title" value="<?php echo e(old('title')); ?>" />
                        </div>
                        <div class="form-group">
                            <div class="post-slug-group input-group">
                                <label class="sr-only">Đường dẫn</label>
                                <span class="input-group-addon"><?php echo e(main_site_url()); ?>/<?php echo e($seo_data['seo_url']); ?></span>
                                <input type="text" name="slug" value="<?php echo e(old('slug')); ?>" class="form-control" readonly="readonly" />
                                <span class="input-group-btn"><button type="button" class="btn btn-secondary" data-bind="click: General.ChangeSlug"><i class="font-icon material-icons md-16">mode_edit</i></button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="content" data-plugin="tinymce"><?php echo e(old('content')); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea rows="3" class="form-control meta-description" name="excerpt"><?php echo e(old('excerpt')); ?></textarea>
                            <small class="text-muted">Mặc định nếu mô tả để trống sẽ lấy từ nội dung để hiển thị.</small>
                        </div>
                    </div>
                    <?php echo seo_content($seo_data); ?>

                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link" href="<?php echo e(url('admin/page/')); ?>">Hủy</a>
                                <button type="submit" class="btn btn-primary waves-effect" class="click: Post.Submit">Thêm mới</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="proj-page-subtitle"><h3>Thông tin</h3></div>
                            <div class="misc-actions">
                                <div class="misc-group">
                                    <div data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select">
                                        <label class="misc-label m-b-0">Tình trạng:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_status">Công khai</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_post_status" value="public" data-bind="value: post_status" />
                                    </div>
                                    <div id="post-status-select" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <select name="post_status" class="form-control misc-select-text" data-model="post_status">
                                                <option selected="selected" value="public">Công khai</option>
                                                <option value="pending">Đang chờ duyệt</option>
                                                <option value="draft">Nháp</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date">
                                        <label class="misc-label m-b-0">Vào lúc:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_date"><?php echo e(date('H:i d/m/Y',time())); ?></label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                    </div>
                                    <div id="misc-post-date" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <input type="text" name="post_date" class="form-control" data-plugin="datetimepicker" value="<?php echo e(date('H:i d/m/Y',time())); ?>" placeholder="Ngày tạo" data-model="post_date" />
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select">
                                        <label class="misc-label m-b-0">Bình luận:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_comment"><?php if( $optionComment == 'yes' ): ?> Mở <?php else: ?> Đóng <?php endif; ?></label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_post_comment" value="<?php echo e($optionComment); ?>" data-bind="value: post_comment" />
                                    </div>
                                    <div id="post-comment-select" class="form-inline collapse extend">
                                        <select name="post_comment" class="form-control misc-select-text" data-model="post_comment">
                                            <option value="yes" <?php if($optionComment=='yes'): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?> >Mở</option>
                                            <option value="no" <?php if($optionComment=='no'): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?> >Đóng</option>
                                        </select>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle"><h3>Ảnh đại diện</h3></div>
                            <div id="post-image-group">
                                <div id="post-image-thumbnail" <?php if(!old('post_image_id')): ?> style="display: none;" <?php endif; ?>>
                                    <a href="javascript:;" data-bind="click: Modal.LoadImage"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="<?php echo e(old('post_image_url')); ?>" /></div></div></div></a>
                                    <input type="hidden" name="post_image_url" value="<?php echo e(old('post_image_url')); ?>" />
                                    <input type="hidden" name="post_image_id" value="<?php echo e(old('post_image_id')); ?>" />
                                    <div class="thumbnail-remove"><button class="btn btn-link text-danger" data-bind="click: Post.RemoveImage">Xóa ảnh đại diện</button></div>
                                </div>
                                <div id="post-image-modal" <?php if(old('post_image_id')): ?> style="display: none;" <?php endif; ?>><a href="javascript:;" data-bind="click: Modal.LoadImage"><i class="material-icons">add_to_photos</i><span>Thêm ảnh đại diện</span></a></div>
                                <?php echo media_modal(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>