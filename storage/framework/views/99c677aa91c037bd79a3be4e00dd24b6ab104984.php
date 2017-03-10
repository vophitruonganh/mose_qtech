<?php $__env->startSection('content'); ?>
<div id="maincontainer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="layout-page">
                <h1 class="heading1"><span class="maintext">Đăng nhập</span></h1>
                <div id="customer-login">
                    <div id="login" class="userbox form-horizontal">
                        <div class="accounttype">
                            <h2 class="title"></h2>
                        </div>
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
                        <form accept-charset="UTF-8" action="<?php echo e(url('customer/login')); ?>" id="customer_login" method="post">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <!--
                            <input name="form_type" type="hidden" value="customer_login">
                            <input name="utf8" type="hidden" value="✓">
                            -->
                            <div class="clearfix large_form control-group">
                                <label for="customer_email" class="control-label"><span class="red">*</span> Tên đăng nhập</label>
                                <div class="controls">
                                    <input required="" type="email" value="" name="email" id="customer_email" placeholder="Email" class="text">
                                </div>
                            </div>
                            <div class="clearfix large_form control-group">
                                <label for="customer_password" class="control-label"><span class="red">*</span> Mật khẩu</label>
                                <div class="controls">
                                    <input required="" type="password" value="" name="password" id="customer_password" placeholder="Mật khẩu" class="text" size="16">      
                                </div>
                            </div>
                            <div class="action_bottom control-group">
                                <label class="control-label">&nbsp;</label>
                                <div class="controls">
                                    <input class="btn btn-orange" type="submit" value="Đăng nhập">
                                </div>
                            </div>
                            <div class="clearfix large_form control-group">
                                <label class="control-label">&nbsp;</label>
                                <div class="req_pass controls">
                                    <!--
                                    <a href="#" onclick="showRecoverPasswordForm();return false;">Quên mật khẩu?</a>
                                    hoặc <a href="/account/register" title="Đăng ký" class="">Đăng ký</a>
                                    -->
                                    <a href="<?php echo e(url('customer/register')); ?>" title="Đăng ký" class="">Đăng ký</a>
                                </div>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                    <!--
                    <div id="recover-password" class="form-horizontal" style="display:none;">
                        <div class="accounttype ">
                            <h2>Phục hồi mật khẩu</h2>
                        </div>
                        <form accept-charset="UTF-8" action="/account/recover" method="post">
                            <input name="form_type" type="hidden" value="recover_customer_password">
                            <input name="utf8" type="hidden" value="✓">
                            <div class="control-group">
                                <label for="email" class="control-label">Mật khẩu mới</label>
                                <div class="controls">
                                    <input type="email" value="" size="30" name="email" placeholder="Email" id="recover-email" class="text">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="email" class="control-label">&nbsp;</label>
                                <div class="action_bottom controls">
                                    <input class="btn btn-orange" type="submit" value="Gửi">
                                    <a href="#" class="btn btn-orange" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    -->
                </div>
            </div>
        </div>
        <!--
        <script type="text/javascript">
            function showRecoverPasswordForm() {
            document.getElementById('recover-password').style.display = 'block';
            document.getElementById('login').style.display='none';
            }
            
            function hideRecoverPasswordForm() {
            document.getElementById('recover-password').style.display = 'none';
            document.getElementById('login').style.display = 'block';
            }
            
            if (window.location.hash == '#recover') { showRecoverPasswordForm() }
        </script>
        -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>