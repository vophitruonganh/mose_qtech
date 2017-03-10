<?php $__env->startSection('content'); ?>
<!-- Slider -->
<div class="fvc" style="float:left;width:100%;">
<!--dong o doi tac-->
<section class="tz-award slider_cover">
	<ul class="tz-award-slider">
		<li>
			<a href="#"><img alt="slider" src="//bizweb.dktcdn.net/100/069/071/themes/139176/assets/slider-re1.jpg?1472090442121"></a>
		</li>
		<li>
			<a href="#"><img alt="slider" src="//bizweb.dktcdn.net/100/069/071/themes/139176/assets/slider-re2.jpg?1472090442121"></a>
		</li>
		<li>
			<a href="#"><img alt="slider" src="//bizweb.dktcdn.net/100/069/071/themes/139176/assets/slider-re3.jpg?1472090442121"></a>
		</li>
	</ul>
</section>
<!-- End Slider -->

<!-- Row 1 -->
<section class="tz-why-choose" style="margin: 40px 0px 0px 0px;">
	<div class="container">
		<div class="row">
			<?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 img_full">
				<a href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>" /></a>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
	</div>
</section>
<!-- End Row 1 -->

<!-- Sản Phẩm Bán Chạy -->
		
<section class="list_style_product ">
		<!-- Widget aaaaaaaaa -->
			<?php echo showWidget('widgetaaaaaaaaa'); ?>

		<!-- End Widget aaaaaaaaa -->
	
</section>

<!-- End Sản Phẩm Bán Chạy -->

<!-- Miễn Phí Vận Chuyển -->

<section class="tz-about theme-gray-bg">
	<div class="container">
		<div class="row">
			<?php $__currentLoopData = $about; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<div class="col-lg-4 colg-md-4 col-sm-12 col-xs-12">
				<div class="tz-about-item">
					<div class="about-item-img">
						<a class="<?php echo e($row['image']); ?>" href="<?php echo e($row['url']); ?>"></a>
					</div>
					<div class="tz-about-ds">
						<h2><?php echo e($row['header']); ?></h2>
						<p><?php echo e($row['text']); ?></p>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

		</div>
	</div>
</section>
<!-- End Miễn Phí Vận Chuyển -->
		
<!-- Sản Phẩm Nổi Bật -->
		
<section class="main-container col1-layout home-content-container">
	<!-- Widget bbbbbbbbb -->
			<?php echo showWidget('widgetbbbbbbbbb'); ?>

	<!-- End Widget bbbbbbbbb -->	
	

</section>
<!-- End Sản Phẩm Nổi Bật -->

<!-- Nhận xét -->
<section class="tz-award tz-award-sell">
	<div class="slider-items-products container">
		<div id="author-slider" class="featured-buttons">
			<div class="slider-items">
				<?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<div class="content_tip">
						<a><img src="<?php echo e($row['image']); ?>" alt="PHẠM NHẬT THÀNH" /></a>
						<p class="decs_author"><?php echo e($row['content']); ?>

						</p>
						<p class="name_author"><?php echo e($row['name']); ?></p>
						<p class="company_author"><?php echo e($row['job']); ?></p>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</div>
		</div>
	</div>
</section>
<!-- End Nhận xét -->

<!-- Sản Phẩm Khuyến Mãi -->
		
<section class="list_style_product ">
		<!-- Widget ccccccccc -->
			<?php echo showWidget('widgetccccccccc'); ?>

		<!-- End Widget ccccccccc -->

	
	<!--end class container-->
</section>
<!-- End Sản Phẩm Khuyến Mãi -->

<!-- Đối Tác -->
<div class="tz-partner">
	<div class="container">
		<ul class="partner-slider">
			<?php $__currentLoopData = $partner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<li>
				<a href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>" alt="partler4"></a>
			</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			
		</ul>
	</div>
	<!--end container-->
</div>
</div>
<!--dong o slider-->
<!-- End Đối Tác -->
<script type="text/javascript">

      function order(i)
      {
 	     $("#form_order_"+i).submit();   
      }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien17.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>