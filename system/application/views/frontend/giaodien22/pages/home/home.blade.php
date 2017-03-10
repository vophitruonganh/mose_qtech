@extends('frontend.giaodien22.layouts.default')
@section('content')

<!-- Row 1 -->
<main class="main-content" role="main">
<section id="columns" class="columns-container">
<div class="container">
<div class="row">
<div id="center_column" class="center_column col-sm-12 col-md-12">
<div class="center_wrap">
<!--end row 5-->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9">
		<section id="slideshow" class="clearfix">
			<div class="slider-container ">
				<ul id="sliderlayer" class="slides clearfix">
					<li data-thumb="//hstatic.net/768/1000048768/1000071992/slideshow_image_1.jpg?v=352">
						<a href="/collections/all" class="slide-link">
						<img class="img-responsive" alt="BỘ SƯU TẬP SMART PHONE" src="//hstatic.net/768/1000048768/1000071992/slideshow_image_1.jpg?v=352" />
						</a>
						<div class="slide-caption caption_1">
							<div class="">
								<div class="text_first">Giới thiệu</div>
								<h3>BỘ SƯU TẬP SMART PHONE</h3>
								<p>Cả thế giới trong tầm tay của bạn</p>
								<a class="btn btn-slide" href="#" title="Xem Ngay">Xem Ngay</a>
							</div>
						</div>
					</li>
					<li data-thumb="//hstatic.net/768/1000048768/1000071992/slideshow_image_2.jpg?v=352">
						<a href="#" class="slide-link">
						<img class="img-responsive" alt="Camera Canon" src="//hstatic.net/768/1000048768/1000071992/slideshow_image_2.jpg?v=352" />
						</a>
						<div class="slide-caption caption_2">
							<div class="">
								<div class="text_first">Khuyến Mại</div>
								<h3>Camera Canon</h3>
								<p>Giảm giá 50% từ ngày hôm nay !</p>
								<a class="btn btn-slide" href="#" title="Xem Ngay">Xem Ngay</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<script>
				$(document).ready(function() {
				    $('.slider-container').flexslider({
				        namespace: "leo-",
				        animation: "slide",
				        smoothHeight: false
				    });
				});
			</script>
		</section>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 hidden-xs hidden-sp hidden-sm">
		<div class="widget-banner block">
			<div class="block_content">
				<div class="image-box">
					<div class="img-banner">
						<a href="/collections/all">
						<img src='//hstatic.net/768/1000048768/1000071992/home_bannertop.png?v=352' alt='Adv Banner' class='img-responsive' />
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row 1 -->

<!-- Row 2 -->
<div class="row wow animated fadeInUp">
	<div class="col-xs-12 col-sm-12 noshadow nobackground">
		<div class="widget-html block">
			<div class="block_content">
				<div class="media-list row">
					<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
						<div class="media red">
							<a class="pull-left" title="" href="#">
							<img src='//hstatic.net/768/1000048768/1000071992/home_bannertop1.png?v=352' alt='Adv Banner' class='img-responsive' />
							</a>
							<div class="media-body">
								<h4 class="media-heading"><a title="" href="#">Giao Hàng</a></h4>
								<p>Bạn hoàn toàn không phải chịu phí vận chuyển.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
						<div class="media green">
							<a class="pull-left" title="" href="#">
							<img src='//hstatic.net/768/1000048768/1000071992/home_bannertop2.png?v=352' alt='Adv Banner' class='img-responsive' />
							</a>
							<div class="media-body">
								<h4 class="media-heading"><a title="" href="#">Trả Hàng</a></h4>
								<p>Hoàn 100% tiền mua hàng trong vòng 5 ngày</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
						<div class="media blue">
							<a class="pull-left" title="" href="#">
							<img src='//hstatic.net/768/1000048768/1000071992/home_bannertop3.png?v=352' alt='Adv Banner' class='img-responsive' />
							</a>
							<div class="media-body">
								<h4 class="media-heading"><a title="" href="#">Khuyến Mại</a></h4>
								<p>Bắt đầu từ 30-12-2015 và kéo dài tới hơn 3 tháng sau đó</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
						<div class="media dark">
							<a class="pull-left" title="" href="#">
							<img src='//hstatic.net/768/1000048768/1000071992/home_bannertop4.png?v=352' alt='Adv Banner' class='img-responsive' />
							</a>
							<div class="media-body">
								<h4 class="media-heading"><a title="" href="#">Hỗ Trợ</a></h4>
								<p> Chúng tôi luôn luôn trực tuyến để hỗ trợ khách hàng 24/7</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row 2 -->

