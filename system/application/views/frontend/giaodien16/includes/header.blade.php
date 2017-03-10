<?php $query = isset($_GET['search'])? $_GET['search']: ''; ?>
<!-- CHEN POPUP -->
<?php
    $xhtml      = '';
    $total      = 0;
    $totalQty   = 0;
    if(!empty($orderCart)){
       $xhtml .= '<div>
                    <div class="top-cart-content arrow_box">
                      <div class="block-subtitle">Sản phẩm đã cho vào giỏ hàng</div>
                      <ul id="cart-sidebar" class="mini-products-list">';
        foreach($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalQty   += $quantity[$value->post_id];
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtml .= '<li class="item">
                          <a class="product-image" href="'.url('collections/'.$value->post_slug).'" title="'.$title.'"><img alt="'.$value->post_title.'" src="'.loadFeatureImage($post_meta['post_featured_image']).'" width="80"></a>
                          <div class="detail-item">
                            <div class="product-details">
                              <a href="javascript:void(0);" title="Xóa" onclick="deletePerItem('.$value->post_id.')" class="fa fa-remove">&nbsp;</a>
                              <p class="product-name"> <a href="'.url('collections/'.$value->post_slug).'" title="'.$value->post_title.'">'.$title.'</a></p>
                            </div>
                            <div class="product-details-bottom"> <span class="price">'.number_format($priceHeader[$value->post_id], 0, ',', '.').'₫</span> <span class="title-desc">Số lượng:</span> <strong>'.$quantity[$value->post_id].'</strong> </div>
                          </div>
                        </li>';
        }
        $xhtml .= ' <div style="float:left; height:102px;"></div>
                        <li class="cart_fix_1">
                          <div class="top-subtotal">Tổng cộng: <span class="price">'.number_format($total, 0, ',', '.').'₫</span></div>
                        </li>
                        <li class="cart_fix_2" style="margin-left:-15px;margin-right:-15px;">
                          <div class="actions"><button class="btn-checkout" type="button" onclick="window.location.href='."'".url('cart/checkout')."'".'"><span>Thanh toán</span></button><button class="view-cart" type="button" onclick="window.location.href='."'".url('cart')."'".'"><span>Giỏ hàng</span></button></div>
                        </li>';
        $xhtml .= '</ul></div></div>';
    }
