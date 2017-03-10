<!-- CHEN POPUP -->
<?php 
	$_xhtml      = '';
	$xhtml      = '';
	$total = 0;
    $total_quantity = 0;
    $order_cart = decode_serialize (Cookie::get('cart'));
    if($order_cart){
    	$_xhtml = '<div class="animated_title"><p>Sản phẩm trong giỏ hàng</p></div>';
    	foreach ($order_cart as $cart){
    		$total_price = $cart['price'] * $cart['quantity'];
            $total_quantity += $cart['quantity'];
            $total+= $total_price;

            $xhtml .= '<div class="item-cart clearfix"><div class="nav-bar-item">';
			$xhtml .= '<figure class="image-cart ">';
			$xhtml .=   '<a href="'.url('collections/'.$cart['product_slug']).'">  
						 <img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'">
					   </a>';
			$xhtml .= '</figure>';
			$xhtml .= '<div class="text_cart">';
			$xhtml .= '   <h4>
						  <a href="'.url('collections/'.$cart['product_slug']).'">'.$cart['product_title'].'</a>
						</h4>
						<span class="variant"></span>';         
			$xhtml .=    '<div class="price-line">
						  <div class="down-case">'.$cart['quantity'].' x <span class="new-price"> '.number_format($cart['price'], 0, ',', '.').' ₫ </span></div>
						</div>';
			$xhtml.= '</div>';
			$xhtml.= '<span class="remove_link">
						<a class="remove-cart" data-id="1004706200" onclick="deletePerItem('.$cart['variant_id'].')"><i class="fa fa-times-circle"></i></a>
					 </span>';
			$xhtml .= '</div></div>';
    	}
    }else{
    	$_xhtml = '<div class="animated_title"><p>Không có sản phẩm nào trong giỏ hàng.</p></div>';
		$xhtml.= '<div style="padding:0 20px;">
			<p style="margin:0"class="text-center">Giỏ hàng của bạn đang trống</p>
			<p class="text-center"><a href="'.url('collections').'">Tiếp tục mua hàng</a></p>
		 </div>';
    }

 ?>

<!-- END CHEN POPUP -->
<body>
<div class="main-wrapper">
<div class="container-mp nav-wrapper">
	<!-- Begin: wrapper -->
<div class="wrapper mp-pusher" id="mp-pusher">
<!--menu mobile-->
<button type="button" class="navbar-toggle btn-sidebar" id="trigger">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</button>

 <nav id="mp-menu" class="mp-menu">
	<div class="mp-level">
		<?php echo navigation_menu('top_menu','','nav'); ?>	
	</div>
 </nav>
<!-- end menu mobile-->
<script>
	new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
		 type : 'cover'
	} );
</script>
 
<div class="site-topbar">
	<div class="container">
		<div class="topbar-nav">
			<?php echo e($welcome); ?>

		</div>
		<div class="topbar-cart">
			<div class="shopping_cart">
				<a href="<?php echo e(url('cart')); ?>" title="giỏ hàng" rel="nofollow">
					<i class="fa fa-shopping-cart"></i>
					<span class="top-cart">Giỏ hàng :</span>
					<span class="ajax_cart_no_product ajax_cart_quantity"><?php echo e($total_quantity); ?></span>
				</a>
				<div class="cart_content hidden-xs" id="view-cart">
					<!-- hiện giỏ hàng -->
					<?php echo $xhtml; ?>
					<!-- end  -->
				</div>
			</div>
		</div>
		<div class="topbar-info">
			<div class="taikhoan">
				<?php
					if( Session::has('loginFrontend') )
					{
				?>
					<a class="link" href="<?php echo e(url('customer')); ?>">Chỉnh sửa</a>
					<a class="link" href="<?php echo e(url('customer/logout')); ?>">Thoát</a>
				<?php
					}
					else
					{
				?>
				<a class="link" href="<?php echo e(url('customer/register')); ?>" title="Đăng ký">Đăng ký</a>
				<span class="sep">|</span>
				<a class="link" href="<?php echo e(url('customer/login')); ?>" title="Đăng nhập">Đăng nhập</a>
				<?php
					}
				?>
			</div>
			<div class="mobile-menu-icon-wrapper">
				<ul class="mobile-menu-icon">
					<li class="search">
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle icon-search" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-search"></i>							
							</button>
							<div class="dropdown-menu" role="menu">
								<div class="search-bar">
									<div class="">
										<form class="col-md-12" action="<?php echo e(url('collections')); ?>" method="get">
											<input type="hidden" name="type" value="product" />
											<?php $search = isset($_GET['search']) ? $_GET['search'] : ''; ?>
											<input type="text" name="search" placeholder="Tìm kiếm..." value="<?php echo e($search); ?>" />
										</form>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li class="user"><a href="<?php echo e(url('customer/login')); ?>" title="Đăng nhập" class="fa fa-user"></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="site-header">
	<div class="container">
		<div class="row">
			<div class="header-logo col-md-3 col-xs-12">
				<h1><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e($logo_main); ?>" class="img-responsive"/></a></h1>
			</div>
			<div class="header-nav col-md-6 col-xs-12 pt_custommenu">
				<div class="row">
					<div id="menu" class="navbar-collapse collapse">
						<?php echo navigation_menu('top_menu','','nav'); ?>

					</div>
				</div>
			</div>
			<div class="header-search col-md-3">
				<form id="J_searchForm" class="search-form clearfix" action="<?php echo e(url('collections')); ?>" method="get">
					<label for="search" class="hide"></label>
					<?php $search = isset($_GET['search']) ? $_GET['search'] : ''; ?>
					<input class="search-text"  name="search" type="search" id="search" placeholder="Tìm kiếm..." value="<?php echo e($search); ?>" />
					<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
	</div>
</div>
<!--start main-content-wrapper (end footer)-->
<div class="main-content-wrapper">