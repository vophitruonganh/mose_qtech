<?php $__env->startSection('content'); ?>

<div class="container">
   <div class="row">
      <div id="layout-page" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
         <span class="header-contact header-page clearfix">
            <h1>Tạo tài khoản</h1>
         </span>
         <div class="userbox">
         <?php if( count($errors) > 0 ): ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                    <?php endif; ?>
            <form accept-charset="UTF-8" action="<?php echo e(url('customer/register')); ?>" id="create_customer" method="post">
               <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
               <input name="form_type" type="hidden" value="create_customer">
               <input name="utf8" type="hidden" value="✓">
               <div id="last_name" class="clearfix large_form">
                  <label for="last_name" class="label icon-field"><i class="icon-login icon-user "></i></label>
                  <input  type="text" value="<?php echo e(old('name')); ?>" name="name" placeholder="Họ và tên" id="last_name" class="text" size="30">
               </div>
               <div id="email" class="clearfix large_form">
                  <label for="email" class="label icon-field"><i class="icon-login icon-envelope "></i></label>
                  <input  type="email" value="<?php echo e(old('email')); ?>" placeholder="Email" name="email" id="email" class="text" size="30">
               </div>
               <div id="password" class="clearfix large_form">
                  <label for="password" class="label icon-field"><i class="icon-login icon-shield "></i></label>
                  <input  type="password" value="<?php echo e(old('password')); ?>" placeholder="Mật khẩu" name="password" id="password" class="password text" size="30">
               </div>
               <div id="password" class="clearfix large_form">
                  <label for="password" class="label icon-field"><i class="icon-login icon-shield "></i></label>
                  <input  type="password" value="<?php echo e(old('password_confirmation')); ?>" placeholder="Xác nhận mật khẩu" name="password_confirmation" id="password" class="password text" size="30">
               </div>
               <div id="gender" class="clearfix large_form">
                  <label for="gender" class="label icon-field"><i class="icon-login icon-user "></i></label>
                  <select id="gender" name="gender">
                        <option value="choise">— Chọn giới tính —</option>
                        <option value="1" <?php if( old('gender') == '1' ): ?>selected="selected"<?php endif; ?> >Nam</option>
                        <option value="2" <?php if( old('gender') == '2' ): ?>selected="selected"<?php endif; ?> >Nữ</option>
                        <option value="3" <?php if( old('gender') == '3' ): ?>selected="selected"<?php endif; ?> >Khác</option>
                  </select>
               </div>
               
               <div class="action_bottom">
                  <input class="btn" type="submit" value="Đăng ký">			
               </div>
               <div class="req_pass">
                  <a class="come-back" href="<?php echo e(url('customer/login')); ?>">Quay về trang đăng nhập</a>
               </div>
            </form>
         </div>
      </div>
      <!-- #register -->
      <!-- #customer-register -->
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>