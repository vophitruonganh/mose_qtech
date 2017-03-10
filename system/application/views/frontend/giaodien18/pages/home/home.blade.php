@extends('frontend.giaodien18.layouts.default')
@section('content')
<!-- Slider -->
<section id="wrap-slider">
	<div class="wrap-img">
		<div class="box-img">
			<a href="/collections/all"><img src="//hstatic.net/385/1000031385/1000050128/slideshow_1.png?v=133" alt="2323123" class="img-responsive"/></a>
		</div>
		<div class="box-img">
			<a href="/collections/all"><img src="//hstatic.net/385/1000031385/1000050128/slideshow_2.png?v=133" alt="" class="img-responsive"/></a>
		</div>
		<div class="box-img">
			<a href=""><img src="//hstatic.net/385/1000031385/1000050128/slideshow_3.png?v=133" alt="" class="img-responsive"/></a>
		</div>
	</div>
</section>
<!-- End Slider -->

<!-- Sản Phẩm Nổi Bật -->

		<!-- Widget 111111111 -->
			{!!showWidget('widget111111111')!!}
		<!-- End Widget 111111111 -->

<!-- End Sản Phẩm Nổi Bật -->

<!-- Sản Phẩm Laptop -->
		<!-- Widget 222222222 -->
			{!!showWidget('widget222222222')!!}
		<!-- End Widget 222222222 -->

<!-- End Sản Phẩm Laptop -->

<!-- Row 1 -->
<section id="wrap-content-top" class="wow bounceInUp">
	<div class="container">
		@foreach( $advertise as $row )
		<div class="col-xs-4 list-content-top">
			<a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}" class="img-responsive"/></a>
		</div>
		<!--end .col-md-4 col-sm-6 col-xs-6 list-content-top-->
		@endforeach
	</div>
	<!--end .container-->
</section>
<!-- End Row 1 -->

<!-- Sản Phẩm Điện Thoại -->
	<!-- Widget 333333333 -->
		{!!showWidget('widget333333333')!!}
	<!-- End Widget 333333333 -->

<!-- End Sản Phẩm Điện Thoại -->

