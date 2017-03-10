<!-- Header -->
<?php $query = isset($_GET['search']) ? $_GET['search'] : ''; ?>

<?php
    $xhtml      = '';
    $total      = 0;
    $totalQty   = 0;
    if(!empty($orderCart)){
       $xhtml .= ' <ul>';

        foreach($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalQty   += $quantity[$value->post_id];
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtml .=     ' <li>
                          <div class="col-sm-3 img-cart-home"><img src="'.loadFeatureImage($post_meta['post_featured_image']).'" alt="'.$title.'" class="img-responsive"></div>
                          <div class="col-sm-6 title-cart-home">
                            <h4><a href="'.url('collections/'.$value->post_slug).'">'.$title.'</a></h4>
                            <p></p>
                            <p class="number">Số lượng: <span class="color">'.$quantity[$value->post_id].'</span></p>
                          </div>
                          <div class="col-sm-3 div-price">
                            <span class="price">'.number_format($totalPrice, 0, ',', '.').'₫</span>
                            <span class="delete"><a onclick="deletePerItem('.$value->post_id.')" class="cart"><i class="fa fa-trash"></i></a></span>
                          </div>
                        </li>';

        }
        $xhtml .=    ' <li class="toal-cart">
                          <div class="col-sm-7"><span class="bold">Tổng cộng: </span></div>
                          <div class="col-sm-5"><span class="price">'.number_format($total, 0, ',', '.').'₫</span></div>
                        </li>

                        <li class="view-cart">
                          <div class="col-sm-4 out-button">                           
                            <span>
                            <a id="click-out-cart">
                            <i class="fa fa-times"></i>
                            </a>
                            </span>
                          </div>
                          <div class="col-sm-8 cart-wrap">
                            <div><button type="button" onclick="window.location='."'".url('cart/checkout')."'".'" id="checkout" class="button-default" name="checkout" value="">Thanh toán <i class="fa fa-chevron-right"></i></button></div>
                          </div>
                        </li>

                      </ul>';
      
    }else{
      $xhtml .= '<ul><li>
                  <p class="text-center">
                     Không có sản phẩm nào trong giỏ hàng!
                  </p>
                  </li></ul>';
    }