<!-- Row 3 -->
<div class="row wow animated fadeInUp">
	<div class="products_top col-xs-12 col-sm-12">
		<div id="productlist01" class="products_block exclusive block" >
			<h4 class="title_block">
				Bán Chạy Nhất
			</h4>
			<div class="block_content">
				<div class="product_list_owl owl-row">
					<div class="owl-carousel slide">
						<div class="item">
							<div class="product_block  ">
								<div class="product-container product-block">
									<div class="left-block">
										<div class="product-image-container image">
											<a class="product_img_link" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">
											<img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-11_grande.png" alt="Aliquam sit amet">
											<span class="product-additional" data-idproduct="1001096173">
											<img class="replace-2x img-responsive" alt="Aliquam sit amet" src="//hstatic.net/768/1000048768/1/2015/11-4/p-12_grande.png">
											</span>
											</a>
											<span class="sale-box">
											<span class="label-sale">SALE</span>
											</span>
										</div>
									</div>
									<div class="right-block">
										<h5 class="name">
											<a class="product-name" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">Aliquam sit amet</a>
										</h5>
										<p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
										<div class="content_price">
											<span class="price product-price sale-price">
											<span class='money'>20,000,000₫</span>
											</span>
											<span class="old-price product-price"><span class='money'>23,000,000₫</span></span>
										</div>
										<div class="review">
											<span class="haravan-product-reviews-badge" data-id="1001096173"></span>
										</div>
										<div class="functional-buttons clearfix">
											<div class="cart">
												<form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
													<input type="hidden" name="id" value="1004253866" />
													<button class="button ajax_addtocart" type="submit" value="Submit">
													<span>Mua Ngay</span>
													</button>
												</form>
											</div>
											<a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
											<i class="fa fa-heart"></i>
											<span>Danh Sách Ưa Thích</span>
											</a>
											<a class="quick-view btn" href="#quick-view-product" data-handle="egestas-lorem-commodo" title="Xem" data-toggle="tooltip" data-original-title="Xem">
											<i class="fa fa-arrows-alt"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product_block  ">
								<div class="product-container product-block">
									<div class="left-block">
										<div class="product-image-container image">
											<a class="product_img_link" href="/products/amet-nunc-consequat" title="Curabitur iaculis">
											<img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-2_grande.png" alt="Curabitur iaculis">
											<span class="product-additional" data-idproduct="1001096176">
											<img class="replace-2x img-responsive" alt="Curabitur iaculis" src="//hstatic.net/768/1000048768/1/2015/11-4/p-1_grande.png">
											</span>
											</a>
											<span class="sale-box">
											<span class="label-sale">SALE</span>
											</span>
										</div>
									</div>
									<div class="right-block">
										<h5 class="name">
											<a class="product-name" href="/products/amet-nunc-consequat" title="Curabitur iaculis">Curabitur iaculis</a>
										</h5>
										<p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
										<div class="content_price">
											<span class="price product-price sale-price">
											<span class='money'>20,000,000₫</span>
											</span>
											<span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
										</div>
										<div class="review">
											<span class="haravan-product-reviews-badge" data-id="1001096176"></span>
										</div>
										<div class="functional-buttons clearfix">
											<div class="cart">
												<form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
													<input type="hidden" name="id" value="1004253870" />
													<button class="button ajax_addtocart" type="submit" value="Submit">
													<span>Mua Ngay</span>
													</button>
												</form>
											</div>
											<a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
											<i class="fa fa-heart"></i>
											<span>Danh Sách Ưa Thích</span>
											</a>
											<a class="quick-view btn" href="#quick-view-product" data-handle="amet-nunc-consequat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
											<i class="fa fa-arrows-alt"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product_block  ">
								<div class="product-container product-block">
									<div class="left-block">
										<div class="product-image-container image">
											<a class="product_img_link" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">
											<img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-6_e454d27c-478e-4118-9a14-88305c6ca699_grande.png" alt="Etiam et eros">
											<span class="product-additional" data-idproduct="1001096174">
											<img class="replace-2x img-responsive" alt="Etiam et eros" src="//hstatic.net/768/1000048768/1/2015/11-4/p-10_15966939-ef9a-46b2-8ff2-7fcb1cbb01fe_grande.png">
											</span>
											</a>
											<span class="sale-box">
											<span class="label-sale">SALE</span>
											</span>
										</div>
									</div>
									<div class="right-block">
										<h5 class="name">
											<a class="product-name" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">Etiam et eros</a>
										</h5>
										<p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
										<div class="content_price">
											<span class="price product-price sale-price">
											<span class='money'>19,999,999₫</span>
											</span>
											<span class="old-price product-price"><span class='money'>20,000,000₫</span></span>
										</div>
										<div class="review">
											<span class="haravan-product-reviews-badge" data-id="1001096174"></span>
										</div>
										<div class="functional-buttons clearfix">
											<div class="cart">
												<form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
													<input type="hidden" name="id" value="1004253868" />
													<button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
													<span>Hết Hàng</span>
													</button>
												</form>
											</div>
											<a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
											<i class="fa fa-heart"></i>
											<span>Danh Sách Ưa Thích</span>
											</a>
											<a class="quick-view btn" href="#quick-view-product" data-handle="consequat-sagittis-lacinia" title="Xem" data-toggle="tooltip" data-original-title="Xem">
											<i class="fa fa-arrows-alt"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product_block  ">
								<div class="product-container product-block">
									<div class="left-block">
										<div class="product-image-container image">
											<a class="product_img_link" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">
											<img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-4_166d4b7b-6b6a-47c4-8fcc-8277fc4d48d4_grande.png" alt="Fusce placerat">
											<span class="product-additional" data-idproduct="1001096167">
											<img class="replace-2x img-responsive" alt="Fusce placerat" src="//hstatic.net/768/1000048768/1/2015/11-4/p-3_82556950-75e0-4181-9a97-a3f7514b515d_grande.png">
											</span>
											</a>
											<span class="sale-box">
											<span class="label-sale">SALE</span>
											</span>
										</div>
									</div>
									<div class="right-block">
										<h5 class="name">
											<a class="product-name" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">Fusce placerat</a>
										</h5>
										<p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
										<div class="content_price">
											<span class="price product-price sale-price">
											<span class='money'>5,000,000₫</span>
											</span>
											<span class="old-price product-price"><span class='money'>5,400,000₫</span></span>
										</div>
										<div class="review">
											<span class="haravan-product-reviews-badge" data-id="1001096167"></span>
										</div>
										<div class="functional-buttons clearfix">
											<div class="cart">
												<form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
													<input type="hidden" name="id" value="1004253860" />
													<button class="button ajax_addtocart" type="submit" value="Submit">
													<span>Mua Ngay</span>
													</button>
												</form>
											</div>
											<a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
											<i class="fa fa-heart"></i>
											<span>Danh Sách Ưa Thích</span>
											</a>
											<a class="quick-view btn" href="#quick-view-product" data-handle="malesuada-bibendum-duiat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
											<i class="fa fa-arrows-alt"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product_block  ">
								<div class="product-container product-block">
									<div class="left-block">
										<div class="product-image-container image">
											<a class="product_img_link" href="/products/gucci-women-handbag" title="Gucci Women">
											<img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-7_grande.png" alt="Gucci Women">
											<span class="product-additional" data-idproduct="1001096185">
											<img class="replace-2x img-responsive" alt="Gucci Women" src="//hstatic.net/768/1000048768/1/2015/11-4/p-13_grande.png">
											</span>
											</a>
											<span class="sale-box">
											<span class="label-sale">SALE</span>
											</span>
										</div>
									</div>
									<div class="right-block">
										<h5 class="name">
											<a class="product-name" href="/products/gucci-women-handbag" title="Gucci Women">Gucci Women</a>
										</h5>
										<p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
										<div class="content_price">
											<span class="price product-price sale-price">
											<span class='money'>6,300,000₫</span>
											</span>
											<span class="old-price product-price"><span class='money'>8,000,000₫</span></span>
										</div>
										<div class="review">
											<span class="haravan-product-reviews-badge" data-id="1001096185"></span>
										</div>
										<div class="functional-buttons clearfix">
											<div class="cart">
												<form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
													<input type="hidden" name="id" value="1004253879" />
													<button class="button ajax_addtocart" type="submit" value="Submit">
													<span>Mua Ngay</span>
													</button>
												</form>
											</div>
											<a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
											<i class="fa fa-heart"></i>
											<span>Danh Sách Ưa Thích</span>
											</a>
											<a class="quick-view btn" href="#quick-view-product" data-handle="gucci-women-handbag" title="Xem" data-toggle="tooltip" data-original-title="Xem">
											<i class="fa fa-arrows-alt"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product_block  ">
								<div class="product-container product-block">
									<div class="left-block">
										<div class="product-image-container image">
											<a class="product_img_link" href="/products/canon-eos-40d-10-1mp-slr-camera" title="Integer sit amet">
											<img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-10_grande.png" alt="Integer sit amet">
											<span class="product-additional" data-idproduct="1001096182">
											<img class="replace-2x img-responsive" alt="Integer sit amet" src="//hstatic.net/768/1000048768/1/2015/11-4/p-14_grande.png">
											</span>
											</a>
											<span class="sale-box">
											<span class="label-sale">SALE</span>
											</span>
										</div>
									</div>
									<div class="right-block">
										<h5 class="name">
											<a class="product-name" href="/products/canon-eos-40d-10-1mp-slr-camera" title="Integer sit amet">Integer sit amet</a>
										</h5>
										<p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
										<div class="content_price">
											<span class="price product-price sale-price">
											<span class='money'>20,000,000₫</span>
											</span>
											<span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
										</div>
										<div class="review">
											<span class="haravan-product-reviews-badge" data-id="1001096182"></span>
										</div>
										<div class="functional-buttons clearfix">
											<div class="cart">
												<form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
													<input type="hidden" name="id" value="1004253877" />
													<button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
													<span>Hết Hàng</span>
													</button>
												</form>
											</div>
											<a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
											<i class="fa fa-heart"></i>
											<span>Danh Sách Ưa Thích</span>
											</a>
											<a class="quick-view btn" href="#quick-view-product" data-handle="canon-eos-40d-10-1mp-slr-camera" title="Xem" data-toggle="tooltip" data-original-title="Xem">
											<i class="fa fa-arrows-alt"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {

			     $('#productlist01 .owl-carousel').each(function(){
			                     $(this).owlCarousel({
			                     items : 5,
			                     lazyLoad : true,
			                     navigation : true,
			                     addClassActive: true,
			                             afterInit : SetOwlCarouselFirstLast,
			                     afterAction : SetOwlCarouselFirstLast,

			                                     itemsDesktop: [1199, 3],
			                       itemsDesktopSmall: [979, 2],
			                       itemsTablet: [768, 2],
			                       itemsTabletSmall: [480, 1],
			                       itemsMobile: [360, 1],

			                             navigationText : ["‹", "›"]
			             });
			             });
			                     function SetOwlCarouselFirstLast(el){
			                     el.find(".owl-item").removeClass("first");
			                     el.find(".owl-item.active").first().addClass("first");

			                     el.find(".owl-item").removeClass("last");
			                     el.find(".owl-item.active").last().addClass("last");
			             };

			});
		</script>
	</div>
