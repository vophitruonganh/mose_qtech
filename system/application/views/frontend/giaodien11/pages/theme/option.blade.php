@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
	@include('backend.includes.token')
	<div class="theme">

	<!-- Favicon -->
	<div id="favicon" data-plugin="upload">
		<div class="form-group">
			<div><strong>Favicon:</strong></div>
			<div>Image: <input type="text" class="form-control" name="favicon[image]" value="{{ isset($optionValue['favicon']['image']) ? $optionValue['favicon']['image'] : '' }}" /></div>
			<span class="input-group-btn">
				<span class="fileUpload btn btn-primary">
					<span>Upload</span>
					<input type="file" name="file" class="upload" />
				</span>
			</span>
		</div>
	</div>
	<!-- End Favicon -->

	<!-- Site Name -->
	<div id="site_name">
		<div><strong>Site Name:</strong></div>
		<div>Name: <input type="text" name="site_name" value="{{ isset($optionValue['site_name']) ? $optionValue['site_name'] : '' }}" /></div>
	</div>
	<!-- End logo main -->

	<!-- Logo main -->
	<div id="logo_main" data-plugin="upload">
		<div class="form-group">
			<div><strong>Logo main:</strong></div>
			<div>Image: <input type="text" class="form-control" name="logo_main" value="{{ isset($optionValue['logo_main']) ? $optionValue['logo_main'] : '' }}" /></div>
			<span class="input-group-btn">
				<span class="fileUpload btn btn-primary">
					<span>Upload</span>
					<input type="file" name="file" class="upload" />
				</span>
			</span>
		</div>
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
	<?php
	/*
	<div id="slider">
		<div><strong>Slider:</strong><a class="addRow" href="#">Add</a></div>
		<?php $i = 0; ?>
		<div class="block">
		@foreach( $slider as $row )
			<div class="row" data-id="{{ $i }}">
				<div>Image: <input type="text" name="slider[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
				<div>Url: <input type="text" name="slider[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
				@if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
			</div>
		<br/>
		<?php $i++; ?>
		@endforeach
		</div>
	</div>
	*/
	?>
	<div id="slider" data-plugin="upload">
		<div><strong>Slider:</strong><a class="addRow" href="#">Add</a></div>
		<?php $i = 0; ?>
		<div class="block">
		@foreach( $slider as $row )
			<div class="row form-group" data-id="{{ $i }}">
				<div>Image: <input type="text" class="form-control" name="slider[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
				<span class="input-group-btn">
					<span class="fileUpload btn btn-primary">
						<span>Upload</span>
						<input type="file" name="file" class="upload" />
					</span>
				</span>
				<div>Url: <input type="text" name="slider[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
				@if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
			</div>
		<br/>
		<?php $i++; ?>
		@endforeach
		</div>
	</div>
	<br/>
	<!-- End Slider -->

	<!-- First Banner -->
    <div id="firstBanner" data-plugin="upload">
    	<div class="form-group">
			<div><strong>First Banner:</strong></div>
			<div>Url: <input type="text" name="firstBanner[url]" value="{{ isset($optionValue['firstBanner']['url']) ? $optionValue['firstBanner']['url'] : '' }}" /></div>
			<div>Image: <input type="text" class="form-control" name="firstBanner[image]" value="{{ isset($optionValue['firstBanner']['image']) ? $optionValue['firstBanner']['image'] : '' }}" /></div>
			<span class="input-group-btn">
				<span class="fileUpload btn btn-primary">
					<span>Upload</span>
					<input type="file" name="file" class="upload" />
				</span>
			</span>
		</div>
    </div>
    <br/>
    <!-- End First Banner -->

    <!-- About -->
	<div id="about" data-plugin="upload">
		<div class="form-group">
			<div><strong>About:</strong></div>
			<div>Title: <input type="text" name="about[title]" value="{{ isset($optionValue['about']['title']) ? $optionValue['about']['title'] : '' }}" /></div> 
			<div>Logo: <input type="text" class="form-control" name="about[logo]" value="{{ isset($optionValue['about']['logo']) ? $optionValue['about']['logo'] : '' }}" /></div> 
			<span class="input-group-btn">
				<span class="fileUpload btn btn-primary">
					<span>Upload</span>
					<input type="file" name="file" class="upload" />
				</span>
			</span>
			<div>Text: <input type="text" name="about[text]" value="{{ isset($optionValue['about']['text']) ? $optionValue['about']['text'] : '' }}" /></div>
		</div>
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
      <div>Heading: <input type="text" name="bottom_menu[heading]" value="{{ $bottom_menu['heading'] }}" /></div>
      <br/>
      <?php unset($bottom_menu['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $bottom_menu as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Title: <input type="text" name="bottom_menu[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Url: <input type="text" name="bottom_menu[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Bottom Menu -->

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
      <div>Heading: <input type="text" name="service[heading]" value="{{ $service['heading'] }}" /></div>
      <br/>
      <?php unset($service['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $service as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Title: <input type="text" name="service[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Url: <input type="text" name="service[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Service -->

    <!-- Social -->
    <?php
    	$social = isset($optionValue['social']) ? $optionValue['social'] : [];
    	if( count($social) == 0 )
    	{
    		$social = [
    			[
    				'image' => '',
    				'url' => '',
    			],
    		];
    	}
    ?>
    <div id="social">
      <div><strong>Social:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $social as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="social[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="social[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Social -->

    <!-- Copyright -->
	<div id="copyright">
		<div><strong>Copyright:</strong></div>
		<div>Text: <input type="text" name="copyright[text]" value="{{ isset($optionValue['copyright']['text']) ? $optionValue['copyright']['text'] : '' }}" /></div>
	</div>
	<!-- End Copyright -->

    <!-- Google Map -->
	<div id="google_map">
		<div><strong>Google Map:</strong></div>
	  	<div>Url: <input type="text" name="google_map[url]" value="{{ isset($optionValue['google_map']['url']) ? $optionValue['google_map']['url'] : '' }}" /></div>
	</div>
	<br/>
	<!-- End Google Map -->

	<!-- Product Select Container -->
	<?php
		$numBegin = 1;
		$numEnd = 7;
		$productCategory = get_taxonomy_product('product_category');
		$productGroup = get_taxonomy_product('product_group');
	?>
	<?php
		for( $i=$numBegin; $i<=$numEnd; $i++ )
		{
			$productSlug = $optionValue['product_slug_'.$i];
			$productType = $optionValue['product_type_'.$i];
			if( $productType == '' ) $productType = 0;
			elseif( $productType == 'product_category' ) $productType = 1;
			else $productType = 2; // product_group
	?>
	<div class="product-select-container product-select-container-row-{{ $i }}">
		<div><strong>Product Position {{ $i }}:</strong></div>
		<select class="main-select" name="main_select_{{ $i }}">
			<option value="0" @if( $productType == 0 ) selected @endif >Sản Phẩm Mới</option>
			<option value="1" @if( $productType == 1 ) selected @endif >Danh Mục Sản Phẩm</option>
			<option value="2" @if( $productType == 2 ) selected @endif >Nhóm Sản Phẩm</option>
		</select>
		<select class="product-category-select" name="product_category_{{ $i }}">
			@foreach( $productCategory as $taxonomy )
			<option value="{{ $taxonomy->taxonomy_slug }}" @if( $productSlug == $taxonomy->taxonomy_slug ) selected @endif >{{ $taxonomy->taxonomy_name }}</option>
			@endforeach
		</select>
		<select class="product-group-select" name="product_group_{{ $i }}">
			@foreach( $productGroup as $taxonomy )
			<option value="{{ $taxonomy->taxonomy_slug }}" @if( $productSlug == $taxonomy->taxonomy_slug ) selected @endif >{{ $taxonomy->taxonomy_name }}</option>
			@endforeach
		</select>
	</div>
	<?php
		}
	?>
	<!-- End -->

	<!-- Post Select Container -->
    <?php
      $numBegin = 1;
      $numEnd = 2;
      $postCategory = get_taxonomy_post();
    ?>
    <?php
      for( $i=$numBegin; $i<=$numEnd; $i++ )
      {
        $postSlug = isset($optionValue['post_slug_'.$i]) ? $optionValue['post_slug_'.$i] : '';
        $postType = isset($optionValue['post_type_'.$i]) ? $optionValue['post_type_'.$i] : '';
        if( $postType == '' ) $postType = 0;
        else $postType = 1; // post_category
    ?>
    <div class="post-select-container post-select-container-row-{{ $i }}">
      <div><strong>Post Position {{ $i }}:</strong></div>
      <select class="main-select" name="post_main_select_{{ $i }}">
        <option value="0" @if( $postType == 0 ) selected @endif >Bài viết Mới</option>
        <option value="1" @if( $postType == 1 ) selected @endif >Danh Mục Bài viết</option>
      </select>
      <select class="post-category-select" name="post_category_{{ $i }}">
        @foreach( $postCategory as $taxonomy )
        <option value="{{ $taxonomy->taxonomy_slug }}" @if( $postSlug == $taxonomy->taxonomy_slug ) selected @endif >{{ $taxonomy->taxonomy_name }}</option>
        @endforeach
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

		<?php
		/*
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
		*/
		?>
		// Slider
		$('#slider .addRow').click(function(){
			var numberMaxElement = parseInt($('#slider .row').last().attr('data-id')) + 1;
			var row = '';
			row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
			row += '<div>Image: <input type="text" class="form-control" name="slider['+numberMaxElement+'][image]" value="" /></div>';
			row += '<span class="input-group-btn">';
			row += '<span class="fileUpload btn btn-primary">';
			row += '<span>Upload</span>';
			row += '<input type="file" name="file" class="upload" />';
			row += '</span>';
			row += '</span>';
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

		// Social
	    $('#social .addRow').click(function(){
	      var numberMaxElement = parseInt($('#social .row').last().attr('data-id')) + 1;
	      var row = '';
	      row += '<div class="row" data-id="'+numberMaxElement+'">';
	      row += '<div>Image: <input type="text" name="social['+numberMaxElement+'][image]" value="" /></div>';
	      row += '<div>Url: <input type="text" name="social['+numberMaxElement+'][url]" value="" /></div>';
	      row += '<a class="remove" href="javascript:;">Remove</a>';
	      row += '</div>';
	      $('#social .block').append(row);
	      return false;
	    });
	    $('.theme').on('click','#social .remove',function(){
	      $(this).parent().remove();
	      return false;
	    });

		// Product Select Container
		$('.product-select-container .product-category-select, .product-select-container .product-group-select').hide();
		<?php
			$numBegin = 1;
			$numEnd = 7;
			for( $i=$numBegin; $i<=$numEnd; $i++ )
			{
		?>
		var mainSelect = $('.product-select-container-row-{{ $i }} select[name=main_select_{{ $i }}]').val();
		if( mainSelect == 0 )
		{}
		else if( mainSelect == 1 )
		{
			$('.product-select-container-row-{{ $i }} select[name=product_category_{{ $i }}]').show();
		}else // mainSelect == 2
		{
			$('.product-select-container-row-{{ $i }} select[name=product_group_{{ $i }}]').show();
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

		// Post Select Container
	    $('.post-select-container .post-category-select').hide();

	    <?php
	      $numBegin = 1;
	      $numEnd = 2;
	      for( $i=$numBegin; $i<=$numEnd; $i++ )
	      {
	    ?>
	    var mainSelect = $('.post-select-container-row-{{ $i }} select[name=post_main_select_{{ $i }}]').val();
	    if( mainSelect == 0 )
	    {}
	    else // mainSelect == 1
	    {
	      $('.post-select-container-row-{{ $i }} select[name=post_category_{{ $i }}]').show();
	    }
	    <?php
	      }
	    ?>
	    $('.post-select-container').on('change','.main-select',function(){
	      var mainSelect = $(this).val();
	      var selectParentElement = $(this).parent();
	      if( mainSelect == 0 )
	      {
	        selectParentElement.find('.post-category-select').hide();
	      }
	      else // mainSelect == 1
	      {
	        selectParentElement.find('.post-category-select').show();
	      }
	    });

	});
</script>

@stop