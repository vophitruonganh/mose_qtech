<!-- Menu Mobile -->
<?php $query = isset($_GET['search'])? $_GET['search'] : ''; ?>
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
      <form action="/search" method="get" class="input-group search-bar" role="search">
        <input type="search" name="q" value="" placeholder="Nhập vào tìm kiếm" class="input-group-field" aria-label="Nhập vào tìm kiếm">
        <span class="input-group-btn">
        <button type="submit" class="icon-fallback-text">
        <i class="fa fa-search" aria-hidden="true"></i>
        <span class="fallback-text">Tìm kiếm</span>
        </button>
        </span>
      </form>
    </li>
    <li class="mobile-nav__item mobile-nav__item--active">
      <a href="/" class="mobile-nav__link">Trang chủ</a>
    </li>
    <li class="mobile-nav__item" aria-haspopup="true">
      <div class="mobile-nav__has-sublist">
        <a href="<?php echo e(url('collections')); ?>" class="mobile-nav__link">Sản phẩm</a>
        <!-- <div class="mobile-nav__toggle">
          <button type="button" class="icon-fallback-text mobile-nav__toggle-open">
          <span class="icon icon-plus" aria-hidden="true"></span>
          <span class="fallback-text">See More</span>
          </button>
          <button type="button" class="icon-fallback-text mobile-nav__toggle-close">
          <span class="icon icon-minus" aria-hidden="true"></span>
          <span class="fallback-text">"Đóng Giỏ hàng"</span>
          </button>
        </div> -->
      </div>
      <ul class="mobile-nav__sublist">
        <!-- <li class="awemenu-megamenu-item">
          <div class="grid">
            <div class="grid__item large--one-fifth">
              <h3>Thời trang</h3>
              <ul class="super">
              </ul>
            </div>
            <div class="grid__item large--one-fifth">
              <h3>Điện tử</h3>
              <ul class="super">
              </ul>
            </div>
            <div class="grid__item large--one-fifth">
              <h3>Thể hình</h3>
              <ul class="super">
              </ul>
            </div>
            <div class="grid__item large--one-fifth">
              <h3>Featured</h3>
              <ul class="super">
              </ul>
            </div>
            <div class="grid__item large--one-fifth">
              <h3>Cữa hàng</h3>
              <a href="/collections/all">
              <img src="//hstatic.net/030/1000104030/1000147045/megamenu_1_image_1.jpg?v=96" alt="image">
              </a>
            </div>
          </div>
        </li> -->
      </ul>
    </li>
    <li class="mobile-nav__item">
      <a href="<?php echo e(url('post')); ?>" class="mobile-nav__link">Tin tức</a>
    </li>
    <li class="mobile-nav__item">
      <a href="<?php echo e(url('pages/gioi-thieu')); ?>" class="mobile-nav__link">Giới thiệu</a>
    </li>
    <li class="mobile-nav__item">
      <a href="<?php echo e(url('pages/contact')); ?>" class="mobile-nav__link">Liên hệ</a>
    </li>
    <?php if( Session::has('loginFrontend') ): ?>
            <li class="mobile-nav__item">
              <a href="<?php echo e(url('user/logout')); ?>" id="customer_login_link">Đăng xuất</a>
          </li>
     <?php else: ?>
       <li class="mobile-nav__item">
          <a href="<?php echo e(url('user/login')); ?>" id="customer_login_link">Đăng nhập</a>
      </li>
      <li class="mobile-nav__item">
         <a href="<?php echo e(url('user/register')); ?>" id="customer_register_link">Tạo tài khoản</a>
      </li>
     <?php endif; ?>
    
  </ul>
  <!-- //mobile-nav -->
</div>
<!-- End Menu Mobile -->

<!-- Header -->
<div id="PageContainer" class="is-moved-by-drawer">
<!--dong cuoi footer-->
<header class="site-header">
  <!-- /snippets/header.liquid -->
  <div class="header">
    <div class="site-header__topbar keep-this">
      <div class="logo large--left">
        <h1 class="site-header__logo" itemscope itemtype="http://schema.org/Organization">
          <a href="/" itemprop="url" class="site-header__logo-link">
          <img src="//hstatic.net/030/1000104030/1000147045/logo.png?v=96" alt="OneShop" itemprop="logo">
          </a>
        </h1>
      </div>
      <nav class="nav-bar large--left " role="navigation">
        <!-- end category -->
        <!-- /snippets/menu.liquid -->
        <div class="megamenu large--left">
          <div class="medium-down--hide" id="menu">
            <!-- begin site-nav -->
            <ul class="site-nav" id="AccessibleNav">
              <li><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
              <li  class="active">
                <a href="<?php echo e(url('collections')); ?>">Sản phẩm</a>
               <!-- <ul>
                  <li>
                    <a href="">Menu con 1</a>
                    <ul>
                      <li><a href="">Menu con 1.1</a></li>
                      <li>
                        <a href="">Menu con 1.2</a>
                        <ul>
                          <li><a href="">Menu con 1.1</a></li>
                          <li><a href="">Menu con 1.2</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="">Menu con 3</a></li>
                  <li><a href="">Menu con 4</a></li>
                  <li><a href="">Menu con 5</a></li>
                </ul> -->
              </li>
              <li><a href="<?php echo e(url('post')); ?>">Tin tức</a></li>
              <li><a href="<?php echo e(url('pages/gioi-thieu')); ?>">Giới thiệu</a></li>
              <li><a href="<?php echo e(url('pages/contact')); ?>">Liên hệ</a></li>
            </ul>
            <!-- //site-nav -->
          </div>
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
                <a href="<?php echo e(url('cart')); ?>" class="js-drawer-open-right site-nav__link" aria-controls="CartDrawer" aria-expanded="false">
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
      <div class="large--right ultility-item top-cart medium-down--hide ">
        <a href="<?php echo e(url('cart')); ?>" class="site-header__cart-toggle js-drawer-open-right" aria-controls="CartDrawer" aria-expanded="false">
        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        </a>
      </div>
      <!--  end cart -->
      <div class="site-header__account ultility-item large--right medium-down--hide ">
        <span><i class="fa fa-user"></i>
        </span>
        <ul>
            <?php if( Session::has('loginFrontend') ): ?>
                <li><i class="fa fa-smile-o"></i>
                  <a href="<?php echo e(url('user/logout')); ?>" class="customer_login_link">Đăng xuất</a>
                </li>
             <?php else: ?>
                <li><i class="fa fa-smile-o"></i>
                  <a href="<?php echo e(url('user/login')); ?>" class="customer_login_link">Đăng nhập</a>
                </li>
                <li><i class="fa fa-key"></i>
                  <a href="<?php echo e(url('user/register')); ?>" class="customer_register_link">Tạo tài khoản</a>
                </li>
             <?php endif; ?>
        </ul>
      </div>
      <!-- end account -->
      <div class="site-header__search large--right  medium-down--hide">
        <!-- /snippets/search-bar.liquid -->
        <form action="<?php echo e(url('collections')); ?>" method="get" class="input-group search-bar" role="search">
          <input type="search" name="search" value="<?php echo e($query); ?>" placeholder="Nhập vào tìm kiếm" class="input-group-field" aria-label="Nhập vào tìm kiếm">
          <span class="input-group-btn">
          <button type="submit" class="icon-fallback-text">
          <i class="fa fa-search" aria-hidden="true"></i>
          <span class="fallback-text">Tìm kiếm</span>
          </button>
          </span>
        </form>
      </div>
      <!-- end search -->
    </div>
  </div>
</header>
<!-- End Header -->