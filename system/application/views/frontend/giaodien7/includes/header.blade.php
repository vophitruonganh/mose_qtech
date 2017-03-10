<header>
<?php 
/*Lây từ khóa*/ 
    $search= isset($_GET['search'])? $_GET['search'] : '';
    /*end*/ 
    $xhtml      = '';
    $total      = 0;
    $total_quantity = 0;
    $order_cart = decode_serialize (Cookie::get('cart'));
    if(!empty($order_cart))
    {
         $xhtml .= '<div><div style="display: none;" class="top-cart-content arrow_box">';
         $xhtml .= '<div class="block-subtitle">Sản phẩm đã cho vào giỏ hàng</div>';
         $xhtml .= '<ul id="cart-sidebar" class="mini-products-list">';
         foreach($order_cart as $cart){
            $total_price = $cart['price'] * $cart['quantity'];
            $total_quantity += $cart['quantity'];
            $total+= $total_price;
            $xhtml      .= '<li class="item">
                              <a class="product-image" href="'.url('collections/'.$cart['product_slug']).'" title="'.$cart['product_title'].'"><img alt="'.$cart['product_title'].'" src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'" width="80"></a>
                              <div class="detail-item">
                                 <div class="product-details">
                                    <a href="javascript:void(0);" title="Xóa" onclick="deletePerItem('.$cart['variant_id'].')" class="fa fa-remove">&nbsp;</a>
                                    <p class="product-name"> <a href="'.url('collections/'.$cart['product_slug']).'" title="'.$cart['product_title'].'">'.$cart['product_title'].'</a></p>
                                 </div>
                                 <div class="product-details-bottom"> <span class="price">'.number_format($cart['price'], 0, ',', '.').'₫</span> <span class="title-desc">Số lượng:</span> <strong>'.$cart['quantity'].'</strong> </div>
                              </div>
                           </li>';
        }
         $xhtml .= '<div style="float:left; height:102px;"></div>';
         $xhtml .= '<li class="cart_fix_1">
                        <div class="top-subtotal">Tổng cộng: <span class="price">'.number_format($total, 0, ',', '.').'₫</span></div>
                     </li>
                     <li class="cart_fix_2" style="margin-left:-15px;margin-right:-15px;">
                        <div class="actions"><button class="btn-checkout" type="button" onclick="location.href='."'".url('cart/checkout')."'".'"><span>Thanh toán</span></button><button class="view-cart" type="button" onclick="location.href='."'".url('cart')."'".'"><span>Giỏ hàng</span></button></div>
                     </li>';
         $xhtml .= '</ul>';
         $xhtml .= '</div></div>';//1
         
    }
 ?>
   <div class="header-container">
      <div class="header-top">
         <div class="container">
            <div class="row">
               <div class="hidden-sm hidden-xs hd_top_left pull-left">
                  <img src="{{ asset('template/giaodien7/img/open.png') }}" alt="Raw Camera">
                  <p class="cl_old">{{ $openDoor }}</p>
               </div>
               <div class="col-md-4 col-sm-12 col-xs-12 pull-right hd_top_right">
                  <div class="search_form">
                     <form action="{{ url('collections?search='.$search) }}" method="get" class="search-form" role="search">
                        <input placeholder="Nhập nội dung tìm kiếm" class="form-control search_input" type="text" name="search" value="{{$search}}" />
                        <input type="submit" value="" class="btn_search" />
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row logo_menu">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
               <!-- Header Logo -->
               <div class="logo">
                  <a href="{{ url('/') }}">
                     <img src="{{ $logo_main }}">
                  </a>
               </div>
               <!-- End Header Logo -->
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 hidden-xs account_cart">
               <div class="col-lg-5 col-md-6 col-sm-8 hidden-xs pull-right" style="padding-right:0; height: 44px;">
                  <div class="toplinks pull-left">
                     <div class="links">
                     @if( !Session::has('loginFrontend') )
                        <div>
                           <img src="{{ asset('template/giaodien7/img/icon-dangnhap.png') }}" alt="Raw Camera"/>
                           <span class="hidden-xs">
                           <a href="#" data-toggle="modal" data-target="#login_register" class="login_btn">Đăng nhập</a>
                           </span> |
                        </div>
                        <div>
                           <span class="hidden-xs">
                           <a href="#" data-toggle="modal" data-target="#login_register" class="register_btn">Đăng ký</a>
                           </span>
                        </div>
                     @else
                        <div>
                           <img src="{{ asset('template/giaodien7/img/icon-dangnhap.png') }}" alt="Raw Camera"/>
                           <span class="hidden-xs">
                           <a href="{{url('customer')}}" data-toggle="modal" data-target="" class="login_btn">Chỉnh sửa</a>
                           </span> 
                        </div>
                        <div>
                           <img src="{{ asset('template/giaodien7/img/icon-dangnhap.png') }}" alt="Raw Camera"/>
                           <span class="hidden-xs">
                           <a href="{{url('customer/logout')}}" data-toggle="modal" data-target="" class="login_btn">Đăng xuất</a>
                           </span> 
                        </div>
                     @endif
                     </div>
                  </div>
                  <div class="top-cart-contain">
                     <!-- Top Cart -->
                        <div class="mini-cart pull-right">
                           <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                              <a href="{{url('cart')}}">
                                 <img src="{{ asset('template/giaodien7/img/icon-cart.png') }}" alt="Raw Camera">
                                 <div class="cart-box">
                                    <span class="title">Giỏ hàng</span>
                                    <span id="cart-total">{{ $total_quantity }}</span>
                                 </div>
                              </a>
                           </div>
                           <?php echo $xhtml; ?>
                           
                        </div>
                     <!-- Top Cart -->
                  </div>
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mini_menu  pull-right">
                  {!! navigation_menu('top_menu','hidden-sm hidden-xs','nav') !!}
                  <?php
                  /*
                  <ul id="nav" class="hidden-sm hidden-xs">
                     <li class="level0 parent active"><a href="{{ url('/') }}"><span>Trang chủ</span></a></li>
                     <li class="level0 parent "><a href="{{ url('pages/gioi-thieu') }}"><span>Giới thiệu</span></a></li>
                     <!--
                     <li class="level0 parent ">
                        <a href="/collections/all"><span>Danh sách sản phẩm &nbsp;&nbsp; <i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                        <ul class="level1">
                           <li class="level1 parent">
                              <a href="/may-anh-dslr"><span>Máy ảnh DSLR<i class="fa fa-caret-right" aria-hidden="true"></i></span></a>
                              <ul class="level2 right-sub">
                                 <li class="level2"><a href="/may-anh-canon"><span>Máy ảnh Canon</span></a></li>
                                 <li class="level2"><a href="/may-anh-nikon"><span>Máy ảnh Nikon</span></a></li>
                                 <li class="level2"><a href="/may-anh-pentax"><span>Máy ảnh Pentax</span></a></li>
                                 <li class="level2"><a href="/may-anh-sony"><span>Máy ảnh Sony</span></a></li>
                              </ul>
                           </li>
                           <li class="level1"><a href="/may-anh-dslr"><span>Máy ảnh KTS</span></a></li>
                           <li class="level1"><a href="/may-quay"><span>Máy ảnh cơ</span></a></li>
                           <li class="level1"><a href="/may-anh-cu"><span>Máy ảnh cũ</span></a></li>
                           <li class="level1"><a href="/may-anh-dslr"><span>Máy ảnh chuyên nghiệp</span></a></li>
                           <li class="level1"><a href="/ong-kinh-lens"><span>Ống kính - Lens</span></a></li>
                           <li class="level1"><a href="/phu-kien-may-anh"><span>Phụ kiện máy ảnh</span></a></li>
                           <li class="level1"><a href="/phu-kien-ban-kem"><span>Phụ kiện bán kèm</span></a></li>
                        </ul>
                     </li>
                     -->
                     <li class="level0 parent "><a href="{{ url('collections') }}"><span>Sản phẩm</span></a></li>
                     <li class="level0 parent "><a href="{{ url('post') }}"><span>Tin tức</span></a></li>
                     <li class="level0 parent "><a href="{{ url('pages/contact') }}"><span>Liên hệ</span></a></li>
                  </ul>
                  */
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<nav>
   <div class="container">
      <div class="row">
         <div class="nav-inner">
            <!-- mobile-menu -->
            <div class="hidden-lg hidden-md mobile_menu" id="mobile-menu">
               <ul class="navmenu">
                  <li>
                     <div class="menutop">
                        <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                        <h2>Menu</h2>
                     </div>
                     <div class="top-cart-contain">
                        <a href="/cart">
                           <div>
                              <img src="{{ asset('template/giaodien7/img/cart-mobile.png') }}" alt="Raw Camera" height="20" width="20" />
                           </div>
                           <div class="cart-box">
                              <span id="cart-total">3</span>
                           </div>
                        </a>
                     </div>
                     {!! navigation_menu('top_menu','submenu') !!}
                     <?php
                     /*
                     <ul class="submenu">
                        <li>
                           <ul class="topnav">
                              <li class="level0 level-top parent"> <a class="level-top" href="{{ url('/') }}"> <span>Trang chủ</span> </a> </li>
                              <li class="level0 level-top parent"> <a class="level-top" href="{{ url('pages/gioi-thieu') }}"> <span>Giới thiệu</span> </a> </li>
                              <!--
                              <li class="level0 level-top parent">
                                 <a class="level-top" href="{{ url('product.html') }}"> <span>Danh sách sản phẩm</span> </a>
                                 <ul class="level0">
                                    <li class="level1">
                                       <a href="/may-anh-dslr"> <span>Máy ảnh DSLR</span> </a>
                                       <ul class="level1">
                                          <li class="level2"><a href="/may-anh-canon"><span>Máy ảnh Canon</span></a></li>
                                          <li class="level2"><a href="/may-anh-nikon"><span>Máy ảnh Nikon</span></a></li>
                                          <li class="level2"><a href="/may-anh-pentax"><span>Máy ảnh Pentax</span></a></li>
                                          <li class="level2"><a href="/may-anh-sony"><span>Máy ảnh Sony</span></a></li>
                                       </ul>
                                    </li>
                                    <li class="level1"> <a href="/may-anh-dslr"> <span>Máy ảnh KTS</span> </a></li>
                                    <li class="level1"> <a href="/may-quay"> <span>Máy ảnh cơ</span> </a></li>
                                    <li class="level1"> <a href="/may-anh-cu"> <span>Máy ảnh cũ</span> </a></li>
                                    <li class="level1"> <a href="/may-anh-dslr"> <span>Máy ảnh chuyên nghiệp</span> </a></li>
                                    <li class="level1"> <a href="/ong-kinh-lens"> <span>Ống kính - Lens</span> </a></li>
                                    <li class="level1"> <a href="/phu-kien-may-anh"> <span>Phụ kiện máy ảnh</span> </a></li>
                                    <li class="level1"> <a href="/phu-kien-ban-kem"> <span>Phụ kiện bán kèm</span> </a></li>
                                 </ul>
                              </li>
                              -->
                              <li class="level0 level-top parent"><a href="{{ url('collections') }}"><span>Sản phẩm</span></a></li>
                              <li class="level0 level-top parent"> <a class="level-top" href="{{ url('post') }}"> <span>Tin tức</span> </a> </li>
                              <li class="level0 level-top parent"> <a class="level-top" href="{{ url('pages/contact') }}"> <span>Liên hệ</span> </a> </li>
                           </ul>
                        </li>
                     </ul>
                     */
                     ?>
                  </li>
               </ul>
            </div>
            <!--End mobile-menu -->
            <!-- Unknow Menu, Hidden It -->
            <!--
            <ul id="nav" class="hidden-xs" style="display: none;">
               <li class="level0 parent active"><a href="{{ url('/') }}"><span>Trang chủ</span></a></li>
               <li class="level0 parent "><a href="{{ url('page/gioi-thieu.html') }}"><span>Giới thiệu</span></a></li>
               <li class="level0 parent drop-menu ">
                  <a href="{{ url('product.html') }}"><span>Danh sách sản phẩm</span></a>
                  <ul class="level1">
                     <li class="level1 parent">
                        <a href="/may-anh-dslr"><span>Máy ảnh DSLR</span></a>
                        <ul class="level2 right-sub">
                           <li class="level2"><a href="/may-anh-canon"><span>Máy ảnh Canon</span></a></li>
                           <li class="level2"><a href="/may-anh-nikon"><span>Máy ảnh Nikon</span></a></li>
                           <li class="level2"><a href="/may-anh-pentax"><span>Máy ảnh Pentax</span></a></li>
                           <li class="level2"><a href="/may-anh-sony"><span>Máy ảnh Sony</span></a></li>
                        </ul>
                     </li>
                     <li class="level1"><a href="/may-anh-dslr"><span>Máy ảnh KTS</span></a></li>
                     <li class="level1"><a href="/may-quay"><span>Máy ảnh cơ</span></a></li>
                     <li class="level1"><a href="/may-anh-cu"><span>Máy ảnh cũ</span></a></li>
                     <li class="level1"><a href="/may-anh-dslr"><span>Máy ảnh chuyên nghiệp</span></a></li>
                     <li class="level1"><a href="/ong-kinh-lens"><span>Ống kính - Lens</span></a></li>
                     <li class="level1"><a href="/phu-kien-may-anh"><span>Phụ kiện máy ảnh</span></a></li>
                     <li class="level1"><a href="/phu-kien-ban-kem"><span>Phụ kiện bán kèm</span></a></li>
                  </ul>
               </li>
               <li class="level0 parent "><a href="{{ url('news.html') }}"><span>Tin tức</span></a></li>
               <li class="level0 parent "><a href="{{ url('contact.html') }}"><span>Liên hệ</span></a></li>
            </ul>
            -->
         </div>
      </div>
   </div>
