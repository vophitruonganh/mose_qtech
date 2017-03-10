<?php $__env->startSection('content'); ?>

<div class="container">
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="layout-page">
         <span class="header-contact header-page clearfix">
            <h1>Đăng nhập</h1>
         </span>
         <div id="customer-login">
            <div id="login" class="userbox">
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
                  <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                  <input name="form_type" type="hidden" value="customer_login">
                  <input name="utf8" type="hidden" value="✓">
                  <div class="clearfix large_form">
                     <label for="customer_email" class="icon-field"><i class="icon-login icon-envelope "></i></label>
                     <input required="" type="email" value="" name="email" id="customer_email" placeholder="Email" class="text">
                  </div>
                  <div class="clearfix large_form">
                     <label for="customer_password" class="icon-field"><i class="icon-login icon-shield"></i></label>
                     <input required="" type="password" value="" name="password" id="customer_password" placeholder="Mật khẩu" class="text" size="16">      
                  </div>
                  <div class="action_bottom">
                     <input class="btn btn-signin" type="submit" value="Đăng nhập">
                  </div>
                  <div class="req_pass">
                      <a href="<?php echo e(url('customer/register')); ?>" title="Đăng ký">Đăng ký</a>
                  </div>
               </form>
            </div>
            <div id="recover-password" style="display:none;" class="userbox">
               <div class="accounttype">
                  <h2>Phục hồi mật khẩu</h2>
               </div>
               <form accept-charset="UTF-8" action="/account/recover" method="post">
                  <input name="form_type" type="hidden" value="recover_customer_password">
                  <input name="utf8" type="hidden" value="✓">
                  <label for="email" class="icon-field"><i class="icon-login icon-envelope "></i></label>
                  <input type="email" value="" size="30" name="email" placeholder="Email" id="recover-email" class="text">
                  <div class="action_bottom">
                     <input class="btn" type="submit" value="Gửi">
                  </div>
                  <div class="req_pass">
                     <a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
                  </div>
               </form>
            </div>
            <?php endif; ?>
         </div>
      </div>
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
   </div>
</div>


<?php $__env->stopSection(); ?> 
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>