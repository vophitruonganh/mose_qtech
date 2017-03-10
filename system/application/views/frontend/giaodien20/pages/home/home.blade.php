@extends('frontend.giaodien20.layouts.default')
@section('content')
<!-- Slider -->
<main class="main-content" role="main">
<!--cuoi thuong hieu-->
<section>
	<div class="full_screen">
		<div class="inner space-30 section-slider">
			<!-- /templates/snippets/section-slider.liquid -->
			<div class="slider-carousel owl-carousel owl-theme" id="slider-carousel" data-mobile="[479,1]" data-tabletsmall="[768,1]" data-desktopsmall="[979,1]" data-desktop="[1199,1]" data-pagination="false" data-navigation="true" data-autoPlay="8000" data-items="1">
				<div class="text-right">
					<a class="slide" href="/collections/all" title=""><img src='//hstatic.net/030/1000104030/1000147045/slide_logo_1.jpg?v=96' alt=''  /></a>
					<div class="text">
						<p class="text1 wow bounceInDown" data-wow-duration="1s">Tai Nghe Studio </p>
						<h3 class="text2 wow fadeInUp" data-wow-duration="2s">Nghe những gì bạn muốn</h3>
						<p class="text3 wow bounceInUp" data-wow-duration="3s">Với chất lượng âm thanh vượt trội và giảm tiếng ồn, Beats Studio và Studio mới không dây cho phép bạn tập trung</p>
					</div>
				</div>
				<div class="text-right">
					<a class="slide" href="/collections/all" title=""><img src='//hstatic.net/030/1000104030/1000147045/slide_logo_2.jpg?v=96' alt=''  /></a>
					<div class="text">
						<p class="text1 wow bounceInDown" data-wow-duration="1s">Đồng Hồ Hammer</p>
						<h3 class="text2 wow fadeInUp" data-wow-duration="2s">Thời trang cao cấp</h3>
						<p class="text3 wow bounceInUp" data-wow-duration="3s">Được yêu thích từ vẻ đẹp bên ngoài đến chức năng. Đồng hồ Hammer là một lựa chọn tốt cho bạn</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Slider -->

<!-- Quảng Cáo -->
<section>
    <div class="wrapper">
        <div class="inner space-30 section-custom-center">
                <!-- /templates/snippets/section-custom-center.liquid -->
            <div class="custom-center">
                <div class="grid">
                    @foreach ($firstAdvertise as $row)
                    <div class="grid__item large--one-half medium--one-half">
                        <a href="{{ $row['url'] }}" title="banner">
                            <div class="effect effect-v3">
                                    <img src='{{ $row['image'] }}' alt=''  />
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Quảng Cáo -->

<!-- Sản Phẩm Nổi Bật -->
		<!-- Widget 1111111111 -->
			{!!showWidget('widget1111111111')!!}
		<!-- End Widget 1111111111 -->
<!-- End Sản Phẩm Nổi Bật -->

<!-- Sản Phẩm Giảm Giá -->
		<!-- Widget 2222222222 -->
			{!!showWidget('widget2222222222')!!}
		<!-- End Widget 2222222222 -->

<!-- End Sản Phẩm Giảm Giá -->

<!-- Sản Phẩm Mới -->
		<!-- Widget 3333333333 -->
			{!!showWidget('widget3333333333')!!}
		<!-- End Widget 3333333333 -->

<!-- End Sản Phẩm Mới -->

<!-- Đồ Điện Tử -->
		<!-- Widget 4444444444 -->
			{!!showWidget('widget4444444444')!!}
		<!-- End Widget 4444444444 -->

<!-- End Đồ Điện Tử -->

<!-- Dụng Cụ Thể Hình -->
		<!-- Widget 5555555555 -->
			{!!showWidget('widget5555555555')!!}
		<!-- End Widget 5555555555 -->

<!-- End Dụng Cụ Thể Hình -->

<!-- Thời Trang -->
		<!-- Widget 6666666666 -->
			{!!showWidget('widget6666666666')!!}
		<!-- End Widget 6666666666 -->

<!-- End Thời Trang -->

<!-- Tin Tức -->
		<!-- Widget 7777777777 -->
			{!!showWidget('widget7777777777')!!}
		<!-- End Widget 7777777777 -->

<!-- End Tin Tức -->

<!-- Thương Hiệu -->
<section>
	<div class="wrapper">
		<div class="inner space-30 section-brand">
			<!-- /templates/snippets/section-brand.liquid -->
			<h2  class="title"><span><img src="{{asset('template/giaodien20/asset/images/brand_icon_title.png')}}" alt=''  /></span>{{ $doitac['heading'] }}</h2>
			<div class="brands-carousel owl-carousel owl-theme " id="brands-carousel" data-items="6" data-pagination="false" data-navigation="true" data-autoPlay="false">
				<?php unset($doitac['heading']); ?>
                                @foreach( $doitac as $row )
                                <div class="text-center">
					<a class="brand" href="{{ $row['url'] }}" title=""><img src='{{ $row['image'] }}' alt=''  /></a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
</main>
<!--dau lider-->
<!-- End Thương Hiệu -->
@stop