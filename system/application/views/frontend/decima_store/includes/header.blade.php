<?php $search = isset($_GET['search']) ? $_GET['search'] : ''?>

<?php 
    $xhtml = '';
    $total = 0;
    $total_quantity = 0;
    $order_cart = decode_serialize (Cookie::get('cart'));
    if($order_cart){
      $xhtml .= '<div role="complementary">';
      foreach ( $order_cart as $cart){
          $total_price = $cart['price'] * $cart['quantity'];
          $total_quantity += $cart['quantity'];
          $total+= $total_price;
          $xhtml .= '<article class="shop-summary-item">
        <img src="'. set_image_size(get_image_url($cart['variant_image']),'thumb').'" alt="'.$cart['product_title'].'">

        <div class="item-info-name-features-price">
          <h4><a href="#">'.$cart['product_title'].'</a></h4>
          <span class="features">'.$cart['variant_meta'].'</span><br>
          <span class="quantity">'.$cart['quantity'].'</span><b>&times;</b><span class="price">'.number_format($total_price, 0, ',', '.') .'₫</span>
        </div>
        <button type="button" class="close" aria-hidden="true" onClick="deletePerItem('.$cart['variant_id'].')"><span aria-hidden="true" data-icon="&#xe005;"></span></button>
      </article>';
      }
      
      $xhtml .=   '<hr>
      <span class="total-price-tag pull-left">Cart subtotal</span><span class="total-price pull-right">$89.00</span>

      <div class="clearfix"></div>
      <a href="05-b-shop-shopping-cart.html" class="btn btn-primary btn-block">
        View shopping cart
      </a>
      <a href="06-a-shop-checkout.html" class="btn btn-default btn-block">
        Proceed to checkout
      </a>
    </div>';
    }else{
      $xhtml .= '';
    }
 ?>
<header id="MainNav">
<div class="container">
<div class="row">
<section class="col-md-12" id="TopBar">
   @if( Session::has('loginFrontend') )
      <a href="{{url('customer/logout')}}" class="btn btn-link pull-left btn-login">
    Logout
  </a>
   @else
      <a href="{{url('customer/login')}}" class="btn btn-link pull-left btn-login">
        Login
      </a>
   @endif
  

  <!-- SHOPPING CART -->
  <div class="shopping-cart-widget pull-right">
    <button type="button" class="btn btn-link pull-right">
      <span aria-hidden="true" data-icon="&#xe006;"></span> {{$total_quantity}} items: {{number_format($total, 0, ',', '.')}}₫ <b class="caret"></b>
    </button>
    {!! $xhtml !!}
  </div>
  <!-- !SHOPPING CART -->
</section>
  <nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle btn btn-primary">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('template/decima_store/images/logo.png') }}" alt=" "></a>
    </div>

    <div class="navbar-collapse navbar-main-collapse" role="navigation">
      {!! navigation_menu('top_menu','nav navbar-nav') !!}
      <ul class="nav navbar-nav">
        <li class="active dropdown">
          <a href="{{url('/')}}" class="dropdown-toggle" data-toggle="dropdown">Trang Chủ <b class=""></b></a>
        </li>

        <li class="dropdown">
          <a href="{{url('pages/gioi-thieu')}}" class="dropdown-toggle" data-toggle="dropdown">Giới thiệu <b class=""></b></a>
        </li>

        <li class="dropdown">
          <a href="{{url('tin-chinh')}}" class="dropdown-toggle" data-toggle="dropdown">Tin tức<b class=""></b></a>
        </li>

        <li class="dropdown">
          <a href="{{url('collections')}}" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm <b class=""></b></a>
        </li>
        
        <li class="dropdown">
          <a href="{{url('pages/contact')}}" class="dropdown-toggle" data-toggle="dropdown">Liên hệ <b class=""></b></a>
        </li>
        
      </ul>
      <form class="navbar-form navbar-right navbar-search" role="search" action="{{url('collections')}}">
        <div class="form-group">
          <label class="sr-only" for="navbar-search">Your search</label>
          <input type="text" id="navbar-search" name="search" value="{{$search}}" class="form-control">
        </div>
        <button class="btn btn-default navbar-search">
          <span class="fa fa-search">
              <span class="sr-only">Search</span>
          </span>
        </button>
      </form>
    </div>
    <!-- /.navbar-collapse -->
  </nav>
</div>
</div>
</header>

<section id="Content" role="main">
<div class="full-width">
<div class="container">  <!-- FULL WIDTH -->
</div>