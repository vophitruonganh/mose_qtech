<?php $search = isset($_GET['search']) ? $_GET['search'] : ''; ?>
<?php 
    $xhtml = '';
    $total = 0;
    $total_quantity = 0;
    $order_cart = decode_serialize (Cookie::get('cart'));
    if($order_cart){
      $xhtml .= '     <li>
                        <form action="'.url('cart').'" method="post" id="cartform">
                           <div class="nav-bar-item">
                              <p align="center">Giỏ hàng của bạn</p>
                           </div>';
      foreach ( $order_cart as $cart){
          $total_price = $cart['price'] * $cart['quantity'];
          $total_quantity += $cart['quantity'];
          $total+= $total_price;
          $xhtml .=          '<table>
                              <tbody>
                                 <tr>
                                    <td class="image"><a href="'.url('collections/'.$cart['product_slug']).'">  
                                       <img src="'. set_image_size(get_image_url($cart['variant_image']),'thumb').'" alt="'.$cart['product_title'].'" width="50">
                                       </a>
                                    </td>
                                    <td class="name"><a href="'.url('collections/'.$cart['product_slug']).'">'.$cart['product_title'].'</a>('.$cart['variant_meta'].')</td>
                                    <td class="quantity">x '.$cart['quantity'].'</td>
                                    <td class="total">'.number_format($total_price, 0, ',', '.') .'₫</td>
                                    <td class="remove"><a onClick="deletePerItem('.$cart['variant_id'].')" title="remove"><i class="fa-remove "></i></a></td>
                                 </tr>
                              </tbody>
                           </table>';
      }
      
      $xhtml .=         '</form>
                        <div class="well pull-right buttonwrap"> <a href="'.url('cart').'" class="btn btn-orange">Xem giỏ hàng</a> <a href="'.url('cart/checkout').'" class="btn btn-orange">Thanh toán</a> </div>
                     </li>
                 ';
    }else{
      $xhtml .= '
                     <li>
                        <div>
                           <div class="nav-bar-item">
                              <p align="center">Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                           </div>
                        </div>
                     </li>
                  ';
    }
 ?>
<!-- CHEN POPUP -->
<!-- END CHEN POPUP -->
<header>
   <div class="headerstrip">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="logo pull-left">
                  <!-- LOGO -->
                  <h1>
                     <a href="{{ url('/') }}">
                     <img src="{{isset($logo_main['image']) ? $logo_main['image'] : ''}}" alt="" class="img-responsive"/>
                     </a>
                  </h1>
                  <h1 style="display:none">
                     <a href="/">Alluare</a>
                  </h1>
               </div>
               <!-- Top Nav Start -->
               <div class="pull-left">
                  <div class="navbar" id="topnav">
                     <div class="navbar-inner">
                        <ul class="nav" >
                           <li><a class="home active" href="{{ url('/') }}">Trang chủ</a> </li>
                          
                           @if( Session::has('loginFrontend') )
                            <li><a class="myaccount" href="{{ url('customer') }}">Chỉnh sửa</a></li>
                            <li><a class="myaccount" href="{{ url('customer/logout') }}">Thoát</a></li>
                           @else
                           <li><a class="myaccount" href="{{ url('customer/login') }}">Đăng nhập</a> </li>
                           <li><a class="my-register" href="{{ url('customer/register') }}"><i class="fa fa-key"></i>Đăng ký</a></li>
                           @endif
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- Top Nav End -->
               <div class="pull-right">
                  <form class="form-search top-search" action="{{ url('collections') }}" method="get">
                     <!--<input type="hidden" name="type" value="product" />-->
                     <input type="text" name="search" value="{{ $search }}" class="input-medium search-search" placeholder="Tìm kiếm …">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="headerdetails">
         <div class="pull-right">
            <ul class="nav topcart pull-left">
            <li class="dropdown hover carticon ">
                  <a href="{{url('cart')}}" class="dropdown-toggle" > Giỏ hàng <span class="label label-orange font14">{{$total_quantity}} (sản phẩm)</span> - {{number_format($total, 0, ',', '.')}}₫ <b class="caret"></b></a>
                  <ul class="dropdown-menu topcartopen">
                    {!! $xhtml !!}
                  </ul>
            </li>
            </ul>
         </div>
      </div>
      <div id="categorymenu">
         <nav class="subnav">
            {!! navigation_menu('top_menu','nav-pills categorymenu') !!}
            <?php
               /*
               <ul class="nav-pills categorymenu">
                 <li>
                   <a href="{{ url('/') }}" class=" active" title="Trang chủ">
                   <span>Trang chủ</span>
                   </a>
                 </li>
                 <li>
                   <a href="{{ url('pages/gioi-thieu') }}" class="" title="Giới thiệu">
                   <span>Giới thiệu</span>
                   </a>
                 </li>
                 <li>
                   <a href="{{ url('collections') }}" class="" title="Sản Phẩm">
                   <span>Sản Phẩm</span>
                   </a>
                 </li>
                 <!--
                 <li>
                   <a href="http://localhost/giaodien10/sanpham.php" title="Danh mục sản phẩm" class="">
                   <span>Danh mục sản phẩm</span>
                   </a>
                   <div>
                     <ul>
                       <li>
                         <a href="/collections/thoi-trang-nu" title="Thời trang nữ">Thời trang nữ</a>
                       </li>
                       <li>
                         <a href="/collections/thoi-trang-nam" title="Thời trang nam">Thời trang nam</a>
                       </li>
                       <li>
                         <a href="/collections/cong-nghe-phu-kien" title="Công nghệ phụ kiện">Công nghệ phụ kiện</a>
                       </li>
                       <li>
                         <a href="/collections/thoi-trang-be" title="Thời trang bé">Thời trang bé</a>
                       </li>
                     </ul>
                   </div>
                 </li>
                 -->
                 <li>
                   <a href="{{ url('collections/tin-tuc') }}" class="" title="tin tức">
                   <span>tin tức</span>
                   </a>
                 </li>
                 <!--
                 <li>
                   <a href="http://localhost/giaodien10/huongdan.php" class="" title="Hướng dẫn">
                   <span>Hướng dẫn</span>
                   </a>
                 </li>
                 -->
                 <li>
                   <a href="{{ url('pages/contact') }}" class="" title="Liên hệ">
                   <span>Liên hệ</span>
                   </a>
                 </li>
               </ul>
               */
               ?>
         </nav>
      </div>
   </div>
</header>