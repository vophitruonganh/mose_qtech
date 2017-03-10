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
 <div id="menu-top">
    <div class="menu-wrap fix-width">
       <ul class="menu">
          <li class="support">
            <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <a class="social" href="<?php echo e($row['url']); ?>">
              <fa class="fa <?php echo e($row['class']); ?>"></fa>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <span class="hotline">Hotline: 1900.0124</span>
          </li>
          <li class="search">
          <?php 
               $query = isset($_GET["search"]) ? $_GET["search"] : '';
          ?>
             <form class="search" action="<?php echo e(url('collections')); ?>" method="get">
                <input type="text" name="search" class="search_box" placeholder="Từ khóa ..." value="<?php echo e($query); ?>"  />
                <button type="submit" value="fav_HTML" id="go"><i class="fa fa-search"></i></button>
             </form>
          </li>
          <li class="member hide-mobile">
          <?php if( Session::has('loginFrontend') ): ?>
              <a class="log-only" href="<?php echo e(url('user/logout')); ?>" title="layout.customer.login"><i class="fa fa-sign-out"></i>Đăng xuất</a>
          <?php else: ?>
              <a class="reg" href="<?php echo e(url('user/register')); ?>" title="layout.customer.create_account"><i class="fa fa-user"></i>Đăng ký</a>
              <a class="log-only" href="<?php echo e(url('user/login')); ?>" title="layout.customer.login"><i class="fa fa-sign-in"></i>Đăng nhập</a>
          <?php endif; ?>
          </li>
       </ul>
    </div>
 </div>

 <header class="header">
    <div class="site-branding fix-width">
       <div class="logo">
          <a href="<?php echo e(url('')); ?>"><img src="<?php echo e($logo_main); ?>" /></a>
          <h1 class="site-title hidden"><a href="/">LKT-Business</a></h1>
       </div>
       <div id="main-nav" class="right-header">
          <nav class="menu hide-mobile">
            <?php echo navigation_menu('top_menu'); ?>

            <?php 
            /*
             <ul>
                <li>
                   <a href="{{url('/')}}" class=" current">
                   <span>Trang chủ</span></a>
                </li>
                <li>
                   <a href="{{url('pages/gioi-thieu')}}" class="">
                   <span>Giới thiệu</span></a>
                </li>
                <!-- <li>
                   <a href="{{url('')}}/dichvu.php" class="">
                   <span>Dịch Vụ</span></a>
                </li> -->
                <li>
                   <a href="{{url('collections')}}" class="">
                   <span>Sản phẩm</span></a>
                </li>
                <li>
                   <a href="{{url('post')}}" class="">
                   <span>Tin Tức</span></a>
                </li>
                <li>
                   <a href="{{url('pages/contact')}}" class="">
                   <span>Liên Hệ</span></a>
                </li>
             </ul>
            */
            ?>
          </nav>
          <!-- /.main -->
          <div class="cart-menu">
             <div id="cart-target" class="toolbar-cart ">
                <a href="<?php echo e(url('cart')); ?>" class="cart" title="Shopping Cart">
                <span class="fa fa-shopping-cart"></span>
                <span class="text">
                <span id="cart-count"><?php echo e($totalQty); ?></span>
                </span>
                </a>
             </div>
          </div>
          <div class="wrap-menu-mobile">
             <span class="menu-mobile show-mobile"><i class="fa fa-bars"></i></span>
          </div>
       </div>
    </div>
 </header>