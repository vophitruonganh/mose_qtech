<?php
     $search = isset($_GET['search']) ? $_GET['search'] : '' ;
?>
<?php 
    $xhtml = '';
    $total = 0;
    $total_quantity = 0;
    $order_cart = decode_serialize (Cookie::get('cart'));
    if($order_cart){
        $xhtml = '<div class="animated_title"><p>Sản phẩm trong giỏ hàng</p></div>';
        foreach( $order_cart as $cart){
            $total_price = $cart['price'] * $cart['quantity'];
            $total_quantity += $cart['quantity'];
            $total+= $total_price;

            $xhtml .= '<div class="cart-img-details">
                          <div class="cart-img-photo"><a href="'.url('collections/'.$cart['product_slug']).'"><img alt="'.$cart['product_title'].'" src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'"></a></div>
                          <div class="cart-img-contaent">
                             <a href="'.url('collections/'.$cart['product_slug']).'">
                                <h3>'.$cart['product_title'].'</h3>
                                '.$cart['variant_meta'].'
                             </a>
                             <span class="quantity">Số lượng: '.$cart['quantity'].'</span><span>'.number_format($cart['price'], 0, ',', '.').' ₫</span>
                          </div>
                          <div class="pro-del"><a onclick="deletePerItem('.$cart['variant_id'].')"><i class="fa fa-times-circle"></i></a></div>
                       </div>
                       <div class="clear"></div>';
        }
        $xhtml .= '<div class="cart-inner-bottom">
                       <p class="total">Tổng tiền : <span class="amount total_price">'.number_format($total, 0, ',', '.').' ₫</span></p>
                       <div class="clear"></div>
                       <p class="buttons"><a href="'.url('cart/checkout').'">Thanh toán</a></p>
                    </div>';
    }else{
      $xhtml .= '<div class="animated_title">
                    <p>Không có sản phẩm nào trong giỏ hàng.</p>
                </div> ';
    }
 ?>

<!-- END CHEN POPUP -->

<body class="home-9">
    <div id="home">
        <div class="header_area">
            <div class="header-top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-lg-8 col-md-8 col-md-8">
                            <div class="header-left">
                                <div class="header-email">
                                    <i class="fa fa-clock-o"></i><?php echo e($openDoor); ?>

                                </div>
                                <div class="header-email">
                                    <i class="fa fa-envelope"></i><?php echo e($storeSetting['email']); ?>

                                </div>
                                <div class="header-email">
                                    <strong><i class="fa fa-phone"></i> hotline:</strong> <?php echo e($storeSetting['telephone']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 col-lg-4 col-md-4">
                            <div class="header-right">
                                <div class="menu-top-menu">
                                    <ul>
                                        <!--
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        -->
                                        <?php
                                        if( Session::has('loginFrontend') )
                                        {
                                        ?>
                                        <li><a href="<?php echo e(url('customer')); ?>">Chỉnh sửa</a></li>
                                        <li><a href="<?php echo e(url('customer/logout')); ?>">Thoát</a></li>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <li><a href="<?php echo e(url('customer/login')); ?>">Đăng nhập</a></li>
                                        <li><a href="<?php echo e(url('customer/register')); ?>">Đăng ký</a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- LOGO-SEARCH-AREA START-->
                <div class="row">
                    <div class="col-xs-12 col-lg-3 col-md-3">
                        <div class="logo">
                            <a class="logo" href="<?php echo e(url('/')); ?>"><img src="<?php echo e($logo_main); ?>" /></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-9 col-md-9">
                        <div class="search-cart-list">
                            <div class="header-search">
                                <form action="<?php echo e(url('collections')); ?>" method="get" >
                                    <div>
                                        <input type="text" placeholder="Tìm kiếm..." name="search" maxlength="70" value="<?php echo e($search); ?>">
                                        <input class="hidden" type="submit" value="">
                                        <button type="submit">
                                        <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="cart-total">
                                <ul>
                                    <li>
                                        <a class="cart-toggler" href="<?php echo e(url('cart')); ?>">
                                            <span class="cart-icon"></span> 
                                            <span class="cart-no">
                                                <i class="fa fa-shopping-basket"></i> Giỏ hàng: 
                                                <spam id="cart-total"><?php echo e($total_quantity); ?></spam>
                                                sản phẩm
                                            </span>
                                        </a>
                                        <div class="mini-cart-content shopping_cart">
                                            <?php echo $xhtml; ?>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- LOGO-SEARCH-AREA END-->
            </div>
            <!-- MAINMENU-AREA START-->
            <div class="mainmenu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li class="<?php echo e((Request::is('/') ? 'active' : '')); ?>"><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
                                        <li class="<?php echo e((Request::is('pages/gioi-thieu') ? 'active' : '')); ?>"><a href="<?php echo e(url('pages/gioi-thieu')); ?>">Giới thiệu</a></li>
                                        <li class="<?php echo e(((Request::is('collections') || Request::is('collections/san-pham-noi-bat') || Request::is('collections/discount')) ? 'active' : '')); ?>">
                                            <a href="<?php echo e(url('collections')); ?>">Sản phẩm <i class="fa fa-angle-down"></i></a>
                                            <ul class="sup-menu">
                                                <li>
                                                    <a href="<?php echo e(url('collections')); ?>">Tất cả sản phẩm</a>
                                                </li>
                                                <!--
                                                <li>
                                                    <a href="<?php echo e(url('product_new.html')); ?>">Sản phẩm mới</a>
                                                </li>
                                                -->
                                                <li>
                                                    <a href="<?php echo e(url('collections/san-pham-noi-bat')); ?>">Sản phẩm nổi bật</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--
                                        <li class="<?php echo e((Request::is('product_new.html') ? 'active' : '')); ?>"><a href="<?php echo e(url('product_new.html')); ?>">Sản phẩm mới</a></li>
                                        -->
                                        <li><a href="<?php echo e(url('tin-chinh')); ?>">Tin tức</a></li>
                                        <li class="<?php echo e((Request::is('pages/contact*') ? 'active' : '')); ?>"><a href="<?php echo e(url('pages/contact')); ?>">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAINMENU-AREA END-->
            <!-- MOBILE-MENU-AREA START -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
                                        <li><a href="<?php echo e(url('pages/gioi-thieu')); ?>">Giới thiệu</a></li>
                                        <li>
                                            <a href="<?php echo e(url('collections')); ?>">Sản phẩm</a>
                                            <ul>
                                                <li>
                                                    <a href="<?php echo e(url('collections')); ?>">Tất cả sản phẩm</a>
                                                </li>
                                                <!--
                                                <li>
                                                    <a href="https:///frontpage">Sản phẩm mới</a>
                                                </li>
                                                -->
                                                <li>
                                                    <a href="<?php echo e(url('collections/san-pham-noi-bat')); ?>">Sản phẩm nổi bật</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--
                                        <li><a href="<?php echo e(url('product_new.html')); ?>">Sản phẩm mới</a></li>
                                        -->
                                        <li><a href="<?php echo e(url('tin_chinh')); ?>">Tin tức</a></li>
                                        <li><a href="<?php echo e(url('pages/contact')); ?>">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MOBILE-MENU-AREA END -->
        </div>