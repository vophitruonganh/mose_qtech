<?php $__env->startSection('content'); ?> 
      
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><strong>Đăng ký tài khoản</strong></li>
         </ul>
      </div>
   </div>
</div>

<section class="main-container col1-layout">
   <div class="main container">
      <div class="account-login">
         <div class="page-title">
            <h2>Tạo tài khoản</h2>
         </div>
         <fieldset class="col2-set register_styl">
            <legend>Thông tin cá nhân</legend>
            <div class="col-1 new-users">
               <div class="content">
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
                     <div class="form-group">
                        <label for="last_name">Họ tên<span id="required">*</span></label>
                        <input style="border-radius:0px;" type="text" name="name" id="last_name" class="form-control" placeholder="Họ tên" value="<?php echo e(old('name')); ?>">
                     </div>
                     <div class="form-group">
                        <label for="email">Email<span id="required">*</span></label>
                        <input style="border-radius:0px;" type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                     </div>
                     <div class="form-group">
                         <label for="last_name">Giới tính<span id="required"></span></label>
                        <select name="gender" class="form-control">
                            <option value="choise">— Chọn giới tính —</option>
                            <option value="1" <?php if( old('gender') == '1' ): ?>selected="selected"<?php endif; ?> >Nam</option>
                            <option value="2" <?php if( old('gender') == '2' ): ?>selected="selected"<?php endif; ?> >Nữ</option>
                            <option value="3" <?php if( old('gender') == '3' ): ?>selected="selected"<?php endif; ?> >Khác</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="customer_password">Mật khẩu<span id="required">*</span></label>
                        <input style="border-radius:0px;" type="password" class="form-control" name="password" id="creat_password" placeholder="Mật khẩu">
                     </div>
                     <div class="form-group ">
                        <label for="customer_password">Xác nhận mật khẩu<span id="required">*</span></label>
                        <input style="border-radius:0px;" type="password" class="form-control" name="password_confirmation" id="creat_password" placeholder="Mật khẩu">
                     </div>
                     <div class="fvc">
                        <p>Những trường <span id="required">*</span> là trường bắt buộc</p>
                        <button style=" border-radius:0px; border:none; background:#292929;padding: 10px 25px; color:#fff;" type="submit" class="btn btn-default button-red">Đăng ký</button>
                        <a href="/account/login">
                        </a><button style="float:left; border-radius:0px; border:none;  background:#292929; padding: 10px 25px; margin-right: 15px; color:#fff;" type="submit" class="btn btn-default button-red"><a href="<?php echo e(url('customer/login')); ?>"></a><a style="color:#fff;" href="/">Quay lại</a></button>
                     </div>
                  </form>
               </div>
            </div>
         </fieldset>
      </div>
      <br>
   </div>
</section>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>