</nav>
<div class="modal fade" id="login_register" tabindex="-1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog wrap-modal-login" role="document">
      <div class="text-xs-center" id="login_popup">
         <div id="login">
            <h4 class="title-modal">Đăng nhập</h4>
            <p>Bạn chưa có tài khoản ? <a href="#" class="login_regis" data-toggle="modal" data-target="#dangky">Đăng ký ngay</a></p>
            <hr>
            <form accept-charset='UTF-8' action='{{ url('customer/login') }}' id='customer_login' method='post'>
               <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input name='FormType' type='hidden' value='customer_login' />
               <input name='utf8' type='hidden' value='true' />
               <div class="form-signup" >
               </div>
               <div class="form-signup clearfix">
                  <fieldset class="form-group">
                     <label>Email <span class="required_field">*</span></label>
                     <input type="email" class="form-control form-control-lg" value="" name="email" id="customer_email" placeholder="Nhập Email" required requiredmsg="Nhập email chính xác">
                  </fieldset>
                  <fieldset class="form-group">
                     <label>Mật khẩu <span class="required_field">*</span></label>
                     <input type="password" class="form-control form-control-lg" value="" name="password" id="customer_password" placeholder="Nhập mật khẩu" required requiredmsg="Nhập mật khẩu">
                  </fieldset>
                  <p>Quên mật khẩu ? Nhấn vào <a href="#" class="btn-link-style btn-link-style-active" onclick="showRecoverPasswordForm();return false;">đây</a></p>
                  <fieldset class="form-group">
                     <input class="btn btn-lg btn-style btn-style-active btn_dangnhap col-xs-12" type="submit" value="Đăng nhập" />
                  </fieldset>
                  <fieldset class="form-group">
                     <button type="button" class="btn btn-lg btn-style col-xs-12" data-dismiss="modal">Hủy</button>
                  </fieldset>
               </div>
            </form>
         </div>
         <div id="recover-password" style="display:none;" class="form-signup">
            <h2 class="title-head text-xs-center"><a href="#">Lấy lại mật khẩu</a></h2>
            <p>Chúng tôi sẽ gửi thông tin lấy lại mật khẩu vào email đăng ký tài khoản của bạn</p>
            <form accept-charset='UTF-8' action="{{url('customer/register')}}" id='recover_customer_password' method='post'>
               <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input name='FormType' type='hidden' value='recover_customer_password' />
               <input name='utf8' type='hidden' value='true' />
               <div class="form-signup" >
               </div>
               <div class="form-signup clearfix">
                  <fieldset class="form-group">
                     <input type="email" class="form-control form-control-lg" value="" name="Email" id="recover-email" placeholder="Email" required requiredmsg="Nhập email chính xác">
                  </fieldset>
               </div>
               <div class="action_bottom">
                  <input class="btn btn-lg btn-style btn_recover btn-recover-form" type="submit" value="Gửi" /> hoặc
                  <a href="#" class="btn btn-lg btn-style btn-style-active btn_recover btn-recover-form" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
               </div>
            </form>
         </div>
         <script type="text/javascript">
            function showRecoverPasswordForm() {
              document.getElementById('recover-password').style.display = 'block';
              document.getElementById('login').style.display='none';
            }
            function hideRecoverPasswordForm() {
              document.getElementById('recover-password').style.display = 'none';
              document.getElementById('login').style.display = 'block';
            }
            if (window.location.hash == '#recover') { showRecoverPasswordForm() }
         </script>
      </div>
      <div class="text-xs-center" id="register_popup">
         <div id="register">
            <h4 class="title-modal">Đăng ký</h4>
            <p>Bạn đã có tài khoản ? <a href="#" class="regis_login" >Đăng nhập ngay</a></p>
            <form accept-charset='UTF-8' action='{{url('customer/register')}}' id='customer_register' method='post'>
               <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input name='FormType' type='hidden' value='customer_register' />
               <input name='utf8' type='hidden' value='true' />
               <div class="form-signup" >
               </div>
               <div class="form-signup clearfix">
                  <fieldset class="form-group">
                     <label>Tên <span class="required_field">*</span></label>
                     <input type="text" class="form-control form-control-lg" value="" name="name" id="firstName"  placeholder="Họ tên" required requiredmsg="Nhập Họ và Tên">
                  </fieldset>
                  <fieldset class="form-group">
                     <label>Email <span class="required_field">*</span></label>
                     <input type="email" class="form-control form-control-lg" value="" name="email" id="email"  placeholder="Nhập email" required requiredmsg="Nhập email">
                  </fieldset>
                   <fieldset class="form-group">
                     <label> Giới tính <span class="required_field"></span></label>
                     <select name="gender" class="form-control">
                        <option value="choise">— Chọn giới tính —</option>
                        <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                        <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                        <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
                    </select>
                  </fieldset>
                  
                  <fieldset class="form-group">
                     <label>Mật khẩu <span class="required_field">*</span></label>
                     <input type="password" class="form-control form-control-lg" value="" name="password" id="password" placeholder="Nhập mật khẩu" required requiredmsg="Nhập mật khẩu">
                  </fieldset>
                  <fieldset class="form-group">
                     <label> Xác nhận mật khẩu <span class="required_field">*</span></label>
                     <input type="password" class="form-control form-control-lg" value="" name="password_confirmation" id="password" placeholder="Nhập mật khẩu" required requiredmsg="Nhập mật khẩu">
                  </fieldset>
                  <p><input type="checkbox" name="subcribe">Nhận các thông tin và chương trình khuyến mãi của Raw Camera qua Email</p>
                  <fieldset class="form-group">
                     <button type="summit" value="Đăng ký" class="btn btn-lg btn-style btn-style-active col-xs-12 btn_dangky" onclick="return fsubmit();">Đăng ký</button>
                  </fieldset>
                  <p>Tôi đồng ý với các <a class="dieukhoansudung" href="/dieu-khoan-dich-vu" target="_blank">Điều khoản sử dụng của Raw Camera</a></p>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
   var firstNamePopUp = document.getElementById('firstName');
   function fsubmit(){
      if (firstNamePopUp.value.length > 50){
          alert('Tên quá dài. Vui lòng đặt tên ngắn hơn 50 ký tự');
          firstNamePopUp.focus();
          firstNamePopUp.select();
          return false;
      }
   }

   $(document).ready(function(){
      $(".login_btn").click( function(){
          $("#login_popup").show();
          $("#recover-password").hide();
          $("#login").show();
          $("#register_popup").hide();
      });
      $(".register_btn").click(function(){
          $("#register_popup").show();
          $("#login_popup").hide();
      });

      $(".regis_login").click(function(){
          $("#register_popup").hide();
          $("#login_popup").show();
      });
      $(".login_regis").click(function(){
          $("#login_popup").hide();
          $("#register_popup").show();
      });
   });
</script>
