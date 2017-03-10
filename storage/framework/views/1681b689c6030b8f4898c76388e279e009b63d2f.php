 <?php

    /*Lây từ khóa*/ 
    $query= '';
    if(isset($_GET['search']))
    {
      $query= $_GET['search'];
    }
    /*end*/ 
    $xhtml      = '';
    $total      = 0;
    $total_quantity = 0;
    $order_cart = decode_serialize (Cookie::get('cart'));
    if($order_cart){
        $xhtml .= '<div class="cart-view clearfix" style="display: none;">';
        $xhtml .= '<table id="clone-item-cart" class="table-clone-cart">
                      <tr class="item_2 hidden">
                         <td class="img"><a href="" title=""><img src="" alt="" /></a></td>
                         <td>
                            <a class="pro-title-view" href="" title=""></a>
                            <span class="pro-quantity-view"></span>
                            <span class="pro-price-view"></span>
                         </td>
                      </tr>
                   </table>';
        $xhtml .= '<table id="cart-view">';
        foreach($order_cart as $cart){
            $total_price = $cart['price'] * $cart['quantity'];
            $total_quantity += $cart['quantity'];
            $total+= $total_price;
            $xhtml .='<tr>
                         <td class="img">
                            <a href="'.url('collections/'.$cart['product_slug']).'">
                            <img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'" alt="'.$cart['product_title'].'" />
                            </a>
                         </td>
                         <td>
                            <a class="pro-title-view" href="'.url('collections/'.$cart['product_slug']).'" title="'.$cart['product_title'].'">'.$cart['product_title'].'</a>
                            <span class="pro-quantity-view">Số lượng: '.$cart['quantity'].'</span>
                            <span class="pro-price-view">Giá: '.number_format($cart['price'], 0, ',', '.').' ₫</span>
                         </td>
                      </tr>';
        }
        $xhtml .= '</table>';
        $xhtml .= '<span class="line"></span>';
        $xhtml .= '<table class="table-total">
                      <tr>
                         <td align="left">TỔNG TIỀN:</td>
                         <td align="right" id="total-view-cart">'.number_format($total, 0, ',', '.').' ₫</td>
                      </tr>
                      <tr>
                         <td><a href="'.url('cart').'" class="linktocart">Xem giỏ hàng</a></td>
                         <td><a href="'.url('cart/checkout').'" class="linktocheckout">Thanh toán</a></td>
                      </tr>
                   </table>';
        $xhtml .= '</div>';
    }


    if(!empty($orderCart))
    {  
        $xhtml .= '<div class="cart-view clearfix" style="display: none;">';
        $xhtml .= '<table id="clone-item-cart" class="table-clone-cart">
                      <tr class="item_2 hidden">
                         <td class="img"><a href="" title=""><img src="" alt="" /></a></td>
                         <td>
                            <a class="pro-title-view" href="" title=""></a>
                            <span class="pro-quantity-view"></span>
                            <span class="pro-price-view"></span>
                         </td>
                      </tr>
                   </table>';
        $xhtml .= '<table id="cart-view">';
        foreach($orderCart as $key => $value)
        {
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalQty   += $quantity[$value->post_id];
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtml .='<tr>
                         <td class="img">
                            <a href="'.url('collections/'.$value->post_slug).'">
                            <img src="'.loadFeatureImage($post_meta['post_featured_image']).'" alt="'.$value->post_title.'" />
                            </a>
                         </td>
                         <td>
                            <a class="pro-title-view" href="'.url('collections/'.$value->post_slug).'" title="'.$value->post_title.'">'.$title.'</a>
                            <span class="pro-quantity-view">Số lượng: '.$quantity[$value->post_id].'</span>
                            <span class="pro-price-view">Giá: '.number_format($priceHeader[$value->post_id], 0, ',', '.').' ₫</span>
                         </td>
                      </tr>';
        }
        $xhtml .= '</table>';
        $xhtml .= '<span class="line"></span>';
        $xhtml .= '<table class="table-total">
                      <tr>
                         <td align="left">TỔNG TIỀN:</td>
                         <td align="right" id="total-view-cart">'.number_format($total, 0, ',', '.').' ₫</td>
                      </tr>
                      <tr>
                         <td><a href="'.url('cart').'" class="linktocart">Xem giỏ hàng</a></td>
                         <td><a href="'.url('cart/checkout').'" class="linktocheckout">Thanh toán</a></td>
                      </tr>
                   </table>';
        $xhtml .= '</div>';

    }
