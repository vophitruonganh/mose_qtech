<?php $__env->startSection('content'); ?>
<div id="maincontainer">
    <div class="container">
        <div class="row">
            <div id="layout-page" class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                <span class="header-contact header-page clearfix">
                    <h1 class="heading1"><span class="maintext">Tạo tài khoản</span></h1>
                </span>
                <div class="userbox form-horizontal">
                    <?php if( count($errors) > 0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                    <?php endif; ?>
                    <form accept-charset="UTF-8" action="<?php echo e(url('customer/register')); ?>" id="create_customer" method="post">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <!--
                        <input name="form_type" type="hidden" value="create_customer">
                        <input name="utf8" type="hidden" value="✓">
                        -->
                        <div id="first_name" class="clearfix large_form control-group">
                            <label for="first_name" class="control-label"><span class="red">*</span>Họ Tên</label>
                            <div class="controls">      
                                <input required="" type="text" value="<?php echo e(old('name')); ?>" name="name" placeholder="Họ Tên" id="first_name" class="text" size="30">
                            </div>
                        </div>
                        <div id="email" class="clearfix large_form control-group">
                            <label for="email" class="control-label"><span class="red">*</span>Email đăng nhập</label>
                            <div class="controls">  
                                <input required="" type="email" value="<?php echo e(old('email')); ?>" placeholder="Email" name="email" id="email" class="text" size="30">
                            </div>
                        </div>
                        <div id="password" class="clearfix large_form control-group">
                            <label for="password" class="control-label"><span class="red">*</span>Mật khẩu</label>
                            <div class="controls">  
                                <input required="" type="password" value="" placeholder="Mật khẩu" name="password" id="password" class="password text" size="30">
                            </div>
                        </div>
                        <div id="password_confirmation" class="clearfix large_form control-group">
                            <label for="password_confirmation" class="control-label"><span class="red">*</span>Xác Nhận Mật khẩu</label>
                            <div class="controls">  
                                <input required="" type="password" value="" placeholder="Mật khẩu" name="password_confirmation" id="password_confirmation" class="password text" size="30">
                            </div>
                        </div>
                        <div id="password_confirmation" class="clearfix large_form control-group">
                            <label for="password_confirmation" class="control-label"><span class="red">*</span>Giới Tính</label>
                            <div class="controls">  
                                <select name="gender">
                                    <option value="choise">— Chọn giới tính —</option>
                                    <option value="1" <?php if( old('gender') == '1' ): ?>selected="selected"<?php endif; ?> >Nam</option>
                                    <option value="2" <?php if( old('gender') == '2' ): ?>selected="selected"<?php endif; ?> >Nữ</option>
                                    <option value="3" <?php if( old('gender') == '3' ): ?>selected="selected"<?php endif; ?> >Khác</option>
                                </select> 
                            </div>
                        </div>
                        <div class="action_bottom control-group">
                            <label class="control-label">&nbsp;</label>
                            <div class="controls">
                                <input class="btn btn-orange " type="submit" value="Đăng ký">       
                            </div>
                        </div>
                        <div class="req_pass control-group">
                            <label class="control-label">&nbsp;</label>
                            <div class="controls">
                                <a class="come-back" href="<?php echo e(url('customer/login')); ?>"><i class="fa fa-reply"></i> Quay lại trang đăng nhập</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #register -->
        <!-- #customer-register -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>