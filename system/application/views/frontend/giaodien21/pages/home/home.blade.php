@extends('frontend.giaodien21.layouts.default')
@section('content')
<!-- Section 1 -->
<section id="content" class="clearfix index">
<h1 class="hidden">tp-media</h1>
<!--DONG O CUOI SECTION 6-->
<div class="section-1">
	<div class="container">
		<div class="row">
		<!-- Widget aaaaaaaaaaa -->
			{!!showWidget('widgetaaaaaaaaaaa')!!}
		<!-- End Widget aaaaaaaaaaa -->
				

			<div class="col-xs-12 col-sm-9">
				<div id="slider-themepro">
					<!-- masterslider -->
					<div class="master-slider ms-skin-default" id="masterslider">
						<!-- new slide -->
						<div class="ms-slide" data-delay="8">
							<!-- slide background -->
							<img src="//hstatic.net/741/1000089741/1000126629/blank.gif?v=1009" data-src="//hstatic.net/741/1000089741/1000126629/slideshow_1.jpg?v=1009" alt=""/>
							<!-- slide text layer -->
							<div class="ms-layer ms-bg hidden-sm hidden-xs"
								data-offset-x= "40"
								data-offset-y= "90"
								data-origin = "tl"
								data-effect="right(250)"
								data-duration="3500"
								data-delay="1300"
								data-ease="easeOutExpo"
								></div>
							<h2 class="ms-layer hidden-sm hidden-xs"
								data-type="text"
								data-offset-x= "70"
								data-offset-y= "120"
								data-origin = "tl"
								data-effect="right(250)"
								data-duration="3500"
								data-delay="600"
								data-ease="easeOutExpo"
								>Iphone 7</h2>
							<h4 class="ms-layer hidden-sm hidden-xs"
								data-offset-x= "70"
								data-offset-y= "185"
								data-origin = "tl"
								data-effect="left(short)"
								data-duration="3500"
								data-delay="1500"
								data-ease="easeOutExpo"
								>Tuyệt đỉnh công nghệ</h4>
							<div class="ms-layer button hidden-sm hidden-xs"
								data-offset-x= "70"
								data-offset-y= "245"
								data-origin = "tl"
								data-effect="rotateright(20,120,br)"
								data-duration="3500"
								data-delay="2100"
								data-ease="easeOutExpo"
								>
								<a class="btn-tp btn-white button-lg">Xem thêm</a>
							</div>
							<!-- linked slide -->
							<a href="">Xem thêm</a>
						</div>
						<!-- end of slide -->
						<!-- new slide -->
						<div class="ms-slide" data-delay="8">
							<!-- slide background -->
							<img src="//hstatic.net/741/1000089741/1000126629/blank.gif?v=1009" data-src="//hstatic.net/741/1000089741/1000126629/slideshow_2.jpg?v=1009" alt=""/>
							<!-- slide text layer -->
							<div class="ms-layer ms-bg hidden-sm hidden-xs"
								data-offset-x= "40"
								data-offset-y= "90"
								data-origin = "tl"
								data-effect="right(250)"
								data-duration="3500"
								data-delay="1300"
								data-ease="easeOutExpo"
								></div>
							<h2 class="ms-layer hidden-sm hidden-xs"
								data-type="text"
								data-offset-x= "70"
								data-offset-y= "120"
								data-origin = "tl"
								data-effect="right(250)"
								data-duration="3500"
								data-delay="600"
								data-ease="easeOutExpo"
								>Iphone 6S</h2>
							<h4 class="ms-layer hidden-sm hidden-xs"
								data-offset-x= "70"
								data-offset-y= "185"
								data-origin = "tl"
								data-effect="left(short)"
								data-duration="3500"
								data-delay="1500"
								data-ease="easeOutExpo"
								>Làm chủ công nghệ</h4>
							<div class="ms-layer button hidden-sm hidden-xs"
								data-offset-x= "70"
								data-offset-y= "245"
								data-origin = "tl"
								data-effect="rotateright(20,120,br)"
								data-duration="3500"
								data-delay="2100"
								data-ease="easeOutExpo"
								>
								<a class="btn-tp btn-white button-lg">Xem thêm</a>
							</div>
							<!-- linked slide -->
							<a href="">Xem thêm</a>
						</div>
						<!-- end of slide -->
					</div>
					<!-- end of masterslider -->
					<script>
						$(document).ready(function() {
						 var slider = new MasterSlider();
						 slider.setup('masterslider' , {
						         width:870,    
						         height:489,   
						         fullwidth:true,
						         view: "mask",
						         autoplay: false,
						          loop:true,
						          speed:18,
						          space:5,
						          mouse:false,
						          });
						 slider.control('arrows' ,{insertTo:'#masterslider'},{autohide:true});  
						 slider.control('bullets' , {autohide:false}); 
						});
					</script>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Section 1 -->

<!-- Section 2 -->
<div class="tp-img-banner container">
	<div class="row">
		<div class="col-sm-6">
			<div class="tp_banner  banner-center-center ">
				<div class="tp-banner-content">
					<a href="#" target="_self" title="">
						<div class="tp_banner_image">
							<img class="vinicia_banner_bg" src="//hstatic.net/741/1000089741/1000126629/image_banner_1.png?v=1009" alt="">
						</div>
						<div class="tp_banner_text">
							<div class="tp_banner_centering">
								<div class="tp_banner_centered">
									<h4>Công nghệ vượt trội</h4>
									<h6>Xu hướng tương lai</h6>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="tp_banner  banner-center-center ">
				<div class="tp-banner-content">
					<a href="#" target="_self" title="">
						<div class="tp_banner_image">
							<img class="vinicia_banner_bg" src="//hstatic.net/741/1000089741/1000126629/image_banner_2.png?v=1009" alt="">
						</div>
						<div class="tp_banner_text">
							<div class="tp_banner_centering">
								<div class="tp_banner_centered">
									<h4>Bảo hành toàn quốc</h4>
									<h6>Đổi mới 15 ngày </h6>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Section 2 -->

