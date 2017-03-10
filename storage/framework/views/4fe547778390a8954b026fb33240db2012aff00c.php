<?php $__env->startSection('content'); ?> 
      
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><strong>Đăng nhập tài khoản</strong></li>
         </ul>
      </div>
   </div>
</div>

<section class="main-container col1-layout">
   <div class="main container">
      <div class="account-login">
         <div class="page-title">
            <h2>Đăng nhập</h2>
         </div>
         <fieldset class="col2-set">
            <legend>Đăng nhập / tạo tài khoản</legend>
             <?php if( Session::has('loginFrontend') ): ?>
                  Bạn đã đăng nhập
               <?php else: ?>
                   <h1>
                     Đăng nhập
                  </h1>
                  <?php if( count($errors) > 0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                  <?php endif; ?>
            <div class="col-2 registered-users">
               <strong>Đăng nhập</strong>
               <div class="content">
                  
                  <form accept-charset="UTF-8" action="<?php echo e(url('customer/login')); ?>" id="customer_login" method="post" style="display: block;">
                     <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                     <input name="utf8" type="hidden" value="true">
                     <ul class="form-list">
                        <li>
                           <label for="email">Email <span class="required">*</span></label>
                           <br>
                           <input type="email" title="Email Address" class="input-text required-entry" id="email" value="" name="email">
                        </li>
                        <li>
                           <label for="pass">Mật khẩu <span class="required">*</span></label>
                           <br>
                           <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password">
                        </li>
                     </ul>
                     <p class="required">* Yêu cầu bắt buộc</p>
                     <div class="buttons-set">
                        <button id="send2" name="send" type="submit" class="button login"><span>Đăng nhập</span></button>
                         
                     </div>
                  </form>
                  <div id="recover_password" style="display: none;">
                     <h3>Đặt lại mật khẩu</h3>
                     <p id="intro note-reset">Chúng tôi sẽ gửi cho bạn một email để kích hoạt việc đặt lại mật khẩu.</p>
                     <form accept-charset="UTF-8" action="/account/recover" id="recover_customer_password" method="post">
                        <input name="FormType" type="hidden" value="recover_customer_password">
                        <input name="utf8" type="hidden" value="true">
                        <label for="email">Email<span id="required">*</span></label>
                        <input style="height:34px;" type="email" class="input-control" value="" title="email" name="email" id="email">
                        <p class="action-btn" style="margin-top: 15px;">
                           <input type="submit" class="button stl_btn_reg" value="Gửi">
                           hoặc <a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
                        </p>
                     </form>
                  </div>
               </div>
            </div>
             <?php endif; ?>
            <div class="col-1 new-users">
               <strong>Khách hàng mới</strong>
               <div class="content">
                  <p>Bằng cách tạo một tài khoản với cửa hàng của chúng tôi , bạn sẽ có thể thực hiện những quy trình mua hàng nhanh hơn , lưu trữ nhiều địa chỉ gửi hàng , xem và theo dõi đơn đặt hàng của bạn trong tài khoản của bạn và nhiều hơn nữa .</p>
                  <div class="buttons-set">
                     <button onclick="window.location='<?php echo e(url("customer/register")); ?>';" class="button create-account" type="button"><span>Tạo tài khoản</span></button>
                  </div>
               </div>
            </div>
         </fieldset>
      </div>
      <br>
   </div>
</section>



      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>