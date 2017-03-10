@extends('frontend.giaodien17.layouts.default')
@section('content')
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
			@foreach( $feature as $row )
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 img_full">
				<a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}" /></a>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- End Row 1 -->

<!-- Sản Phẩm Bán Chạy -->
		
<section class="list_style_product ">
		<!-- Widget aaaaaaaaa -->
			{!!showWidget('widgetaaaaaaaaa')!!}
		<!-- End Widget aaaaaaaaa -->
	
</section>

<!-- End Sản Phẩm Bán Chạy -->

<!-- Miễn Phí Vận Chuyển -->

<section class="tz-about theme-gray-bg">
	<div class="container">
		<div class="row">
			@foreach( $about as $row )
			<div class="col-lg-4 colg-md-4 col-sm-12 col-xs-12">
				<div class="tz-about-item">
					<div class="about-item-img">
						<a class="{{$row['image']}}" href="{{$row['url']}}"></a>
					</div>
					<div class="tz-about-ds">
						<h2>{{$row['header']}}</h2>
						<p>{{$row['text']}}</p>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</section>
<!-- End Miễn Phí Vận Chuyển -->
		
<!-- Sản Phẩm Nổi Bật -->
		
<section class="main-container col1-layout home-content-container">
	<!-- Widget bbbbbbbbb -->
			{!!showWidget('widgetbbbbbbbbb')!!}
	<!-- End Widget bbbbbbbbb -->	
	

</section>
<!-- End Sản Phẩm Nổi Bật -->

<!-- Nhận xét -->
<section class="tz-award tz-award-sell">
	<div class="slider-items-products container">
		<div id="author-slider" class="featured-buttons">
			<div class="slider-items">
				@foreach( $comment as $row )
					<div class="content_tip">
						<a><img src="{{$row['image']}}" alt="PHẠM NHẬT THÀNH" /></a>
						<p class="decs_author">{{$row['content']}}
						</p>
						<p class="name_author">{{$row['name']}}</p>
						<p class="company_author">{{$row['job']}}</p>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<!-- End Nhận xét -->

<!-- Sản Phẩm Khuyến Mãi -->
		
<section class="list_style_product ">
		<!-- Widget ccccccccc -->
			{!!showWidget('widgetccccccccc')!!}
		<!-- End Widget ccccccccc -->

	
	<!--end class container-->
</section>
<!-- End Sản Phẩm Khuyến Mãi -->

<!-- Đối Tác -->
<div class="tz-partner">
	<div class="container">
		<ul class="partner-slider">
			@foreach( $partner as $row )
				<li>
				<a href="{{$row['url']}}"><img src="{{$row['image']}}" alt="partler4"></a>
			</li>
			@endforeach
			
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

@stop