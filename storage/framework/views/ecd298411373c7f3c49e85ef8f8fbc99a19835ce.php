<?php $__env->startSection('titlePage','Chỉnh sửa trang'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/page"),
        'heading_link_text' => 'Danh sách trang',
        'heading_text' => 'Chỉnh sửa',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/page/create').'">Thêm mới trang</a>'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-post">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form action="<?php echo e(url('admin/page/edit/'.$post->post_id)); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p b-t-m">
                        <div class="form-group">
                            <label>Tiêu đề trang</label>
                            <input type="text" class="form-control meta-title" name="title" value="<?php echo e(old('title',$post->post_title)); ?>" />
                        </div>
                        <div class="form-group">
                            <div class="post-slug-group input-group">
                                <label class="sr-only">Đường dẫn</label>
                                <span class="input-group-addon"><?php echo e(main_site_url()); ?>/<?php echo e($seo_data['seo_url']); ?></span>
                                <input type="text" name="slug" value="<?php echo e(old('slug',$post->post_slug)); ?>" class="form-control" readonly="readonly" />
                                <span class="input-group-btn"><button type="button" class="btn btn-secondary" data-bind="click: General.ChangeSlug"><i class="font-icon material-icons md-16">mode_edit</i></button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="6" name="content" data-plugin="tinymce"><?php echo e(old('content',$post->post_content)); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea rows="3" class="form-control meta-description" name="excerpt" class="editor"><?php echo e(old('excerpt',$post->post_excerpt)); ?></textarea>
                            <small class="text-muted">Mặc định nếu mô tả để trống sẽ lấy từ nội dung để hiển thị.</small>
                        </div>
                    </div>
                    <?php echo seo_content($seo_data); ?>

                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link text-danger" href="<?php echo e(url('admin/page/trash/'.$post->post_id)); ?>">Xóa trang</a>
                                <button type="submit" class="btn btn-primary waves-effect">Cập nhật</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="proj-page-subtitle"><h3>Thông tin</h3></div>
                            <div class="misc-actions">
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select">
                                        <label class="misc-label m-b-0">Tình trạng:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_status"><?php if( $post->post_status == 'public' ): ?> Công khai <?php elseif( $post->post_status == 'pending' ): ?> Đang chờ duyệt <?php elseif( $post->post_status == 'draft' ): ?> Nháp <?php elseif( $post->post_status == 'trash' ): ?> Xóa <?php endif; ?></label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_post_status" value="<?php echo e($post->post_status); ?>" data-bind="value: post_status" />
                                    </div>
                                    <div id="post-status-select" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <select name="post_status" class="form-control misc-select-text" data-model="post_status">
                                                <option <?php if($post->post_status=='public'): ?><?php echo e('selected="selected"'); ?> <?php endif; ?> value="public">Công khai</option>
                                                <option <?php if($post->post_status=='pending'): ?><?php echo e('selected="selected"'); ?><?php endif; ?> value="pending">Đang chờ duyệt</option>
                                                <option <?php if($post->post_status=='draft'): ?><?php echo e('selected="selected"'); ?><?php endif; ?> value="draft">Nháp</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date">
                                        <label class="misc-label m-b-0">Vào lúc:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_date"><?php echo e(date('H:i d/m/Y',$post->post_date)); ?></label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                    </div>
                                    <div id="misc-post-date" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <input type="text" name="post_date" class="form-control" data-plugin="datetimepicker" value="<?php echo e(date('H:i d/m/Y',$post->post_date)); ?>" placeholder="Ngày tạo" data-model="post_date" />
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select">
                                        <label class="misc-label m-b-0">Bình luận:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_comment"><?php if( $post->comment_status == 'yes' ): ?> Mở <?php elseif( $post->comment_status == 'no' ): ?> Đóng <?php endif; ?></label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_post_comment" value="<?php echo e($post->comment_status); ?>" data-bind="value: post_comment" />
                                    </div>
                                    <div id="post-comment-select" class="form-inline collapse extend">
                                        <select name="post_comment" class="form-control misc-select-text" data-model="post_comment">
                                            <option <?php if($post->comment_status=='yes'): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?> value="yes">Mở</option>
                                            <option <?php if($post->comment_status=='no'): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?> value="no">Đóng</option>
                                        </select>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <label class="misc-label m-b-0">Người đăng:</label>
                                    <label class="misc-label-text m-b-0"><a href="<?php echo e(url('admin/page?user_id='.$post->user_id)); ?>"><?php if( strlen($post->user_fullname) > 0 ): ?> <?php echo e($post->user_fullname); ?> <?php else: ?> <?php echo e($post->user_email); ?> <?php endif; ?></a></label>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-fi">
                            <div class="proj-page-subtitle"><h3>Ảnh đại diện</h3></div>
                            <div id="post-image-group">
                                <div id="post-image-thumbnail" <?php if(!old('post_image_id',$post->post_image)): ?> style="display: none;" <?php endif; ?>>
                                    <a href="javascript:;" data-bind="click: Modal.LoadImage"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="<?php echo e(get_image_url($post->post_image)); ?>" /></div></div></div></a>
                                    <input type="hidden" name="post_image_url" value="<?php echo e(old('post_image_url',get_image_url($post->post_image))); ?>" />
                                    <input type="hidden" name="post_image_id" value="<?php echo e(old('post_image_id',$post->post_image)); ?>" />
                                    <div class="thumbnail-remove"><button class="btn btn-link text-danger" data-bind="click: Post.RemoveImage">Xóa ảnh đại diện</button></div>
                                </div>
                                <div id="post-image-modal" <?php if(old('post_image_id',$post->post_image)): ?> style="display: none;" <?php endif; ?>><a href="javascript:;" data-bind="click: Modal.LoadImage"><i class="material-icons">add_to_photos</i><span>Thêm ảnh đại diện</span></a></div>
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