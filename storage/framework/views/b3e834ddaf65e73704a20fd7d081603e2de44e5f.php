<?php $__env->startSection('titlePage','Theme Option'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
	<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="theme">

	<!-- Favicon -->
	<div id="favicon">
		<div><strong>Favicon:</strong></div>
		<div>Image: <input type="text" name="favicon[image]" value="<?php echo e(isset($optionValue['favicon']['image']) ? $optionValue['favicon']['image'] : ''); ?>" /></div>
	</div>
	<!-- End Favicon -->

	<!-- Site Name -->
	<div id="site_name">
		<div><strong>Site Name:</strong></div>
		<div>Name: <input type="text" name="site_name" value="<?php echo e(isset($optionValue['site_name']) ? $optionValue['site_name'] : ''); ?>" /></div>
	</div>
	<!-- End logo main -->

	<!-- Logo main -->
	<div id="logo_main">
		<div><strong>Logo main:</strong></div>
		<div>Image: <input type="text" name="logo_main" value="<?php echo e(isset($optionValue['logo_main']) ? $optionValue['logo_main'] : ''); ?>" /></div>
	</div>
	<!-- End Logo Main -->

	<!-- Slider -->
	<?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
	<?php
		if( count($slider) == 0 )
		{
			$slider = [
				[
					'image' => 'http://hstatic.net/025/1000032025/1000112672/left_image_ad_1.png',
					'url' => '#',
				],
			];
		}
	?>
	<div id="slider">
		<div><strong>Slider:</strong><a class="addRow" href="#">Add</a></div>
		<?php $i = 0; ?>
		<div class="block">
		<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<div class="row" data-id="<?php echo e($i); ?>">
				<div>Image: <input type="text" name="slider[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
				<div>Url: <input type="text" name="slider[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
				<?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
			</div>
		<br/>
		<?php $i++; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
	</div>
	<br/>
	<!-- End Slider -->

	<!-- First Banner -->
    <div id="firstBanner">
      <div><strong>First Banner:</strong></div>
      <div>Url: <input type="text" name="firstBanner[url]" value="<?php echo e(isset($optionValue['firstBanner']['url']) ? $optionValue['firstBanner']['url'] : ''); ?>" /></div>
      <div>Image: <input type="text" name="firstBanner[image]" value="<?php echo e(isset($optionValue['firstBanner']['image']) ? $optionValue['firstBanner']['image'] : ''); ?>" /></div>
    </div>
    <br/>
    <!-- End First Banner -->

    <!-- About -->
	<div id="about">
		<div><strong>About:</strong></div>
		<div>Title: <input type="text" name="about[title]" value="<?php echo e(isset($optionValue['about']['title']) ? $optionValue['about']['title'] : ''); ?>" /></div> 
		<div>Logo: <input type="text" name="about[logo]" value="<?php echo e(isset($optionValue['about']['logo']) ? $optionValue['about']['logo'] : ''); ?>" /></div> 
		<div>Text: <input type="text" name="about[text]" value="<?php echo e(isset($optionValue['about']['text']) ? $optionValue['about']['text'] : ''); ?>" /></div>  
	</div>
	<!-- End about -->

	<!-- Bottom Menu -->
	<?php $bottom_menu = isset($optionValue['bottom_menu']) ? $optionValue['bottom_menu']: [];  ?>
	<?php
		if( count($bottom_menu) == 0 )
		{
			$bottom_menu = [
				'heading' => '',
				[
					'title' => '',
					'url' => '',
				],
			];
		}
	?>
    <div id="bottom_menu">
      <div><strong>Bottom Menu:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="bottom_menu[heading]" value="<?php echo e($bottom_menu['heading']); ?>" /></div>
      <br/>
      <?php unset($bottom_menu['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $bottom_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Title: <input type="text" name="bottom_menu[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="bottom_menu[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Bottom -->

	<!-- Service -->
	<?php $service = isset($optionValue['service']) ? $optionValue['service']: [];  ?>
	<?php
		if( count($service) == 0 )
		{
			$service = [
				'heading' => '',
				[
					'title' => '',
					'url' => '',
				],
			];
		}
	?>
    <div id="service">
      <div><strong>Service:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="service[heading]" value="<?php echo e($service['heading']); ?>" /></div>
      <br/>
      <?php unset($service['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Title: <input type="text" name="service[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="service[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Service -->

    <!-- Google Map -->
	<div id="google_map">
		<div><strong>Google Map:</strong></div>
	  	<div>Url: <input type="text" name="google_map[url]" value="<?php echo e(isset($optionValue['google_map']['url']) ? $optionValue['google_map']['url'] : ''); ?>" /></div>
	</div>
	<br/>
	<!-- End Google Map -->

	<!-- Product Select Container -->
	<?php
		$numBegin = 1;
		$numEnd = 9;
		$productPosition = [];
		$productCategory = get_taxonomy_product('product_category');
		$productGroup = get_taxonomy_product('product_group');

		for( $i=$numBegin; $i<=$numEnd; $i++ )
		{
			$productPosition[] = 'position_'.$i;
		}
	?>
	<?php
		for( $i=$numBegin; $i<=$numEnd; $i++ )
		{
	?>
	<div class="product-select-container">
		<div><strong>Position <?php echo e($i); ?>:</strong></div>
		<select class="main-select" name="main_select_<?php echo e($i); ?>">
			<option value="0">Sản Phẩm Mới</option>
			<option value="1">Danh Mục Sản Phẩm</option>
			<option value="2">Nhóm Sản Phẩm</option>
		</select>
		<select class="product-category-select" name="product_category_<?php echo e($i); ?>">
			<?php $__currentLoopData = $productCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<option value="<?php echo e($taxonomy->taxonomy_slug); ?>"><?php echo e($taxonomy->taxonomy_name); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</select>
		<select class="product-group-select" name="product_group_<?php echo e($i); ?>">
			<?php $__currentLoopData = $productGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<option value="<?php echo e($taxonomy->taxonomy_slug); ?>"><?php echo e($taxonomy->taxonomy_name); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</select>
	</div>
	<?php
		}
	?>
	<!-- End -->

	<br/>
	<div><input type="submit" value="Save" /></div>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function(){

		// Slider
		$('#slider .addRow').click(function(){
			var numberMaxElement = parseInt($('#slider .row').last().attr('data-id')) + 1;
			var row = '';
			row += '<div class="row" data-id="'+numberMaxElement+'">';
			row += '<div>Image: <input type="text" name="slider['+numberMaxElement+'][image]" value="" /></div>';
			row += '<div>Url: <input type="text" name="slider['+numberMaxElement+'][url]" value="" /></div>';
			row += '<a class="remove" href="javascript:;">Remove</a>';
			row += '</div>';
			$('#slider .block').append(row);
			return false;
		});
		$('.theme').on('click','#slider .remove',function(){
			$(this).parent().remove();
			return false;
		});

		// Bottom Menu
		$('#bottom_menu .addRow').click(function(){
			var numberMaxElement = parseInt($('#bottom_menu .row').last().attr('data-id')) + 1;
			var row = '';
			row += '<div class="row" data-id="'+numberMaxElement+'">';
			row += '<div>Title: <input type="text" name="bottom_menu['+numberMaxElement+'][title]" value="" /></div>';
			row += '<div>Url: <input type="text" name="bottom_menu['+numberMaxElement+'][url]" value="" /></div>';
			row += '<a class="remove" href="javascript:;">Remove</a>';
			row += '</div>';
			$('#bottom_menu .block').append(row);
			return false;
		});
		$('.theme').on('click','#bottom_menu .remove',function(){
			$(this).parent().remove();
			return false;
		});

		// Service
		$('#service .addRow').click(function(){
			var numberMaxElement = parseInt($('#service .row').last().attr('data-id')) + 1;
			var row = '';
			row += '<div class="row" data-id="'+numberMaxElement+'">';
			row += '<div>Title: <input type="text" name="service['+numberMaxElement+'][title]" value="" /></div>';
			row += '<div>Url: <input type="text" name="service['+numberMaxElement+'][url]" value="" /></div>';
			row += '<a class="remove" href="javascript:;">Remove</a>';
			row += '</div>';
			$('#service .block').append(row);
			return false;
		});
		$('.theme').on('click','#service .remove',function(){
			$(this).parent().remove();
			return false;
		});

		// Product Select Container
		$('.product-select-container .product-category-select, .product-select-container .product-group-select').hide();
		$('.product-select-container').on('change','.main-select',function(){
			var mainSelect = $(this).val();
			var selectParentElement = $(this).parent();
			if( mainSelect == 0 )
			{
				selectParentElement.find('.product-category-select, .product-group-select').hide();
			}
			else if( mainSelect == 1 )
			{
				selectParentElement.find('.product-category-select').show();
				selectParentElement.find('.product-group-select').hide();
			}
			else // mainSelect == 2
			{
				selectParentElement.find('.product-category-select').hide();
				selectParentElement.find('.product-group-select').show();
			}
		});


	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>