<?php /*

<!-- Sản Phẩm Máy Bảng -->
<section id="wrap-content-center" class="wow slideInRight">
	<div class="container">
		<div class="clearfix">
			<h3 class="title-box-home title-box-home2 col-md-2">Máy tính bảng </h3>
			<div class="line-title col-md-9"></div>
		</div>
		<div class="wrap-box-maybang col-sm-12">
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-01">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="Điện thoại Hight Class Smart 01" title="Điện thoại Hight Class Smart 01"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_1_large.jpg" class="img-responsive" />
								<div class="sales">
									<span>- 17%</span>
								</div>
								<!--end .sales-->
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>7,500,000₫</span>
								<span><del>9,000,000₫</del></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-01">Điện thoại Hight Class Smart 01</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-01">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-2">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="Điện thoại Smart Phone 001" title="Điện thoại Smart Phone 001"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_2_a7fe4cc4-35f7-4601-40bb-0835b6cbef26_large.jpg" class="img-responsive" />
								<div class="sales">
									<span>- 28%</span>
								</div>
								<!--end .sales-->
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>6,500,000₫</span>
								<span><del>9,000,000₫</del></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-2">Điện thoại Smart Phone 001</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-2">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/tai-nghe-primis-in-faucibus-1">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="Tai nghe Accumsan Elit" title="Tai nghe Accumsan Elit"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_2_a49a23da-39df-4494-5995-137351aacfe0_large.jpg" class="img-responsive" />
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>790,000₫</span>
								<span></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/tai-nghe-primis-in-faucibus-1">Tai nghe Accumsan Elit</a></h4>
				<span class="buy-home"><a href="/products/tai-nghe-primis-in-faucibus-1">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/tai-nghe-primis-in-faucibus">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="Tai nghe Primis In Faucibus" title="Tai nghe Primis In Faucibus"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_1_large.jpg" class="img-responsive" />
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>790,000₫</span>
								<span></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/tai-nghe-primis-in-faucibus">Tai nghe Primis In Faucibus</a></h4>
				<span class="buy-home"><a href="/products/tai-nghe-primis-in-faucibus">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			end .wrap-box-padding
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-4">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="VF Phone Oppi" title="VF Phone Oppi"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_6_d5b8b2a6-c3a4-4851-4dd1-610b28cb97f0_33d45a6e-ad5e-4a49-77f0-2d72a956b54a_57160358-72a7-43bd-7523-18e673fa1d79_large.jpg" class="img-responsive" />
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>3,000,000₫</span>
								<span></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-4">VF Phone Oppi</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-4">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-3">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="VN Galaxy Smart Phone" title="VN Galaxy Smart Phone"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_3_036c4863-78ca-4613-470e-d59692c6c15f_0295171d-2223-42f0-4cab-90ac771f38aa_large.jpg" class="img-responsive" />
								<div class="sales">
									<span>- 12%</span>
								</div>
								<!--end .sales-->
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>3,500,000₫</span>
								<span><del>4,000,000₫</del></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-3">VN Galaxy Smart Phone</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-3">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-4">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="VF Phone Oppi" title="VF Phone Oppi"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_6_d5b8b2a6-c3a4-4851-4dd1-610b28cb97f0_33d45a6e-ad5e-4a49-77f0-2d72a956b54a_57160358-72a7-43bd-7523-18e673fa1d79_large.jpg" class="img-responsive" />
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>3,000,000₫</span>
								<span></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-4">VF Phone Oppi</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-4">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-3">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="VN Galaxy Smart Phone" title="VN Galaxy Smart Phone"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_3_036c4863-78ca-4613-470e-d59692c6c15f_0295171d-2223-42f0-4cab-90ac771f38aa_large.jpg" class="img-responsive" />
								<div class="sales">
									<span>- 12%</span>
								</div>
								<!--end .sales-->
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>3,500,000₫</span>
								<span><del>4,000,000₫</del></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-3">VN Galaxy Smart Phone</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-3">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
		</div>
	</div>
	<!--end .container-->
</section>
<!-- End Sản Phẩm Máy Bảng -->

<!-- Sản Phẩm Phụ Kiện -->
<section id="wrap-content-center">
	<div class="container">
		<div class="clearfix">
			<h3 class="title-box-home col-md-2"> Sản phẩm Phụ kiện </h3>
			<div class="line-title col-md-9"></div>
		</div>
		<div class="wrap-box-phukien col-sm-12">
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-01">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="Điện thoại Hight Class Smart 01" title="Điện thoại Hight Class Smart 01"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_1_large.jpg" class="img-responsive" />
								<div class="sales">
									<span>- 17%</span>
								</div>
								<!--end .sales-->
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>7,500,000₫</span>
								<span><del>9,000,000₫</del></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-01">Điện thoại Hight Class Smart 01</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-01">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-2">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="Điện thoại Smart Phone 001" title="Điện thoại Smart Phone 001"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_2_a7fe4cc4-35f7-4601-40bb-0835b6cbef26_large.jpg" class="img-responsive" />
								<div class="sales">
									<span>- 28%</span>
								</div>
								<!--end .sales-->
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>6,500,000₫</span>
								<span><del>9,000,000₫</del></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-2">Điện thoại Smart Phone 001</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-2">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/tai-nghe-primis-in-faucibus-1">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="Tai nghe Accumsan Elit" title="Tai nghe Accumsan Elit"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_2_a49a23da-39df-4494-5995-137351aacfe0_large.jpg" class="img-responsive" />
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>790,000₫</span>
								<span></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/tai-nghe-primis-in-faucibus-1">Tai nghe Accumsan Elit</a></h4>
				<span class="buy-home"><a href="/products/tai-nghe-primis-in-faucibus-1">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/tai-nghe-primis-in-faucibus">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="Tai nghe Primis In Faucibus" title="Tai nghe Primis In Faucibus"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_1_large.jpg" class="img-responsive" />
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>790,000₫</span>
								<span></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/tai-nghe-primis-in-faucibus">Tai nghe Primis In Faucibus</a></h4>
				<span class="buy-home"><a href="/products/tai-nghe-primis-in-faucibus">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-4">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="VF Phone Oppi" title="VF Phone Oppi"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_6_d5b8b2a6-c3a4-4851-4dd1-610b28cb97f0_33d45a6e-ad5e-4a49-77f0-2d72a956b54a_57160358-72a7-43bd-7523-18e673fa1d79_large.jpg" class="img-responsive" />
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>3,000,000₫</span>
								<span></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-4">VF Phone Oppi</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-4">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-3">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="VN Galaxy Smart Phone" title="VN Galaxy Smart Phone"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_3_036c4863-78ca-4613-470e-d59692c6c15f_0295171d-2223-42f0-4cab-90ac771f38aa_large.jpg" class="img-responsive" />
								<div class="sales">
									<span>- 12%</span>
								</div>
								<!--end .sales-->
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>3,500,000₫</span>
								<span><del>4,000,000₫</del></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-3">VN Galaxy Smart Phone</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-3">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-4">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="VF Phone Oppi" title="VF Phone Oppi"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_6_d5b8b2a6-c3a4-4851-4dd1-610b28cb97f0_33d45a6e-ad5e-4a49-77f0-2d72a956b54a_57160358-72a7-43bd-7523-18e673fa1d79_large.jpg" class="img-responsive" />
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>3,000,000₫</span>
								<span></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-4">VF Phone Oppi</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-4">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
			<div class="wrap-box-padding">
				<a href="/products/dien-thoai-hight-class-smart-3">
					<div class="wrap-border-content-center">
						<div class="list-content-center">
							<div class="img-product-home">
								<img alt="VN Galaxy Smart Phone" title="VN Galaxy Smart Phone"
									src="//hstatic.net/385/1000031385/1/2015/7-30/sp_1_3_036c4863-78ca-4613-470e-d59692c6c15f_0295171d-2223-42f0-4cab-90ac771f38aa_large.jpg" class="img-responsive" />
								<div class="sales">
									<span>- 12%</span>
								</div>
								<!--end .sales-->
							</div>
						</div>
						<!--end list-content-center-->
						<div class="price-content-center">
							<div class="wrap-price">
								<span>3,500,000₫</span>
								<span><del>4,000,000₫</del></span>
							</div>
							<!--end .wrap-price-->
							<div class="wrap-addcard">
								<h4>
				<a href="/products/dien-thoai-hight-class-smart-3">VN Galaxy Smart Phone</a></h4>
				<span class="buy-home"><a href="/products/dien-thoai-hight-class-smart-3">Mua ngay</a></span>
				</div><!--end .wrap-addcard-->
				</div><!--end .price-content-center-->
				</div><!--end .wrap-border-content-center-->
				</a>
			</div>
			<!--end .wrap-box-padding-->
		</div>
	</div>
	<!--end .container-->
</section>
<!-- End Sản Phẩm Phụ Kiện -->
*/?>

<script type="text/javascript">

      function order(i)
      {
 	     $("#form_order_"+i).submit();
      }
</script>
@stop