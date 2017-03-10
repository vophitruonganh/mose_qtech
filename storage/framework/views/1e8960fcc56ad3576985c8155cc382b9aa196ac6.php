<?php $__env->startSection('content'); ?>
 
      
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><strong>Liên hệ</strong></li>
         </ul>
      </div>
   </div>
</div>



<div class="google-map">
    <iframe src="<?php echo e($google_map['url']); ?>" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="container" style="margin-top: 20px;">
   <div class="row">
      <div class="col-md-6">
         <div class="form_blog_comment">
               <?php if( count($errors) > 0 ): ?>
                  <ul>
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <li><?php echo e($error); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
               <?php endif; ?>
            <form accept-charset="UTF-8" action="<?php echo e(url('pages/contact')); ?>" id="contact" method="post">
               <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
               <input name="FormType" type="hidden" value="contact">
               <input name="utf8" type="hidden" value="true">				
               <h4 style="text-transform:uppercase; margin-top: 20px;font-weight: bold;font-family: 'Open Sans', sans-serif;">Liên hệ với chúng tôi</h4>
               <div class="form-group">
                  <label for="name">Tên<span id="required">*</span></label>
                  <input placeholder="Tên" id="name" name="name" type="text" class="form-control" value="<?php echo e(old('name')); ?>">
               </div>
               <div class="form-group">
                  <label>Email<span id="required">*</span></label>
                  <input placeholder="Email" id="email" name="email" class="form-control" type="email" value="<?php echo e(old('email')); ?>">
               </div>
               <div class="form-group">
                  <label>Số điện thoại <span id="required"></span></label>
                  <input placeholder="Số điện thoại" id="phone" name="phone" type="text" value="<?php echo e(old('phone')); ?>" class="form-control">
               </div>
               <div class="form-group">
                  <div class="form-group">
                     <label for="exampleInputEmail1">Ý kiến<span id="required">*</span></label>
                     <textarea id="message" name="message" style="height: 120px;" class="form-control" rows="7"><?php echo e(old('message')); ?></textarea>
                  </div>
                  <div class="form-group">
                     <p>Những trường <span id="required">*</span> là bắt buộc</p>
                     <button style="border-radius: 0px;padding: 7px 30px;" type="submit" class="btn btn-default stl_btn_reg">Gửi</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="col-md-6">
         <a class="logo" href="//bike-themes.bizwebvietnam.net" style="margin: 30px 0;float: left;width: 100%; ">
             <img alt="Bike-themes" src="<?php echo e(asset('template/giaodien11/asset/images/logo_contact.png')); ?>">
         </a>
         <!--
         <p style="font-size:14px; color:#777;margin-bottom: 20px; margin-top:20px;">DKT được thành lập với niềm đam mê và khát vọng thành công trong lĩnh vực Thương mại điện tử.Chúng tôi đã và đang khẳng định được vị trí hàng đầu bằng những sản phẩm</p>
         -->
         <ul style="list-style:none; margin:0px;">
            <li>
               <p style="color:#333"><span style="color:#777" class="glyphicon glyphicon-map-marker"></span> &nbsp; <?php echo e($storeSetting['address']); ?></p>
            </li>
            <li>
               <p style="color:#333">
                  <span style="color:#777" class="glyphicon glyphicon-earphone"></span> &nbsp;  <?php echo e($storeSetting['telephone']); ?>

               </p>
            </li>
            <li>
               <p style="color:#333">
                  <i style="color:#777" class="fa fa-archive"></i> &nbsp;  <?php echo e($storeSetting['telephone']); ?>

               </p>
            </li>
            <li>
               <p style="color:#383838">
                  <span style="color:#777" class="glyphicon glyphicon-envelope"></span> &nbsp;<span style="color:#777"> <?php echo e($storeSetting['email']); ?></span>
               </p>
            </li>
         </ul>
      </div>
   </div>
   

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>