?>
<header id="wrap-header">
  <div class="container">
    <div class="col-md-2 col-sm-12 col-xs-12 logo">
      <h2><a href="http://smart.myharavan.com"><img src="//hstatic.net/385/1000031385/1000050128/logo.png?v=133" alt="Smart" class="img-responsive"/></a></h2>
    </div>
    <!--end .col-md-2 col-sm-12 col-xs-12-->
    <div class="col-md-10 col-sm-12 col-xs-12">
      <ul class="list-login-right pull-right">
        @if( Session::has('loginFrontend') )
        <li>
            <a href="{{url('user/logout')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
        </li>
         @else
        <li>
          <a href="{{url('user/register')}}"><i class="fa fa-user"></i> Đăng ký</a>
        </li>
        <li>
          <a href="{{url('user/login')}}"><i class="fa fa-sign-in"></i> Đăng nhập</a>
        </li>
        @endif
      </ul>
      <div class="menu-left-bottom">
        <nav id="menu" class="hidden-xs">
          <div class="menu-1">
            <div class="main-menu">
              <div class="menu">
                <div class="bg">
                  <ul id="ddmenu" class="ddmenu">
                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                    <li>
                      <a href="{{url('collections')}}">Sản phẩm</a>
                      <!-- <ul>
                        <li><a href="/collections/laptop">Apple</a>
                        </li>
                        <li><a href="/collections/laptop">Samsung</a>
                        </li>
                        <li><a href="/collections/laptop">Asus</a>
                        </li>
                        <li><a href="/collections/laptop">HP</a>
                        </li>
                        <li><a href="/collections/laptop">Lenovo</a>
                        </li>
                      </ul> -->
                    </li>
                    <li>
                      <a href="{{url('collections/san-pham-noi-bat')}}">Sản phẩm nổi bật</a>
                      <!-- <ul>
                        <li>
                          <a href="/collections/dien-thoai">Lenovo</a>
                          <ul>
                            <li>
                              <a href="/collections/may-tinh-bang">Máy tính bảng</a>
                              <ul>
                                <li>
                                  <a href="/collections/may-tinh-bang">Máy tính bảng</a>
                                </li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                      </ul> -->
                    </li>
                    <li>
                      <a href="{{url('collections/discount')}}">Sản phẩm khuyến mãi</a>
                    </li>
                    <!-- <li>
                      <a href="/collections/phu-kien">Phụ kiện</a>
                    </li> -->
                    <li><a href="{{url('pages/gioi-thieu')}}">Giới thiệu</a></li>
                  </ul>
                  <ul id="ddmenu2" class="ddmenu2">
                    <li class="list-cart-search">
                      <div class="menu-right-bottom">
                        <ul>
                          <li id="cart"><a href="javascript:void(0)" id="cart-click"><i class="fa fa-cart-plus"></i></a> <span>({{$totalQty}})</span></li>
                          <li class="search-home"><a href="javascript:void(0)" id="search"><i class="fa fa-search"></i></a>                           
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                  <div class="table-cart-home">
                    <form action="{{url('cart')}}" method="post" id="cartformpage">
                       {!! $xhtml !!}
                     
                    </form>
                  </div>
                </div>
              </div>
              <!-- End .col-md-12 -->                     
            </div>
            <!-- End .container -->
          </div>
          <!-- End .menu-1 -->    
        </nav>
      </div>
    </div>
    <!--end .col-md-10 col-sm-12 col-xs-12-->
    <div id="cd-search">
      <form action="{{url('collections')}}" method="GET" class="wrap-search-home">    
        <input type="submit" name="" value="Tìm" id="btnSearch" class="search-button">
        <!-- <input type="hidden" name="type" value="product" class="search-input" placeholder="Tìm kiếm ..."> -->
        <input type="text" name="search" class="search-input" value="{{$query}}" placeholder="Tìm kiếm ...">                              
      </form>
    </div>
  </div>
  <!--end .container-->
  <script>
    var flagtable = 'hide';
    var flag2 = 'search-hide';
    $('#cart-click').click(function(){
            if (flagtable == 'hide'){
                    $('.table-cart-home').addClass('show-table');
                    flagtable = 'show';
            }
            else if (flagtable == 'show'){
                    $('.table-cart-home').removeClass('show-table');
                    flagtable = 'hide';
            }   
    });
    $('#click-out-cart').click(function(){
            if (flagtable == 'show'){
                    $('.table-cart-home').removeClass('show-table');
                    flagtable = 'hide';
            }
    });
    $('.search-home a#search').click(function(){
            if (flag2 == 'search-hide'){
                    $('.wrap-search-home').addClass('show-search');
                    $('.search-home #search i').removeClass('fa-search');
                    $('.search-home #search i').addClass('fa-times');
                    flag2 = 'search-show';
            }
            else if (flag2 == 'search-show'){
                    $('.wrap-search-home').removeClass('show-search');
                    $('.search-home #search i').removeClass('fa-times');
                    $('.search-home #search i').addClass('fa-search');
                    flag2 = 'search-hide';
            }
    });
  </script>
  <script>
    $(window).bind('scroll', function(){
            if($(window).scrollTop() > 50){
                    $('#wrap-header-mobile').addClass('fixed');
                    $('.wrap-mobile-search').addClass('show-none');
            } else{
                    $('#wrap-header-mobile').removeClass('fixed');
                    $('.wrap-mobile-search').removeClass('show-none');
            }
    });
  </script>
</header>
<!-- End Header -->

