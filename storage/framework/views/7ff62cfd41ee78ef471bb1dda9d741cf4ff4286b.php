<?php
    $xhtml = '';
    $total = 0;
    $total_quantity = 0;
    $order_cart = decode_serialize (Cookie::get('cart'));
    if($order_cart ){
      foreach ($order_cart as $cart){
          $total_quantity += $cart['quantity'];
      }
      $xhtml .='<span class="text hidden-xs">'.$total_quantity.' Sản phẩm</span>';
    }else{
      $xhtml .= '<span class="text hidden-xs">Giỏ hàng</span>';
    }
?>
<div class="navbar nav-header-fix">
 <div class="navbar-inner">
    <div class="container">
       <h1 class="brand">
          <a href="<?php echo e(url('/')); ?>">
            <?php $logo_main = isset($logo_main) ? $logo_main : asset('template/giaodien5/asset/images/logo.png') ; ?>
            <img src="<?php echo e($logo_main); ?>" />
          </a>
       </h1>
       <div id="header-mobile-menu" class="visible-xs visible-sm pull-right"></div>
       <div class="nav-collapse collapse pull-left hidden-xs hidden-sm" id="mobile-nav">
          <ul class="nav" id="top-navigation">
              <li>
                <a href="#trangchu">Trang chủ</a>
             </li>
             <li>
                <a href="#dichvu">Dịch vụ</a>
             </li>
             <li>
                <a href="#duan">Sản phẩm</a>
             </li>
             <li>
                <a href="#gioithieu">Nhân sự</a>
             </li>
             <li>
                <a href="#nhanxet2">Giới thiệu</a>
             </li>
             <li>
                <a href="#blog-index">Tin tức</a>
             </li>
             <li>
                <a href="<?php echo e(url('pages/contact')); ?>">Liên hệ</a>
             </li>
            <?php if( Session::has('loginFrontend') ): ?>
              <li>
                <a href="<?php echo e(url('customer/logout')); ?>">Đăng xuất</a>
             </li>
            <?php endif; ?>
          </ul>
       </div>
       <div id="cart-target" class="toolbar-cart pull-right ">
          <a href="<?php echo e(url('cart')); ?>" class="cart" title="Shopping Cart">
          <span class="fa fa-shopping-cart"></span>
          <?php echo $xhtml; ?>

          <span class="cart-number visible-xs">0</span>
          </a>
       </div>
       <div class="hidden" id="mmenu">
          <ul>
             <li>
                <a href="#trangchu">Trang chủ</a>
             </li>
             <li>
                <a href="#dichvu">Dịch vụ</a>
             </li>
             <li>
                <a href="#duan">Sản phẩm</a>
             </li>
             <li>
                <a href="#gioithieu">Nhân sự</a>
             </li>
             <li>
                <a href="#nhanxet2">Giới thiệu</a>
             </li>
             <li>
                <a href="#blog-index">Tin tức</a>
             </li>
             <li>
                <a href="<?php echo e(url('pages/contact')); ?>">Liên hệ</a>
             </li>
          </ul>
       </div>
    </div>
 </div>
</div>