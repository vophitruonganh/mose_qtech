
<?php 
    $xhtml = '';
    $order_cart = decode_serialize (Cookie::get('cart'));
    $total = 0;
    $total_quantity = 0;
    if($order_cart){
      $xhtml .= '       <div class="top-cart-content arrow_box" style="display: none;">
                              <ul id="cart-sidebar" class="mini-products-list shopping_cart">
                                  <!--<div class="block-subtitle">Không có sản phẩm nào trong giỏ hàng.</div>-->
                                 <div class="block-subtitle">Sản phẩm đã cho vào giỏ hàng</div>';
      foreach ( $order_cart as $cart){
         $total_quantity += $cart['quantity'];
         $total_price = $cart['price'] * $cart['quantity'];
         $total+= $total_price;
         $xhtml .=               '<li class="item even">
                                 <a class="product-image" href="'.url('collections/'.$cart['product_slug']).'"><img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'" width="80"></a>
                                    <div class="detail-item">
                                       <div class="product-details">
                                          <a href="javascript:void(0);" onClick="deletePerItem('.$cart['variant_id'].')" title="xóa sản phẩm" class="glyphicon glyphicon-remove">&nbsp;</a>
                                          <p class="product-name"> <a href="'.url('collections/'.$cart['product_slug']).'" title="'.$cart['product_title'].'">'.$cart['product_title'].'</a> ('.$cart['variant_meta'].') </p>
                                       </div>
                                       <div class="product-details-bottom"> <span class="price">'.number_format($total_price, 0, ',', '.') .'₫</span> <span class="title-desc">Số lượng:</span> <strong>'.$cart['quantity'].'</strong> </div>
                                    </div>
                                 </li>';
      }
      $xhtml .=               '<div class="top-subtotal">Tổng tiền: <span class="price total_price">'.number_format($total, 0, ',', '.') .'₫</span></div>
                                 <div class="actions">
                                     <a class="btn-checkout" href="'.url('cart/checkout').'"><span>Thanh toán</span></a>
                                     <a class="view-cart" href="'.url('cart').'"><span>giỏ hàng</span></a>
                                 </div>
                              </ul>
                           </div>'; 
    }
 ?>
<div class="page"> 