?>
<header>
  <div class="header-container">
    <div class="header-top hidden-sm hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-xs-7">
            <div class="welcome-msg">Chào mừng bạn đã đến với Big Shoe! </div>
          </div>
          <div class="social-sharing pull-right">
            <div onclick="location.href=''"><i class="fa fa-facebook" aria-hidden="true"></i></div>
            <div onclick="location.href=''"><i class="fa fa-twitter" aria-hidden="true"></i></div>
            <div onclick="location.href=''"><i class="fa fa-google-plus" aria-hidden="true"></i></div>
            <div onclick="location.href=''"><i class="fa fa-youtube-play" aria-hidden="true"></i></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container header_main hidden-xs">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-8">
          <div class="logo">
            <a title="Big Shoe" href="/">
            <img alt="Big Shoe" src="//bizweb.dktcdn.net/100/091/132/themes/139143/assets/logo.png?1471504577257">
            </a> 
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12 search">
          <div class="search_vector hidden-sm hidden-xs">
            <ul>
             <!--  <h5>Xu hướng tìm kiếm</h5>
              <li><a href="/giay-converse">Converse 2016</a></li>
              <li><a href="/giay-da">Giày da</a></li>
              <li><a href="/giay-thoi-trang-nam">Giày thời trang nam</a></li> -->
            </ul>
          </div>
          <div class="search_form">
            <form action="{{url('collections')}}" method="get" class="search-form" role="search">
              <input placeholder="Nhập từ khóa cần tìm" class="search_input" type="text" name="search" value="{{$query}}" />
              <input type="submit" value="Tìm kiếm" class="btnsearch" />
            </form>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 hidden-xs account-cart">
          <div class="col-lg-6 col-md-6 col-sm-8 col-xs-6 account">
            <div>
              <img class="mg_bt_10" src="{{asset('template/giaodien16/asset/images/account.png')}}" height="31" width="31" alt="Account"/>
            </div>
            <div>
              <span>
              @if( Session::has('loginFrontend') )
                <a class="cl_old" href="{{url('user/logout')}}">Đăng xuất</a>
              @else
                <a class="cl_old" href="{{url('user/login')}}">Đăng nhập</a> / <a class="cl_old" href="{{url('user/register')}}">Đăng ký</a>
              @endif
              </span>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-4 col-xs-6 cart">
            <div class="top-cart-contain">
              <div class="mini-cart">

                <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                  <a href="{{url('cart')}}">
                    <div>
                      <img class="mg_bt_10" src="{{asset('template/giaodien16/asset/images/cart.png')}}" height="31" width="31" alt="cart" />
                    </div>
                    <div class="cart-box">
                      <span class="title cl_old">Giỏ hàng</span>
                      <span id="cart-total">{{$totalQty}}</span>
                    </div>
                  </a>
                </div>

                {!! $xhtml !!}

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="container hidden-lg hidden-md hidden-sm mobile_menu">
      <div class="row">
        <div class="logo">
          <a title="Big Shoe" href="/">
          <img alt="Big Shoe" src="//bizweb.dktcdn.net/100/091/132/themes/139143/assets/logo.png?1471504577257 ">
          </a> 
        </div>
        <div class="col-xs-2" id="mobile-menu">
          <ul class="navmenu">
            <li>
              <div class="menutop">
                <div class="toggle">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </div>
              </div>
              <div class="top-cart-contain">
                <a href="/cart">
                  <div>
                    <img src="asset/images/cart.png?1471504577257" width="32" alt="cart"/>
                  </div>
                  <div class="cart-box">
                    <span id="cart-total">0</span>
                  </div>
                </a>
              </div>
              <ul class="submenu">
                <li>
                  <ul class="topnav">
                    <li class="level0 level-top parent"> <a class="level-top" href="{{url('/')}}"> <span>Trang chủ</span> </a> </li>
                    <li class="level0 level-top parent"> <a class="level-top" href="{{url('pages/gioi-thieu')}}"> <span>Giới thiệu</span> </a> </li>
                    <li class="level0 level-top parent">
                      <a class="level-top" href="{{url('collections')}}"> <span>Sản phẩm</span> </a>
                      <!-- <ul class="level0">
                        <li class="level1"> <a href="/san-pham-moi-ve"> <span>Bộ sưu tập mới</span> </a></li>
                        <li class="level1">
                          <a href="/giay-thoi-trang-nam"> <span>Giày thời trang nam</span> </a>
                          <ul class="level1">
                            <li class="level2"><a href="/giay-da"><span>Giày da</span></a></li>
                            <li class="level2"><a href="/giay-vai"><span>Giày vải</span></a></li>
                            <li class="level2"><a href="/giay-converse"><span>Giày Converse</span></a></li>
                            <li class="level2"><a href="/giay-vans"><span>Giày Vans</span></a></li>
                            <li class="level2"><a href="/giay-lacoste"><span>Giày Lacoste</span></a></li>
                            <li class="level2"><a href="/giay-d-g"><span>Giày D&G</span></a></li>
                            <li class="level2"><a href="/giay-bata"><span>Giày Bata</span></a></li>
                          </ul> -->
                        </li>
                        <li class="level1">
                          <a href="/giay-thoi-trang-nu"> <span>Giày thời trang nữ</span> </a>
                          <ul class="level1">
                            <li class="level2"><a href="/giay-converse"><span>Giày Converse</span></a></li>
                          </ul>
                        </li>
                        <li class="level1"> <a href="/giay-mua-he"> <span>Giày mùa hè</span> </a></li>
                        <li class="level1"> <a href="/giay-cong-so"> <span>Giày công sở</span> </a></li>
                        <li class="level1"> <a href="/giay-the-thao"> <span>Giày thể thao</span> </a></li>
                        <li class="level1"> <a href="/giay-di-choi"> <span>Giày đi chơi</span> </a></li>
                        <li class="level1"> <a href="/giay-tre-em"> <span>Giày trẻ em</span> </a></li>
                        <li class="level1"> <a href="/"> <span>Giày</span> </a></li>
                      </ul>
                    </li>
                    <li class="level0 level-top parent"> <a class="level-top" href="/tin-tuc"> <span>Tin tức - Blog</span> </a> </li>
                    <li class="level0 level-top parent"> <a class="level-top" href="/ban-do"> <span>Bản đồ</span> </a> </li>
                    <li class="level0 level-top parent"> <a class="level-top" href="/lien-he"> <span>Liên hệ</span> </a> </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
<nav class="hidden-xs">
  <div class="container">
    <div class="row nav_menu">
      <div class="nav-inner" id="menu">
        <ul id="nav">
          <li><a href="{{url('/')}}">Trang chủ</a></li>
          <li class="active"><a href="{{url('pages/gioi-thieu')}}">Giới thiệu</a></li>
          <li>
            <a href="{{url('collections')}}">Sản phẩm</a>
            <!-- <ul>
              <li>
                <a href="">Danh mục </a>
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
              <li><a href="">Menu con 5</a></li>
              <li><a href="">Menu con 6</a></li>
              <li><a href="">Menu con 5</a></li>
              <li><a href="">Menu con 5</a></li>
            </ul> -->
          </li>
          <li><a href="{{url('post')}}">Tin tức - Blog</a></li>
          <li><a href="{{url('pages/contact')}}">Liên hệ</a></li>
        </ul>
        <div class="nav_hotline pull-right hidden-xs hidden-sm">
          <img src="{{asset('template/giaodien16/asset/images/call_white.png')}}" width="30" alt="Hotline"/> Hotline : 1900 6750
        </div>
      </div>
    </div>
  </div>
</nav>
<h1 class="page_title_hide">Big Shoe</h1>
<div class="hidden-lg hidden-md hidden-sm col-xs-12 bar_mobile">
  <div class="search_form col-xs-10">
    <form action="url('collections')" method="get" class="search-form" role="search">
      <input placeholder="Nhập từ khóa cần tìm" class="search_input" type="text" name="search" value="{{$query}}" />
      <input type="submit" value="&nbsp" class="btnsearch" />
    </form>
  </div>
  <div class="col-xs-2">
    <a href="tel: 1900 6750">
    <img src="asset/images/call.png?1471504577257" width="30" alt="Hotline"/>
    </a>
  </div>
</div>