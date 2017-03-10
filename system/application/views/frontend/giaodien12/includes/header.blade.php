<?php $query = isset($_GET['search']) ? $_GET['search'] : ''; ?>

<?php

    $xhtml      = '';
    $total      = 0;
    $totalQty   = 0;
    if(!empty($orderCart)){
        foreach($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalQty   += $quantity[$value->post_id];
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
           
        }
        
    }
?>
<div id="page-wrapper">
<div id="site-header">
	<header id="header" class="header">
		<!-- top header bar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="pull-right">
							<?php
							if( Session::has('loginFrontend') )
							{
							?>
							<a class="header-link" href="{{ url('user/logout') }}">Thoát</a>
							<?php
							}
							else
							{
							?>
							<a href="{{ url('user/login') }}" class="header-link" title="Đăng nhập">Đăng nhập <span>-</span></a>
							<a href="{{ url('user/register') }}" class="header-link" title="Đăng ký">Đăng ký</a>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End .topbar -->
		<!-- /top header bar -->
		<!-- main header -->
		<div class="header-main">
			<div class="container">
				<div class="row ">
					<div class="">
						<div class="row-eq-height">
							<div class="logo pul-left col-sm-3 hidden-xs">
								<div class="logo_content">
									<a href="{{ url('/') }}" class="logo" title="Trang chủ">
									<img src="{{ asset('template/giaodien12/asset/images/logo.png?1470122713917') }}" alt="Sport">
									</a>
								</div>
							</div>
							<div class="head-menu col-xs-12 col-sm-6 no-padding-lr">
								<nav class="navbar navbar-default">
									<!-- Brand and toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										</button>
										<button type="button" href="/cart" class="btn btn-primary header-cart-small"><span class="glyphicon glyphicon-shopping-cart"></span> <b class="cart-number">0</b> </button>
										<button data-toggle="modal" data-target="#myModal" class="btn btn-default header-search-small" type="submit"><span class="glyphicon glyphicon-search"></span>
										</button>
										<!-- Modal search small-->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<form action="{{ url('collections?search='.$query) }}" method="get">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span aria-hidden="true"><img src="//bizweb.dktcdn.net/100/048/137/themes/61830/assets/whiteclose.png?1470122713917" alt="Sport"> </span></span>
															</button>
															<h4 class="modal-title" id="myModalLabel">
																<input type="text" autocomplete="off" name="search" id="search" class="form-control" placeholder="Nhập từ khóa tìm kiếm và ấn enter..." value="{{ $query }}">
															</h4>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!--End Modal search-small-->
										<a class="navbar-brand" href="/" title="Trang chủ"><img src="{{ asset('template/giaodien12/asset/images/logo.png?1470122713917') }}" alt="Sport">
										</a>
									</div>
									<!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse no-padding-lr" id="bs-example-navbar-collapse-1">
										<ul class="nav navbar-nav">
											<li class="active"><a href="{{ url('/') }}">Trang chủ</a></li>
											<li><a href="{{ url('pages/gioi-thieu') }}">Giới thiệu</a></li>
											<li><a href="{{ url('collections') }}">Sản Phẩm</a></li>
											<!--
											<li class="dropdown">
												<a href="http://localhost/giaodien12/sanpham.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm <span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a href="http://localhost/giaodien12/sanpham.php">Sản phẩm  mới về</a></li>
													<li><a href="/san-pham-khuyen-mai">Sản phẩm khuyến mãi</a></li>
													<li><a href="/san-pham-noi-bat">Sản phẩm nổi bật</a></li>
													<li><a href="/giay-the-thao-nam-1">Giầy thể thao nam</a></li>
													<li><a href="/giay-the-thao-nu">Giầy thể thao nữ</a></li>
													<li><a href="/quan-ao-nu">Quần áo nam nữ</a></li>
													<li><a href="/yoga">Dụng cụ Yoga</a></li>
													<li><a href="/mon-tap-luyen-ca-nhan">Tập luyện cá nhân</a></li>
													<li><a href="/tui-the-thao">Dụng cu thể thao</a></li>
												</ul>
											</li>
											-->
											<li><a href="{{ url('post') }}">Tin tức</a></li>
											<li><a href="{{ url('pages/contact') }}">Liên hệ</a></li>
										</ul>
									</div>
									<!-- /.navbar-collapse -->
								</nav>
							</div>
							<!-- End .head-menu -->
							<div class="col-sm-3 hidden-xs no-padding-l head-form-right">
								<form class="" role="search" action="{{ url('collections?search='.$query) }}" method="get">
									<div class="input-group header-search">
										<input type="text" maxlength="70" name="search" id="search" class="form-control" placeholder="Tìm Kiếm" value="{{ $query }}">
										<span class="input-group-btn">
										<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span>
										</button>
										</span>
									</div>
									<!-- /input-group -->
									<button type="button" href="/cart" class="btn btn-primary header-cart"><span class="glyphicon glyphicon-shopping-cart"></span> <b class="cart-number">{{$totalQty}}</b> sản phẩm</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /main header -->
	</header>
</div>
<div id="site-content">
<div id="main">
<!--the dong o footer-->