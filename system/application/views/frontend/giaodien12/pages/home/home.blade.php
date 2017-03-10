@extends('frontend.giaodien12.layouts.default')
@section('content')
<!-- Slider -->
<div class="home-slide">
	<div class="container">
		<div class="row ">
			<div class="col-xs-12">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<div class="item">
						<a href="{{ url('/') }}" title="slide 1"><img src="//bizweb.dktcdn.net/100/048/137/themes/61830/assets/slider-1.jpg?1470122713917" alt="slide 1">
						</a>
					</div>
					<div class="item">
						<a href="{{ url('/') }}" title="slide 2"><img src="//bizweb.dktcdn.net/100/048/137/themes/61830/assets/slider-2.jpg?1470122713917" alt="slide 2">
						</a>
					</div>
					<div class="item">
						<a href="{{ url('/') }}" title="slide 3"><img src="//bizweb.dktcdn.net/100/048/137/themes/61830/assets/slider-3.jpg?1470122713917" alt="slide 3">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Slider -->

<!-- Right -->
<section class="mtb25">
<div class="container">
<div class="row">
<!--dong o left-->
<div class="megamenu-right col-md-9 col-md-push-3">
	<div class="row">
		<!-- Sản phẩm mới -->
		<!-- Widget 444444 -->
        {!!showWidget('widget444444')!!}
        <!-- End Widget 444444 -->
		
		<!-- Sản phẩm khuyến mãi -->
		<!-- Widget 555555 -->
        {!!showWidget('widget555555')!!}
        <!-- End Widget 555555 -->
	</div>
</div>
<!-- End Right -->

<!-- Left -->
<div class="megamenu-left col-md-3 col-md-pull-9">
	<div class="cd-dropdown-wrapper">
		<!-- Danh mục sản phẩm -->
		<!-- Widget 111111 -->
        {!!showWidget('widget111111')!!}
        <!-- End Widget 111111 -->
		<!-- .cd-dropdown -->
	</div>
	<!-- .cd-dropdown-wrapper -->

	<!-- Nhà sản xuất -->
	<!-- Widget 222222 -->
    {!!showWidget('widget222222')!!}
    <!-- End Widget 222222 -->
	
	<!-- Sản phẩm nổi bật -->
	<!-- Widget 333333 -->
    {!!showWidget('widget333333')!!}
    <!-- End Widget 333333 -->
	
	<!-- Video -->
	<div class="widget-sidebar-item">
		<h2 class="widget-sidebar-name">{{ $youtube['heading'] }}</h2>
		<div class="video-container">
			<iframe width="100%" height="auto" src="{{ $youtube['url'] }}" frameborder="0" allowfullscreen=""></iframe>
		</div>
	</div>
</div>
</div>
</div>
</section>
<!--dong right-->
<!-- End Left -->
@stop