?>

    <div class="container-menu nav-wrapper">
       <div class="mp-pusher" id="mp-pusher">
          <nav id="mp-menu" class="mp-menu">
             <div class="mp-level" style="overflow: auto;">
                <?php echo navigation_menu('top_menu'); ?>

                <?php
                /*
                <ul>
                   <li>
                      <a href="{{ url('/') }}" title="Trang chủ" class="current">Trang chủ</a>
                   </li>
                   <li>
                     <a href="{{ url('collections') }}" class="" title="Sản phẩm">Sản phẩm</a>
                   </li>
                   <!--
                   <li class="has-children icon icon-arrow-left">
                      <a href="javascript:void(0);" title="Sản phẩm">Sản phẩm</a>
                      <div class="mp-level">
                         <h2 class="icon icon-display">Sản phẩm</h2>
                         <a class="mp-back" href="javascript:void(0);">Quay lại</a>
                         <ul>
                            <li class="level2 has-children icon icon-arrow-left">
                               <a href="javascript:void(0);" title="Điện thoại iphone">Điện thoại iphone</a>
                               <div class="mp-level">
                                  <h2>Điện thoại iphone</h2>
                                  <a class="mp-back" href="javascript:void(0);">Quay lại</a>
                                  <ul>
                                     <li><a href="/" title="Iphone 6">Iphone 6</a></li>
                                     <li><a href="/" title="Iphone 5">Iphone 5</a></li>
                                  </ul>
                               </div>
                            </li>
                            <li>
                               <a href="/collections/tivi" title="Tivi" class="">Tivi</a>
                            </li>
                            <li>
                               <a href="/collections/dien-lanh-gia-dung" title="Điện lạnh" class="">Điện lạnh</a>
                            </li>
                            <li>
                               <a href="/collections/phu-kien-may-tinh" title="Phụ kiện máy tính" class="">Phụ kiện máy tính</a>
                            </li>
                         </ul>
                      </div>
                   </li>
                   -->
                   <li>
                      <a href="{{ url('pages/gioi-thieu') }}" title="Giới thiệu" class="">Giới thiệu</a>
                   </li>
                   <li>
                      <a href="{{ url('post') }}" title="Blog" class="">Blog</a>
                   </li>
                   <li>
                      <a href="{{ url('pages/contact') }}" title="Liên hệ" class="">Liên hệ</a>
                   </li>
                </ul>
                */
                ?>
             </div>
      </nav>
          <!-- MENU MAIN -->
          <div class="scroller">
             <!-- this is for emulating position fixed of the nav -->
             <div class="scroller-inner">
                <header class="hidden-xs">
                   <div class="bottom-header hidden-xs">
                      <div class="container">
                         <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                               <div class="logo">
                                  <a href="<?php echo e(url('/')); ?>">
                                    <?php $logo_main = isset($logo_main) ? $logo_main : ''; ?>
                                    <img src="<?php echo e($logo_main); ?>" />
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-7 hidden-xs">
                               <form action="<?php echo e(url('collections?search='.$query)); ?>" method="get">
                                  <div class="box-search">
                                     <div class="box-input">                                        
                                        <div class="input-group-search" style="">
                                           <input type="text" name="search" value="<?php echo e($query); ?>" placeholder="Nhập từ khóa tìm kiếm" />
                                        </div>
                                        <button class="btn-searchbox" type="submit"><i class="fa fa-search"></i></button>
                                     </div>
                                  </div>
                               </form>
                            </div>
                            <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                               <div class="box-check-header">
                                  <svg class="svg-icon-size-35 svg-icon-bg" style="fill:#0bd9a9">
                                     <use xlink:href="#icon-phone-header"></use>
                                  </svg>
                                  <span class="fone-header"><?php echo e($phone); ?></span>
                                  <span class="fone-checkout-header">Đặt hàng nhanh</span>
                               </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
                               <div class="cart-info hidden-xs">
                                  <a class="cart-link" href="<?php echo e(url('cart')); ?>">
                                     <span class="icon-cart">
                                        <svg class="svg-icon-size-30 svg-icon-bg" style="fill:#0bd9a9;padding:3px;background:#fff;">
                                           <use xlink:href="#icon-cart-header"></use>
                                        </svg>
                                     </span>
                                     <div class="cart-number">
                                        <?php echo e($total_quantity); ?> Sản phẩm
                                     </div>
                                  </a>
                                  <!-- start -->
                                    <?php echo $xhtml; ?>
                                  <!-- end -->
                               </div>
                            </div>

                         </div>
                      </div>
                   </div>
                </header>
                <nav class="navbar-main navbar navbar-default cl-pri">
                   <!-- MENU MAIN -->
                   <div class="container nav-wrapper">
                      <div class="row">
                         <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" id="trigger">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <div class="pull-right mobile-menu-icon-wrapper">
                               <div class="logo logo-mobile">
                                  <a href="<?php echo e(url('/')); ?>">
                                  <img src="<?php echo e(asset('template/giaodien6/asset/images/logo.png')); ?>" alt="Saga Hamburg" />
                                  </a>
                               </div>
                               <ul class="mobile-menu-icon clearfix">
                                  <li class="search">
                                     <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle icon-search" data-toggle="dropdown" aria-expanded="false"></button>
                                        <div class="dropdown-menu" role="menu">
                                           <div class="search-bar">
                                              <div class="">
                                                 <form class="col-md-12" action="<?php echo e(url('collections?search='.$query)); ?>" method="get">
                                                
                                                    <input type="hidden" name="type" value="product" />
                                                    <input type="text" name="query" placeholder="Tìm kiếm..." value="<?php echo e($query); ?>" />
                                                 </form>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                  </li>
                                  <li id="cart-target" class="cart">
                                     <a href="/cart" class="cart " title="Giỏ hàng">
                                     <span class="fa fa-shopping-cart"></span>							
                                     <span id="cart-count">4</span>
                                     </a>
                                  </li>
                               </ul>
                            </div>
                         </div>
                         <div id="navbar" class="navbar-collapse collapse">
                            <div class="clearfix" id="menu">
                              <?php echo navigation_menu('top_menu','nav navbar-nav clearfix'); ?>

                              <?php
                              /*
                               <ul class="nav navbar-nav clearfix">
                                  <li>
                                     <a href="{{ url('/') }}" class=" current" title="Trang chủ">Trang chủ</a>
                                  </li>
                                  <li>
                                     <a href="{{ url('collections') }}" class="" title="Sản phẩm">Sản phẩm</a>
                                  </li>
                                  <!--
                                  <li class="">
                                     <a href="/collections/all" title="Sản phẩm" class="">Sản phẩm <i class="fa fa-angle-down"></i></a>
                                     <ul class="dropdown-menu submenu-level1-children" role="menu">
                                        <li>
                                           <a href="/collections/dien-thoai-iphone" title="Điện thoại iphone">Điện thoại iphone <i class="fa fa-angle-right"></i></a>
                                           <ul class="dropdown-menu submenu-level2-children">
                                              <li>
                                                 <a href="/" class="current" title="Iphone 6">Iphone 6</a>
                                              </li>
                                              <li>
                                                 <a href="/" class="current" title="Iphone 5">Iphone 5</a>
                                              </li>
                                           </ul>
                                        </li>
                                        <li>
                                           <a href="/collections/tivi" title="Tivi">Tivi</a>
                                        <li>
                                           <a href="/collections/dien-lanh-gia-dung" title="Điện lạnh">Điện lạnh</a>
                                        <li>
                                           <a href="/collections/phu-kien-may-tinh" title="Phụ kiện máy tính">Phụ kiện máy tính</a>
                                     </ul>
                                  </li>
                                  -->
                                  <li>
                                     <a href="{{ url('pages/gioi-thieu') }}" class="" title="Giới thiệu">Giới thiệu</a>
                                  </li>
                                  <li>
                                     <a href="{{ url('post') }}" class="" title="Blog">Blog</a>
                                  </li>
                                  <li>
                                     <a href="{{ url('pages/contact') }}" class="" title="Liên hệ">Liên hệ</a>
                                  </li>
                               </ul>
                               */
                               ?>
                               <?php if( !Session::has('loginFrontend') ): ?>
                               <ul class="pull-right hidden-xs account_register">
                                  <li><a class="register_account" href="<?php echo e(url('customer/register')); ?>" title="Đăng ký">ĐĂNG KÝ</a></li>
                                  <li><a href="javascript:void(0);">hay</a></li>
                                  <li><a class="login_account" href="<?php echo e(url('customer/login')); ?>" title="Đăng nhập">Đăng nhập</a></li>
                               </ul>
                               <?php else: ?>
                               <ul class="pull-right hidden-xs account_register">
                                  <li><a href="<?php echo e(url('customer')); ?>" title="Thoát">Chỉnh sửa</a></li>
                                  <li><a href="<?php echo e(url('customer/logout')); ?>" title="Thoát">Thoát</a></li>
                               </ul>
                               <?php endif; ?>
                            </div>
                         </div>
                      </div>
                   </div>
                   <!-- End container  -->
                </nav>
                <script>
                   $(window).resize(function(){
                     $('li.dropdown li.active').parents('.dropdown').addClass('active');
                     if($('.right-menu').width() + $('#navbar').width() > $('.check_nav.nav-wrapper').width() - 40)
                     {
                             $('.container-mp.nav-wrapper').addClass('responsive-menu');
                     }
                     else{
                             $('.container-mp.nav-wrapper').removeClass('responsive-menu');
                     }
                   });
                   $('#navbar li').hover(function(){
                     $(this).toggleClass('open');
                   });
                   $(document).on("click", "ul.mobile-menu-icon .dropdown-menu ,.drop-control .dropdown-menu, .drop-control .input-dropdown", function (e) {
                     e.stopPropagation();
                   });
                </script>