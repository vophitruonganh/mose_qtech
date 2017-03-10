<?php $__env->startSection('content'); ?>

<!--breadcrumbs-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="breadcrumbs">
                <ul>
                    <li class="home"> <a href="/" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                    <li><strong>Đăng nhập</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumbs--> 
<!--container-->
<div class="container">
    <div class="row">
        <div class="account-area fix">
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <h1 class="form-title">Thông tin cá nhân</h1>
                <div class="form-area">
                    <?php if( count($errors) > 0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                    <?php endif; ?>
                    <?php if( Session::has('loginFrontend') ): ?>
                        Bạn đã đăng nhập
                    <?php else: ?>
                    <form action="<?php echo e(url('customer/login')); ?>" method="post">
                        <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div class="form-fields">
                            <p>
                                <label>Email<span class="required">*</span></label> 
                                <input type="text" title="Email Address" class=" input-themes" id="email" name="email">
                            </p>
                            <p>
                                <label>Mật khẩu <span class="required">*</span></label> 
                                <input type="password" title="Password" id="pass" class=" required-entry input-themes" name="password">
                            </p>
                        </div>
                        <div class="form-action fix">
                            <!-- <p style="float: left;width: 100%;"><a class="forgot forgot-word" href="#recover" onClick="showRecoverPasswordForm();return false;" id="RecoverPassword">Quên mật khẩu?</a></p> -->
                            <input name="send" type="submit" value="Đăng nhập"> 
                        </div>
                    </form>
                    <?php endif; ?>
                    
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <h2 class="form-title">Bạn chưa có tài khoản ?</h2>
                <div class="form-area">
                    <p>Đăng ký tài khoản ngay để có thể mua hàng nhanh chóng và dễ dàng hơn  ! Ngoài ra còn có rất nhiều chính sách và ưu đãi cho các thành viên citybike</p>
                </div>
                <div class="form-action fix_register">
                    <a href="<?php echo e(url('customer/register')); ?>">Đăng ký</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- end container-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien3.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>