</div>
<!-- End Row 3 -->

<!-- Row 4 -->
<div class="row wow animated fadeInUp">
	<div class="col-xs-12 col-sm-12 noshadow nobackground">
		<div class="widget-html block">
			<div class="block_content">
				<div class="media-list row">
					<div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
						<div class="media gray">
							<a class="pull-right" title="" href="/collections/all">
							<img src='//hstatic.net/768/1000048768/1000071992/home_bannercenter1.png?v=352' alt='Adv Banner' class='img-responsive' />
							</a>
							<div class="media-body">
								<h3 class="media-heading text-primary-theme"><a title="" href="#">Ví Dụ Về Quảng Cáo</a></h3>
								<p>Bạn có thể đặt những đoạn text ở đây để quảng cáo cho sản phẩm , bộ sưu tập của mình</p>
								<p class="readmore"><a href="#">Xem Thêm</a></p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
						<div class="media gray">
							<a class="pull-right" title="" href="#">
							<img src='//hstatic.net/768/1000048768/1000071992/home_bannercenter2.png?v=352' alt='Adv Banner' class='img-responsive' />
							</a>
							<div class="media-body">
								<h3 class="media-heading text-primary-theme"><a title="" href="#">Ví Dụ Về Quảng Cáo</a></h3>
								<p>Bạn có thể đặt những đoạn text ở đây để quảng cáo cho sản phẩm , bộ sưu tập của mình</p>
								<p class="readmore"><a href="#">Xem Thêm</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row 4 -->

