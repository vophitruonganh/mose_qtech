<div id="page">
<section id="page_content" class="">
<!--dong o footer-->
<header id="header" role="banner">
  <section class="header-container">
    <div id="topbar">
      <div class="banner">
        <div class="container">
        </div>
      </div>
      <div class="nav">
        <div class="container">
          <div id="search_block_mobile" class="pull-right">
            <div class="dropdown">
              <a  class="groupe-btn dropdown-toggle hidden-md hidden-lg" data-toggle="dropdown" aria-expanded="false">
              <span class="fa fa-search" ></span>
              </a>
              <div class="dropdown-menu pull-right fix-width">
                <form id="searchbox" class="popup-content" action="/search" method="get" role="search">
                  <input type="hidden" name="type" value="product">
                  <input id="search_query_top" class="search_query form-control" type="search" name="q" value="" placeholder="Tìm Kiếm" aria-label="Tìm Kiếm">
                  <button id="search_button" class="btn btn-sm" type="submit" >
                  <span><i class="fa fa-search"></i></span>
                  <span class="fallback-text">Tìm Kiếm</span>
                  </button>
                  <div id="ap-ajax-search" class="hidden-sm hidden-xs">
                    <ul class="list-unstyled aps-results"></ul>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div id="cart" class="blockcart_top clearfix">
            <div class="media heading">
              <a href="/cart" id="CartToggle">
                <div class="title-cart">
                  <i class="fa fa-shopping-cart "></i>
                  <span class="cart-title">Giỏ Hàng</span>
                  <span id="CartCount">0</span>
                  <span>items - </span>
                  <span id="CartCost"><span class='money'>0₫</span></span>
                </div>
              </a>
            </div>
          </div>
          <script type="text/javascript">
            $(document).ready( function(){
              if( $(window).width() < 991 ){
                  $(".header_user_info").addClass('popup-over');
                  $(".header_user_info .links").addClass('dropdown-menu');
                }
                else{
                  $(".header_user_info").removeClass('popup-over');
                  $(".header_user_info .links").removeClass('dropdown-menu');
                }
              $(window).resize(function() {
                if( $(window).width() < 991 ){
                  $(".header_user_info").addClass('popup-over');
                  $(".header_user_info .links").addClass('dropdown-menu');
                }
                else{
                  $(".header_user_info").removeClass('popup-over');
                  $(".header_user_info .links").removeClass('dropdown-menu');
                }
              });
            });
          </script>
          <div class="header_user_info e-scale">
            <div data-toggle="dropdown" class="popup-title dropdown-toggle">
              <i class="fa fa-user"></i><span>Top links</span>
            </div>
            <ul class="links">
              <li class="link_topbar"><a id="customer_login_link" href="/account/login" title="Đăng Nhập"><i class='fa fa-lock'></i>Đăng Nhập</a></li>
              <li class="link_topbar"><a id="customer_register_link" href="/account/register" title="Tên"><i class="fa fa-user"></i>Đăng ký</a></li>
              <li class="link_topbar">
                <a id="wishlist-total" title="Danh sách ưa thích" href="/pages/wish-list"><i class="fa fa-heart"></i>Danh Sách Ưa Thích</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="header-main">
      <div class="container">
        <div class="header-wrap row">
          <div class="header-left">
            <div id="header_logo">
              <div class="" itemscope itemtype="http://schema.org/Organization">
                <a href="/" itemprop="url" title="ap digital">
                <img class="img-responsive" src="//hstatic.net/768/1000048768/1000071992/logo.png?v=352" alt="ap digital" itemprop="logo">
                </a>
              </div>
            </div>
          </div>
          <div class="header-right">
            <div class="customer-service">
              <div class="support clearfix">
                <div class="media pull-left">
                  <div class="box-icon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <div class="media-body">
                    <!-- Giao - Nhận hàng Miễn Phí Vận Chuyển -->
                    <h4>Giao Nhận Hàng</h4>
                    <p><em>Hoàn Toàn Miễn Phí</em></p>
                  </div>
                </div>
                <div class="media pull-left">
                  <div class="box-icon">
                    <i class="fa fa-gift"></i>
                  </div>
                  <div class="media-body">
                    <h4>Khuyến Mại</h4>
                    <p><em>Kéo dài 3 tháng</em></p>
                  </div>
                </div>
                <div class="media pull-left">
                  <div class="box-icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <div class="media-body">
                    <h4>Hỗ Trợ Khách Hàng </h4>
                    <p><em>Luôn Trực Tuyến 24/7</em></p>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
              $(document).ready( function(){
                   $("#search_block_top").each( function(){
                    $("#search-icon").click( function(){
                           $("#searchbox").toggleClass("show");
                       });
                   });
              });
            </script>
            <div id="search_block_top" class="">
              <span id="search-icon" class="fa fa-search" title=""></span>
              <form id="searchbox" class="popup-content" action="/search" method="get" role="search">
                <input type="hidden" name="type" value="product">
                <input id="search_query_top" class="search_query form-control" autocomplete="off" type="search" name="q" value="" placeholder="Tìm Kiếm" aria-label="Tìm Kiếm">
                <button id="search_button" class="btn btn-sm" type="submit" >
                <span><i class="fa fa-search"></i></span>
                <span class="fallback-text">Tìm Kiếm</span>
                </button>
                <div id="ap-ajax-search" class="hidden-sm hidden-xs">
                  <ul class="list-unstyled aps-results"></ul>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Top Menu -->
    <div id="apollo-menu">
      <div class="container">
        <nav id="cavas_menu" class="apollo-megamenu">
          <div class="" role="navigation">
            <div class="navbar-header">
              <a class="navbar-toggle btn-menu-canvas" href="#apollo-menucanvas" title="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="fa fa-bars"></span>
              </a>
            </div>
            <div id="apollo-top-menu" class="collapse navbar-collapse">
              <ul class="nav navbar-nav megamenu">
                <li><a href="">Trang chủ</a></li>
                <li class="active"><a href="">Giới thiệu</a></li>
                <li>
                  <a href="./sanpham">Sản phẩm</a>
                  <ul>
                    <li>
                      <a href="./sanpham">Menu con 1</a>
                      <ul>
                        <li><a href="./sanpham">Menu con 1.1</a></li>
                        <li>
                          <a href="./sanpham">Menu con 1.2</a>
                          <ul>
                            <li><a href="./sanpham">Menu con 1.1</a></li>
                            <li><a href="./sanpham">Menu con 1.2</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="">Menu con 3</a></li>
                    <li><a href="">Menu con 4</a></li>
                    <li><a href="">Menu con 5</a></li>
                  </ul>
                </li>
                <li><a href="">Tin tức</a></li>
                <li><a href="">Liên hệ</a></li>
              </ul>
              <!--                     <ul class="nav navbar-nav megamenu">
                <li class="">
                   <a class="" href="/" title="Trang chủ" target="_self">
                   <span class="">Trang chủ</span>
                   </a>
                </li>
                <li class="parent dropdown active">
                   <a class="dropdown-toggle has-category" data-toggle="dropdown" href="/collections/all" title="Sản phẩm" target="_self">
                   <span class="">Sản phẩm</span><b class="caret"></b>
                   </a>
                   <div class="dropdown-menu level1">
                      <div class="dropdown-menu-inner">
                         <div class="mega-col-inner">
                            <ul>
                               <li class="">
                                  <a class="" href="/products/suspendisse-turpis-laoreet" title="Left SideBar">
                                  <span class="">Left SideBar</span>
                                  </a>
                               </li>
                               <li class="">
                                  <a class="" href="/products/curabitur-porta-aliquetnter" title="Right SideBar">
                                  <span class="">Right SideBar</span>
                                  </a>
                               </li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </li>
                <li class="parent dropdown active">
                   <a class="dropdown-toggle has-category" data-toggle="dropdown" href="/collections/all" title="Bộ Sưu Tập" target="_self">
                   <span class="">Bộ Sưu Tập</span><b class="caret"></b>
                   </a>
                   <div class="dropdown-menu level1">
                      <div class="dropdown-menu-inner">
                         <div class="mega-col-inner">
                            <ul>
                               <li class="active">
                                  <a class="" href="/collections/all" title="Left SideBar">
                                  <span class="">Left SideBar</span>
                                  </a>
                               </li>
                               <li class="">
                                  <a class="" href="/collections/camera" title="Right SideBar">
                                  <span class="">Right SideBar</span>
                                  </a>
                               </li>
                               <li class="">
                                  <a class="" href="/collections/" title="Full Width">
                                  <span class="">Full Width</span>
                                  </a>
                               </li>
                               <li class="">
                                  <a class="" href="/collections/ban-chay-nhat" title="Full Width List">
                                  <span class="">Full Width List</span>
                                  </a>
                               </li>
                               <li class="">
                                  <a class="" href="/collections/frontpage" title="Right SideBar List">
                                  <span class="">Right SideBar List</span>
                                  </a>
                               </li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </li>
                <li class="parent dropdown full-width ">
                   <a class="dropdown-toggle has-category" data-toggle="dropdown" href="/" title="Mega Menu" target="_self">
                   <span class="menu-title">Mega Menu</span><b class="caret"></b>
                   </a>
                   <div class="dropdown-sub dropdown-menu sub-apmegamenu-1" >
                      <div class="dropdown-menu-inner">
                         <div class="row">
                            <div class="mega-col col-sm-3">
                               <div class="row">
                                  <div class="col-sm-12">
                                     <div class="mega-col-inner ">
                                        <div class="menu-title">Tính Năng</div>
                                        <div class="widget-inner">
                                           <ul class="nav-links">
                                              <li><a href="/" title="Đăng Ký">Đăng Ký</a></li>
                                              <li><a href="/" title="Đăng Nhập">Đăng Nhập</a></li>
                                              <li><a href="/" title="Danh Sách Ưa Thích">Danh Sách Ưa Thích</a></li>
                                              <li><a href="/" title="Thanh Toán">Thanh Toán</a></li>
                                              <li><a href="/" title="Trả Hàng">Trả Hàng</a></li>
                                              <li><a href="/" title="Hỗ Trợ">Hỗ Trợ</a></li>
                                              <li><a href="/" title="Giao Hàng">Giao Hàng</a></li>
                                              <li><a href="/" title="Thuế">Thuế</a></li>
                                           </ul>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="mega-col col-sm-5">
                               <div class="block-video">
                                  <div class="widget-inner">
                                     <iframe width="430" height="250" src="https://www.youtube.com/embed/aE7-KZVXvJs" frameborder="0" allowfullscreen></iframe>
                                  </div>
                               </div>
                            </div>
                            <div class="mega-col col-sm-4">
                               <div class="products_menu">
                                  <div class="menu-title">
                                     Sản Phẩm Đặc Biệt
                                  </div>
                                  <div class="product-block">
                                     <div class="product-container clearfix">
                                        <div class="image ">
                                           <a class="product_img_link" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-11_small.png" alt="Aliquam sit amet">
                                           </a>
                                        </div>
                                        <div class="product-meta">
                                           <h5 class="name">
                                              <a class="product-name" href="/products/egestas-lorem-commodo" title="Aliquam sit amet">
                                              Aliquam sit amet
                                              </a>
                                           </h5>
                                           <div class="product-desc">
                                              <p>Fashion has been creating well-designed collections...
                                           </div>
                                           <div class="content_price">
                                              <span class="old-price product-price"><span class='money'>23,000,000₫</span></span>
                                              <span class="price product-price">
                                              <span class='money'>20,000,000₫</span>
                                              </span>
                                           </div>
                                        </div>
                                     </div>
                                     <div class="product-container clearfix">
                                        <div class="image ">
                                           <a class="product_img_link" href="/products/amet-nunc-consequat" title="Curabitur iaculis">
                                           <img class="replace-2x img-responsive" src="//hstatic.net/768/1000048768/1/2015/11-4/p-2_small.png" alt="Curabitur iaculis">
                                           </a>
                                        </div>
                                        <div class="product-meta">
                                           <h5 class="name">
                                              <a class="product-name" href="/products/amet-nunc-consequat" title="Curabitur iaculis">
                                              Curabitur iaculis
                                              </a>
                                           </h5>
                                           <div class="product-desc">
                                              <p>Fashion has been creating well-designed collections...
                                           </div>
                                           <div class="content_price">
                                              <span class="old-price product-price"><span class='money'>21,000,000₫</span></span>
                                              <span class="price product-price">
                                              <span class='money'>20,000,000₫</span>
                                              </span>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </li>
                <li class="">
                   <a class="" href="/blogs/news" title="Blog" target="_self">
                   <span class="">Blog</span>
                   </a>
                </li>
                <li class="">
                   <a class="" href="/pages/about-us" title="Giới thiệu" target="_self">
                   <span class="">Giới thiệu</span>
                   </a>
                </li>
                </ul>-->
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- End Menu -->
  </section>
</header>