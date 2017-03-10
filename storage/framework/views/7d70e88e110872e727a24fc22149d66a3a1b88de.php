<?php $__env->startSection('titlePage','Chỉnh sửa nhân viên'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $userCurrentLevel = Session::get('user_level');
    $heading = array(
        'heading_link' => url("admin/user"),
        'heading_link_text' => 'Danh sách nhân viên',
        'heading_text' => 'Chỉnh sửa'
    );
    if( $userCurrentLevel != 3 ){
        $heading["heading_button"] = '<a class="btn btn-primary waves-effect" href="'.url('admin/user/create').'">Thêm mới nhân viên</a>';
    }
    
    $setion_heading = section_title($heading);
?>
    <div class="section-user">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form id="account-form" action="<?php echo e(url('admin/user/edit/'.$user->user_id)); ?>" method="post" data-parsley-validate>
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Chung</h4>
                        <p>Một số thông tin chung để sử dụng các chức năng trên website.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                <input id="username" class="form-control" name="username" type="text" value="<?php echo e(old('username',$user->user_username)); ?>" minlength="6" maxlength="30" data-parsley-trigger="change focusout" data-parsley-length="[6, 30]" data-parsley-length-message="Vui lòng sử dụng từ 6 đến 30 ký tự." />
                                <small class="text-muted">Nếu để trống bạn có thể sử dụng email để đăng nhập</small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" name="email" type="text" value="<?php echo e(old('email',$user->user_email)); ?>" required maxlength="60" data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-type="email" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-maxlength="60" data-parsley-maxlength-message="Địa chỉ Email quá dài." />
                                <small class="text-muted">Email dùng để quản lý các tác vụ của website</small>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input id="password" class="form-control" name="password" type="password" value="" minlength="8" data-parsley-trigger="change focusout" data-parsley-minlength-message="Mật khẩu ngắn thường dễ đoán. Hãy thử mật khẩu có ít nhất 8 ký tự." />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                                        <input id="password_confirmation" class="form-control" name="password_confirmation" type="password" value="" data-parsley-trigger="change focusout" data-parsley-equalto="#password" data-parsley-equalto-message="Các mật khẩu này không khớp. Thử lại?" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Cá nhân</h4>
                        <p>Dùng để lưu trữ các thông tin liên hệ của người dùng.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nickname">Họ tên</label>
                                        <input id="nickname" class="form-control" name="nickname" type="text" value="<?php echo e(old('nickname',$user->user_nickname)); ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Số điện thoại</label>
                                        <input id="telephone" class="form-control" name="telephone" type="text" value="<?php echo e(old('telephone',$user->user_telephone)); ?>" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-length="[8, 11]" data-parsley-pattern-message="Số điện thoại không hợp lệ" data-parsley-length-message="Số điện thoại không hợp lệ" data-parsley-type="integer" data-parsley-type-message="Số điện thoại không hợp lệ" data-parsley-trigger="change focusout" />
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <textarea name="address" id="address" class="form-control" rows="3"><?php echo e(old('address',$userMeta['user_address'])); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nickname">Giới tính</label>
                                <?php $gender = old('gender',$userMeta['user_gender']); ?>
                                <select id="gender" name="gender" class="form-control" required data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này">
                                    <option value=""<?php if( !$gender): ?> selected="selected"<?php endif; ?>>>— Chọn giới tính —</option>
                                    <option value="1"<?php if( $gender == '1' ): ?> selected="selected"<?php endif; ?>>Nam</option>
                                    <option value="2"<?php if( $gender == '2' ): ?> selected="selected"<?php endif; ?>>Nữ</option>
                                    <option value="3"<?php if( $gender == '3' ): ?> selected="selected"<?php endif; ?>>Khác</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Thiết lập</h4>
                        <p>Các thiết lập dùng để giới hạn chức năng sử dụng và hiệu lực của tài khoản.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Quyền hạn</label>
                                        <select id="level" name="level" class="form-control" required data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này">
                                        <?php $level = old('level',$user->user_level); ?>
                                        <?php if( $userCurrentLevel == 1 ): ?>
                                            <option value=""<?php if( !$level): ?> selected="selected"<?php endif; ?>>— Chọn quyền hạn —</option>
                                            <option value="3"<?php if( $level == '3' ): ?> selected="selected"<?php endif; ?>>Nhân viên</option>
                                            <option value="2"<?php if( $level == '2' ): ?> selected="selected"<?php endif; ?>>Quản lý</option>
                                         <?php elseif( $userCurrentLevel == 2 ): ?>
                                            <option value=""<?php if( !$level): ?> selected="selected"<?php endif; ?>>— Chọn quyền hạn —</option>
                                            <option value="3"<?php if( $level == '3' ): ?> selected="selected"<?php endif; ?>>Nhân viên</option>
                                        <?php endif; ?>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Tình trạng</label>
                                        <select id="status" name="status" class="form-control" required data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này">
                                            <?php $status = old('status',$user->user_status); ?>
                                            <option value=""<?php if( !$status): ?> selected="selected"<?php endif; ?>>— Chọn tình trạng —</option>
                                            <option value="1"<?php if( $status == '1' ): ?> selected="selected"<?php endif; ?>>Kích hoạt</option>
                                            <option value="0"<?php if( $status == '0' ): ?> selected="selected"<?php endif; ?>>Vô hiệu hóa</option>
                                        </select> 
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="clearfix">
                    <div class="pull-xs-right">
                        <a href="<?php echo e(url('admin/user')); ?>" class="btn btn-link">Hủy</a>
                        <button type="submit" class="btn btn-primary waves-effect">Cập nhât người dùng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>