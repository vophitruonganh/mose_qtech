<!-- Header -->
<?php $query = isset($_GET['search']) ? $_GET['search']: ''; ?>
<?php
    $totalQty   = 0;
    if(!empty($orderCart)){

        foreach($orderCart as $key => $value){
            $totalQty   += $quantity[$value->post_id];
        }
       
      
    }
     
?>
<header class="header-container">
  <div class="header container">
    <div class="row">
      <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
        <!-- Header Logo -->
        <h1>
          <a class="logo" title="Magento Commerce" href="http://hkdev.myharavan.com"><img alt="hkdev" src="//hstatic.net/817/1000069817/1000098314/logo.png?v=1205"></a>
        </h1>
        <!-- End Header Logo -->
      </div>
      <div class="col-lg-7 col-sm-4 col-md-5 col-xs-12">
        <!-- Search-col -->
        <div class="search-box">
          <form class="search" action="{{url('collections')}}" method="GET">
            <input type="text"  name="search" id="search" class="search_box" placeholder="Tìm kiếm" value="{{$query}}"  />
            <button id="submit" class="search-btn-bg">
            <span>Search</span>
            </button>               
          </form>
        </div>
        <!-- End Search-col -->
      </div>
      <!-- Top Cart -->
      <div class="col-lg-3 col-sm-5 col-md-4 col-xs-12">
        <div class="top-cart-contain">
          <div class="mini-cart">
            <a href="{{url('cart')}}">
              <i class="fa fa-shopping-cart"></i>
              <div class="cart-box">
                <span class="title">My Cart</span><span id="cart-total"> {{$totalQty}} </span>
              </div>
            </a>
          </div>
        </div>
         @if( Session::has('loginFrontend') )
            <div class="signup"><a title="Login" href="{{url('user/logout')}}"><span>Đăng xuất</span></a> </div>
         @else
            <div class="signup"><a title="Login" href="{{url('user/login')}}"><span>Đăng nhập</span></a> </div>
            <span class="or"> | </span>
            <div class="login"><a title="Login" href="{{url('user/register')}}"><span>Đăng ký</span></a> </div>
         @endif
        
      </div>
      <!-- End Top Cart -->
    </div>
  </div>
</header>
<!-- End Header -->

<!-- Nav -->
<nav>
  <div class="container">
  <div class="nav-inner">
    <!-- mobile-menu -->
    <div class="hidden-desktop" id="mobile-menu">
      <ul class="navmenu">
        <li>
          <div class="menutop">
            <div class="toggle">
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </div>
            <h2>Menu</h2>
          </div>
          <ul style="display: none;" class="submenu">
            <li>
              <ul class="topnav">
                <li class="active level1">
                  <a class=" current" href="{{url('/')}}" title="Trang chủ" target="_self">
                  <span class="">Trang chủ</span>
                  </a>
                </li>
                <li class=" level1">
                  <a class="" href="{{url('collections')}}" title="Sản phẩm" target="_self">
                  <span class="">Sản phẩm</span>
                  </a>
                </li>
                <!-- <li class=" level1">
                  <a class="" href="/collections/all" title="Bộ sưu tập" target="_self">
                  <span class="">Bộ sưu tập</span>
                  </a>
                </li> --> 
                <!-- <li class=" level1">
                  <a class="" href="/collections/all" title="Sản phẩm hot" target="_self">
                  <span class="">Sản phẩm hot</span>
                  </a>
                </li> -->

             <!--   <li class="  level0 nav-6 level-top ">
                  <a class="dropdown-toggle has-category " data-toggle="dropdown" href="/collections/all" title="Sản phẩm nỗi bật" target="_self">
                  <span class="">Sản phẩm nỗi bật</span>
                  </a>
                  <ul class="level0" role="menu" style="display: none;">
                    <li>
                      <a href="/" class="current" title="Ốp lưng">Ốp lưng</a>
                      <ul class="level2">
                        <li>
                          <a href="/" class="current" title="Ốp lưng 1">Ốp lưng 1</a>
                        </li>
                        <li>
                          <a href="/" class="current" title="Ốp lưng 2">Ốp lưng 2</a>
                        </li>
                        <li>
                          <a href="/" class="current" title="Ốp lưng 3">Ốp lưng 3</a>
                        </li>
                        <li>
                          <a href="/" class="current" title="Ốp lưng 4">Ốp lưng 4</a>
                        </li>
                        <li>
                          <a href="/" class="current" title="Ốp lưng 5">Ốp lưng 5</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="/" class="current" title="Loa laptop">Loa laptop</a>
                    </li>
                    <li>
                      <a href="/" class="current" title="Tai nghe">Tai nghe</a>
                      <ul class="level2">
                        <li>
                          <a href="/" class="current" title="Tai nghe 1">Tai nghe 1</a>
                        </li>
                        <li>
                          <a href="/" class="current" title="Tai nghe 2">Tai nghe 2</a>
                        </li>
                        <li>
                          <a href="/" class="current" title="Tai nghe 3">Tai nghe 3</a>
                        </li>
                        <li>
                          <a href="/" class="current" title="Tai nghe 4">Tai nghe 4</a>
                        </li>
                        <li>
                          <a href="/" class="current" title="Tai nghe 5">Tai nghe 5</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="/" class="current" title="Đế tản nhiệt">Đế tản nhiệt</a>
                    </li>
                    <li>
                      <a href="/" class="current" title="Sạt dự phòng">Sạt dự phòng</a>
                    </li>
                  </ul>
                </li> -->

                <li class=" level1">
                  <a class="" href="{{url('post')}}" title="Blog" target="_self">
                  <span class="">Blog</span>
                  </a>
                </li>
                <li class=" level1">
                  <a class="" href="{{url('pages/contact')}}" title="Liên hệ" target="_self">
                  <span class="">Liên hệ</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <!--navmenu-->
    </div>
    <!--End mobile-menu -->
    <a class="logo-small" title="Magento Commerce" href="/">
    <img alt="Magento Commerce" src="//hstatic.net/817/1000069817/1000098314/logo-menu.png?v=1205">
    </a>
    <div id="menu">
      <ul id="nav" class="hidden-xs hidden-sm t-menu">
        <li class="active"><a href="{{url('/')}}">Trang chủ</a></li>
        <li>
          <a href="{{url('collections')}}">Sản phẩm</a>
          <!-- <ul>
            <li>
              <a href="">Điện thoại Iphone 4s</a>
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
              </ul> -->
            </li>
            <!-- <li><a href="">Laptop Asus A556UF i5 </a></li>
            <li><a href="">Loa laptop FC-300L4</a></li>
            <li><a href="">Headphone Beats White </a></li> -->
          </ul>
        </li>
        <!-- <li><a href=""> Sản phẩm hot</a></li>
        <li><a href="">Sản phẩm nổi bật</a></li> -->
        <li><a href="{{url('post')}}">Blog</a></li>
        <li><a href="{{url('pages/contact')}}">Liên hệ</a></li>
      </ul>
      </menu>
    </div>
  </div>
</nav>
<!-- End Nav -->