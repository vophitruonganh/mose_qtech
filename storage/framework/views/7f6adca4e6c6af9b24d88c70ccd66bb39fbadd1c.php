<?php $__env->startSection('content'); ?>

<?php 
   $xhtml = '';
   $_xhtml = '';
   $total = 0; 
   if(!empty($orderCart))
   {
      $xhtml .='<thead>
                  <tr class="first last">
                     <th rowspan="1">Ảnh sản phẩm</th>
                     <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                     <th colspan="1" class="a-center">Đơn giá</th>
                     <th class="a-center" rowspan="1">Số lượng</th>
                     <th colspan="1" class="a-center">Thành tiền</th>
                     <th rowspan="1">Xoá</th>
                  </tr>
               </thead>';
      $xhtml .='<tbody>';
      foreach($orderCart as $key => $value)
      {
           $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
           $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
           $total      += $totalPrice;
           $post_meta  = decode_serialize($value->meta_value);
           $xhtml      .= '<tr>';
           $xhtml      .=     '<td class="image"><a class="product-image" title="'.$value->post_title.'" href="'.url('collections/'.$value->post_slug).'"><img width="150" height="150" alt="'.$value->post_title.'" src="'.loadFeatureImage($post_meta['post_featured_image']).'"></a></td>
                              <td>';
           $xhtml      .=  '<h2 class="product-name"> <a href="'.url('collections/'.$value->post_slug).'">'.$title.'</a> </h2>
                              </td>';
           $xhtml      .=  '<td><span class="cart-price"> <span class="price">'.number_format($priceHeader[$value->post_id], 0, ',', '.').'₫</span> </span></td>';
           $xhtml      .=  '<td class="txt_center"><input type="number" maxlength="12" min="0" class="input-text qty" title="Số lượng" size="4" value="'.$quantity[$value->post_id].'" name="quantity['.$value->post_id.']" id="updates_653826"></td>';
           $xhtml      .= '<td><span class="cart-price"> <span class="price">'.number_format($totalPrice, 0, ',', '.').'₫</span> </span></td>';
           $xhtml      .=      '<td class="txt_center">
                                 <a class="button remove-item" title="Xóa" onclick="deletePerItem('.$value->post_id.')" data-id="653826"><span><img src="'.asset('template/giaodien7/img/bin.png').'" alt=""></span></a>
                              </td>';
           $xhtml      .= '</tr>';
      }
      $xhtml .='</tbody>';
      $xhtml .='<tfoot>
                           <tr class="first last">
                              <td class="last" colspan="7">
                                 <input type="submit" name="update" value="Cập nhật" class="btn btn-update button btn-cart">
                                 <button class="button btn btn-continue btn-cart" title="Tiếp tục mua hàng" type="button" onclick="window.location.href='."'".url('/collections')."'".'">
                                 <span><a href="'.url('/').'" >Tiếp tục</a></span>
                                 </button>
                              </td>
                           </tr>
                        </tfoot>';
      $_xhtml .= '  <div class="inner">
                     <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                        
                        <tfoot>
                           <tr>
                              <td colspan="1" class="a-left">Tổng tiền</td>
                              <td class="a-right"><strong><span class="price">'.number_format($total, 0, ',', '.').'₫</span></strong></td>
                           </tr>
                        </tfoot>
                     </table>
                     <ul class="checkout">
                        <li>
                           <button class="btn btn-proceed-checkout" title="Tiến hành thanh toán" type="button" onclick="window.location= '."'".url('cart/checkout')."'".'" >
                           <span>Tiến hành thanh toán</span>
                           </button>
                        </li>
                     </ul>
                  </div>';

   }else {
      $xhtml .= 'Bạn chưa chọn sản phẩm nào';
   }
 ?>
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home">
                  <a title="Quay lại trang chủ" href="/">Trang chủ</a>
               </li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li class="cl_breadcrumb">Giỏ hàng</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<section class="main-container col1-layout">
   <div class="main container">
      <div class="col-main cart-page">
         <div class="cart">
            <form action="<?php echo e(url('cart')); ?>" method="post" novalidate="">
            <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
               <div class="table-responsive">
                  <fieldset>
                     <table class="data-table cart-table" id="shopping-cart-table">
                        <colgroup>
                           <col>
                           <col>
                           <col>
                           <col>
                           <col>
                           <col>
                           <col>
                        </colgroup>
                        <?php echo $xhtml; ?>
                        
                     </table>
                  </fieldset>
               </div>
            </form>
            <div class="cart-collaterals row">
               <div class="totals col-sm-6 col-md-5 col-xs-12 col-md-offset-7">
                  <?php echo $_xhtml; ?>
                  <!--inner-->
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien7.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>