<?php $__env->startSection('content'); ?>
<?php
    $xhtml       = '';
    $xhtmlUpdate = '';
    $xhtmlCart   = ''; 
    $total = 0;
    $order_cart = decode_serialize (Cookie::get('cart'));
    if($order_cart)
    {
        $xhtmlCart .= '<table class="table table-striped table-bordered">
                  <thead>
                     <tr>
                        <th class="image">Hình</th>
                        <th class="item">Tên sản phẩm</th>
                        <th class="qty">Số lượng</th>
                        <th class="remove">&nbsp;</th>
                        <th class="price">Giá tiền</th>
                     </tr>
                  </thead>
                  <tbody>';
        foreach ($order_cart as $cart){
            $total_price = $cart['price'] * $cart['quantity'];
            $total+= $total_price;
            $xhtmlCart .= '<tr>
                        <td class="image">
                           <div class="product_image">
                              <a href="'.url('collections/'.$cart['product_slug']).'">
                              <img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'">
                              </a>
                           </div>
                        </td>
                        <td class="item" valign="middle">
                           <a href="'.url('collections/'.$cart['product_slug']).'">
                           <strong>'.$cart['product_title'].'</strong>
                           <p>'.$cart['variant_meta'].'</p>
                           </a>
                        </td>
                        <td class="qty">
                           <input type="number" size="4" name="quantity['.$cart['variant_id'].']" min="1" id="updates_1003172422" value="'.$cart['quantity'].'" onfocus="this.select();" class="tc item-quantity">
                        </td>
                        <td class="remove">
                           <button type="submit" id="update-cart" class="btn btn-2" name="update" value="'.$cart['variant_id'].'"><img alt="" src="'.asset('template/giaodien10/asset/image/update.png').'" data-original-title="Update" class="tooltip-test"></button>
                           <a onClick="deletePerItem('.$cart['variant_id'].')" class="cart"><img alt="" src="'.asset('template/giaodien10/asset/image/remove.png').'" data-original-title="Remove" class="tooltip-test"></a>
                        </td>
                        <td class="price">'.number_format($total_price, 0, ',', '.') .'₫</td>
                     </tr>';
        }
        
        $xhtmlCart .=     '<tr class="summary">
                                <td class="image">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="price">
                                   <span class="total">
                                   <strong>'.number_format($total, 0, ',', '.') .'₫</strong>
                                   </span>
                                </td>
                             </tr>
                          </tbody>
                       </table>';
        $xhtmlCart .= ' <div class="col-md-6 cart-buttons inner-right inner-left">
                              <div class="buttons clearfix">
                                 <button type="button" id="checkout" onclick="window.location= '."'".url('cart/checkout')."'".'" class="btn btn-orange" name="checkout" value="">Thanh toán</button>
                                 <button type="submit" id="update-cart" class="btn" name="update" value="update_all">Cập nhật</button>
                              </div>
                           </div>';
    }else{
        $xhtmlCart .= 'Không có sản phẩm nào trong giỏ hàng';
    }
    //CODE CHEN TABLE CART SESSION
    if( !empty($orderCart) )
    {
        $xhtml .= '<div id="layout-page" class="col-md-12">';
        $xhtml .= '<span class="header-page clearfix"></span>';
        $xhtml .= '<form action="'.url('cart').'" method="post" id="cartformpage">';
        $xhtml .= '<input type="hidden" name="_token" value="'.csrf_token().'" />';
        $xhtml .= '<table class="table table-striped table-bordered">';
        $xhtml .= '<thead>';
        $xhtml .= '<tr>';
        $xhtml .= '<th class="image">Hình</th>';
        $xhtml .= '<th class="item">Tên sản phẩm</th>';
        $xhtml .= '<th class="qty">Số lượng</th>';
        $xhtml .= '<th class="remove">&nbsp;</th>';
        $xhtml .= '<th class="price">Giá tiền</th>';
        $xhtml .= '</tr>';
        $xhtml .= '</thead>';
        $xhtml .= '<tbody>';
        
        foreach ($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->product_title);
            $totalPrice = $priceHeader[$value->product_id] * $quantity[$value->product_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $post_meta['post_featured_image'] = isset($post_meta['post_featured_image'] ) ? $post_meta['post_featured_image'] : '';
            $post_meta['post_featured_image'] = '';
            $xhtml .= '<tr>';
            $xhtml .= '<td class="image">';
            $xhtml .= '<div class="product_image">';
            $xhtml .= '<a href="'.url('collections/'.$value->product_slug).'">';
            $xhtml .= '<img src="'.get_image_url($post_meta['post_featured_image']).'">';
            $xhtml .= '</a>';
            $xhtml .= '</div>';
            $xhtml .= '</td>';
            $xhtml .= '<td class="item" valign="middle">';
            $xhtml .= '<a href="'.url('collections/'.$value->product_slug).'">';
            $xhtml .= '<strong>'.$title.'</strong>';
            $xhtml .= '</a>';
            $xhtml .= '</td>';
            $xhtml .= '<td class="qty">';
            $xhtml .= '<input type="number" size="4" name="quantity['.$value->product_id.']" min="1" id="updates_1003172422" value="'.$quantity[$value->product_id].'" onfocus="this.select();" class="tc item-quantity">';
            $xhtml .= '</td>';
            $xhtml .= '<td class="remove">';
            $xhtml .= '<button type="submit" id="update-cart" class="btn btn-2" name="update" value=""><img alt="" src="//hstatic.net/025/1000032025/1000112672/update.png?v=49" data-original-title="Update" class="tooltip-test"></button>';
            $xhtml .= '<a class="cart" onClick="deletePerItem('.$value->product_id.')"><img alt="" src="//hstatic.net/025/1000032025/1000112672/remove.png?v=49" data-original-title="Remove" class="tooltip-test"></a>';
            $xhtml .= '</td>';
            $xhtml .= '<td class="price">'.number_format($totalPrice, 0, ',', '.').'₫</td>';
            $xhtml .= '</tr>';
        }

        $xhtml .= '<tr class="summary">';
        $xhtml .= '<td class="image">&nbsp;</td>';
        $xhtml .= '<td>&nbsp;</td>';
        $xhtml .= '<td>&nbsp;</td>';
        $xhtml .= '<td>&nbsp;</td>';
        $xhtml .= '<td class="price">';
        $xhtml .= '<span class="total">';
        $xhtml .= '<strong>'.number_format($total, 0, ',', '.') .'₫</strong>';
        $xhtml .= '</span>';
        $xhtml .= '</td>';
        $xhtml .= '</tr>';
        $xhtml .= '</tbody>';
        $xhtml .= '</table>';
        $xhtml .= '<div class="col-md-6 cart-buttons inner-right inner-left">';
        $xhtml .= '<div class="buttons clearfix">';
        $xhtml .= '<button type="button" onclick="window.location= '."'".url('cart/checkout')."'".'" class="btn btn-orange" name="checkout" value="">Thanh toán</button>';
        $xhtml .= '<button type="submit" id="update-cart" class="btn" name="update" value="">Cập nhật</button>';
        $xhtml .= '</div>';
        $xhtml .= '</div>';
        $xhtml .= '</form>';
        $xhtml .= '</div>';
    }
    else
    {
        $xhtml .= '<div id="layout-page" class="col-md-12">';
        $xhtml .= '<span class="header-page clearfix"></span>';
        $xhtml .= '<p class="text-center">Không có sản phẩm nào trong giỏ hàng!</p>';
        $xhtml .= '<p class="text-center"><a href="'.url('collections').'"><i class="fa fa-reply"></i> Tiếp tục mua hàng</a></p>';
        $xhtml .= '</div>';
    }
    //END CODE 
?>
<div id="maincontainer">
    <div class="container">
        <h1 class="heading1"><span class="maintext">Giỏ hàng</span></h1>
        <div id="cart" class="cart-info">
            <!-- Begin empty cart -->
            <div id="layout-page" class="col-md-12">
            <span class="header-page clearfix"></span>
            <form action="<?php echo e(url('cart')); ?>" method="post" id="cartformpage">
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
               <?php echo $xhtmlCart; ?>

               
             
              
            </form>
         </div>
            <!-- End cart -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>