<!-- Menu Di Động -->
<section id="wrap-header-mobile">
  <div class="col-sm-3 col-xs-4 header-moible-left">
    <nav id="menu-mobile" class="left visible-xs">
      <ul>
        <li><a id="click-out-menu"><i class="fa fa-times"></i></a></li>
        <li><a href="/">Trang chủ</a></li>
        <li>
          <a href="javascript:void(0)" class="submenu-click">Laptop <i class="fa fa-caret-right"></i></a>
          <ul class="sub-menu-mobile">
            <li>
              <a href="/collections/laptop"><span>Apple</span></a>  
            </li>
            <li>
              <a href="/collections/laptop"><span>Samsung</span></a>  
            </li>
            <li>
              <a href="/collections/laptop"><span>Asus</span></a> 
            </li>
            <li>
              <a href="/collections/laptop"><span>HP</span></a> 
            </li>
            <li>
              <a href="/collections/laptop"><span>Lenovo</span></a> 
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:void(0)" class="submenu-click">Điện thoại <i class="fa fa-caret-right"></i></a>
          <ul class="sub-menu-mobile">
            <li>
              <a href="/collections/dien-thoai"><span>Iphone 6 & 6 Plus</span></a>  
            </li>
            <li>
              <a href="/collections/dien-thoai"><span>Iphone 5 & 5S</span></a>  
            </li>
            <li>
              <a href="/collections/dien-thoai"><span>Galaxy</span></a> 
            </li>
            <li>
              <a href="/collections/dien-thoai"><span>Nokia</span></a>  
            </li>
            <li>
              <a href="/collections/dien-thoai"><span>Lenovo</span></a> 
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:void(0)" class="submenu-click">Máy tính bảng <i class="fa fa-caret-right"></i></a>
          <ul class="sub-menu-mobile">
            <li>
              <a href="/collections/may-tinh-bang"><span>iPad</span></a>  
            </li>
            <li>
              <a href="/collections/may-tinh-bang"><span>Kindle</span></a>  
            </li>
            <li>
              <a href="/collections/may-tinh-bang"><span>Asus</span></a>  
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:void(0)" class="submenu-click">Phụ kiện <i class="fa fa-caret-right"></i></a>
          <ul class="sub-menu-mobile">
            <li>
              <a href="/collections/phu-kien"><span>Tai nghe</span></a> 
            </li>
            <li>
              <a href="/collections/phu-kien"><span>Cáp sạc</span></a>  
            </li>
            <li>
              <a href="/collections/phu-kien"><span>Chuột & Bàn phím</span></a> 
            </li>
            <li>
              <a href="/collections/phu-kien"><span>Case điện thoại</span></a>  
            </li>
          </ul>
        </li>
        <li><a href="/pages/about-us">Giới thiệu</a></li>
      </ul>
    </nav>
    <a href="javascript:void(0)" id="showmenu"> <i class="fa fa-align-justify"></i></a> 
  </div>
  <!--end .col-sm-2 header-moible-left-->
  <div class="col-sm-8 col-xs-4 header-mobile-center">
    <a href="http://smart.myharavan.com"><img src="//hstatic.net/385/1000031385/1000050128/logo.png?v=133" alt="Smart" class="img-responsive"/></a>
  </div>
  <!--end .col-sm-2 header-mobile-center-->
  <div class="col-sm-2 col-xs-4 header-mobile-right">
    <a href="http://localhost/giaodien18/giohang.php"><span>(0)</span><span><i class="fa fa-cart-plus"></i></span></a>
  </div>
  <!--end .col-sm-2 header-mobile-right-->
  <div class="col-xs-12 wrap-mobile-search">
    <form action="{{url('collections')}}" method="GET" class="mobile-search-home">    
      <input type="submit" name="" value="Tìm" id="btnSearch" class="search-button" />
     <!--  <input type="hidden" name="type" value="product" class="search-input" placeholder="Tìm kiếm ..." /> -->
      <input type="text" name="search" value="{{$query}}" class="search-input" placeholder="Tìm kiếm ..." />                             
    </form>
  </div>
</section>
<script>
  $('#click-out-menu').click(function(){
     $('.header-moible-left .visible-xs').removeClass('show');
  });
  $('.submenu-click').click(function(e){
  e.preventDefault();
  ul = $(this).next('ul');
  if(ul.is(':visible'))$(this).next('ul').slideUp();
  else $(this).next('ul').slideDown();
  
  })
</script>
<!-- End Menu Di Động -->