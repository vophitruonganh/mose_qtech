<?php $__env->startSection('content'); ?>

<div class="container">
   <div class="row">
      <div id="page">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="layout-page">
            <span class="header-contact header-page clearfix">
               <h1>Liên hệ</h1>
            </span>
            <div class="content-contact content-page">
               <p class="text-center">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.198323261733!2d106.65173431433684!3d10.796117261783182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935ebdf1dcf%3A0xd8800d3909ce3dd1!2zMTU1IFh1w6JuIEjhu5NuZywgUGjGsOG7nW5nIDEyLCBUw6JuIELDrG5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1468466938845" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen=""></iframe>
               </p>
               <div class="col-md-7" id="col-left contactFormWrapper">
                  <h3>Viết nhận xét</h3>
                  <hr class="line-left">
                  <p>
                     Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể .
                  </p>
                     <?php if( count($errors) > 0 ): ?>
                     <ul>
                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <li><?php echo e($error); ?></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     </ul>
                     <?php endif; ?>
                  <form accept-charset="UTF-8" action="<?php echo e(url('pages/contact')); ?>" class="contact-form" method="post">
                     <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                     <input name="form_type" type="hidden" value="contact">
                     <input name="utf8" type="hidden" value="✓">
                     <div class="form-group">
                        <label for="contactFormName" class="sr-only">Tên *</label>
                        <input required="" type="text" id="contactFormName" class="form-control input-lg" name="name" placeholder="Tên của bạn" autocapitalize="words" value="<?php echo e(old('name')); ?>">
                     </div>
                     <div class="form-group">
                        <label for="contactFormEmail" class="sr-only">Email *</label>
                        <input required="" type="email" name="email" placeholder="Email của bạn" id="contactFormEmail" class="form-control input-lg" autocorrect="off" autocapitalize="off" value="<?php echo e(old('email')); ?>">
                     </div>
                      <div class="form-group">
                        <label for="contactFormName" class="sr-only">Số điện thoại</label>
                        <input  type="text" id="contactFormName" class="form-control input-lg" name="phone" placeholder="số điện thoại"  value="<?php echo e(old('phone')); ?>">
                     </div>
                     <div class="form-group">
                        <label for="contactFormMessage" class="sr-only">Nội dung *</label>
                        <textarea  rows="6" name="message" class="form-control" placeholder="Viết bình luận" id="contactFormMessage"><?php echo e(old('message')); ?></textarea>
                     </div>
                     <input type="submit" class="btn btn-primary btn-lg" value="Gửi liên hệ">
                  </form>
               </div>
               <div class="col-md-5" id="col-right">
                  <h3>Chúng tôi ở đây</h3>
                  <hr class="line-right">
                  <h3 class="name-company">Qmtech Co.Ltd</h3>
                  <p>	Giải pháp bán hàng toàn diện từ website đến cửa hàng	</p>
                  <ul class="info-address">
                     <li>
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <span>155 Xuân Hồng, Phường 12, Quận Tân Bình, Tp. Hồ Chí Minh</span>
                     </li>
                     <li>
                        <i class="glyphicon glyphicon-envelope"></i>
                        <span>info@qmtech.com.vn</span>
                     </li>
                     <li>
                        <i class="glyphicon glyphicon-phone-alt"></i> 
                        <span>1900.0124</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>