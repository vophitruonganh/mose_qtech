<?php $query = isset($_GET['search']) ? $_GET['search']: ''; ?>

<?php
    $xhtml      = '';
    $total      = 0;
    $totalQty   = 0;
    if(!empty($orderCart)){
       $xhtml .= '<div class="mini-cart-content shopping_cart">
                    <div class="animated_title">
                      <p style="background: #e8e8e8;margin-bottom: 10px;">Sản phẩm trong giỏ hàng</p>
                    </div>';

        foreach($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalQty   += $quantity[$value->post_id];
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtml .=     '<div class="cart-img-details">
                              <div class="cart-img-photo"><a href="'.url('collections/'.$value->post_slug).'"><img alt="'.$value->post_title.'" src="'.loadFeatureImage($post_meta['post_featured_image']).'"></a></div>
                              <div class="cart-img-contaent">
                                <a href="'.url('collections/'.$value->post_slug).'">
                                  <h4>'.$value->post_title.'</h4>
                                </a>
                                <span>'.$quantity[$value->post_id].' x '.number_format($priceHeader[$value->post_id], 0, ',', '.').'₫</span>
                              </div>
                              <div class="pro-del"><a onclick="deletePerItem('.$value->post_id.')" ><i class="fa fa-times"></i></a></div>
                            </div>
                            <div class="clear"></div>';

        }
        $xhtml .=    '<div class="cart-inner-bottom">
                      <p class="total">Tổng tiền : <span class="amount total_price">'.number_format($total, 0, ',', '.').'₫</span></p>
                      <div class="clear"></div>
                      <p class="buttons"><a href="'.url('cart/checkout').'">Thanh toán</a></p>
                    </div>

                  </div>';
      
    }
?>

<header class="tz-header tz-header2 ">
  <div class="overlay"></div>
  <div class="header-top-bar">
    <div class="container no-pad-768">
      <div class="fvc">
        <div class="col-sm-4 col-xs-1 col-lg-9 col-md-9 no-pad-left">
          <div class="header-left">
            <div class="menu-top-menu visible-xs">
              <a href="/account/login" class=""><i class="fa fa-user"></i></a>
              <ul class="reg_mobile">
                <li><a href="/account/login">Đăng nhập</a></li>
                <li><a href="/account/register">Đăng ký</a></li>
              </ul>
            </div>
            <div class="menu-top-menu hidden-xs">
              <ul>
                @if( Session::has('loginFrontend') )
                    <li><a href="{{url('user/logout')}}">Đăng xuất</a></li>
                @else
                    <li><a href="{{url('user/login')}}">Đăng nhập</a></li>
                    <li><a href="{{url('user/register')}}">Đăng ký</a></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-xs-11 col-lg-3 col-md-3 no-pad-right">
          <div class="search-cart-list">
            <div class="header-search">
              <form action="{{url('collections')}}" method="get" >
                <div class="hiden_search">
                  <input type="text" placeholder="Tìm kiếm..." name="search" maxlength="70" value="{{$query}}">
                  <input class="hidden" type="submit" value="">
                  <button style="border:none;">
                  <i class="fa fa-search"></i>
                  </button>
                </div>
              </form>
              <button>
              <i class="fa fa-search"></i>
              </button>
            </div>
            <div class="cart-total">
              <ul>
                <li>
                  <a class="cart-toggler" href="{{url('cart')}}">
                    <span class="cart-no">
                      <span class="cart-icon"></span> 
                      <span style="color:#848484;"> Giỏ hàng:</span> (
                      <spam id="cart-total" >{{$totalQty}}</spam>
                      ) sản phẩm
                    </span>
                  </a>
                  <!--                            <div class="mini-cart-content shopping_cart">
                    <span> Giỏ hàng rỗng </span>
                    </div>-->
                    {!! $xhtml !!}
                  

                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  `
  <div class="container" id="open_menu_mobile">
    <h3 class="tz-logo pull-left hidden-xs hidden-sm">
      <a class="logo" href="//mendover-theme-1.bizwebvietnam.net">
      <img alt="Mendover Theme" src="//bizweb.dktcdn.net/100/069/071/themes/139176/assets/logo.png?1472090442121" />
      </a>
    </h3>
    <h3 class="tz-logo pull-left visible-xs visible-sm">
      <a class="logo" href="//mendover-theme-1.bizwebvietnam.net">
      <img alt="Mendover Theme" src="//bizweb.dktcdn.net/100/069/071/themes/139176/assets/logo_mobile.png?1472090442121" />
      </a>
    </h3>
    <button data-target=".nav-collapse" class="btn-navbar tz_icon_menu pull-right  visible-xs visible-sm" type="button">
    <i class="fa fa-bars"></i> MENU
    </button>
    <nav class="pull-right hidden-md hidden-lg">
      <ul class="nav-collapse">
        <li>
          <a href="{{url('/')}}">Trang chủ</a>
        </li>
        <li>
          <a href="{{url('pages/gioi-thieu')}}">Giới thiệu</a>
        </li>
        <li>
          <a href="{{url('collections')}}">Sản phẩm<span data-toggle="dropdown" class="dropdown-toggle fa fa-angle-down"></span></a>
          <!-- <div class="nav-child dropdown-menu mega-dropdown-menu">
            <div class="mega-dropdown-inner">
              <div class="row">
                <div data-width="12" class="col-md-12 mega-col-nav">
                  <div class="mega-inner">
                    <ul class="mega-nav level1">
                      <li>
                        <a href="/nha-o">Nhà ở</a>
                      </li>
                      <li>
                        <a href="/can-ho">Căn hộ</a>
                      </li>
                      <li>
                        <a href="/chung-cu">Chung cư</a>
                      </li>
                      <li>
                        <a href="/van-phong">Văn phòng</a>
                      </li>
                      <li>
                        <a href="/nha-du-an">Nhà ở dự án</a>
                      </li>
                      <li>
                        <a href="/loai-khac">Loại khác</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </li>
        <li>
          <a href="{{url('post')}}">Tin tức</a>
        </li>
        <li>
          <a href="{{url('pages/contact')}}">Liên hệ</a>
        </li>
      </ul>
    </nav>
    <!--menu di dong-->
    <nav class="pull-right hidden-xs hidden-sm" id="menu">
      <ul>
        <li><a href="{{url('/')}}">Trang chủ</a></li>
        <li> <a href="{{url('pages/gioi-thieu')}}">Giới thiệu</a></li>
        <li>
          <a href="{{url('collections')}}">Sản phẩm</a>
          <!-- <ul>
            <li><a href="/nha-o">Nhà ở</a></li>
            <li><a href="/can-ho">Căn hộ</a></li>
            <li><a href="/chung-cu">Chung cư</a></li>
            <li><a href="/van-phong">Văn phòng</a></li>
            <li>
              <a href="/nha-du-an">Nhà ở dự án</a>
              <ul>
                <li><a href="/tin-tuc">nha dat 1</a></li>
                <li><a href="/lien-he"> ở dự án 2</a></li>
              </ul>
            </li>
            <li><a href="/loai-khac">Loại khác</a></li>
          </ul> -->
        </li>
        <li><a href="{{url('post')}}">Tin tức</a></li>
        <li><a href="{{url('pages/contact')}}">Liên hệ</a></li>
      </ul>
    </nav>
  </div>
  <!--end class container-->
</header>
<div class="fix_height_mobile" style="float:left;width:100%;">
<!--dong o end footer -->