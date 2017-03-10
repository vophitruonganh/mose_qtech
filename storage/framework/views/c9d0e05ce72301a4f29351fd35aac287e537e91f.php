<?php $__env->startSection('titlePage','Thiết lập giao diện'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Thiết lập giao diện',
    );
    $setion_heading = section_title($heading);
?>
	<div class="section-template">
		<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
			<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="template-option" data-plugin="upload">
	            <div class="section-group">
					<div class="row">
						<div class="section-group-heading col-lg-3">
							<h4>Chung</h4>
							<p>Một số thông tin chung để sử dụng các chức năng trên website.</p>
						</div>
						<div class="section-group-body col-lg-9">
							<div class="box-typical b-t-p">
								<!-- Favicon -->
								<div class="form-group">
									<label>Favicon</label>
									<div class="input-group">
										<input type="text" name="favicon[image]" class="form-control" value="<?php echo e(isset($optionValue['favicon']['image']) ? $optionValue['favicon']['image'] : ''); ?>" />
										<span class="input-group-btn">
											<span class="fileUpload btn btn-primary">
	    										<span>Upload</span>
	    										<input type="file" name="file" class="upload" />
											</span>
										</span>
									</div>
								</div>
								<!-- End Favicon -->
								<!-- Logo -->
								<div class="form-group">
									<label>Logo</label>
									<div class="input-group">
										<input type="text" name="logo_main[image]" class="form-control" value="<?php echo e(isset($optionValue['logo_main']['image']) ? $optionValue['logo_main']['image'] : ''); ?>" />
										<span class="input-group-btn">
											<span class="fileUpload btn btn-primary">
	    										<span>Upload</span>
	    										<input type="file" name="file" class="upload" />
											</span>
										</span>
									</div>
								</div>
								<!-- End Logo -->
							</div>
						</div>
					</div>
	            </div>
            </div>
		</form>
	</div>
