<?php $__env->startSection('content'); ?>
<?php 
$cart_order = decode_serialize(Cookie::get('cart')); 
$email = isset($customer->customer_email) ? $customer->customer_email : '';
$fullname = isset($customer->customer_fullname) ? $customer->customer_fullname : '';
$phone = isset($customer->customer_phone) ? $customer->customer_phone : '';
$address = isset($customer->customer_address) ? $customer->customer_address : '';
$gender = isset($customer->customer_gender) ? $customer->customer_gender : '';
$province = isset($customer->customer_province) ? $customer->customer_province : '';
$district = isset($customer->customer_district) ? $customer->customer_district : '';
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
               <li class="cl_breadcrumb">Thanh Toán</li>
            </ul>
         </div>
      </div>
   </div>
</div>

<main class="main-content">
   <section id="columns" class="columns-container">
      <div class="container">
         <div class="row">
            <form method="post" action="<?php echo e(url('cart/checkout')); ?>" data-toggle="validator" class="formCheckout">
            <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
               <div context="checkout" class="container">
                  <div class="main">
                     <div class="wrap clearfix">
                        <div class="row">
                            <div class="col-md-2 hidden-sm"></div>
                            
                           <div class="col-md-4 col-sm-6">
                              <div class="form-group m0">
                                 <h2>
                                    <label class="control-label">Thông tin mua hàng</label>
                                 </h2>
                              </div>
                              <div class="form-group">
                                 <a href="<?php echo e(url('user/register')); ?>">Đăng ký tài khoản mua hàng</a>
                                 |
                                 <a href="<?php echo e(url('user/login')); ?>">Đăng nhập </a>
                              </div>
                               <?php if( count($errors) > 0 ): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <li><strong><?php echo e($error); ?></strong></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                              <hr class="divider">
                              <!--thông tin mua hang-->   
                              <div class="form-group">
                                 <input type="email" class="form-control" name="email" id="BillingAddress_Email" placeholder="Email" value="<?php echo e(old('email',$email)); ?>">
                              </div>
                              <div class="form-group">
                                 <input class="form-control" name="nickname" id="BillingAddress_LastName" placeholder="Họ và tên" value="<?php echo e(old('fullname',$fullname)); ?>">
                              </div>
                              <div class="form-group">
                                 <input class="form-control" name="phone" id="BillingAddress_Phone" placeholder="Số điện thoại" value="<?php echo e(old('phone',$phone)); ?>">
                              </div>
                              <div class="form-group">
                                 <input name="address" id="BillingAddress_Address1" class="form-control" placeholder="Địa chỉ" value="<?php echo e(old('address',$address)); ?>">
                              </div>
                              <div class="form-group">
                                <select name="gender" class="form-control">
                                    <option value="choise">— Chọn giới tính —</option>
                                    <option value="1" <?php if($gender == '1' ): ?>selected="selected"<?php endif; ?> >Nam</option>
                                    <option value="2" <?php if($gender == '2' ): ?>selected="selected"<?php endif; ?> >Nữ</option>
                                    <option value="3" <?php if($gender == '3' ): ?>selected="selected"<?php endif; ?> >Khác</option>
                                </select>
                              </div>
                              <div class="form-group">
                                  <select id="provinces" name="province" class="form-control">
                                      <option value="">— Chọn Tỉnh/Thành Phố —</option>
                                      <?php $__currentLoopData = $provincesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provinceList): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <option value="<?php echo e($provinceList->province_id); ?>" <?php if( $province == $provinceList->province_id ): ?>selected="selected"<?php endif; ?> ><?php echo e($provinceList->province_name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <select id="districts" name="district" class="form-control">
                                      <option value="">— Chọn Quận/Huyện —</option>
                                      <?php $__currentLoopData = $districtsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $districtList): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <option  value="<?php echo e($districtList->district_id); ?>" <?php if( $district == $districtList->district_id ): ?>selected="selected"<?php endif; ?> ><?php echo e($districtList->district_name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                  </select>
                              </div>
                              <hr class="divider">
                              <div class="form-group">
                                 <textarea name="note" value="" class="form-control" placeholder="Ghi chú"><?php echo e(old('note')); ?></textarea>
                              </div>
                              <!-- end thông tin mua hang-->   
                           </div>
                           
                           <div class="col-md-4 col-sm-6">
                              <div class="order-summary order-summary--custom-background-color ">
                                 <div class="order-summary-header">
                                    <h2>
                                       <label class="control-label">Đơn hàng</label>
                                    </h2>
                                 </div>
                                 <div class="summary-body  summary-section">
                                    <div class="summary-product-list">
                                       <ul class="product-list">
                                       <?php if($cart_order): ?>
                                       <?php
                                             $total = 0; 
                                             $variants = [];  
                                             $total_temp = 0;  
                                       ?>
                                        <?php $__currentLoopData = $cart_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php 
                                            $total_price = $cart['price'] * $cart['quantity'];
                                            $total_temp += $total_price;
                                            $arr = [
                                                'variant_id'    => $cart['variant_id'], 
                                                'quantity'      => $cart['quantity'],
                                            ];
                                            array_push($variants,$arr);
                                        ?>

                                        <li class="product product-has-image clearfix">
                                                <img src="<?php echo e(set_image_size(get_image_url($cart['variant_image']),'thumb')); ?>" alt="<?php echo e($cart['product_title']); ?>" class="pull-left product-image">
                                                <div class="product-info pull-left">
                                                   <span class="product-info-name">
                                                      <strong><?php echo e($cart['product_title']); ?></strong> x <?php echo e($cart['quantity']); ?>

                                                   </span>
                                                    <p><?php echo e($cart['variant_meta']); ?></p>
                                                </div>
                                                <strong class="product-price pull-right">
                                                    <?php echo e(number_format($total_price, 0, ',', '.')); ?>₫
                                                </strong>
                                             </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php endif; ?>

                                       </ul>
                                    </div>
                                 </div>
                                
                                 <?php 
                                    $cart_meta = promotionOrder($variants);
                                 ?>
                                 <div class="summary-section">
                                        <div class="form-group m0">
                                            <div class="input-group">
                                                <input bind="code" name="code" id="code" type="text" class="form-control" placeholder="Nhập mã giảm giá">
                                                <span class="input-group-btn">
                                                <button onclick="change_code()" class="btn btn-primary event-voucher-apply" type="button">Áp dụng</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="error mt10 hide" bind-show="inValidCode">
                                            Mã khuyễn mãi không hợp lệ
                                        </div>
                                    </div>
                                 <div class="summary-section">

                                    <div class="total-line total-line-subtotal clearfix">
                                       <span class="total-line-name pull-left">
                                       Tạm tính
                                       </span>
                                       <span class="total-line-subprice pull-right"><?php echo e(number_format($total_temp, 0, ',', '.')); ?>₫</span>
                                    </div>
                                    <div class="total-line total-line-shipping clearfix" bind-show="requiresShipping">
                                       <span class="total-line-name pull-left discount-title">
                                       <?php echo e($cart_meta['title']); ?>

                                       </span>
                                       <span class="total-line-shipping pull-right discount-price"><?php if($cart_meta['title']): ?>- <?php echo e(number_format($cart_meta['discount_price'], 0, ',', '.')); ?>₫ <?php endif; ?></span>
                                    </div>
                                    <div class="total-line total-line-total">
                                       <span class="total-line-name pull-left">
                                       Tổng cộng
                                       </span>
                                       <span class="total-line-price pull-right total-price"><?php echo e(number_format($cart_meta['total'], 0, ',', '.')); ?>₫</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group clearfix">
                                 <input class="btn btn-primary col-md-12 mt10" type="submit" value="ĐẶT HÀNG">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
          
         </div>
      </div>
   </section>
</main>

<script>
    function change_code(){
        var code = '';
        code = $('#code').val();
        if(code==''){
            code = '0';
        }
        $.ajax({
            method: 'get',
            url: '/cart/get_discount_code/'+code,
            success: function(data){
                value = data;
                $('.discount-title').html(value['title']);
                $('.discount-price').html(' <span class="pull-right"> - '+value['discount_price']+ 'đ'+'</span>');
                $('.total-price').html(value['total']+'đ');
                $('#code_discount').val(code);
            }
        });
    }

    $(document).on('change','#provinces', function() {
        var id_province = $('#provinces').val();
        $.ajax({
            method: 'get',
            url: '/cart/get_district/'+id_province,
            success: function(data){
                $('#districts').html(data);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien7.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>