<header class="header-container">
         <div class="header-top">
            <div class="container">
               <div class="row">
                  <!-- Header Language -->
                  <div class="col-xs-6">
                     <?php $siteName = isset($site_name) ? $site_name : ''; ?>
                     <div class="welcome-msg hidden-xs">Chào mừng bạn <?php if( strlen($siteName) > 0 ): ?> tới <a><?php echo e($siteName); ?></a> <?php endif; ?> | Hotline : <a><?php echo e($storeSetting['telephone']); ?></a></div>
                     <div class="account-msg visible-xs">
                        <a class="msg">Tài khoản <i class="fa fa-angle-down"></i></a>
                        <ul class="account-msg-hidden">
                           <li><a title="Register" href="<?php echo e(url('customer/register')); ?>"><span><i class="fa fa-key"></i>Đăng ký</span></a></li>
                           <li><a title="Login" href="<?php echo e(url('customer/login')); ?>"><span><i class="fa fa-lock"></i>Đăng nhập</span></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <!-- Header Top Links -->
                     <div class="toplinks">
                        <div class="links hidden-xs">
                         <?php if( Session::has('loginFrontend') ): ?>
                           <div class="login"><a title="Login" href="<?php echo e(url('customer/edit')); ?>"><span  class="hidden-xs">Chỉnh sửa thông tin</span></a></div>
                           <div class="login"><a title="Login" href="<?php echo e(url('customer/logout')); ?>"><span  class="hidden-xs">Đăng xuất</span></a></div>
                         <?php else: ?>
                           <div class="register"><a title="Register" href="<?php echo e(url('customer/register')); ?>"><span  class="hidden-xs">Đăng ký</span></a></div>
                           <div class="login"><a title="Login" href="<?php echo e(url('customer/login')); ?>"><span  class="hidden-xs">Đăng nhập</span></a></div>
                         <?php endif; ?>
                        
                        </div>
                        <div class="links visible-xs">
                           <div><a title="search" href="/search"><span class="fa fa-search"></span></a></div>
                           <div class="bag_shop" onclick="window.location.href='/cart'"><a title="cart" href="/cart"><span class="cart-total"><?php echo e($total_quantity); ?></span></a></div>
                        </div>
                     </div>
                     <!-- End Header Top Links --> 
                  </div>
               </div>
            </div>
         </div>
         <div class="header container">
            <div class="row">
               <div class="col-lg-4 col-sm-4 col-md-4 cl_logo">
                  <!-- Header Logo --> 
                  <a class="logo" href="<?php echo e(url('/')); ?>">
                  <?php $logo_main = isset($logo_main) ? $logo_main : asset('template/giaodien11/asset/images/logo.png') ; ?>
                  <img src="<?php echo e($logo_main); ?>" />
                  </a>
                  <!-- End Header Logo --> 
               </div>
               <div class="col-lg-5 col-sm-5 col-md-5">
                  <!-- Search-col -->
                  <div class="search-box">
                  <?php $search = isset($_GET['search']) ? $_GET['search']: '' ?>
                     <form action="<?php echo e(url('collections')); ?>" method="get" id="search_mini_form">
                        <input type="text" placeholder="Nhập thông tin tìm kiếm" value="<?php echo e($search); ?>" maxlength="70" class="" name="search" id="search">
                        <button type="submit" id="submit-button" class="search-btn-bg"><span></span></button>
                     </form>
                  </div>
                  <!-- End Search-col --> 
               </div>
               <!-- Top Cart -->
               <div class="col-lg-3 col-sm-3 col-md-3">
                     <div class="top-cart-contain">
                     <div class="mini-cart" id="open_shopping_cart">
                        <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                           <a href="<?php echo e(url('cart')); ?>">
                              <i class="icon_bag"><span class="count_item_pr cart-total"><?php echo e($total_quantity); ?></span></i>
                              <div class="cart-box"><span class="title">Giỏ hàng</span><span class="count_pr">(<span class="cart-total"><?php echo e($total_quantity); ?></span>)&nbsp;sản phẩm</span></div>
                           </a>
                        </div>
                        <div>
                           <?php echo $xhtml; ?>

                        </div>
                     </div>
                     <div id="ajaxconfig_info"> <a href="#/"></a>
                        <input value="" type="hidden">
                        <input id="enable_module" value="1" type="hidden">
                        <input class="effect_to_cart" value="1" type="hidden">
                        <input class="title_shopping_cart" value="Giỏ hàng" type="hidden">
                     </div>
                  </div>
               </div>
               <!-- End Top Cart --> 
            </div>
         </div>
      </header>
      <!-- end header --> 
      <!-- Navbar -->
      <nav>
         <div class="container">
            <div class="nav-inner">
               <div class="logo-small hidden-sm hidden-md"> 
                  <a class="logo" href="//bike-themes.bizwebvietnam.net">
                  <img alt="Bike-themes" src="<?php echo e(asset('template/giaodien11/asset/images/logo.png')); ?>" />
                  </a>
               </div>
               <!-- mobile-menu -->
               <div class="hidden-desktop" id="mobile-menu">
                  <ul class="navmenu">
                     <li>
                        <div class="menutop toggle">
                           <div class="toggle toggle_icon"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                           <h2>Danh mục</h2>
                        </div>
                        <ul class="submenu">
                           <li>
                              <ul class="topnav">
                                 <li class="level0 nacvv-8 level-top parent  active "> <a class="level-top" href="<?php echo e(url('/')); ?>"> <span>Trang chủ</span> </a></li>
                                 <li class="level0 nacvv-8 level-top parent "> <a class="level-top" href="<?php echo e(url('pages/gioi-thieu')); ?>"> <span>Giới thiệu</span> </a></li>
                                 <li class="level0 nav-8 level-top parent ">
                                    <a class="level0 nav-8 level-top parent" href="<?php echo e(url('collections')); ?>"> <span>Sản phẩm</span> </a>
                                    <!-- <ul class="level0">
                                       <li class="level1 nav-2-1 first parent "> <a href="<?php echo e(url('collections')); ?>"> <span>Sản phẩm mới</span> </a></li>
                                       <li class="level1 nav-2-1 first parent "> <a href="<?php echo e(url('collections/san-pham-noi-bat')); ?>"> <span>Sản phẩm nổi bật</span> </a></li>
                                       <li class="level1 nav-2-1 first parent "> <a href="<?php echo e(url('collections/discount')); ?>"> <span>Sản phẩm khuyến mãi</span> </a></li>
                                       <li class="level1 nav-2-1 first parent "> <a href="/xe-dap-the-thao"> <span>Xe đạp thể thao</span> </a></li>
                                       <li class="level1 nav-2-1 first parent "> <a href="/xe-dap-leo-nui"> <span>Xe đạp khác</span> </a></li>
                                       <li class="level1 nav-2-1 first parent "> <a href="/xe-dap-thoi-trang"> <span>Xe đạp thời trang</span> </a></li>
                                       <li class="level1 nav-2-1 first parent "> <a href="/xe-dap-nhap-khau"> <span>Xe đạp nhập khẩu</span> </a></li>
                                       <li class="level1 nav-2-1 first parent "> <a href="/may-tap"> <span>Máy tập</span> </a></li>
                                       <li class="level1 nav-2-1 first parent "> <a href="/mu-bao-hiem"> <span>Mũ bảo hiểm</span> </a></li>
                                       <li class="level1 nav-2-1 first parent "> <a href="/dung-cu-the-thao"> <span>Dụng cụ thể thao</span> </a></li>
                                    </ul> -->
                                 </li>
                                 <li class="level0 nacvv-8 level-top parent "> <a class="level-top" href="<?php echo e(url('tin-chinh')); ?>"> <span>Tin tức</span> </a></li>
                               <li class="level0 nacvv-8 level-top parent "> <a class="level-top" href="<?php echo e(url('pages/contact')); ?>"> <span>Liên hệ</span> </a></li>

                              </ul>
                           </li>
                        </ul>
                     </li>
                  </ul>
                  <!--navmenu--> 
               </div>
               <!--End mobile-menu -->
               <!--
               <ul id="nav" class="hidden-xs">
                  <li class="level0 parent drop-menu  active "><a href="<?php echo e(url('/')); ?>"><span>Trang chủ</span></a></li>
                  <li class="level0 parent drop-menu "><a href="<?php echo e(url('pages/gioi-thieu')); ?>"><span>Giới thiệu</span></a></li>
                  <li class="level0 parent drop-menu ">
                     <a href="<?php echo e(url('collections')); ?>"><span>Sản phẩm <i style="float: right;margin: 1px 5px;" ></i></span></a>
                     <ul class="level1">
                        <i class="fa fa-sort-asc icon_arr"></i>
                        <li class="level1 first parent "><a href="<?php echo e(url('collections')); ?>"><span>Sản phẩm mới</span></a></li>
                        <li class="level1 first parent "><a href="<?php echo e(url('collections/san-pham-noi-bat')); ?>"><span>Sản phẩm nổi bật</span></a></li>
                        <li class="level1 first parent "><a href="<?php echo e(url('collections/discount')); ?>"><span>Sản phẩm khuyến mãi</span></a></li>
                        <li class="level1 first parent "><a href="/xe-dap-the-thao"><span>Xe đạp thể thao</span></a></li>
                        <li class="level1 first parent "><a href="/xe-dap-leo-nui"><span>Xe đạp khác</span></a></li>
                        <li class="level1 first parent "><a href="/xe-dap-thoi-trang"><span>Xe đạp thời trang</span></a></li>
                        <li class="level1 first parent "><a href="/xe-dap-nhap-khau"><span>Xe đạp nhập khẩu</span></a></li>
                        <li class="level1 first parent "><a href="/may-tap"><span>Máy tập</span></a></li>
                        <li class="level1 first parent "><a href="/mu-bao-hiem"><span>Mũ bảo hiểm</span></a></li>
                        <li class="level1 first parent "><a href="/dung-cu-the-thao"><span>Dụng cụ thể thao</span></a></li>
                     </ul>
                  </li>
                  <li class="level0 parent drop-menu "><a href="<?php echo e(url('tin-chinh')); ?>"><span>Tin tức</span></a></li>
                  <li class="level0 parent drop-menu "><a href="<?php echo e(url('pages/contact')); ?>"><span>Liên hệ</span></a></li>
               </ul>
               -->
               <?php echo navigation_menu('top_menu','','nav'); ?>

            </div>
         </div>
      </nav>
      <!-- end nav -->