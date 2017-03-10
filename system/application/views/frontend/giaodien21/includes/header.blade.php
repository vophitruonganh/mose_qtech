<!-- Header Top -->
<div class="header-top">
    <div class="container">
       <div class="row">
          <div class="col-xs-12 col-md-6">
             <nav class="navbar-main navbar navbar-default">
                <!-- MENU MAIN -->
                <div class="nav-wrapper check_nav">
                   <div class="row">
                      <div class="navbar-header">
                         <div class="mobile-menu hidden-lg hidden-md hidden-sm">
                            <div class="container">
                               <div class="row">
                                  <div class="col-xs-12">
                                     <div class="row">
                                        <div class="mobile-menu-wrapper">
                                           <div class="navbar-header hidden-lg hidden-sm hidden-md">
                                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                              <span class="sr-only">Toggle navigation</span>
                                              <span class="icon-bar"></span>
                                              <span class="icon-bar"></span>
                                              <span class="icon-bar"></span>
                                              </button>
                                           </div>
                                        </div>
                                        <div class="navbar-header">
                                           <div class="pull-right mobile-menu-icon-wrapper">
                                              <ul class="mobile-menu-icon">
                                                 <li class="cart">
                                                    <a href="http://localhost/giaodien21/giohang.php" class="cart " title="Giỏ hàng">
                                                       <span class="fa fa-shopping-cart"></span>              
                                                       <!--<span id="cart-count">3</span-->
                                                    </a>
                                                 </li>
                                                 <li class="user"><a href="http://localhost/giaodien21/dangnhap.php" title="Đăng nhập" class="fa fa-user"></a></li>
                                              </ul>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-sm-12 col-xs-12">
                         <div id="navbar" class="navbar-collapse collapse row">
                            <ul class="nav navbar-nav clearfix">
                                <li class="active">
                                  <a href="http://localhost/giaodien21"  title="Trang chủ">
                                 Trang chủ
                                  </a>
                               </li>
                               <li>
                                  <a href="http://localhost/giaodien21/sanpham.php" class="" title="Sản phẩm">
                                 Sản phẩm
                                  </a>
                               </li>
                               <li>
                                  <a href="http://localhost/giaodien21/tintuc.php" class="" title="Blog">
                             Blog
                                  </a>
                               </li>
                               <li>
                                  <a href="http://localhost/giaodien21/gioithieu.php" class="" title="Giới thiệu">
                                Giới thiệu
                                  </a>
                               </li>
                               <li>
                                  <a href="http://localhost/giaodien21/lienhe.php" class="" title="Liên hệ">
                                Liên hệ
                                  </a>
                               </li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
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
                   })

                   $(document).on("click", "ul.mobile-menu-icon .dropdown-menu ,.drop-control .dropdown-menu, .drop-control .input-dropdown", function (e) {
                          e.stopPropagation();
                   });
                </script>
             </nav>
          </div>
          <div class="col-xs-12 col-md-6 top-wrapper hidden-xs">
             <div id="user-icon" class="pull-right">
                <ul>
               
                   <li class="tp-register"><a class="reg" href="http://localhost/giaodien21/dangky.php" title="Đăng ký"><i class="fa fa-user"aria-hidden="true"></i>Đăng ký</a></li>
                   <li> <a class="log" href="http://localhost/giaodien21/dangnhap.php" title="Đăng nhập"><i class="fa fa-lock" aria-hidden="true"></i>Đăng nhập</a></li>
                </ul>
             </div>
          </div>
       </div>
    </div>
 </div>
<!-- End Header Top -->

<!-- Header -->
<div class="wrapper">
<!--dong o footer-->
<header class="header container">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="logo col-md-3 col-xs-12">
        <!-- LOGO -->
        <h1>
          <a href="http://tp-media.myharavan.com">
          <img src="//hstatic.net/741/1000089741/1000126629/logo.png?v=1009" alt="tp-media" class="img-responsive"/>
          </a>
        </h1>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12 hidden-xs">
        <div class="search-bar">
          <form action="/search">
            <input type="hidden" name="type" value="product" />
            <input type="text" name="q" placeholder="Tìm kiếm..." />
            <button type="submit" class="search-button btn btn-tp fa fa-search cl-white"></button>
          </form>
        </div>
      </div>
      <div class="user-cart col-md-3 hidden-xs">
        <div id="cart-target2" class="cart cart-label">
          <div class="cart_text"><i class="fa fa-shopping-cart pull-left"></i>
            <span>Giỏ hàng</span>
            <a href="http://localhost/giaodien21/giohang.php" title="Giỏ hàng">                        
            <span id="cart-count2"> (3)sản phẩm </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- End Header -->