<?php $__env->startSection('content'); ?>
<!-- Slider -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slideshow">
	<div class="home_slide">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 slide">
					<div id="owl-slide" class="owl-carousel">
						<div class="item"><img src="//bizweb.dktcdn.net/100/091/132/themes/139143/assets/slide-img.jpg?1471504577257" alt="Slide"></div>
						<div class="item"><img src="//bizweb.dktcdn.net/100/091/132/themes/139143/assets/slide-img2.jpg?1471504577257" alt="Slide"></div>
						<div class="item"><img src="//bizweb.dktcdn.net/100/091/132/themes/139143/assets/slide-img3.jpg?1471504577257" alt="Slide"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
		        $("#owl-slide").owlCarousel({
		                slideSpeed : 300,
		                paginationSpeed : 400,
		                pagination: false,
		                itemsCustom : [
		                        [0, 1],
		                        [450, 1],
		                        [600, 1],
		                        [700, 1],
		                        [1000, 1],
		                        [1200, 1],
		                        [1400, 1],
		                        [1600, 1]
		                ],
		                autoPlay: true
		        });
		});
	</script>
</div>
<!-- End Slider -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 index">
	<div class="container">
		<!-- Left -->
		<aside class="col-lg-3 col-md-3 hidden-sm hidden-xs">
			<!-- Widget 11111111 -->
				<?php echo showWidget('widget11111111'); ?>

			<!-- End Widget 11111111 -->
			<script>
				var li_length = $('.block-content li.level0').length;
				$(document).ready(function(){
				    if (li_length <=6 ){
				            $(".xemthem").hide();
				    } else if (li_length >= 7){
				            $(".xemthem").show();
				    }
				    $(".xemthem").click(function(){
				            $(".xemthem").hide();
				            $(".display_dinao").show();
				    });
				    $(".xoadi").click(function (){
				            $(".display_dinao").hide();
				            $(".xemthem").show();
				    });
				});
			</script>
			
			<!-- <div class="online_support block">
				<div class="block-title">
					<h5>Hỗ trợ trực tuyến</h5>
				</div>
				<div class="block-content">
					<div class="sp_1">
						<p>Tư vấn bán hàng 1</p>
						<p>Mrs. Dung: <span>(04) 3786 8904</span></p>
					</div>
					<div class="sp_2">
						<p>Tư vấn bán hàng 2</p>
						<p>Mr. Tuấn: <span>(04) 3786 8904</span></p>
					</div>
					<div class="sp_mail">
						<p>Email liên hệ</p>
						<p>support@bizweb.vn</p>
					</div>
				</div>
			</div> -->
			<!-- Widget 22222222 -->
				<?php echo showWidget('widget22222222'); ?>

			<!-- End Widget 22222222 -->
			

			<div class="quangcao block">
				<?php $__currentLoopData = $image_sidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<img src="<?php echo e($row['image']); ?>" alt="Quảng cáo"/>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</div>
			<!-- Widget 33333333 -->
				<?php echo showWidget('widget33333333'); ?>

			<!-- End Widget 33333333 -->
			
			<script>
				$(document).ready(function() {
				    var owl = $("#owl-news-blog");
				    owl.owlCarousel({
				            autoPlay: 5000,
				            pagination: false,
				            navigation: false,
				            navigationText: false,
				            itemsCustom : [
				                    [0, 1],
				                    [450, 1],
				                    [600, 1],
				                    [700, 1],
				                    [1000, 1],
				                    [1200, 1],
				                    [1400, 1],
				                    [1600, 1]
				            ],
				    });
				    $(".next").click(function(){
				            owl.trigger('owl.next');
				    })
				    $(".prev").click(function(){
				            owl.trigger('owl.prev');
				    })
				});
			</script>
		</aside>
		<!-- End Left -->

		<!-- Right -->
		<article class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<!-- Widget 44444444 -->
				<?php echo showWidget('widget44444444'); ?>

			<!-- End Widget 44444444 -->

			<section class="article_ads hidden-xs">
				<?php $__currentLoopData = $first_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<img src="<?php echo e($row['image']); ?>" width="840" alt="Big Shoe">
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</section>
			<!-- Widget 55555555 -->
				<?php echo showWidget('widget55555555'); ?>

			<!-- End Widget 55555555 -->
			

			<section class="article_ads hidden-xs">
				<?php $__currentLoopData = $second_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<img src="<?php echo e($row['image']); ?>" width="840" alt="Big Shoe">
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				
			</section>
			<!-- Widget 66666666 -->
				<?php echo showWidget('widget66666666'); ?>

			<!-- End Widget 66666666 -->


		</article>
		<!-- 
		<aside class="hidden-lg hidden-md hidden-sm col-xs-12 pd0">
			<div class="best_product block">
				<div class="block-title">
					<h5>Sản phẩm bán chạy</h5>
				</div>
				<div id="slideshowproboxwrapper-2">
					<div class="slideshowprobox-2">
						<ul class="menu">
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/giay-da-converse-cao-cap"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/5-min-a5bb63b5-5f5e-4109-ae48-b6f4e3c5a3aa.jpg?v=1468202641487" width="81" height="81" alt="Giày da Converse cao cấp"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/giay-da-converse-cao-cap">Giày da Converse cao cấp</a></p>
										<p class="item-price cl_price fs16"><span>1.200.000&#8363;</span></p>
									</div>
								</div>
							</li>
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/giay-the-thao-converse-4"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/4-min-b44f4156-7226-4759-a2a2-545531ef7c8d.jpg?v=1468202743280" width="81" height="81" alt="Giày thể thao Converse 4"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/giay-the-thao-converse-4">Giày thể thao Converse 4</a></p>
										<p class="item-price cl_price fs16"><span>600.000&#8363;</span></p>
									</div>
								</div>
							</li>
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/giay-vai-converse-3"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/3-min-2aeb1bce-2365-43fc-ad76-752f82aafd51.jpg?v=1468202970950" width="81" height="81" alt="Giày vải Converse 3"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/giay-vai-converse-3">Giày vải Converse 3</a></p>
										<p class="item-price cl_price fs16"><span>700.000&#8363;</span></p>
									</div>
								</div>
							</li>
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/giay-the-thao-converse-2"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/2-min-0fcef065-6c13-4f03-bf7b-b24e5992a915.jpg?v=1468203150347" width="81" height="81" alt="Giày thể thao Converse 2"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/giay-the-thao-converse-2">Giày thể thao Converse 2</a></p>
										<p class="item-price cl_price fs16"><span>670.000&#8363;</span></p>
									</div>
								</div>
							</li>
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/giay-converse-cao-cap"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/1-min.jpg?v=1468203233277" width="81" height="81" alt="Giày Converse cao cấp"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/giay-converse-cao-cap">Giày Converse cao cấp</a></p>
										<p class="item-price cl_price fs16"><span>450.000&#8363;</span></p>
									</div>
								</div>
							</li>
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/converse-all-star"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/15-min-f93d1b0d-711f-4c4b-b6e8-7de18c53f671.jpg?v=1468203346717" width="81" height="81" alt="Giày Converse All Star"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/converse-all-star">Giày Converse All Star</a></p>
										<p class="item-price cl_price fs16"><span>500.000&#8363;</span></p>
									</div>
								</div>
							</li>
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/giay-vai-star-floral-crochet"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/12-min-8d0c4ba4-79cd-411a-89ee-10a20344b262.jpg?v=1468203428620" width="81" height="81" alt="Giày vải Star Floral Crochet"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/giay-vai-star-floral-crochet">Giày vải Star Floral Crochet</a></p>
										<p class="item-price cl_price fs16"><span>600.000&#8363;</span></p>
									</div>
								</div>
							</li>
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/chuck-taylor-all-star-ii-neon"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/19-min-63537b64-b819-4ca2-8ac2-7111f68ca7a2.jpg?v=1468203514247" width="81" height="81" alt="Giày Chuck Taylor All Star II Neon"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/chuck-taylor-all-star-ii-neon">Giày Chuck Taylor All Star II Neon</a></p>
										<p class="item-price cl_price fs16"><span>650.000&#8363;</span></p>
									</div>
								</div>
							</li>
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/giay-converse-one-star-74-camo"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/20-min-833641c2-cb07-4364-82b5-8a095adf8656.jpg?v=1468203935623" width="81" height="81" alt="Giày Converse One Star '74 Camo"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/giay-converse-one-star-74-camo">Giày Converse One Star '74 Camo</a></p>
										<p class="item-price cl_price fs16"><span>500.000&#8363;</span></p>
									</div>
								</div>
							</li>
							<li>
								<div class="item">
									<div class="col-lg-55 col-md-5 col-sm-5 col-xs-5 item-img">
										<a href="/giay-converse-by-john-varvatos"><img src="//bizweb.dktcdn.net/thumb/small/100/091/132/products/21-min-9e8ea0bf-1120-4473-a335-abe09236c810.jpg?v=1468204059610" width="81" height="81" alt="Giày Converse by John Varvatos"></a>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 item-info">
										<p class="item-name"><a href="/giay-converse-by-john-varvatos">Giày Converse by John Varvatos</a></p>
										<p class="item-price cl_price fs16"><span>500.000&#8363;</span></p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</aside>
 -->
		<!-- End Right -->
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien16.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>