<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
	<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="theme">
	
	<?php
	/*
	<!-- Favicon -->
	<div id="favicon">
		<div><strong>Favicon:</strong></div>
		<div>Image: <input type="text" name="favicon[image]" value="{{ isset($optionValue['favicon']['image']) ? $optionValue['favicon']['image'] : '' }}" /></div>
	</div>
	<!-- End Favicon -->

	<!-- Logo main -->
	<div id="logo_main">
		<div><strong>Logo main:</strong></div>
		<div>Image: <input type="text" name="logo_main[image]" value="{{ isset($optionValue['logo_main']['image']) ? $optionValue['logo_main']['image'] : '' }}" /></div>
		<!--<div>Url: <input type="text" name="logo_main[url]" value="{{ isset($optionValue['logo_main']['url']) ? $optionValue['logo_main']['url'] : '' }}" /></div>-->
	</div>
	<!-- End Logo Main -->
	*/
	?>

	<!-- Slider -->
	<?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
	<?php
		/*
		if( count($slider) == 0 )
		{
			$slider = [
				[
					'image' => 'http://hstatic.net/025/1000032025/1000112672/slideshow_4.png',
					'url' => '#',
				],
			];
		}
		*/
	?>
	<div id="slider">
		<div><strong>Slider:</strong><a class="addRow" href="#">Add</a></div>
		<?php $i = 0; ?>
		<div class="block">
		<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<div class="row form-group" data-id="<?php echo e($i); ?>">
				<div>Image: <input type="text" class="form-control" name="slider[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
				<span class="input-group-btn">
					<span class="fileUpload btn btn-primary">
						<span>Upload</span>
						<input type="file" name="file" class="upload" />
					</span>
				</span>
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

	<!-- About -->
	<div id="about">
		<div><strong>About:</strong></div>
		<div>Title: <input type="text" name="about[title]" value="<?php echo e(isset($optionValue['about']['title']) ? $optionValue['about']['title'] : ''); ?>" /></div> 
		<div>Text: <input type="text" name="about[text]" value="<?php echo e(isset($optionValue['about']['text']) ? $optionValue['about']['text'] : ''); ?>" /></div>  
	</div>
	<!-- End about -->
	
	<!-- Facebook -->
	<div id="facebook">
		<div><strong>Facebook:</strong></div>
	  	<div>Url: <input type="text" name="facebook[url]" value="<?php echo e($optionValue['facebook']['url']); ?>" /></div>
	</div>
	<br/>
	<!-- End Facebook -->

	<!-- Mini Slider -->
	<?php $miniSlider = isset($optionValue['mini_slider']) ? $optionValue['mini_slider']: [];  ?>
	<?php
		if( count($miniSlider) == 0 )
		{
			$miniSlider = [
				[
					'image' => 'http://hstatic.net/025/1000032025/1000112672/left_image_ad_1.png',
					'url' => '#',
				],
			];
		}
	?>
	<div id="mini_slider">
		<div><strong>Mini Slider:</strong><a class="addRow" href="#">Add</a></div>
		<?php $i = 0; ?>
		<div class="block">
		<?php $__currentLoopData = $miniSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<div class="row" data-id="<?php echo e($i); ?>">
				<div>Image: <input type="text" name="mini_slider[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
				<div>Url: <input type="text" name="mini_slider[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
				<?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
			</div>
		<br/>
		<?php $i++; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
	</div>
	<br/>
	<!-- End Mini Slider -->

	<!-- Google Map -->
	<div id="google_map">
		<div><strong>Google Map:</strong></div>
	  	<div>Url: <input type="text" name="google_map[url]" value="<?php echo e(isset($optionValue['google_map']['url']) ? $optionValue['google_map']['url'] : ''); ?>" /></div>
	</div>
	<br/>
	<!-- End Google Map -->

	<!-- Url Website -->
	<div id="url_website">
		<div><strong>Url Website:</strong></div>
		<div>Url: <input type="text" name="url_website[url]" value="<?php echo e(isset($optionValue['url_website']['url']) ? $optionValue['url_website']['url'] : ''); ?>" /></div>
	</div>
	<!-- End Url Website -->

	<!-- Copyright -->
	<div id="url_website">
		<div><strong>Copyright:</strong></div>
		<div>Text: <input type="text" name="copyright[text]" value="<?php echo e(isset($optionValue['copyright']['text']) ? $optionValue['copyright']['text'] : ''); ?>" /></div>
	</div>
	<!-- End Copyright -->

	<!-- Product Select Container -->
	<?php
		$numBegin = 1;
		$numEnd = 3;
		$productCategory = get_taxonomy_product('product_category');
		$productGroup = get_taxonomy_product('product_group');
	?>
	<?php
		for( $i=$numBegin; $i<=$numEnd; $i++ )
		{
			$productSlug = isset($optionValue['product_slug_'.$i]) ? $optionValue['product_slug_'.$i] : '';
			$productType = isset($optionValue['product_type_'.$i]) ? $optionValue['product_type_'.$i] : '';
			if( $productType == '' ) $productType = 0;
			elseif( $productType == 'product_category' ) $productType = 1;
			else $productType = 2; // product_group
	?>
	<div class="product-select-container product-select-container-row-<?php echo e($i); ?>">
		<div><strong>Product Position <?php echo e($i); ?>:</strong></div>
		<select class="main-select" name="main_select_<?php echo e($i); ?>">
			<option value="0" <?php if( $productType == 0 ): ?> selected <?php endif; ?> >Sản Phẩm Mới</option>
			<option value="1" <?php if( $productType == 1 ): ?> selected <?php endif; ?> >Danh Mục Sản Phẩm</option>
			<option value="2" <?php if( $productType == 2 ): ?> selected <?php endif; ?> >Nhóm Sản Phẩm</option>
		</select>
		<select class="product-category-select" name="product_category_<?php echo e($i); ?>">
			<?php $__currentLoopData = $productCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<option value="<?php echo e($taxonomy->taxonomy_slug); ?>" <?php if( $productSlug == $taxonomy->taxonomy_slug ): ?> selected <?php endif; ?> ><?php echo e($taxonomy->taxonomy_name); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</select>
		<select class="product-group-select" name="product_group_<?php echo e($i); ?>">
			<?php $__currentLoopData = $productGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<option value="<?php echo e($taxonomy->taxonomy_slug); ?>" <?php if( $productSlug == $taxonomy->taxonomy_slug ): ?> selected <?php endif; ?> ><?php echo e($taxonomy->taxonomy_name); ?></option>
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

		// Mini Slider
		$('#mini_slider .addRow').click(function(){
			var numberMaxElement = parseInt($('#mini_slider .row').last().attr('data-id')) + 1;
			var row = '';
			row += '<div class="row" data-id="'+numberMaxElement+'">';
			row += '<div>Image: <input type="text" name="mini_slider['+numberMaxElement+'][image]" value="" /></div>';
			row += '<div>Url: <input type="text" name="mini_slider['+numberMaxElement+'][url]" value="" /></div>';
			row += '<a class="remove" href="javascript:;">Remove</a>';
			row += '</div>';
			$('#mini_slider .block').append(row);
			return false;
			});
			$('.theme').on('click','#mini_slider .remove',function(){
			$(this).parent().remove();
			return false;
		});

		// Product Select Container
		$('.product-select-container .product-category-select, .product-select-container .product-group-select').hide();
		<?php
			$numBegin = 1;
			$numEnd = 3;
			for( $i=$numBegin; $i<=$numEnd; $i++ )
			{
		?>
		var mainSelect = $('.product-select-container-row-<?php echo e($i); ?> select[name=main_select_<?php echo e($i); ?>]').val();
		if( mainSelect == 0 )
		{}
		else if( mainSelect == 1 )
		{
			$('.product-select-container-row-<?php echo e($i); ?> select[name=product_category_<?php echo e($i); ?>]').show();
		}else // mainSelect == 2
		{
			$('.product-select-container-row-<?php echo e($i); ?> select[name=product_group_<?php echo e($i); ?>]').show();
		}
		<?php
			}
		?>
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