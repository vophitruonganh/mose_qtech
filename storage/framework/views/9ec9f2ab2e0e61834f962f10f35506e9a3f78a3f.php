<?php $__env->startSection('titlePage','Quên mật khẩu'); ?>
<?php $__env->startSection('content'); ?>
<div class="section-login">
	<div class="login-wrap login-block">
		<div class="login-inner">
			<div class="logo"><a href="<?php echo e(url('admin')); ?>"><img src="<?php echo e($cdn_domain_image); ?>/logo.png" class="img-100" /></a></div>
			<div class="login-body">
				<h1 class="login-title">Bạn quên mật khẩu?</h1>
				<?php if($suscess): ?> 
				<div class="form-alerts"> 
					<div class="alert alert-success m-b-1" role="alert"><?php echo e($suscess); ?></div>
				</div>
				<div class="text-xs-center"><a href="<?php echo e(url('admin/login')); ?>" class="btn btn-link p-a-0"><u>Quay lại</u></a></div>
                <?php else: ?>
				<div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
	
				<form action="<?php echo e(url('admin/forgot-password')); ?>" method="post" data-parsley-validate>
					<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<div class="form-group m-b-2">
						<div class="fg-line">
						    <label class="sr-only">Email</label>
						    <input type="email" class="form-control" placeholder="Email" name="email" value="" required data-parsley-trigger="change focusout" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" data-parsley-type="email" />
					    </div>
					    <small class="text-muted">Chúng tôi sẽ gửi bạn hướng dẫn về cách thiết lập lại mật khẩu.</small>
					</div>
					<div class="clearfix">
                        <button type="submit" class="btn btn-primary waves-effect">Gửi mail</button>
                        <a href="<?php echo e(url('admin/login')); ?>" class="btn btn-link">Hủy bỏ</a>
                    </div>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>