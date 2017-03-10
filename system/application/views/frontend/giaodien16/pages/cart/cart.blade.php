@extends('frontend.giaodien16.layouts.default')
@section('content')

<?php
    $xhtml       = '';
    $xhtmlUpdate = '';
    $xhtmlCart   = ''; 
    $total = 0;
    
    //CODE CHEN TABLE CART SESSION
    if(!empty($orderCart)){
        $xhtmlCart .= '<table class="data-table cart-table" id="shopping-cart-table">
                        <thead>
                           <tr class="first last">
                              <th rowspan="1">Ảnh sản phẩm</th>
                              <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                              <th colspan="1" class="a-center">Đơn giá</th>
                              <th class="a-center" rowspan="1">Số lượng</th>
                              <th colspan="1" class="a-center">Thành tiền</th>
                              <th rowspan="1">Xoá</th>
                           </tr>
                        </thead>';
         $xhtmlCart .= '<tbody>';
        foreach ($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtmlCart .= '<tr>
                              <td class="image">
                                 <a class="product-image" href="'.url('collections/'.$value->post_slug).'" title="'.$title.'">
                                 <img width="150" height="150" alt="'.$value->post_title.'" src="'.loadFeatureImage($post_meta['post_featured_image']).'">
                                 </a>
                              </td>
                              <td>
                                 <h2>
                                    <a class="product-name" href="'.url('collections/'.$value->post_slug).'">'.$title.'</a>          
                                 </h2>
                                 <span>Xanh</span>
                              </td>
                              <td>
                                 <span class="cart-price">
                                 <span class="cl_price fs18 fw600"> '.number_format($priceHeader[$value->post_id], 0, ',', '.').'₫</span>
                                 </span>
                              </td>
                              <td class="txt_center">
                                 <input type="number" maxlength="12" min="0" class="input-text qty" title="Số lượng" size="4" value="'.$quantity[$value->post_id].'" name="quantity['.$value->post_id.']" id="updates_837518">
                              </td>
                              <td>
                                 <span class="cart-price">
                                 <span class="cl_price fs18 fw600">'.number_format($totalPrice, 0, ',', '.').' ₫</span>
                                 </span>
                              </td>
                              <td class="txt_center">                     
                                 <a class="button remove-item" title="Xóa" onClick="deletePerItem('.$value->post_id.')" data-id="837518"><span><span><img src="//bizweb.dktcdn.net/100/091/132/themes/139143/assets/bin.png?1472118628278"></span></span></a>
                              </td>
                           </tr>';
            
        }
        $xhtmlCart .= '</tbody>
                        <tfoot>
                           <tr class="first last">
                              <td class="last" colspan="7">
                                 <input type="submit" name="update" value="Cập nhật" class="btn-update btn-cart">
                                 <button class="btn-continue btn-cart" title="Tiếp tục mua hàng" type="button" onclick="window.location.href='."'".url('collections')."'".'">
                                 <span>Tiếp tục</span>
                                 </button>
                              </td>
                           </tr>
                        </tfoot>
                     </table>';
         $xhtml .= '<div class="totals col-sm-6 col-md-5 col-xs-12 col-md-offset-7">
                        <div class="inner">
                           <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                              <tbody>
                                 <tr>
                                    <td>Tổng giá sản phẩm</td>
                                    <td class="a-right"><strong><span class="cl_price fs18">'.number_format($total, 0, ',', '.').'₫</span></strong></td>
                                 </tr>
                              </tbody>
                           </table>
                           <ul class="checkout">
                              <li>
                                 <button class="btn-proceed-checkout" title="Tiến hành thanh toán" type="button" onclick="window.location.href='."'".url('cart/checkout')."'".'">
                                 <span>Tiến hành thanh toán</span>
                                 </button>
                              </li>
                           </ul>
                        </div>
                     </div>';
    }else{
        $xhtmlCart .= 'Bạn chưa chọn sản phẩm nào !';
    }
    //END CODE 
?>

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="inner">
                <ul>
                    <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <li><span class="brn">Giỏ hàng</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
   

<section class="main-container col1-layout">
   <div class="main container">
      <div class="col-main cart-page">
         <div class="cart">
            <form action="{{ url('cart') }}" method="post" novalidate="">
               <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <div class="table-responsive">
                  <fieldset>
                     {!! $xhtmlCart !!}
                     
                  </fieldset>
               </div>
            </form>

            <div class="cart-collaterals row">
               {!! $xhtml !!}
            </div>

         </div>
      </div>
   </div>
</section>
   

@stop
      