<!-- Row 5 -->
<div class="row wow animated fadeInUp">
    <div class="col-xs-12 col-sm-12">
       <div id="productTabs01" class="products_block exclusive">
          <div class="block_content box-line">
             <ul id="productTabsNav" class="nav nav-tabs block">
                <li><a href="#proTabs101" data-toggle="tab"><img src='//hstatic.net/768/1000048768/1000071992/home_producttabs_icontab_1.png?v=352' alt='img-responsive'  />Điện Thoại</a></li>
                <li><a href="#proTabs201" data-toggle="tab"><img src='//hstatic.net/768/1000048768/1000071992/home_producttabs_icontab_2.png?v=352' alt='img-responsive'  />Máy Tính Bảng</a></li>
                <li><a href="#proTabs301" data-toggle="tab"><img src='//hstatic.net/768/1000048768/1000071992/home_producttabs_icontab_3.png?v=352' alt='img-responsive'  />Camera</a></li>
                <li><a href="#proTabs401" data-toggle="tab"><img src='//hstatic.net/768/1000048768/1000071992/home_producttabs_icontab_4.png?v=352' alt='img-responsive'  />Phụ Kiện</a></li>
             </ul>
             <div id="product_tab_content">
                <div class="block product_tab_content tab-content owl-row">
                   <div class="tab-pane" id="proTabs101">
                      <div class="product_list_owl owl-row">
                         <div class="owl-carousel slide">
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-11_grande.png" alt="Aliquam sit amet">
                                           <span class="product-additional" data-idproduct="1001096173">
                                           <img class="replace-2x img-responsive" alt="Aliquam sit amet" src="//hstatic.net/768/1000048768/1/2015/11-4/p-12_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">Aliquam sit amet</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>23,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096173"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253866" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="egestas-lorem-commodo" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/amet-nunc-consequat" title="Curabitur iaculis">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-2_grande.png" alt="Curabitur iaculis">
                                           <span class="product-additional" data-idproduct="1001096176">
                                           <img class="replace-2x img-responsive" alt="Curabitur iaculis" src="//hstatic.net/768/1000048768/1/2015/11-4/p-1_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/amet-nunc-consequat" title="Curabitur iaculis">Curabitur iaculis</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096176"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253870" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="amet-nunc-consequat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/egestas-bibendum-duiat-lorem-commodo" title="Donec dictum arcu">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-4_grande.png" alt="Donec dictum arcu">
                                           <span class="product-additional" data-idproduct="1001096186">
                                           <img class="replace-2x img-responsive" alt="Donec dictum arcu" src="//hstatic.net/768/1000048768/1/2015/11-4/p-3_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/egestas-bibendum-duiat-lorem-commodo" title="Donec dictum arcu">Donec dictum arcu</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>3,902,800₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>9,800,050₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096186"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253881" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           	</div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="egestas-bibendum-duiat-lorem-commodo" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-6_e454d27c-478e-4118-9a14-88305c6ca699_grande.png" alt="Etiam et eros">
                                           <span class="product-additional" data-idproduct="1001096174">
                                           <img class="replace-2x img-responsive" alt="Etiam et eros" src="//hstatic.net/768/1000048768/1/2015/11-4/p-10_15966939-ef9a-46b2-8ff2-7fcb1cbb01fe_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">Etiam et eros</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>19,999,999₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>20,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096174"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253868" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="consequat-sagittis-lacinia" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-4_166d4b7b-6b6a-47c4-8fcc-8277fc4d48d4_grande.png" alt="Fusce placerat">
                                           <span class="product-additional" data-idproduct="1001096167">
                                           <img class="replace-2x img-responsive" alt="Fusce placerat" src="//hstatic.net/768/1000048768/1/2015/11-4/p-3_82556950-75e0-4181-9a97-a3f7514b515d_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">Fusce placerat</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>5,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>5,400,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096167"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253860" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="malesuada-bibendum-duiat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/gucci-women-handbag" title="Gucci Women">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-7_grande.png" alt="Gucci Women">
                                           <span class="product-additional" data-idproduct="1001096185">
                                           <img class="replace-2x img-responsive" alt="Gucci Women" src="//hstatic.net/768/1000048768/1/2015/11-4/p-13_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/gucci-women-handbag" title="Gucci Women">Gucci Women</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>6,300,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>8,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096185"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253879" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="gucci-women-handbag" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/curabitur-porta-aliquetnter" title="Nulla et bibendum">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-7_ad81b7f3-c81d-4b15-8c6c-c85ef005e262_grande.png" alt="Nulla et bibendum">
                                           <span class="product-additional" data-idproduct="1001096165">
                                           <img class="replace-2x img-responsive" alt="Nulla et bibendum" src="//hstatic.net/768/1000048768/1/2015/11-4/p-11_689b3f75-8b17-4c13-968d-02d8a74fd14c_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/curabitur-porta-aliquetnter" title="Nulla et bibendum">Nulla et bibendum</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,231,212₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096165"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253858" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="curabitur-porta-aliquetnter" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/suspendisse-turpis-laoreet" title="Suspendisse turpis">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-14_60b6459e-0c95-4b55-89b2-c76d91c9f6f2_grande.png" alt="Suspendisse turpis">
                                           <span class="product-additional" data-idproduct="1001096171">
                                           <img class="replace-2x img-responsive" alt="Suspendisse turpis" src="//hstatic.net/768/1000048768/1/2015/11-4/p-13_6958826e-1348-48df-87b1-1ebef390160e_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/suspendisse-turpis-laoreet" title="Suspendisse turpis">Suspendisse turpis</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>12,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>15,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096171"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253864" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="suspendisse-turpis-laoreet" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="tab-pane" id="proTabs201">
                      <div class="product_list_owl owl-row">
                         <div class="owl-carousel slide">
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-11_grande.png" alt="Aliquam sit amet">
                                           <span class="product-additional" data-idproduct="1001096173">
                                           <img class="replace-2x img-responsive" alt="Aliquam sit amet" src="//hstatic.net/768/1000048768/1/2015/11-4/p-12_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">Aliquam sit amet</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>23,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096173"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253866" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="egestas-lorem-commodo" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/amet-nunc-consequat" title="Curabitur iaculis">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-2_grande.png" alt="Curabitur iaculis">
                                           <span class="product-additional" data-idproduct="1001096176">
                                           <img class="replace-2x img-responsive" alt="Curabitur iaculis" src="//hstatic.net/768/1000048768/1/2015/11-4/p-1_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/amet-nunc-consequat" title="Curabitur iaculis">Curabitur iaculis</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096176"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253870" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="amet-nunc-consequat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/egestas-bibendum-duiat-lorem-commodo" title="Donec dictum arcu">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-4_grande.png" alt="Donec dictum arcu">
                                           <span class="product-additional" data-idproduct="1001096186">
                                           <img class="replace-2x img-responsive" alt="Donec dictum arcu" src="//hstatic.net/768/1000048768/1/2015/11-4/p-3_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/egestas-bibendum-duiat-lorem-commodo" title="Donec dictum arcu">Donec dictum arcu</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>3,902,800₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>9,800,050₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096186"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253881" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="egestas-bibendum-duiat-lorem-commodo" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-6_e454d27c-478e-4118-9a14-88305c6ca699_grande.png" alt="Etiam et eros">
                                           <span class="product-additional" data-idproduct="1001096174">
                                           <img class="replace-2x img-responsive" alt="Etiam et eros" src="//hstatic.net/768/1000048768/1/2015/11-4/p-10_15966939-ef9a-46b2-8ff2-7fcb1cbb01fe_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">Etiam et eros</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>19,999,999₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>20,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096174"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253868" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="consequat-sagittis-lacinia" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-4_166d4b7b-6b6a-47c4-8fcc-8277fc4d48d4_grande.png" alt="Fusce placerat">
                                           <span class="product-additional" data-idproduct="1001096167">
                                           <img class="replace-2x img-responsive" alt="Fusce placerat" src="//hstatic.net/768/1000048768/1/2015/11-4/p-3_82556950-75e0-4181-9a97-a3f7514b515d_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">Fusce placerat</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>5,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>5,400,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096167"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253860" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="malesuada-bibendum-duiat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/gucci-women-handbag" title="Gucci Women">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-7_grande.png" alt="Gucci Women">
                                           <span class="product-additional" data-idproduct="1001096185">
                                           <img class="replace-2x img-responsive" alt="Gucci Women" src="//hstatic.net/768/1000048768/1/2015/11-4/p-13_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/gucci-women-handbag" title="Gucci Women">Gucci Women</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>6,300,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>8,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096185"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253879" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="gucci-women-handbag" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/canon-eos-40d-10-1mp-slr-camera" title="Integer sit amet">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-10_grande.png" alt="Integer sit amet">
                                           <span class="product-additional" data-idproduct="1001096182">
                                           <img class="replace-2x img-responsive" alt="Integer sit amet" src="//hstatic.net/768/1000048768/1/2015/11-4/p-14_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/canon-eos-40d-10-1mp-slr-camera" title="Integer sit amet">Integer sit amet</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096182"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253877" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="canon-eos-40d-10-1mp-slr-camera" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/curabitur-porta-aliquetnter" title="Nulla et bibendum">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-7_ad81b7f3-c81d-4b15-8c6c-c85ef005e262_grande.png" alt="Nulla et bibendum">
                                           <span class="product-additional" data-idproduct="1001096165">
                                           <img class="replace-2x img-responsive" alt="Nulla et bibendum" src="//hstatic.net/768/1000048768/1/2015/11-4/p-11_689b3f75-8b17-4c13-968d-02d8a74fd14c_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/curabitur-porta-aliquetnter" title="Nulla et bibendum">Nulla et bibendum</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,231,212₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096165"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253858" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="curabitur-porta-aliquetnter" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="tab-pane" id="proTabs301">
                      <div class="product_list_owl owl-row">
                         <div class="owl-carousel slide">
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-11_grande.png" alt="Aliquam sit amet">
                                           <span class="product-additional" data-idproduct="1001096173">
                                           <img class="replace-2x img-responsive" alt="Aliquam sit amet" src="//hstatic.net/768/1000048768/1/2015/11-4/p-12_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">Aliquam sit amet</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>23,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096173"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253866" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="egestas-lorem-commodo" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/amet-nunc-consequat" title="Curabitur iaculis">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-2_grande.png" alt="Curabitur iaculis">
                                           <span class="product-additional" data-idproduct="1001096176">
                                           <img class="replace-2x img-responsive" alt="Curabitur iaculis" src="//hstatic.net/768/1000048768/1/2015/11-4/p-1_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/amet-nunc-consequat" title="Curabitur iaculis">Curabitur iaculis</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096176"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253870" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="amet-nunc-consequat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-6_e454d27c-478e-4118-9a14-88305c6ca699_grande.png" alt="Etiam et eros">
                                           <span class="product-additional" data-idproduct="1001096174">
                                           <img class="replace-2x img-responsive" alt="Etiam et eros" src="//hstatic.net/768/1000048768/1/2015/11-4/p-10_15966939-ef9a-46b2-8ff2-7fcb1cbb01fe_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">Etiam et eros</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>19,999,999₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>20,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096174"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253868" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="consequat-sagittis-lacinia" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-4_166d4b7b-6b6a-47c4-8fcc-8277fc4d48d4_grande.png" alt="Fusce placerat">
                                           <span class="product-additional" data-idproduct="1001096167">
                                           <img class="replace-2x img-responsive" alt="Fusce placerat" src="//hstatic.net/768/1000048768/1/2015/11-4/p-3_82556950-75e0-4181-9a97-a3f7514b515d_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">Fusce placerat</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>5,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>5,400,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096167"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253860" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="malesuada-bibendum-duiat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/gucci-women-handbag" title="Gucci Women">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-7_grande.png" alt="Gucci Women">
                                           <span class="product-additional" data-idproduct="1001096185">
                                           <img class="replace-2x img-responsive" alt="Gucci Women" src="//hstatic.net/768/1000048768/1/2015/11-4/p-13_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/gucci-women-handbag" title="Gucci Women">Gucci Women</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>6,300,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>8,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096185"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253879" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="gucci-women-handbag" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/canon-eos-40d-10-1mp-slr-camera" title="Integer sit amet">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-10_grande.png" alt="Integer sit amet">
                                           <span class="product-additional" data-idproduct="1001096182">
                                           <img class="replace-2x img-responsive" alt="Integer sit amet" src="//hstatic.net/768/1000048768/1/2015/11-4/p-14_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/canon-eos-40d-10-1mp-slr-camera" title="Integer sit amet">Integer sit amet</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096182"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253877" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="canon-eos-40d-10-1mp-slr-camera" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="tab-pane" id="proTabs401">
                      <div class="product_list_owl owl-row">
                         <div class="owl-carousel slide">
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-11_grande.png" alt="Aliquam sit amet">
                                           <span class="product-additional" data-idproduct="1001096173">
                                           <img class="replace-2x img-responsive" alt="Aliquam sit amet" src="//hstatic.net/768/1000048768/1/2015/11-4/p-12_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">Aliquam sit amet</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>23,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096173"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253866" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="egestas-lorem-commodo" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/amet-nunc-consequat" title="Curabitur iaculis">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-2_grande.png" alt="Curabitur iaculis">
                                           <span class="product-additional" data-idproduct="1001096176">
                                           <img class="replace-2x img-responsive" alt="Curabitur iaculis" src="//hstatic.net/768/1000048768/1/2015/11-4/p-1_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/amet-nunc-consequat" title="Curabitur iaculis">Curabitur iaculis</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096176"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253870" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="amet-nunc-consequat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/egestas-bibendum-duiat-lorem-commodo" title="Donec dictum arcu">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-4_grande.png" alt="Donec dictum arcu">
                                           <span class="product-additional" data-idproduct="1001096186">
                                           <img class="replace-2x img-responsive" alt="Donec dictum arcu" src="//hstatic.net/768/1000048768/1/2015/11-4/p-3_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/egestas-bibendum-duiat-lorem-commodo" title="Donec dictum arcu">Donec dictum arcu</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>3,902,800₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>9,800,050₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096186"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253881" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="egestas-bibendum-duiat-lorem-commodo" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-6_e454d27c-478e-4118-9a14-88305c6ca699_grande.png" alt="Etiam et eros">
                                           <span class="product-additional" data-idproduct="1001096174">
                                           <img class="replace-2x img-responsive" alt="Etiam et eros" src="//hstatic.net/768/1000048768/1/2015/11-4/p-10_15966939-ef9a-46b2-8ff2-7fcb1cbb01fe_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/consequat-sagittis-lacinia" title="Etiam et eros">Etiam et eros</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>19,999,999₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>20,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096174"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253868" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="consequat-sagittis-lacinia" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-4_166d4b7b-6b6a-47c4-8fcc-8277fc4d48d4_grande.png" alt="Fusce placerat">
                                           <span class="product-additional" data-idproduct="1001096167">
                                           <img class="replace-2x img-responsive" alt="Fusce placerat" src="//hstatic.net/768/1000048768/1/2015/11-4/p-3_82556950-75e0-4181-9a97-a3f7514b515d_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/malesuada-bibendum-duiat" title="Fusce placerat">Fusce placerat</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>5,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>5,400,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096167"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253860" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="malesuada-bibendum-duiat" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/gucci-women-handbag" title="Gucci Women">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-7_grande.png" alt="Gucci Women">
                                           <span class="product-additional" data-idproduct="1001096185">
                                           <img class="replace-2x img-responsive" alt="Gucci Women" src="//hstatic.net/768/1000048768/1/2015/11-4/p-13_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/gucci-women-handbag" title="Gucci Women">Gucci Women</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>6,300,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>8,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096185"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253879" />
                                                 <button class="button ajax_addtocart" type="submit" value="Submit">
                                                 <span>Mua Ngay</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="gucci-women-handbag" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/canon-eos-40d-10-1mp-slr-camera" title="Integer sit amet">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-10_grande.png" alt="Integer sit amet">
                                           <span class="product-additional" data-idproduct="1001096182">
                                           <img class="replace-2x img-responsive" alt="Integer sit amet" src="//hstatic.net/768/1000048768/1/2015/11-4/p-14_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/canon-eos-40d-10-1mp-slr-camera" title="Integer sit amet">Integer sit amet</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096182"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253877" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="canon-eos-40d-10-1mp-slr-camera" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="item">
                               <div class="product_block  ">
                                  <div class="product-container product-block">
                                     <div class="left-block">
                                        <div class="product-image-container image">
                                           <a class="product_img_link" href="/products/curabitur-porta-aliquetnter" title="Nulla et bibendum">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-7_ad81b7f3-c81d-4b15-8c6c-c85ef005e262_grande.png" alt="Nulla et bibendum">
                                           <span class="product-additional" data-idproduct="1001096165">
                                           <img class="replace-2x img-responsive" alt="Nulla et bibendum" src="//hstatic.net/768/1000048768/1/2015/11-4/p-11_689b3f75-8b17-4c13-968d-02d8a74fd14c_grande.png">
                                           </span>
                                           </a>
                                           <span class="sale-box">
                                           <span class="label-sale">SALE</span>
                                           </span>
                                        </div>
                                     </div>
                                     <div class="right-block">
                                        <h5 class="name">
                                           <a class="product-name" href="/products/curabitur-porta-aliquetnter" title="Nulla et bibendum">Nulla et bibendum</a>
                                        </h5>
                                        <p class="product-desc">Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which...</p>
                                        <div class="content_price">
                                           <span class="price product-price sale-price">
                                           <span class='money'>20,000,000₫</span>
                                           </span>
                                           <span class="old-price product-price"><span class='money'>21,231,212₫</span></span>
                                        </div>
                                        <div class="review">
                                           <span class="haravan-product-reviews-badge" data-id="1001096165"></span>
                                        </div>
                                        <div class="functional-buttons clearfix">
                                           <div class="cart">
                                              <form action="/cart/add" method="post" enctype="multipart/form-data" class="form-ajaxtocart">
                                                 <input type="hidden" name="id" value="1004253858" />
                                                 <button class="button ajax_addtocart disabled" type="submit" value="Submit" disabled>
                                                 <span>Hết Hàng</span>
                                                 </button>
                                              </form>
                                           </div>
                                           <a class="btn btn-outline-inverse btn-wishlist" href="/account/login" data-toggle="tooltip" data-original-title="Danh Sách Ưa Thích">
                                           <i class="fa fa-heart"></i>
                                           <span>Danh Sách Ưa Thích</span>
                                           </a>
                                           <a class="quick-view btn" href="#quick-view-product" data-handle="curabitur-porta-aliquetnter" title="Xem" data-toggle="tooltip" data-original-title="Xem">
                                           <i class="fa fa-arrows-alt"></i>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <script>
          $(document).ready(function() {

               $('#productTabs01 .owl-carousel').each(function(){
                               $(this).owlCarousel({
                               items : 5,
                               lazyLoad : true,
                               navigation : true,
                                       navigationText : ["‹", "›"],
                                       addClassActive: true,
                                       afterInit : SetOwlCarouselFirstLast,
                               afterAction : SetOwlCarouselFirstLast
                       });
                       });

               $("#productTabs01 .nav-tabs li", this).first().addClass("active");
               $("#productTabs01 .tab-content .tab-pane", this).first().addClass("active");
          });
       </script>
    </div>
 </div>

<!--end row 1-->
</div>
</div>
</div>
</div>
</section>
</main>
<!-- End Row 5 -->

@stop