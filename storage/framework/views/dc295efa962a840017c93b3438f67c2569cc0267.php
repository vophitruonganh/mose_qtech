<?php $__env->startSection('content'); ?>
<?php
 $key = 0;
 foreach( $background_page as $k => $v )
 {
   if( $v['url'] == Request::fullUrl() )
   {
     $key = $k;
     break;
   }
 }
?>
<section class="contact">
   <div class="page-heading" style="background-image: url(<?php echo e($background_page[$key]['image']); ?>);">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <h1>Liên hệ</h1>
            </div>
         </div>
      </div>
   </div>
   <div class="contact-page">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <ul class="breadcrumb">
                  <li><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
                  <!-- blog -->
                  <li class="active breadcrumb-title">Liên hệ</li>
                  <!-- current_tags -->
               </ul>
            </div>
            <div class="col-lg-6">
               <div class="contact-infomation">
                  <div class="box">
                     <div class="box-heading">
                        <h2>Thông tin liên hệ</h2>
                     </div>
                     <div class="box-content">
                        <!--
                           <p class="contact-infomation-title">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.</p>
                           -->
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="ci-hotline">
                                 <div class="ci-icon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <div class="ci-content">
                                    <h3>Điện thoại</h3>
                                    <p><?php echo e($storeSetting['telephone']); ?></p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="ci-email">
                                 <div class="ci-icon">
                                    <i class="fa fa-envelope"></i>
                                 </div>
                                 <div class="ci-content">
                                    <h3>Email</h3>
                                    <p><?php echo e($storeSetting['email']); ?></p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="ci-address">
                                 <div class="ci-icon">
                                    <i class="fa fa-map-marker"></i>
                                 </div>
                                 <div class="ci-content">
                                    <h3>Địa chỉ</h3>
                                    <p><?php echo e($storeSetting['address']); ?></p>
                                 </div>
                              </div>
                           </div>
                           <!--
                           <div class="col-lg-12">
                              <div class="ci-social">
                                 <div class="ci-icon">
                                    <i class="fa fa-map-marker"></i>
                                 </div>
                                 <div class="ci-content">
                                    <h3>Kênh thông tin</h3>
                                    <ul>
                                       <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                       <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                       <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                       <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="contact-sent">
                  <div class="box">
                     <div class="box-heading">
                        <h2>Gửi tin nhắn nhận tư vấn</h2>
                     </div>
                     <div class="box-content">
                        <div class="style-form contact-form">
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
                              <div class="style-form-group">
                                 <label for="">Họ và tên: <span>*</span></label>
                                 <input type="text" class="style-form-text contact-name" name="name" value="<?php echo e(old('name')); ?>">
                              </div>
                              <div class="style-form-group">
                                 <label for="">Địa chỉ Email: <span>*</span></label>
                                 <input type="email" class="style-form-text contact-email" name="email" value="<?php echo e(old('email')); ?>">
                              </div>
                              <div class="style-form-group">
                                 <label for="">Số điện thoại: <span></span></label>
                                 <input type="text" class="style-form-text contact-email" name="phone"  value="<?php echo e(old('phone')); ?>">
                              </div>
                              <div class="style-form-group">
                                 <label for="">Bình luận: <span>*</span></label>
                                 <textarea class="style-form-textarea contact-body" name="message"><?php echo e(old('message')); ?></textarea>
                              </div>
                              <div class="style-form-group">
                                 <button type="submit" class="style-form-submit contact-submit">Gửi</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>         
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien1.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>