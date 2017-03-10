@extends('frontend.giaodien3.layouts.default')
@section('content')
<?php
$xhtml_cart = '';
$xhtml_button = '';
$xhtml_checkout = '';
$order_cart = decode_serialize(Cookie::get('cart'));
$total = 0;
if($order_cart){
    $xhtml_cart.= '<div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Ảnh sản phẩm</th>
                                        <th class="product-name"><span class="nobr">Tên sản phẩm<span></span></span></th>
                                        <th class="product-price"><span class="nobr">Giá</span></th>
                                        <th class="product-stock-stauts"><span class="nobr">Số lượng</span></th>
                                        <th class="product-add-to-cart">Tổng tiền</th>
                                        <th class="product-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>';
                    foreach($order_cart as $cart){
                         $total_price = $cart['price'] * $cart['quantity'];
                         $total      += $total_price;

                         $xhtml_cart.= '<tr>
                                            <td class="product-thumbnail"><a href="'.url('collections/'.$cart['product_slug']).'"><img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'" alt="'.$cart['product_title'].'"></a></td>
                                            <td class="product-name"><a href="'.url('collections/'.$cart['product_slug']).'">'.$cart['product_title'].'</a>
                                                <p>'.$cart['variant_meta'].'</p>
                                            </td>
                                            <td class="product-price">
                                                <div class="price-box">
                                                    <span class="special-price">'.number_format($cart['price'], 0, ',', '.').'₫</span>
                                                </div>
                                            </td>
                                            <td class="quantity">
                                                <input maxlength="12" type="number" min="0" name="quantity['.$cart['variant_id'].']" id="updates_506164" value="'.$cart['quantity'].'">
                                            </td>
                                            <td class="product-price">
                                                <div class="price-box">
                                                    <span class="special-price">'.number_format($total_price, 0, ',', '.').'₫</span>
                                                </div>
                                            </td>
                                            <td class="product-remove"><a onclick="deletePerItem('.$cart['variant_id'].')"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>';
                    }

    $xhtml_cart .=            '</tbody>
                            </table>
                        </div>';
    $xhtml_button .= '<div class="col-xs-12 col-lg-12 col-md-12">
                            <button onclick="delete_cart_all()" id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="button"><span><span>Xóa giỏ hàng</span></span></button>
                            <div class="buttons-cart">
                                <button class="button btn-update" title="Update Cart" value="update_qty" name="" type="submit">Cập nhật giỏ hàng</button>
                                <a href="'.url('collections').'">Tiếp tục mua hàng</a>
                            </div>
                        </div>';
    $xhtml_checkout .= '<div class="cart-totals">
                            <table>
                                <tbody>
                                    <tr class="order-total">
                                        <th>Tổng tiền thanh toán : </th>
                                        <td>
                                            <strong>
                                            <span class="amount">'.number_format($total, 0, ',', '.').'₫</span>
                                            </strong> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="clear"></div>
                            <div class="proceed-to-checkout">
                                <button onclick="window.location= '."'".url('cart/checkout')."'".'" name="checkout" class="button btn-proceed-checkout" title="Thanh toán" type="button"><span>Thanh toán</span></button>
                            </div>
                        </div>';
    
}else{
    $xhtml_cart .= 'Không có sản phẩm nào trong giỏ hàng';
}
//echo $xhtml_cart;
?>


<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="breadcrumbs">
				<ul>
					<li class="home"> <a href="{!! url('index.html') !!}" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
					<li><strong>Giỏ hàng</strong></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="wishlist-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			
			<!-- FORM ACTION -->
			<form action="{{ url('cart') }}" method="post">
			    <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="wishlist-content">
                        {!! $xhtml_cart !!}
                    </div>

                    <div class="fvc" style="float: left;width: 100%;border: 1px solid #ebebeb;border-top: 0px;    padding: 30px 15px;">
                        {!! $xhtml_button !!}
                    </div>

                    <div class="col-xs-12 col-lg-12 col-md-12">
                        {!! $xhtml_checkout !!}
                    </div>
            </form>
                <!-- END FORM -->
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
     function delete_cart_all(){
        var url     = 'cart/delete_cart_all';
        $.ajax({
            'url'       : url, 
            'type'      : 'GET',
            'success'   : function(data){
                if(data == 'Success'){
                    window.location = 'cart';
                }
            },
        });
        return false;
     }
</script>


@stop