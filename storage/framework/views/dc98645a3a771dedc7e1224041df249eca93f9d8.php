<?php $__env->startSection('content'); ?>
<div id="maincontainer">
    <div class="container">
        <div id="page">
            <div id="layout-page">
                <span class="header-contact header-page clearfix">
                    <h1 class="heading1"><span class="maintext">Liên hệ</span></h1>
                </span>
                <?php echo e(get_excerpt('hahahahahaha hahah ahah ', 1)); ?>

                <div class="content-contact content-page">
                    <div class="" id="col-right">
                        <h3 class="name-company">QmTech</h3>
                        <p> Giải pháp bán hàng toàn diện từ website đến cửa hàng    </p>
                        <ul class="info-address">
                            <li>
                                <i class="glyphicon glyphicon-map-marker"></i>
                                <span><?php echo e($storeSetting['address']); ?></span>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-envelope"></i>
                                <span><?php echo e($storeSetting['email']); ?></span>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-phone-alt"></i>
                                <span><?php echo e($storeSetting['telephone']); ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <div class="row">
                        <div class="col-sm-5" id="col-left contactFormWrapper">
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
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                <!--
                                <input name="form_type" type="hidden" value="contact">
                                <input name="utf8" type="hidden" value="✓">
                                -->
                                <div class="form-group">
                                    <label for="contactFormName" class="sr-only">Họ và tên</label>
                                    <input required="" type="text" id="contactFormName" class="form-control input-lg" name="name" placeholder="Tên của bạn" autocapitalize="words" value="<?php echo e(old('name')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="contactFormEmail" class="sr-only">Email</label>
                                    <input required="" type="email" name="email" placeholder="Email của bạn" id="contactFormEmail" class="form-control input-lg" autocorrect="off" autocapitalize="off" value="<?php echo e(old('email')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="contactFormTelephone" class="sr-only">Số Điện Thoại</label>
                                    <input required="" type="text" id="contactFormTelephone" class="form-control input-lg" name="phone" placeholder="Số điện thoại của bạn" autocapitalize="words" value="<?php echo e(old('phone')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="contactFormMessage" class="sr-only">Nội dung</label>
                                    <textarea required="" rows="6" name="message" class="form-control" placeholder="Viết bình luận" id="contactFormMessage"><?php echo e(old('message')); ?></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg" value="Gửi liên hệ">
                            </form>
                        </div>
                        <div class="col-sm-7">
                            <h3>Bản đồ</h3>
                            <hr class="line-left">
                            <p class="text-center">
                                <iframe src="<?php echo e($google_map['url']); ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>