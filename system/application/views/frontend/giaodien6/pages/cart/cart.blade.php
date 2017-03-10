@extends('frontend.giaodien6.layouts.default')
@section('content')          

<?php 
   $xhtml = '';
   $xhtmlCart = '';
   $total = 0; 
   $order_cart = decode_serialize (Cookie::get('cart'));
   if($order_cart){
      $xhtml .= '<tbody>';
      $xhtml .='<tr>
                              <th>Sản phẩm</th>
                              <th>Thông tin sản phẩm</th>
                              <th>Đơn giá</th>
                              <th>Số lượng</th>
                              <th>Thành tiền</th>
                              <th></th>
                           </tr>';
      foreach($order_cart as $cart)
      {
            $total_price = $cart['price'] * $cart['quantity'];
                         $total      += $total_price;
           $xhtml .= '<tr>';
           $xhtml .= '<td>
                                 <a href="/collections/'.$cart['product_slug'].'">
                                 <img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'" alt="'.$cart['product_title'].'">
                                 </a>
                              </td>';
           $xhtml .=          '<td style="text-align:left;max-width:300px;">
                                 <a href="/collections/'.$cart['product_slug'].'">
                                 <strong>'.$cart['product_title'].'</strong>
                                 </a>
                              </td>';
           $xhtml .=          '<td>'.number_format($cart['price'], 0, ',', '.').'₫</td>';
           $xhtml .=          '<td class="qty">
                                 <input type="number" size="4" name="quantity['.$cart['variant_id'].']" min="1" id="updates_1006543296" value="'.$cart['quantity'].'" onfocus="this.select();" class="tc item-quantity">
                              </td>';
           $xhtml .=          '<td class="price">'.number_format($total_price, 0, ',', '.').'₫</td>';
           $xhtml .=          '<td class="remove">
                                 <a onclick="deletePerItem('.$cart['variant_id'].')" class="cart"><img src="'.asset('template/giaodien6/asset/images/remove-cart.png').'"></a>
                              </td>';
            $xhtml .= '</tr>';
      }
       $xhtml .= '</tbody>';
   }else{
      $xhtml.= 'Bạn chưa chọn sản phẩm nào';   
   }
   
   
?>

<main class="padding-top-mobile">
   <style>
      body {
      background: #fff;
      }
   </style>
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li class="active"><span>Giỏ hàng</span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <section id="content">
      <div class="container">
         <div class="row" id="cart">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pd5">
               <h2 class="coll-title cart-title">Giỏ hàng</h2>
               <form action="{{ url('cart') }}" method="post" id="cartform">
               <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div class="clearfix overflow-cart">
                     <table id="table-cart">
                     <?php echo $xhtml; ?>
                     </table>
                  </div>
                  <div class="clearfix">
                     <a class="continue-shopping" title="Mua tiếp" href="{{url('collections')}}">Mua tiếp</a>
                     <button class="update-cart" name="submit">Cập nhật giỏ hàng</button>
                  </div>
               </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pd5">
               <h2 class="coll-title cart-title">Đơn hàng</h2>
               <div class="right-cart">
                  <h2>
                     <label>Tổng tiền</label>
                     <label>{{number_format($total, 0, ',', '.')}}₫</label>
                  </h2>
                  <a class="checkout" onclick="window.location= '{{url('cart/checkout')}}'">
                  Thanh toán
                  </a>
               </div>
               <div class="selling-point-cart">
                  <ul>
                     <li><span class="fa fa-check"></span>Thời gian giao hàng từ 3 - 5 ngày làm việc</li>
                     <li><span class="fa fa-check"></span>Đổi trả hàng trong vòng 90 ngày</li>
                     <li><span class="fa fa-check"></span>Miễn phí giao hàng toàn quốc</li>
                     <li><span class="fa fa-check"></span>Thanh toán khi nhận hàng / Thanh toán online</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>

            



@stop                        