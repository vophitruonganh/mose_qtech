<?php $__env->startSection('content'); ?>
      
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="inner">
				<ul>
					<li class="home">
						<a title="Quay lại trang chủ" href="/">Trang chủ</a>
					</li>
					
					<i class="fa fa-angle-double-right" aria-hidden="true"></i>
					<li class="cl_breadcrumb">Giới thiệu</li>
					
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="main-container col2-left-layout">
    <div class="container">
     <?php echo preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content); ?>

        
    </div>
</div>
            
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('frontend.shop.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>