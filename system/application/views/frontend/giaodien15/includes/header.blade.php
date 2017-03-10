<!-- Menu Mobile -->
<?php $query = isset($_GET['search'])? $_GET['search'] : '' ?>
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
<div id="NavDrawer" class="drawer drawer--left">
  <div class="drawer__header">
    <div class="drawer__title h3">Duyệt</div>
    <div class="drawer__close js-drawer-close">
      <button type="button" class="icon-fallback-text">
      <span class="icon icon-x" aria-hidden="true"></span>
      <span class="fallback-text">Đóng menu</span>
      </button>
    </div>
  </div>
  <!-- begin mobile-nav -->
  <ul class="mobile-nav">
    <li class="mobile-nav__item mobile-nav__search">
      <!-- /snippets/search-bar.liquid -->
      <form action="{{url('collections')}}" method="get" class="input-group search-bar" role="search">
        <input type="search" name="search" value="{{$query}}" placeholder="Nhập vào tìm kiếm" class="input-group-field" aria-label="Nhập vào tìm kiếm">
        <span class="input-group-btn">
        <button type="submit" class="btn icon-fallback-text">
        <i class="fa fa-search" aria-hidden="true"></i>
        <span class="fallback-text">Tìm kiếm</span>
        </button>
        </span>
      </form>
    </li>
    <li class="mobile-nav__item mobile-nav__item--active">
      <a href="{{url('/')}}" class="mobile-nav__link">Trang chủ</a>
    </li>
    <li class="mobile-nav__item">
      <a href="{{url('collections')}}" class="mobile-nav__link">Sản phẩm</a>
    </li>
    <li class="mobile-nav__item">
      <a href="{{url('post')}}" class="mobile-nav__link">Tin tức</a>
    </li>
    <li class="mobile-nav__item">
      <a href="{{url('pages/gioi-thieu')}}" class="mobile-nav__link">Giới thiệu</a>
    </li>
    <li class="mobile-nav__item">
      <a href="{{url('pages/contact')}}" class="mobile-nav__link">Liên hệ</a>
    </li>
    @if( Session::has('loginFrontend') )
      <li class="mobile-nav__item">
        <a href="{{url('user/logout')}}" id="customer_login_link">Đăng xuất</a>
      </li>
    @else
      <li class="mobile-nav__item">
        <a href="{{url('user/login')}}" id="customer_login_link">Đăng nhập</a>
      </li>
      <li class="mobile-nav__item">
        <a href="{{url('user/register')}}" id="customer_register_link">Tạo tài khoản</a>
      </li>
    @endif
    
  </ul>
  <!-- //mobile-nav -->
</div>
<!-- End Menu Mobile -->

<!-- Header -->
<div id="PageContainer" class="is-moved-by-drawer">
<!--dong div cuoi footer-->
<header class="site-header">
  <div class="wrapper">
    <!-- /snippets/header.liquid -->
    <div class="header">
      <div class="site-header__topbar medium-down--hide">
        <div class="site-header__account ultility-item large--left">
          <span>
          Tài khoản
          <span class="fa fa-angle-down" aria-hidden="true"></span>
          </span>
          <ul>
             @if(Session::has('loginFrontend') )
              <li><i class="fa fa-smile-o"></i>
              <a href="{{url('user/logout')}}" class="customer_login_link">Đăng xuất</a>
              </li>
             @else
              <li><i class="fa fa-smile-o"></i>
              <a href="{{url('user/login')}}" class="customer_login_link">Đăng nhập</a>
              </li>
              <li><i class="fa fa-key"></i>
                <a href="{{url('user/register')}}" class="customer_register_link">Tạo tài khoản</a>
              </li>
             @endif
            
          </ul>
        </div>
        <!-- end account -->
        <div class="large--right">
          <a href="/cart" class="site-header__cart-toggle js-drawer-open-right" aria-controls="CartDrawer" aria-expanded="false">
            <div class="cart_n">
              <i class="lnr lnr-cart "></i>
              Giỏ hàng: 
            </div>
            <span id="CartCount">{{$totalQty}}</span>
            Sản phẩm
            <span id="CartCost">{{number_format($total, 0, ',', '.')}}₫</span>
          </a>
        </div>
        <!--  end cart -->
        <div class="site-header__search large--right">
          <!-- /snippets/search-bar.liquid -->
          <form action="{{url('collections')}}" method="get" class="input-group search-bar" role="search">
            <input type="search" name="search" value="{{$query}}" placeholder="Nhập vào tìm kiếm" class="input-group-field" aria-label="Nhập vào tìm kiếm">
            <span class="input-group-btn">
            <button type="submit" class="btn icon-fallback-text">
            <i class="fa fa-search" aria-hidden="true"></i>
            <span class="fallback-text">Tìm kiếm</span>
            </button>
            </span>
          </form>
        </div>
        <!-- end search -->
      </div>
      <div class="logo">
        <h1 class="site-header__logo" itemscope itemtype="http://schema.org/Organization">
          <a href="/" itemprop="url" class="site-header__logo-link">
          <img src="/template/giaodien15/images/logo.png?v=55" alt="basic" itemprop="logo">
          </a>
        </h1>
      </div>
      <nav class="nav-bar keep-this" role="navigation">
        <!-- /snippets/menu.liquid -->
        <div class="medium-down--hide">
          <!-- begin site-nav -->
          <ul class="site-nav" id="AccessibleNav">
            <li class="site-nav--active">
              <a href="{{url('/')}}" class="site-nav__link">Trang chủ</a>
            </li>
            <li >
              <a href="{{url('collections')}}" class="site-nav__link">Sản phẩm</a>
            </li>
            <li >
              <a href="{{url('post')}}" class="site-nav__link">Tin tức</a>
            </li>
            <li >
              <a href="{{url('pages/gioi-thieu')}}" class="site-nav__link">Giới thiệu</a>
            </li>
            <li >
              <a href="{{url('pages/contact')}}" class="site-nav__link">Liên hệ</a>
            </li>
          </ul>
          <!-- //site-nav -->
        </div>
        <div class="large--hide medium-down--show">
          <div class="grid">
            <div class="grid__item one-half">
              <div class="site-nav--mobile">
                <button type="button" class="icon-fallback-text site-nav__link js-drawer-open-left" aria-controls="NavDrawer" aria-expanded="false">
                <span class="icon icon-hamburger" aria-hidden="true"></span>
                <span class="fallback-text">Menu</span>
                </button>
              </div>
            </div>
            <div class="grid__item one-half text-right">
              <div class="site-nav--mobile">
                <a href="/cart" class="js-drawer-open-right site-nav__link" aria-controls="CartDrawer" aria-expanded="false">
                <span class="icon-fallback-text">
                <span class="sprite sprite-cart" aria-hidden="true"></span>
                <span class="fallback-text">Giỏ hàng</span>
                </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>
<!-- end header -->
<main class="main-content" role="main">
<!--dong main o dau gio mo cua-->
<!-- End Header -->