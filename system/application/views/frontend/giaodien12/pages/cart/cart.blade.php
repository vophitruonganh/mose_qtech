@extends('frontend.giaodien12.layouts.default')
@section('content')   

<?php
    $xhtml       = '';
    $xhtmlUpdate = '';
    $xhtmlCart   = ''; 
    $total = 0;
    
    //CODE CHEN TABLE CART SESSION
    if(!empty($orderCart)){
        $xhtml .= '<table class="table big_screen"><tbody>';
        $xhtml .= '<tr class="cart_title">
                              <td class="img_item_cart_title"></td>
                              <td>
                                 Tên sản phầm
                              </td>
                              <td class="td_item_price">
                                 Đơn giá
                              </td>
                              <td>
                                 Số lượng
                              </td>
                              <td>
                                 Thành tiền
                              </td>
                              <td></td>
                           </tr>';
        foreach ($orderCart as $key => $value){
            $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
            $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
            $total      += $totalPrice;
            $post_meta  = decode_serialize($value->meta_value);
            $xhtml .= '<tr class="cart_items">
                              <!--hình ảnh-->
                              <td class="img_item_cart">
                                 <img alt="'.$title.'" src="'.loadFeatureImage($post_meta['post_featured_image']).'" class="img-responsive">
                              </td>
                              <!--tên sản phẩm-->
                              <td class="cart_item_title">
                                 <a href="'.url('collections/'.$value->post_slug).'" title="'.$title.'">'.$title.'</a> 
                              </td>
                              <!--giá-->
                              <td class="cart_price_item"> '.number_format($priceHeader[$value->post_id], 0, ',', '.') .'₫</td>
                              <!--số lượng-->
                              <td>
                                 <input type="number" class="big_input form-control mod input-control" min="1" name="quantity['.$value->post_id.']" value="'.$quantity[$value->post_id].'">
                              </td>
                              <!--thành tiền-->
                              <td class="cart_price_total">'.number_format($totalPrice, 0, ',', '.') .'₫</td>
                              <!--xóa-->
                              <td class="cart_item_close"><a onclick="deletePerItem('.$value->post_id.')" data-id="778393">X</a></td>
                           </tr>';
        }
        $xhtml .= ' </tbody></table>';
        $xhtml .= '<div class="cart_footer col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="cart_option_btn col-xs-12 col-sm-8 col-md-8 col-lg-8 pull-left text-left">
                           <a class="btn btn-default shop_link" href="'.url('collections').'" role="button">Mua Thêm</a>
                           <button class="btn btn-default" name="update" type="submit">Cập nhật</button>
                        </div>
                        <div class="cart_checkout pull-right col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right text-right">
                           <div class="cart_checkout_total pull-right text-right col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right text-right">
                              Thành tiền: '.number_format($total, 0, ',', '.').'₫
                           </div>
                           <div class="cart_checkout_pay pull-right text-right col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right text-right">
                              <a class="btn btn-default" href="'.url('cart/checkout').'" type="button">Thanh toán</a>
                           </div>
                        </div>
                     </div>';
        
    }else{
       $xhtml .= 'Bạn chưa chọn sản phẩm nào';
    }
    //END CODE 
?>
<div id="site-content">
   <div id="main">
      <div class="header-breadcrumb">
         <div class="container">
            <div class="row ">
               <div class="col-xs-12">
                  <ol class="breadcrumb">
                     <li><a href="/" title="Trang chủ">Trang chủ</a>
                     </li>
                     <!-- blog -->
                     <li class="active breadcrumb-title">Giỏ hàng</li>
                     <!-- collection -->
                     <!-- current_tags -->
                  </ol>
               </div>
            </div>
         </div>
      </div>
     
      <!--====================Cart Begin=============================-->
      <div class="cart_div">
         <div class="container">
            <div class="row">
               <div class="cart_div_center col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <form action="{{ url('cart') }}" method="post" id="cart_form" class="clearfix big_screen_form">
                     <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                     {!! $xhtml !!}
                      
                       

                     <!-- FOTTER-->

                     

                  </form>
                  
               </div>
            </div>
         </div>
      </div>
      <!--====================Cart End=============================-->
   </div>
</div>          

@stop