<!-- Section 3 -->
<div class="container" id="columns">
	<div class="row">
		<div id="product-tab">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="listing-tabs-product" id="our-menu">
					<div class="content-product-list">
						<div id="product-tab" class="block_main product_tabs_slider">
							<div class="ltabs-tabs-container block_content">
								<div class="ltabs-tabs-wrap">
									<!--Begin Tabs-->
									<ul class="tabs ltabs-tabs nav-tabs">
										<!--Tabs 1-->
										<li class="ltabs-tab active" rel="tab_collection_1">
											<a class="ltabs-tab-label">
											Sản phẩm mới
											</a>
										</li>
										<!--Tabs 2-->
										<li class="ltabs-tab" rel="tab_collection_2">
											<a class="ltabs-tab-label">
											Sản phẩm nổi bật
											</a>
										</li>
										<!--Tabs 3-->
										<li class="ltabs-tab" rel="tab_collection_3">
											<a class="ltabs-tab-label">
											Sản phẩm khuyến mại
											</a>
										</li>
										<!--Tabs 4-->
										<li class="ltabs-tab" rel="tab_collection_4">
											<a class="ltabs-tab-label">
											Tất cả sản phẩm
											</a>
										</li>
									</ul>
									<div class="carousel-product-tab ">
										<div class="navi navi_collection_1 tab_collection_1 carousel-control-direction">
											<a class="prevtab carousel-control_left"><i class='fa fa-angle-left'></i></a>
											<a class="nexttab carousel-control_right"><i class='fa fa-angle-right'></i></a>
										</div>
										<div class="navi navi_collection_2 tab_collection_2 carousel-control-direction">
											<a class="prevtab carousel-control_left"><i class='fa fa-angle-left'></i></a>
											<a class="nexttab carousel-control_right"><i class='fa fa-angle-right'></i></a>
										</div>
										<div class="navi navi_collection_3 tab_collection_3 carousel-control-direction">
											<a class="prevtab carousel-control_left"><i class='fa fa-angle-left'></i></a>
											<a class="nexttab carousel-control_right"><i class='fa fa-angle-right'></i></a>
										</div>
										<div class="navi navi_collection_4 tab_collection_4 carousel-control-direction">
											<a class="prevtab carousel-control_left"><i class='fa fa-angle-left'></i></a>
											<a class="nexttab carousel-control_right"><i class='fa fa-angle-right'></i></a>
										</div>
									</div>
									<!--End Tabs-->
								</div>
								<div class="tab_container ltabs-items-container show-slider">
									<!-- Tabs 1 -->
									<!-- Widget bbbbbbbbbbb -->
										{!!showWidget('widgetbbbbbbbbbbb')!!}
									<!-- End Widget bbbbbbbbbbb -->
									<div class="ltabs-items tab_content product-list" id="tab_collection_1">
										<div class="ltabs-items-inner grid" id="tab_collection_1_in">
											<div class="item">
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/18_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/17_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony">Loa bluetooth Sony</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 2,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/loa-bluetooth-sony" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011368" href="http://google.com">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/8_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/7_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 30,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/may-anh-canon-eos-m3" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011335" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-canon-eos-m3" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/4_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/3_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 15,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Hãng sản xuất: Nikon Inc- Gói sản phẩm: Single Lens Kit- Độ lớn màn hình LCD(inch): 3.0 inch- Loại máy ảnh (Body type): DSLR- Kích thước cảm biến (Sensor...
																		<a class="learn-more-collection" href="/products/may-anh-nikon-dslr-d3300" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011326" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-nikon-dslr-d3300" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/2_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/1_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 5,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Trọng lượng nhẹ nhất thế giới*1- Chụp ảnh chân dung dễ dàng-màn hình lật 180° và chế độ hiệu ứng làm đẹp da Soft Skin- Bộ cảm biến 20.1MP...
																		<a class="learn-more-collection" href="/products/may-anh-sony" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011237" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-sony" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
											</div>
											<div class="item">
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/6_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/5_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 12,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Cảm biến: 20,1 MP, dùng chip xử lý BIONZ- Ống kính: Carl Zeiss® Vario-Tessar®- Zoom quang: 8x- Zoom kỹ thuật số: 32x- Chống rung quang học- Nhận diện gương...
																		<a class="learn-more-collection" href="/products/may-anh-sony-dsc-w830b" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011333" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/14_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/13_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 5,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/tai-nghe-beat-pink" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011365" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-pink" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/12_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/11_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 7,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/tai-nghe-beat-studio-2016" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011364" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-studio-2016" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
											</div>
										</div>
									</div>

									<script>
										jQuery(document).ready(function($){
										var posTabProduct = $("#tab_collection_1_in");
										posTabProduct.owlCarousel({
										singleItem : true,
										autoPlay :  false,
										stopOnHover: false,
										addClassActive: true,
										
										});
										$(".navi_collection_1 .nexttab").click(function(){
										posTabProduct.trigger('owl.next');})
										$(".navi_collection_1 .prevtab").click(function(){
										posTabProduct.trigger('owl.prev');})
										});
									</script>
									<!-- End Tabs 1 -->
									<!-- Widget ccccccccccc -->
										{!!showWidget('widgetccccccccccc')!!}
									<!-- End Widget ccccccccccc -->
									<!-- Tabs 2 -->
									<div class="ltabs-items tab_content product-list" id="tab_collection_2">
										<div class="ltabs-items-inner grid" id="tab_collection_2_in">
											<div class="item">
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/chuot-logitech-pro" title="Chuột Logitech Pro" class="image-resize product_image">
															<span class="hover-image">
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/custom_format_g402_front_large_7434214f-9952-4d6f-be42-c7ea9eab88f3_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/chuot-logitech-pro" title="Chuột Logitech Pro">Chuột Logitech Pro</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 2,900,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		Lỏem
																		<a class="learn-more-collection" href="/products/chuot-logitech-pro" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 1">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007009479" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/dong-ho-i-watch" title="Đồng hồ  I-watch" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/16_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/15_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/dong-ho-i-watch" title="Đồng hồ  I-watch">Đồng hồ  I-watch</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 12,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/dong-ho-i-watch" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011367" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/dong-ho-i-watch" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/18_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/17_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony">Loa bluetooth Sony</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 2,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/loa-bluetooth-sony" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011368" href="http://google.com.vn">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/loa-bluetooth-sony" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/8_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/7_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 30,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/may-anh-canon-eos-m3" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011335" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-canon-eos-m3" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
											</div>
											<div class="item">
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/4_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/3_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 15,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Hãng sản xuất: Nikon Inc- Gói sản phẩm: Single Lens Kit- Độ lớn màn hình LCD(inch): 3.0 inch- Loại máy ảnh (Body type): DSLR- Kích thước cảm biến (Sensor...
																		<a class="learn-more-collection" href="/products/may-anh-nikon-dslr-d3300" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011326" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-nikon-dslr-d3300" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/2_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/1_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 5,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Trọng lượng nhẹ nhất thế giới*1- Chụp ảnh chân dung dễ dàng-màn hình lật 180° và chế độ hiệu ứng làm đẹp da Soft Skin- Bộ cảm biến 20.1MP...
																		<a class="learn-more-collection" href="/products/may-anh-sony" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011237" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-sony" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/6_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/5_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 12,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Cảm biến: 20,1 MP, dùng chip xử lý BIONZ- Ống kính: Carl Zeiss® Vario-Tessar®- Zoom quang: 8x- Zoom kỹ thuật số: 32x- Chống rung quang học- Nhận diện gương...
																		<a class="learn-more-collection" href="/products/may-anh-sony-dsc-w830b" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011333" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-sony-dsc-w830b" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/14_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/13_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 5,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/tai-nghe-beat-pink" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011365" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-pink" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
											</div>
											<div class="item">
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/12_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/11_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 7,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/tai-nghe-beat-studio-2016" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011364" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-studio-2016" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
											</div>
										</div>
									</div>
									<script>
										jQuery(document).ready(function($){
										     var posTabProduct = $("#tab_collection_2_in");
										     posTabProduct.owlCarousel({
										             singleItem : true,
										             autoPlay :  false,
										             stopOnHover: false,
										             addClassActive: true,
										     });
										     $(".navi_collection_2 .nexttab").click(function(){
										             posTabProduct.trigger('owl.next');})
										     $(".navi_collection_2 .prevtab").click(function(){
										             posTabProduct.trigger('owl.prev');})
										});
									</script>
									<!-- End Tabs 2 -->
									<!-- Tabs 3 -->
									<!-- Widget ddddddddddd -->
										{!!showWidget('widgetddddddddddd')!!}
									<!-- End Widget ddddddddddd -->
									<div class="ltabs-items tab_content product-list" id="tab_collection_3">
										<div class="ltabs-items-inner grid" id="tab_collection_3_in">
											<div class="item">
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/8_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/7_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 30,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/may-anh-canon-eos-m3" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011335" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/4_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/3_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 15,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Hãng sản xuất: Nikon Inc- Gói sản phẩm: Single Lens Kit- Độ lớn màn hình LCD(inch): 3.0 inch- Loại máy ảnh (Body type): DSLR- Kích thước cảm biến (Sensor...
																		<a class="learn-more-collection" href="/products/may-anh-nikon-dslr-d3300" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011326" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-nikon-dslr-d3300" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/2_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/1_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 5,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Trọng lượng nhẹ nhất thế giới*1- Chụp ảnh chân dung dễ dàng-màn hình lật 180° và chế độ hiệu ứng làm đẹp da Soft Skin- Bộ cảm biến 20.1MP...
																		<a class="learn-more-collection" href="/products/may-anh-sony" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011237" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-sony" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/6_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/5_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 12,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Cảm biến: 20,1 MP, dùng chip xử lý BIONZ- Ống kính: Carl Zeiss® Vario-Tessar®- Zoom quang: 8x- Zoom kỹ thuật số: 32x- Chống rung quang học- Nhận diện gương...
																		<a class="learn-more-collection" href="/products/may-anh-sony-dsc-w830b" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011333" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-sony-dsc-w830b" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
											</div>
											<div class="item">
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/14_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/13_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 5,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/tai-nghe-beat-pink" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011365" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-pink" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/12_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/11_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 7,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/tai-nghe-beat-studio-2016" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011364" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-studio-2016" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
											</div>
										</div>
									</div>

									<script>
										jQuery(document).ready(function($){
										     var posTabProduct = $("#tab_collection_3_in");
										     posTabProduct.owlCarousel({
										             singleItem : true,
										             autoPlay :  false,
										             stopOnHover: false,
										             addClassActive: true,
										     });
										     $(".navi_collection_3 .nexttab").click(function(){
										             posTabProduct.trigger('owl.next');})
										     $(".navi_collection_3 .prevtab").click(function(){
										             posTabProduct.trigger('owl.prev');})
										});
									</script>
									<!-- End Tabs 3 -->
									<!-- Tabs 4 -->
									<!-- Widget eeeeeeeeeee -->
										{!!showWidget('widgeteeeeeeeeeee')!!}
									<!-- End Widget eeeeeeeeeee -->
									<div class="ltabs-items tab_content product-list" id="tab_collection_4">
										<div class="ltabs-items-inner grid" id="tab_collection_4_in">
											<div class="item">
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/18_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/17_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony">Loa bluetooth Sony</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 2,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/loa-bluetooth-sony" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011368" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/8_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/7_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 30,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/may-anh-canon-eos-m3" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011335" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-canon-eos-m3" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/4_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/3_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 15,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Hãng sản xuất: Nikon Inc- Gói sản phẩm: Single Lens Kit- Độ lớn màn hình LCD(inch): 3.0 inch- Loại máy ảnh (Body type): DSLR- Kích thước cảm biến (Sensor...
																		<a class="learn-more-collection" href="/products/may-anh-nikon-dslr-d3300" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011326" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-nikon-dslr-d3300" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/2_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/1_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 5,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Trọng lượng nhẹ nhất thế giới*1- Chụp ảnh chân dung dễ dàng-màn hình lật 180° và chế độ hiệu ứng làm đẹp da Soft Skin- Bộ cảm biến 20.1MP...
																		<a class="learn-more-collection" href="/products/may-anh-sony" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011237" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-sony" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
											</div>
											<div class="item">
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/6_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/5_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 12,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		- Cảm biến: 20,1 MP, dùng chip xử lý BIONZ- Ống kính: Carl Zeiss® Vario-Tessar®- Zoom quang: 8x- Zoom kỹ thuật số: 32x- Chống rung quang học- Nhận diện gương...
																		<a class="learn-more-collection" href="/products/may-anh-sony-dsc-w830b" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011333" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/may-anh-sony-dsc-w830b" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/14_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/13_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 5,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/tai-nghe-beat-pink" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011365" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-pink" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
													<div class="product-container">
														<div class="left-block"> 
															<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="image-resize product_image">
															<span class="hover-image">
															<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/12_large.png" alt=""  />
															</span>
															<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/11_large.png" alt="" />
															</a>
														</div>
														<div class="right-block">
															<div class="box-contents">
																<h5 class="product-name">
																	<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
																</h5>
																<div class="product-price">
																	<span class="price"> 7,000,000₫ </span>
																</div>
																<div class="product-desc">
																	<p>
																		-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
																		<a class="learn-more-collection" href="/products/tai-nghe-beat-studio-2016" itemprop="url">Xem chi tiết</a>
																	</p>
																</div>
															</div>
															<div class="box-button">
																<div class="box-addtocart 2">
																	<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011364" href="javascript:void(0);">										
																	<span class="wrap_text">Giỏ hàng</span>	
																	<i class="fa fa-shopping-cart"></i>				
																	</a>
																</div>
																<div class="box-quickview">
																	<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-studio-2016" href="javascript:void(0);" rel="">
																	<span class="wrap_text">Xem nhanh</span>						
																	<i class="fa fa-eye"></i>
																	</a>	
																</div>
															</div>
														</div>
													</div>
												</li>
											</div>
										</div>
									</div>
									<script>
										jQuery(document).ready(function($){
										     var posTabProduct = $("#tab_collection_4_in");
										     posTabProduct.owlCarousel({
										             singleItem : true,
										             autoPlay :  false,
										             stopOnHover: false,
										             addClassActive: true,
										     });
										     $(".navi_collection_4 .nexttab").click(function(){
										             posTabProduct.trigger('owl.next');})
										     $(".navi_collection_4 .prevtab").click(function(){
										             posTabProduct.trigger('owl.prev');})
										});
									</script>
									<!-- End Tabs 4 -->
								</div>
							</div>
						</div>
						<script type="text/javascript">
							jQuery(document).ready(function($){
							$(".product_tabs_slider .tab_content").hide();
							$(".product_tabs_slider .navi").hide();
							$(".product_tabs_slider .tab_content:first").show(); 
							$(".product_tabs_slider .navi:first").show(); 
							$(".product_tabs_slider ul.tabs li").click(function() {
							$(".product_tabs_slider ul.tabs li").removeClass("active");
							$(this).addClass("active");
							$(".product_tabs_slider .tab_content").hide();
							$(".product_tabs_slider .navi").hide();
							var activeTab = $(this).attr("rel"); 
							$(".product_tabs_slider #"+activeTab).fadeIn(); 
							$(".product_tabs_slider ."+activeTab).fadeIn(); 
							});
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Section 3 -->

<!-- Section 4 -->
<div class="product_block">
	<!-- Tabs 1 -->
	<!-- Widget fffffffffff -->
		{!!showWidget('widgetfffffffffff')!!}
	<!-- End Widget fffffffffff -->
	<div class="container" id="tp_product_block">
		<div class="row">
			<div class="main_block">
				<div class="col-xs-12">
					<h2 class="title_block">Sản phẩm khuyến mại</h2>
				</div>
				<div class="block_content col-md-8">
					<div class="carousel-product-tab ">
						<div class="navi product_block_collection tab_collection_1 carousel-control-direction">
							<a class="prevtab carousel-control_left"><i class='fa fa-angle-left'></i></a>
							<a class="nexttab carousel-control_right"><i class='fa fa-angle-right'></i></a>
						</div>
					</div>
					<div class="ltabs-items tab_content product-list" id="product_block_collection">
						<div class="ltabs-items-inner grid" id="product_block_collection_in">
							<div class="item">
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/8_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/7_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
												</h5>
												<div class="product-price">
													<span class="price"> 30,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
														<a class="learn-more-collection" href="/products/may-anh-canon-eos-m3" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011335" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/may-anh-canon-eos-m3" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/4_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/3_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
												</h5>
												<div class="product-price">
													<span class="price"> 15,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														- Hãng sản xuất: Nikon Inc- Gói sản phẩm: Single Lens Kit- Độ lớn màn hình LCD(inch): 3.0 inch- Loại máy ảnh (Body type): DSLR- Kích thước cảm biến (Sensor...
														<a class="learn-more-collection" href="/products/may-anh-nikon-dslr-d3300" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011326" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/may-anh-nikon-dslr-d3300" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/2_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/1_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
												</h5>
												<div class="product-price">
													<span class="price"> 5,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														- Trọng lượng nhẹ nhất thế giới*1- Chụp ảnh chân dung dễ dàng-màn hình lật 180° và chế độ hiệu ứng làm đẹp da Soft Skin- Bộ cảm biến 20.1MP...
														<a class="learn-more-collection" href="/products/may-anh-sony" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011237" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/may-anh-sony" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/6_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/5_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
												</h5>
												<div class="product-price">
													<span class="price"> 12,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														- Cảm biến: 20,1 MP, dùng chip xử lý BIONZ- Ống kính: Carl Zeiss® Vario-Tessar®- Zoom quang: 8x- Zoom kỹ thuật số: 32x- Chống rung quang học- Nhận diện gương...
														<a class="learn-more-collection" href="/products/may-anh-sony-dsc-w830b" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011333" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/may-anh-sony-dsc-w830b" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/14_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/13_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
												</h5>
												<div class="product-price">
													<span class="price"> 5,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
														<a class="learn-more-collection" href="/products/tai-nghe-beat-pink" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011365" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-pink" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/12_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/11_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
												</h5>
												<div class="product-price">
													<span class="price"> 7,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
														<a class="learn-more-collection" href="/products/tai-nghe-beat-studio-2016" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011364" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-studio-2016" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
							</div>
							<div class="item">
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/8_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/7_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
												</h5>
												<div class="product-price">
													<span class="price"> 30,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
														<a class="learn-more-collection" href="/products/may-anh-canon-eos-m3" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011335" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/may-anh-canon-eos-m3" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/4_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/3_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
												</h5>
												<div class="product-price">
													<span class="price"> 15,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														- Hãng sản xuất: Nikon Inc- Gói sản phẩm: Single Lens Kit- Độ lớn màn hình LCD(inch): 3.0 inch- Loại máy ảnh (Body type): DSLR- Kích thước cảm biến (Sensor...
														<a class="learn-more-collection" href="/products/may-anh-nikon-dslr-d3300" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011326" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/may-anh-nikon-dslr-d3300" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/2_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/1_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
												</h5>
												<div class="product-price">
													<span class="price"> 5,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														- Trọng lượng nhẹ nhất thế giới*1- Chụp ảnh chân dung dễ dàng-màn hình lật 180° và chế độ hiệu ứng làm đẹp da Soft Skin- Bộ cảm biến 20.1MP...
														<a class="learn-more-collection" href="/products/may-anh-sony" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011237" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/may-anh-sony" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/6_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/5_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
												</h5>
												<div class="product-price">
													<span class="price"> 12,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														- Cảm biến: 20,1 MP, dùng chip xử lý BIONZ- Ống kính: Carl Zeiss® Vario-Tessar®- Zoom quang: 8x- Zoom kỹ thuật số: 32x- Chống rung quang học- Nhận diện gương...
														<a class="learn-more-collection" href="/products/may-anh-sony-dsc-w830b" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011333" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/may-anh-sony-dsc-w830b" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/14_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/13_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
												</h5>
												<div class="product-price">
													<span class="price"> 5,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
														<a class="learn-more-collection" href="/products/tai-nghe-beat-pink" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011365" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-pink" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-4 ">
									<div class="product-container">
										<div class="left-block"> 
											<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="image-resize product_image">
											<span class="hover-image">
											<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/12_large.png" alt=""  />
											</span>
											<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/11_large.png" alt="" />
											</a>
										</div>
										<div class="right-block">
											<div class="box-contents">
												<h5 class="product-name">
													<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
												</h5>
												<div class="product-price">
													<span class="price"> 7,000,000₫ </span>
												</div>
												<div class="product-desc">
													<p>
														-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
														<a class="learn-more-collection" href="/products/tai-nghe-beat-studio-2016" itemprop="url">Xem chi tiết</a>
													</p>
												</div>
											</div>
											<div class="box-button">
												<div class="box-addtocart 2">
													<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011364" href="javascript:void(0);">										
													<span class="wrap_text">Giỏ hàng</span>	
													<i class="fa fa-shopping-cart"></i>				
													</a>
												</div>
												<div class="box-quickview">
													<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-studio-2016" href="javascript:void(0);" rel="">
													<span class="wrap_text">Xem nhanh</span>						
													<i class="fa fa-eye"></i>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</li>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tp_banner_discount">
						<div class="tp_banner_discount_content image-item">
							<a href="#" target="_self" title="">
								<div class="tp_banner_image">
									<img class="banner_bg" src="//hstatic.net/741/1000089741/1000126629/discount_image.jpg?v=1009" alt="">
								</div>
							</a>
						</div>
						<div class="tp_banner_discount_content_2 image-item hidden-xs">
							<a href="#" target="_self" title="">
								<div class="tp_banner_image_2">
									<img class="banner_bg" src="//hstatic.net/741/1000089741/1000126629/discount_image_2.jpg?v=1009" alt="">
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		jQuery(document).ready(function($){
		     var posTabProduct = $("#product_block_collection_in");
		     posTabProduct.owlCarousel({
		             singleItem : true,
		             autoPlay :  false,
		             stopOnHover: false,
		             addClassActive: true,
		
		     });
		     $(".product_block_collection .nexttab").click(function(){
		             posTabProduct.trigger('owl.next');})
		     $(".product_block_collection .prevtab").click(function(){
		             posTabProduct.trigger('owl.prev');})
		});
	</script>
	<!-- End Tabs 1 -->
</div>
<!-- End Section 4 -->

<!-- Section 5 -->
<div class="product_trending">
	<!-- Widget ggggggggggg -->
		{!!showWidget('widgetggggggggggg')!!}
	<!-- End Widget ggggggggggg -->
	<div class="container" id="tp_product_trending">
		<div class="main_block row">
			<div class="block_content col-md-12 ">
				<div class="carousel-product-tab ">
					<div class="navi product_block_trending_collection tab_collection_1 carousel-control-direction">
						<a class="prevtab carousel-control_left"><i class='fa fa-angle-left'></i></a>
						<a class="nexttab carousel-control_right"><i class='fa fa-angle-right'></i></a>
					</div>
				</div>
				<h2 class='title_block'>Sản phẩm khuyên dùng</h2>
				<div class="ltabs-items tab_content product-list" id="product_trending_collection">
					<div class="ltabs-items-inner grid" id="product_block_trending_collection_in">
						<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-12 ">
							<div class="product-container">
								<div class="left-block"> 
									<a href="/products/chuot-logitech-pro" title="Chuột Logitech Pro" class="image-resize product_image">
									<span class="hover-image">
									</span>
									<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/custom_format_g402_front_large_7434214f-9952-4d6f-be42-c7ea9eab88f3_large.png" alt="" />
									</a>
								</div>
								<div class="right-block">
									<div class="box-contents">
										<h5 class="product-name">
											<a href="/products/chuot-logitech-pro" title="Chuột Logitech Pro">Chuột Logitech Pro</a>
										</h5>
										<div class="product-price">
											<span class="price"> 2,900,000₫ </span>
										</div>
										<div class="product-desc">
											<p>
												Lỏem
												<a class="learn-more-collection" href="/products/chuot-logitech-pro" itemprop="url">Xem chi tiết</a>
											</p>
										</div>
									</div>
									<div class="box-button">
										<div class="box-addtocart 1">
											<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007009479" href="javascript:void(0);">										
											<span class="wrap_text">Giỏ hàng</span>	
											<i class="fa fa-shopping-cart"></i>				
											</a>
										</div>
										<div class="box-quickview">
											<a class="quick-view btn-tp" data-handle="/products/chuot-logitech-pro" href="javascript:void(0);" rel="">
											<span class="wrap_text">Xem nhanh</span>						
											<i class="fa fa-eye"></i>
											</a>	
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-12 ">
							<div class="product-container">
								<div class="left-block"> 
									<a href="/products/dong-ho-i-watch" title="Đồng hồ  I-watch" class="image-resize product_image">
									<span class="hover-image">
									<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/16_large.png" alt=""  />
									</span>
									<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/15_large.png" alt="" />
									</a>
								</div>
								<div class="right-block">
									<div class="box-contents">
										<h5 class="product-name">
											<a href="/products/dong-ho-i-watch" title="Đồng hồ  I-watch">Đồng hồ  I-watch</a>
										</h5>
										<div class="product-price">
											<span class="price"> 12,000,000₫ </span>
										</div>
										<div class="product-desc">
											<p>
												-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
												<a class="learn-more-collection" href="/products/dong-ho-i-watch" itemprop="url">Xem chi tiết</a>
											</p>
										</div>
									</div>
									<div class="box-button">
										<div class="box-addtocart 2">
											<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011367" href="javascript:void(0);">										
											<span class="wrap_text">Giỏ hàng</span>	
											<i class="fa fa-shopping-cart"></i>				
											</a>
										</div>
										<div class="box-quickview">
											<a class="quick-view btn-tp" data-handle="/products/dong-ho-i-watch" href="javascript:void(0);" rel="">
											<span class="wrap_text">Xem nhanh</span>						
											<i class="fa fa-eye"></i>
											</a>	
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-12 ">
							<div class="product-container">
								<div class="left-block"> 
									<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony" class="image-resize product_image">
									<span class="hover-image">
									<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/18_large.png" alt=""  />
									</span>
									<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/17_large.png" alt="" />
									</a>
								</div>
								<div class="right-block">
									<div class="box-contents">
										<h5 class="product-name">
											<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony">Loa bluetooth Sony</a>
										</h5>
										<div class="product-price">
											<span class="price"> 2,000,000₫ </span>
										</div>
										<div class="product-desc">
											<p>
												-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
												<a class="learn-more-collection" href="/products/loa-bluetooth-sony" itemprop="url">Xem chi tiết</a>
											</p>
										</div>
									</div>
									<div class="box-button">
										<div class="box-addtocart 2">
											<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011368" href="javascript:void(0);">										
											<span class="wrap_text">Giỏ hàng</span>	
											<i class="fa fa-shopping-cart"></i>				
											</a>
										</div>
										<div class="box-quickview">
											<a class="quick-view btn-tp" data-handle="/products/loa-bluetooth-sony" href="javascript:void(0);" rel="">
											<span class="wrap_text">Xem nhanh</span>						
											<i class="fa fa-eye"></i>
											</a>	
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-12 ">
							<div class="product-container">
								<div class="left-block"> 
									<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="image-resize product_image">
									<span class="hover-image">
									<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/8_large.png" alt=""  />
									</span>
									<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/7_large.png" alt="" />
									</a>
								</div>
								<div class="right-block">
									<div class="box-contents">
										<h5 class="product-name">
											<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
										</h5>
										<div class="product-price">
											<span class="price"> 30,000,000₫ </span>
										</div>
										<div class="product-desc">
											<p>
												-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
												<a class="learn-more-collection" href="/products/may-anh-canon-eos-m3" itemprop="url">Xem chi tiết</a>
											</p>
										</div>
									</div>
									<div class="box-button">
										<div class="box-addtocart 2">
											<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011335" href="javascript:void(0);">										
											<span class="wrap_text">Giỏ hàng</span>	
											<i class="fa fa-shopping-cart"></i>				
											</a>
										</div>
										<div class="box-quickview">
											<a class="quick-view btn-tp" data-handle="/products/may-anh-canon-eos-m3" href="javascript:void(0);" rel="">
											<span class="wrap_text">Xem nhanh</span>						
											<i class="fa fa-eye"></i>
											</a>	
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-12 ">
							<div class="product-container">
								<div class="left-block"> 
									<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="image-resize product_image">
									<span class="hover-image">
									<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/4_large.png" alt=""  />
									</span>
									<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/3_large.png" alt="" />
									</a>
								</div>
								<div class="right-block">
									<div class="box-contents">
										<h5 class="product-name">
											<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
										</h5>
										<div class="product-price">
											<span class="price"> 15,000,000₫ </span>
										</div>
										<div class="product-desc">
											<p>
												- Hãng sản xuất: Nikon Inc- Gói sản phẩm: Single Lens Kit- Độ lớn màn hình LCD(inch): 3.0 inch- Loại máy ảnh (Body type): DSLR- Kích thước cảm biến (Sensor...
												<a class="learn-more-collection" href="/products/may-anh-nikon-dslr-d3300" itemprop="url">Xem chi tiết</a>
											</p>
										</div>
									</div>
									<div class="box-button">
										<div class="box-addtocart 2">
											<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011326" href="javascript:void(0);">										
											<span class="wrap_text">Giỏ hàng</span>	
											<i class="fa fa-shopping-cart"></i>				
											</a>
										</div>
										<div class="box-quickview">
											<a class="quick-view btn-tp" data-handle="/products/may-anh-nikon-dslr-d3300" href="javascript:void(0);" rel="">
											<span class="wrap_text">Xem nhanh</span>						
											<i class="fa fa-eye"></i>
											</a>	
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-12 ">
							<div class="product-container">
								<div class="left-block"> 
									<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="image-resize product_image">
									<span class="hover-image">
									<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/2_large.png" alt=""  />
									</span>
									<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/1_large.png" alt="" />
									</a>
								</div>
								<div class="right-block">
									<div class="box-contents">
										<h5 class="product-name">
											<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
										</h5>
										<div class="product-price">
											<span class="price"> 5,000,000₫ </span>
										</div>
										<div class="product-desc">
											<p>
												- Trọng lượng nhẹ nhất thế giới*1- Chụp ảnh chân dung dễ dàng-màn hình lật 180° và chế độ hiệu ứng làm đẹp da Soft Skin- Bộ cảm biến 20.1MP...
												<a class="learn-more-collection" href="/products/may-anh-sony" itemprop="url">Xem chi tiết</a>
											</p>
										</div>
									</div>
									<div class="box-button">
										<div class="box-addtocart 2">
											<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011237" href="javascript:void(0);">										
											<span class="wrap_text">Giỏ hàng</span>	
											<i class="fa fa-shopping-cart"></i>				
											</a>
										</div>
										<div class="box-quickview">
											<a class="quick-view btn-tp" data-handle="/products/may-anh-sony" href="javascript:void(0);" rel="">
											<span class="wrap_text">Xem nhanh</span>						
											<i class="fa fa-eye"></i>
											</a>	
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-12 ">
							<div class="product-container">
								<div class="left-block"> 
									<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="image-resize product_image">
									<span class="hover-image">
									<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/6_large.png" alt=""  />
									</span>
									<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/5_large.png" alt="" />
									</a>
								</div>
								<div class="right-block">
									<div class="box-contents">
										<h5 class="product-name">
											<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
										</h5>
										<div class="product-price">
											<span class="price"> 12,000,000₫ </span>
										</div>
										<div class="product-desc">
											<p>
												- Cảm biến: 20,1 MP, dùng chip xử lý BIONZ- Ống kính: Carl Zeiss® Vario-Tessar®- Zoom quang: 8x- Zoom kỹ thuật số: 32x- Chống rung quang học- Nhận diện gương...
												<a class="learn-more-collection" href="/products/may-anh-sony-dsc-w830b" itemprop="url">Xem chi tiết</a>
											</p>
										</div>
									</div>
									<div class="box-button">
										<div class="box-addtocart 2">
											<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011333" href="javascript:void(0);">										
											<span class="wrap_text">Giỏ hàng</span>	
											<i class="fa fa-shopping-cart"></i>				
											</a>
										</div>
										<div class="box-quickview">
											<a class="quick-view btn-tp" data-handle="/products/may-anh-sony-dsc-w830b" href="javascript:void(0);" rel="">
											<span class="wrap_text">Xem nhanh</span>						
											<i class="fa fa-eye"></i>
											</a>	
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-12 ">
							<div class="product-container">
								<div class="left-block"> 
									<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="image-resize product_image">
									<span class="hover-image">
									<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/14_large.png" alt=""  />
									</span>
									<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/13_large.png" alt="" />
									</a>
								</div>
								<div class="right-block">
									<div class="box-contents">
										<h5 class="product-name">
											<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
										</h5>
										<div class="product-price">
											<span class="price"> 5,000,000₫ </span>
										</div>
										<div class="product-desc">
											<p>
												-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
												<a class="learn-more-collection" href="/products/tai-nghe-beat-pink" itemprop="url">Xem chi tiết</a>
											</p>
										</div>
									</div>
									<div class="box-button">
										<div class="box-addtocart 2">
											<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011365" href="javascript:void(0);">										
											<span class="wrap_text">Giỏ hàng</span>	
											<i class="fa fa-shopping-cart"></i>				
											</a>
										</div>
										<div class="box-quickview">
											<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-pink" href="javascript:void(0);" rel="">
											<span class="wrap_text">Xem nhanh</span>						
											<i class="fa fa-eye"></i>
											</a>	
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="product-resize ajax_block_product col-xs-12 col-sm-6 col-md-12 ">
							<div class="product-container">
								<div class="left-block"> 
									<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="image-resize product_image">
									<span class="hover-image">
									<img class="replace-2x img-responsive" src="//hstatic.net/741/1000089741/1/2016/5-26/12_large.png" alt=""  />
									</span>
									<img class="replace-2x" src="//hstatic.net/741/1000089741/1/2016/5-26/11_large.png" alt="" />
									</a>
								</div>
								<div class="right-block">
									<div class="box-contents">
										<h5 class="product-name">
											<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
										</h5>
										<div class="product-price">
											<span class="price"> 7,000,000₫ </span>
										</div>
										<div class="product-desc">
											<p>
												-&nbsp;&nbsp; &nbsp;Cảm biến CMOS 24.2 megapixel-&nbsp;&nbsp; &nbsp;Chip xử lý ảnh DIGIC6-&nbsp;&nbsp; &nbsp;Hệ thống lấy nét lai Hybrid CMOS AF 49 điểm-&nbsp;&nbsp; &nbsp;Hệ thống đo sáng 384 vùng-&nbsp;&nbsp; &nbsp;ISO100-12800-&nbsp;&nbsp; &nbsp;Tốc độ...
												<a class="learn-more-collection" href="/products/tai-nghe-beat-studio-2016" itemprop="url">Xem chi tiết</a>
											</p>
										</div>
									</div>
									<div class="box-button">
										<div class="box-addtocart 2">
											<a class="button hidde-ajax_add_to_cart btn-tp ajax_add_to_cart ajax_add_to_cart_button add_cart " data-variant="1007011364" href="javascript:void(0);">										
											<span class="wrap_text">Giỏ hàng</span>	
											<i class="fa fa-shopping-cart"></i>				
											</a>
										</div>
										<div class="box-quickview">
											<a class="quick-view btn-tp" data-handle="/products/tai-nghe-beat-studio-2016" href="javascript:void(0);" rel="">
											<span class="wrap_text">Xem nhanh</span>						
											<i class="fa fa-eye"></i>
											</a>	
										</div>
									</div>
								</div>
							</div>
						</li>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		jQuery(document).ready(function($){
		     var posTabProduct = $("#product_block_trending_collection_in");
		     posTabProduct.owlCarousel({
		             items : 6,
		             autoPlay :  false,
		             stopOnHover: false,
		             addClassActive: true,
		
		     });
		     $(".product_block_trending_collection .nexttab").click(function(){
		             posTabProduct.trigger('owl.next');})
		     $(".product_block_trending_collection .prevtab").click(function(){
		             posTabProduct.trigger('owl.prev');})
		});
	</script>
</div>
<!-- End Section 5 -->

<!-- Section 7 -->
<div class="tp-brand">
	<div class="container">
		<div class="row">
			<div id="tp-brand" class='tp-carousel main_block'>
				<div class="block_content carousel">
					<div class="carousel-control-direction">
						<a class="carousel-control_left"><i class='fa fa-angle-left'></i></a>
						<a class="carousel-control_right"><i class='fa fa-angle-right'></i></a>
					</div>
					<div class="ourbrands">
						<li >
							<a href="#">
							<img src="//hstatic.net/741/1000089741/1000126629/img_our_1.png?v=1009" alt="Brand">
							</a>
						</li>
						<li >
							<a href="#">
							<img src="//hstatic.net/741/1000089741/1000126629/img_our_2.png?v=1009" alt="Brand">
							</a>
						</li>
						<li >
							<a href="#">
							<img src="//hstatic.net/741/1000089741/1000126629/img_our_3.png?v=1009" alt="Brand">
							</a>
						</li>
						<li >
							<a href="#">
							<img src="//hstatic.net/741/1000089741/1000126629/img_our_4.png?v=1009" alt="Brand">
							</a>
						</li>
						<li >
							<a href="#">
							<img src="//hstatic.net/741/1000089741/1000126629/img_our_5.png?v=1009" alt="Brand">
							</a>
						</li>
						<li >
							<a href="#">
							<img src="//hstatic.net/741/1000089741/1000126629/img_our_6.png?v=1009" alt="Brand">
							</a>
						</li>
						<li >
							<a href="#">
							<img src="//hstatic.net/741/1000089741/1000126629/img_our_7.png?v=1009" alt="Brand">
							</a>
						</li>
						<li >
							<a href="#">
							<img src="//hstatic.net/741/1000089741/1000126629/img_our_8.png?v=1009" alt="Brand">
							</a>
						</li>
						<li >
							<a href="#">
							<img src="//hstatic.net/741/1000089741/1000126629/img_our_9.png?v=1009" alt="Brand">
							</a>
						</li>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
		     var ourbrands = $(".ourbrands");
		     ourbrands.owlCarousel({
		             items : 6,
		             itemsDesktop : [1199,5],
		             itemsDesktopSmall : [991,3], 
		             itemsTablet: [767,3], 
		             itemsMobile : [480,2],
		             autoPlay :  false,
		             stopOnHover: false,
		     });
		
		     // Custom Navigation Events
		     $("#tp-brand .carousel-control_left").click(function(){
		             ourbrands.trigger('owl.prev');})
		     $("#tp-brand .carousel-control_right").click(function(){
		             ourbrands.trigger('owl.next');})   
		});
	</script>
</div>
<!-- End Section 7 -->

<!-- Section 8 -->
<div id="bottom" class="section-8 bottom-container">
	<div class="container">
		<div class="row">
			<!-- Widget hhhhhhhhhhh -->
				{!!showWidget('widgethhhhhhhhhhh')!!}
			<!-- End Widget hhhhhhhhhhh -->
			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
				<div class="block-v2">
					<div class="title_block">
						Sản phẩm mới
					</div>
					<div class="product-special-wrap block-list block_content">
						<div class="product-special row">
							<!-- Tabs 1 -->
							<div class="ltabs-items-inner col-md-12 col-xs-12">
								<div class="ltabs-items product-list">
									<div class="ltabs-items-inner" id="product_column_1">
										<div class="item">
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/17_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony">Loa bluetooth Sony</a>
													</h5>
													<div class="product-price">
														<span class="price"> 2,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/7_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
													</h5>
													<div class="product-price">
														<span class="price"> 30,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/3_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
													</h5>
													<div class="product-price">
														<span class="price"> 15,000,000₫ </span>
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/1_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
													</h5>
													<div class="product-price">
														<span class="price"> 5,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/5_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
													</h5>
													<div class="product-price">
														<span class="price"> 12,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/13_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
													</h5>
													<div class="product-price">
														<span class="price"> 5,000,000₫ </span>
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/11_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
													</h5>
													<div class="product-price">
														<span class="price"> 7,000,000₫ </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Tabs 1 -->
							</div>
						</div>
					</div>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($){
				    var posTabProduct = $("#product_column_1");
				    posTabProduct.owlCarousel({
				            items : 1,
				            itemsDesktop : [1199,1],
				            itemsDesktopSmall : [991,1], 
				            itemsTablet: [767,2], 
				            itemsMobile : [480,1],
				            autoPlay :  false,
				            stopOnHover: false,
				            addClassActive: true,
				
				    });
				});
			</script>
			<!-- Widget iiiiiiiiiii -->
				{!!showWidget('widgetiiiiiiiiiii')!!}
			<!-- End Widget iiiiiiiiiii -->
			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
				<div class="block-v2">
					<div class="title_block">
						Sản phẩm nổi bật
					</div>
					<div class="product-special-wrap block-list block_content">
						<div class="product-special row">
							<!-- Tabs 1 -->
							<div class="ltabs-items-inner col-md-12 col-xs-12">
								<div class="ltabs-items product-list">
									<div class="ltabs-items-inner" id="product_column_2">
										<div class="item">
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/chuot-logitech-pro" title="Chuột Logitech Pro" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/custom_format_g402_front_large_7434214f-9952-4d6f-be42-c7ea9eab88f3_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/chuot-logitech-pro" title="Chuột Logitech Pro">Chuột Logitech Pro</a>
													</h5>
													<div class="product-price">
														<span class="price"> 2,900,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/dong-ho-i-watch" title="Đồng hồ  I-watch" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/15_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/dong-ho-i-watch" title="Đồng hồ  I-watch">Đồng hồ  I-watch</a>
													</h5>
													<div class="product-price">
														<span class="price"> 12,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/17_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/loa-bluetooth-sony" title="Loa bluetooth Sony">Loa bluetooth Sony</a>
													</h5>
													<div class="product-price">
														<span class="price"> 2,000,000₫ </span>
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/7_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
													</h5>
													<div class="product-price">
														<span class="price"> 30,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/3_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
													</h5>
													<div class="product-price">
														<span class="price"> 15,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/1_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
													</h5>
													<div class="product-price">
														<span class="price"> 5,000,000₫ </span>
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/5_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
													</h5>
													<div class="product-price">
														<span class="price"> 12,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/13_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
													</h5>
													<div class="product-price">
														<span class="price"> 5,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/11_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
													</h5>
													<div class="product-price">
														<span class="price"> 7,000,000₫ </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Tabs 1 -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
					jQuery(document).ready(function($){
					    var posTabProduct = $("#product_column_2");
					    posTabProduct.owlCarousel({
					            items : 1,
					            itemsDesktop : [1199,1],
					            itemsDesktopSmall : [991,1], 
					            itemsTablet: [767,2], 
					            itemsMobile : [480,1],
					            autoPlay :  false,
					            stopOnHover: false,
					            addClassActive: true,
					
					    });
					});
				</script>
			<!-- Widget jjjjjjjjjjj -->
				{!!showWidget('widgetjjjjjjjjjjj')!!}
			<!-- End Widget jjjjjjjjjjj -->
			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
				<div class="block-v2">
					<div class="title_block">
						Sản phẩm khuyến mãi
					</div>
					<div class="product-special-wrap block-list block_content">
						<div class="product-special row">
							<!-- Tabs 1 -->
							<div class="ltabs-items-inner col-md-12 col-xs-12">
								<div class="ltabs-items product-list">
									<div class="ltabs-items-inner" id="product_column_3">
										<div class="item">
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/7_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-canon-eos-m3" title="Máy ảnh CANON EOS M3">Máy ảnh CANON EOS M3</a>
													</h5>
													<div class="product-price">
														<span class="price"> 30,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/3_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-nikon-dslr-d3300" title="MÁY ẢNH NIKON DSLR D3300">MÁY ẢNH NIKON DSLR D3300</a>
													</h5>
													<div class="product-price">
														<span class="price"> 15,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-sony" title="Máy ảnh Sony" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/1_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-sony" title="Máy ảnh Sony">Máy ảnh Sony</a>
													</h5>
													<div class="product-price">
														<span class="price"> 5,000,000₫ </span>
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/5_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/may-anh-sony-dsc-w830b" title="MÁY ẢNH SONY DSC-W830B">MÁY ẢNH SONY DSC-W830B</a>
													</h5>
													<div class="product-price">
														<span class="price"> 12,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/13_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/tai-nghe-beat-pink" title="Tai nghe Beat Pink">Tai nghe Beat Pink</a>
													</h5>
													<div class="product-price">
														<span class="price"> 5,000,000₫ </span>
													</div>
												</div>
											</div>
											<div class="item-inner product-resize clearfix">
												<div class="left-block col-md-3 no-padding">
													<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016" class="product_image image-resize">
													<img src="//hstatic.net/741/1000089741/1/2016/5-26/11_small.png" alt="" />
													</a>
												</div>
												<div class="right-block col-md-9">
													<h5 class="title-block">
														<a href="/products/tai-nghe-beat-studio-2016" title="Tai nghe Beat Studio 2016">Tai nghe Beat Studio 2016</a>
													</h5>
													<div class="product-price">
														<span class="price"> 7,000,000₫ </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Tabs 1 -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				jQuery(document).ready(function($){
				    var posTabProduct = $("#product_column_3");
				    posTabProduct.owlCarousel({
				            items : 1,
				            itemsDesktop : [1199,1],
				            itemsDesktopSmall : [991,1], 
				            itemsTablet: [767,2], 
				            itemsMobile : [480,1],
				            autoPlay :  false,
				            stopOnHover: false,
				            addClassActive: true,
				
				    });
				});
			</script>
		</div>
	</div>
</div>
<!-- End Section 8 -->

<!-- Section 6 -->
<!-- Widget kkkkkkkkkkk -->
	{!!showWidget('widgetkkkkkkkkkkk')!!}
<!-- End Widget kkkkkkkkkkk -->
<div class="blog-bottom">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div id="tp-blog" class='tp-carousel main_block'>
					<h3 class="title_block hidden-xs">Bài viết mới</h3>
					<div class="blog block_content row">
						<div class="carousel-control-direction">
							<a class="carousel-control_left" data-slide="prev"><i class='fa fa-angle-left'></i></a>
							<a class="carousel-control_right" data-slide="next"><i class='fa fa-angle-right'></i></a>
						</div>
						<div class="blogSlider">
							<div class="post-item">
								<div class="blog_container clearfix">
									<div class="blog-image">
										<a class="post-thumbnail" href="/blogs/news/1000190276-lenovo-trinh-lang-thinkpad-x1-series" title="">
										<img src="//hstatic.net/741/1000089741/10/2016/6-16/blog_4.jpg" class="img-responsive">
										</a>
										<div class="post-date">16 / 06</div>
									</div>
									<div class="post-content">
										<h2>
											<a href="/blogs/news/1000190276-lenovo-trinh-lang-thinkpad-x1-series" title="">Lenovo trình làng ThinkPad X1 Series</a>
										</h2>
									</div>
									<div class="blog-created">
										<p>Có Sẵn Màn Hình Cảm Ứng 10 ĐiểmMàn hình cam ứng 10 điểm nâng cao độ chính xác, thực hiện duyệt cảm ứng và chọn...</p>
									</div>
									<div class="read-more">
										<a class="see-more btn" href="/blogs/news/1000190276-lenovo-trinh-lang-thinkpad-x1-series" title="Read more"><span>Xem tiếp</span><i class="fa fa-arrow-circle-o-right"></i></a>
									</div>
								</div>
							</div>
							<div class="post-item">
								<div class="blog_container clearfix">
									<div class="blog-image">
										<a class="post-thumbnail" href="/blogs/news/1000190272-fpt-play-box-cong-nghe-hop-giai-tri-gia-dinh" title="">
										<img src="//hstatic.net/741/1000089741/10/2016/6-16/blog_3.jpg" class="img-responsive">
										</a>
										<div class="post-date">16 / 06</div>
									</div>
									<div class="post-content">
										<h2>
											<a href="/blogs/news/1000190272-fpt-play-box-cong-nghe-hop-giai-tri-gia-dinh" title="">FPT Play Box - công nghệ hộp giải trí...</a>
										</h2>
									</div>
									<div class="blog-created">
										<p>TV Box là thiết bị kết nối với TV để người dùng giải trí qua các ứng dụng. Mới đây, FPT Telecom ra mắt FPT...</p>
									</div>
									<div class="read-more">
										<a class="see-more btn" href="/blogs/news/1000190272-fpt-play-box-cong-nghe-hop-giai-tri-gia-dinh" title="Read more"><span>Xem tiếp</span><i class="fa fa-arrow-circle-o-right"></i></a>
									</div>
								</div>
							</div>
							<div class="post-item">
								<div class="blog_container clearfix">
									<div class="blog-image">
										<a class="post-thumbnail" href="/blogs/news/1000190267-pokemon-thuc-te-ao" title="">
										<img src="//hstatic.net/741/1000089741/10/2016/6-16/blog_2.jpg" class="img-responsive">
										</a>
										<div class="post-date">16 / 06</div>
									</div>
									<div class="post-content">
										<h2>
											<a href="/blogs/news/1000190267-pokemon-thuc-te-ao" title="">Pokemon thực tế ảo</a>
										</h2>
									</div>
									<div class="blog-created">
										<p>Pokemon Go là trò chơi thực tế ảo tăng cường với tham vọng mang thương hiệu nổi tiếng lên một tầm cao mới.Năm 2014, Google...</p>
									</div>
									<div class="read-more">
										<a class="see-more btn" href="/blogs/news/1000190267-pokemon-thuc-te-ao" title="Read more"><span>Xem tiếp</span><i class="fa fa-arrow-circle-o-right"></i></a>
									</div>
								</div>
							</div>
							<div class="post-item">
								<div class="blog_container clearfix">
									<div class="blog-image">
										<a class="post-thumbnail" href="/blogs/news/1000190262-nguoi-dung-viet-phat-dien-vi-ios-10" title="">
										<img src="//hstatic.net/741/1000089741/10/2016/6-16/ios-10-features-you-may-know.jpg" class="img-responsive">
										</a>
										<div class="post-date">16 / 06</div>
									</div>
									<div class="post-content">
										<h2>
											<a href="/blogs/news/1000190262-nguoi-dung-viet-phat-dien-vi-ios-10" title="">Người dùng Việt 'phát điên' vì iOS 10</a>
										</h2>
									</div>
									<div class="blog-created">
										<p>iOS 10 không còn cho phép người dùng mở khoá bằng cách chạm vào touch ID, mà yêu cầu phải nhấn vào nút home. Thay...</p>
									</div>
									<div class="read-more">
										<a class="see-more btn" href="/blogs/news/1000190262-nguoi-dung-viet-phat-dien-vi-ios-10" title="Read more"><span>Xem tiếp</span><i class="fa fa-arrow-circle-o-right"></i></a>
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
			var blogSlider = $(".blogSlider");
			blogSlider.owlCarousel({
					items : 3,
					itemsDesktop : [1199,3],
					itemsDesktopSmall : [991,3], 
					itemsTablet: [767,2], 
					itemsMobile : [480,1],
					autoPlay :  false,
					stopOnHover: false,
					});
		
				// Custom Navigation Events
				$("#tp-blog .carousel-control_left").click(function(){
					blogSlider.trigger('owl.prev');})
				$("#tp-blog .carousel-control_right").click(function(){
					blogSlider.trigger('owl.next');})   
		});
	</script>
</section>
<!--DONG O DAU SECTION1-->
<!-- End Section 6 -->
@stop