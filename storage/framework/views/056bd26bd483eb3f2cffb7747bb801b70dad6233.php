<?php $__env->startSection('titlePage','Thêm mới nhân viên'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/user"),
        'heading_link_text' => 'Danh sách nhân viên',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-user">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form id="account-form" action="<?php echo e(url('admin/user/create')); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Chung</h4>
                        <p>Một số thông tin chung để sử dụng các chức năng trên website.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input class="form-control" name="fullname" type="text" value="<?php echo e(old('fullname')); ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" name="phone" type="text" value="<?php echo e(old('telephone')); ?>" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-length="[8, 11]" data-parsley-pattern-message="Số điện thoại không hợp lệ" data-parsley-length-message="Số điện thoại không hợp lệ" data-parsley-type="integer" data-parsley-type-message="Số điện thoại không hợp lệ" data-parsley-trigger="change focusout" />
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group m-b-0">
                                <label>Email</label>
                                <input class="form-control" name="email" type="text" value="<?php echo e(old('email')); ?>" required maxlength="60" data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-type="email" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-maxlength="60" data-parsley-maxlength-message="Địa chỉ Email quá dài." />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-0 m-t-1">
                                        <label>Mật khẩu</label>
                                        <input id="password" class="form-control" name="password" type="password" value="" required minlength="8" data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-minlength-message="Mật khẩu ngắn thường dễ đoán. Hãy thử mật khẩu có ít nhất 8 ký tự." />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group m-b-0 m-t-1">
                                        <label>Xác nhận mật khẩu</label>
                                        <input id="password_confirmation" class="form-control" name="password_confirmation" type="password" value="" required data-parsley-trigger="change focusout" data-parsley-equalto="#password" data-parsley-equalto-message="Các mật khẩu này không khớp. Thử lại?" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" />
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
                        <h4>Địa chỉ liên hệ</h4>
                        <p>Dùng để lưu trữ các thông tin liên hệ của nhân viên.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <textarea name="address" class="form-control" rows="3"><?php echo e(old('address')); ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <?php $customer_province = old('provinces'); ?>
                                        <select name="provinces" id="provinces" class="form-control" data-bind="change: General.GetDistricts">
                                            <option value="choose">Chọn tỉnh/thành phố</option>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option <?php if( $customer_province == $province->province_id ): ?> selected <?php endif; ?> value="<?php echo e($province->province_id); ?>"><?php echo e($province->province_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quận/Huyện</label>
                                        <?php $customer_district = old('districts'); ?>
                                        <select name="districts" id="districts" class="form-control">
                                            <option value="choose">Chọn quận/huyện</option>     
                                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option <?php if( $customer_district == $district->district_id ): ?> selected <?php endif; ?> value="<?php echo e($district->district_id); ?>"><?php echo e($district->district_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                
                                        </select>
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
                        <h4>Thông tin bổ sung</h4>
                        <p>Các thiết lập dùng để giới hạn chức năng sử dụng và hiệu lực của tài khoản.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="row">
                                <?php $userCurrentLevel = Session::get('user_level'); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <?php $gender = old('gender',''); ?>
                                        <select name="gender" class="form-control" required data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này">
                                            <option value=""<?php if( !$gender): ?> selected="selected"<?php endif; ?>>— Chọn giới tính —</option>
                                            <option value="1"<?php if( $gender == '1' ): ?> selected="selected"<?php endif; ?>>Nam</option>
                                            <option value="2"<?php if( $gender == '2' ): ?> selected="selected"<?php endif; ?>>Nữ</option>
                                            <option value="3"<?php if( $gender == '3' ): ?> selected="selected"<?php endif; ?>>Khác</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tình trạng</label>
                                        <select name="status" class="form-control" required data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này">
                                            <?php $status = old('status','choise'); ?>
                                            <option value=""<?php if( !$status ): ?> selected="selected"<?php endif; ?>>— Chọn tình trạng —</option>
                                            <option value="1"<?php if( $status == '1' ): ?> selected="selected"<?php endif; ?>>Kích hoạt</option>
                                            <option value="0"<?php if( $status == '0' ): ?> selected="selected"<?php endif; ?>>Vô hiệu hóa</option>
                                        </select> 
                                    </div>
                                </div>
                            </div>  
                            <div class="form-group m-b-0">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="4" name="notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="clearfix">
                    <div class="pull-xs-right">
                        <a href="<?php echo e(url('admin/user')); ?>" class="btn btn-link">Hủy</a>
                        <button type="submit" class="btn btn-primary waves-effect">Thêm người dùng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>