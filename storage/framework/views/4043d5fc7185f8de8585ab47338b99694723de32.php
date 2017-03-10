<?php $__env->startSection('content'); ?>


 <!--breadcrumbs-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="breadcrumbs">
                <ul>
                    <li class="home"> <a href="/" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                    <li><strong>Đăng kí</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumbs--> 
<!--container-->
<div class="container">
    <h1 class="form-title">Thông tin cá nhân</h1>
    <div class="row">
        <div class="account-area fix_register">
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-area">
                    <?php if( count($errors) > 0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                    <?php endif; ?>
                    <form accept-charset="UTF-8" action="<?php echo e(url('customer/register')); ?>" id="customer_register" method="post">
                        <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <input name="FormType" type="hidden" value="customer_register">
                        <input name="utf8" type="hidden" value="true"> 
                        <div class="form-fields">
                            <p>
                                <label>Họ tên <span class="required">*</span></label> 
                                <input type="text" name="name" id="last_name" placeholder="Họ tên" value="<?php echo e(old('name')); ?>">
                            </p>
                            <p>
                                <label>Mật khẩu <span class="required">*</span></label> 
                                <input type="password" name="password" id="password" placeholder="mật khẩu">
                            </p>
                            <p>
                                <label>Email<span class="required">*</span></label> 
                                <input type="text" name="email" id="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                            </p>
                            <p>
                                <label> Xác Nhận Mật khẩu <span class="required">*</span></label> 
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="xác nhận">
                            </p>
                            <p>
                                <label> Giới tính <span class="required">*</span></label> 
                                 <select name="gender">
                                  <option value="choise">— Chọn giới tính —</option>
                                  <option value="1" <?php if( old('gender') == '1' ): ?>selected="selected"<?php endif; ?> >Nam</option>
                                  <option value="2" <?php if( old('gender') == '2' ): ?>selected="selected"<?php endif; ?> >Nữ</option>
                                  <option value="3" <?php if( old('gender') == '3' ): ?>selected="selected"<?php endif; ?> >Khác</option>
                                </select> 
                            </p>
                        </div>
                        <div class="form-action fix" style="margin-bottom:30px;"> 
                            <input type="submit" value="Đăng ký"> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end container-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien3.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>