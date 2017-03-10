<?php $__env->startSection('content'); ?>

<main class="padding-top-mobile">
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li><a href="/account" target="_self">Tài khoản</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li class="active"><span>Ðăng ký</span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <section class="layout-account">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <div id="register" class="userbox">
                  <h1>
                     Đăng ký
                  </h1>
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
                     <div id="last_name" class="input-group input-account mb15">
                        <label class="input-group-addon"><i class="icon-userico"></i></label>
                        <input type="text" name="name" placeholder="Họ tên" id="last_name" class="form-control" size="30" value="<?php echo e(old('name')); ?>">
                     </div>
                     <div id="email" class="input-group input-account mb15">
                        <label class="input-group-addon"><i class="icon-login icon-envelope"></i></label>
                        <input type="email" placeholder="Email" name="email" id="email" class="form-control" size="30" value="<?php echo e(old('email')); ?>">
                     </div>
                     <div id="password" class="input-group input-account mb15">
                        <label class="input-group-addon"><i class="icon-login icon-shield"></i></label>
                        <input type="password" placeholder="Mật khẩu" name="password" id="password" class="form-control" size="30">
                     </div>
                     <div id="password" class="input-group input-account mb15">
                        <label class="input-group-addon"><i class="icon-login icon-shield"></i></label>
                        <input type="password" placeholder="Xác nhận mật khẩu" name="password_confirmation" id="password" class="form-control" size="30">
                     </div>
                     <div id="password" class="input-group input-account mb15">
                        <label class="input-group-addon"><i class="icon-login icon-userico"></i></label>
                        <select name="gender" class="form-control">
                            <option value="choise">— Chọn giới tính —</option>
                            <option value="1" <?php if( old('gender') == '1' ): ?>selected="selected"<?php endif; ?> >Nam</option>
                            <option value="2" <?php if( old('gender') == '2' ): ?>selected="selected"<?php endif; ?> >Nữ</option>
                            <option value="3" <?php if( old('gender') == '3' ): ?>selected="selected"<?php endif; ?> >Khác</option>
                        </select>
                    </div>
                     <div class="action_bottom mb15">
                        <input class="btn" type="submit" value="Đăng ký">			
                     </div>
                     <div class="req_pass">
                        <a class="come-back" href="<?php echo e(url('customer/login')); ?>">Quay về</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
            

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien6.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>