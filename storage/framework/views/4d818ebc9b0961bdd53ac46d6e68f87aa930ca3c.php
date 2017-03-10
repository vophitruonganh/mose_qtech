<?php $__env->startSection('content'); ?> 
<?php 
   $email = $customer->customer_email;
   $fullname = $customer->customer_fullname;
   $address = $customer->customer_address;
   $phone = $customer->customer_phone;
   $customer_province = $customer->customer_province;
   $customer_district = $customer->customer_district;

?>
<div class="faq-area">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-lg-8 col-md-8 col-sm-8">
            <div class="faq-content">
               <h3 class="faq-title">Xin chào, <?php echo e(!empty($fullname) ? $fullname : $email); ?>!</h3>
               <div class="faq-desc">
                  <h3>Cập nhật thông tin tài khoản của bạn để hưởng các chính sách của cửa hàng vào chế độ bảo mật tốt nhất</h3>
               </div>
            </div>
            <div class="faq-accordion">
               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <?php if($orders): ?>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php
                        $order_code = get_template_order_code( $order->order_code); 
                        $order_meta = decode_serialize($order->om_value);
                        $total = 0;
                     ?>
                    <div class="panel panel-default actives">
                     <div class="panel-heading" role="tab" id="heading<?php echo e($order->order_code); ?>">
                        <h4 class="panel-title">
                           <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($order->order_code); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($order->order_code); ?>">
                           <?php echo e(date('d/m/Y', $order->date_create)); ?> - Mã đơn hàng: <?php echo e($order_code); ?>

                           </a>
                        </h4>
                     </div>
                     <div id="collapse<?php echo e($order->order_code); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo e($order->order_code); ?>">
                        <div class="panel-body">
                           <div class="wishlist-table table-responsive">
                              <div class="coupon">
                                 <h3>Thông tin đơn hàng</h3>
                                 <p>Đơn hàng sẽ được giao đến: <?php echo e($order_meta['fullname']); ?></p>
                                 <p>Địa chỉ: <?php echo e($order_meta['address']); ?></p>
                                 <p>Điện thoại: <?php echo e($order_meta['phone']); ?></p>
                                 <p>Tình trạng thanh toán : 
                                    <em style="font-size: 13px;">
                                    Đang xây dựng...
                                    -  <a href="<?php echo e(url('customer/order/'.$order->order_code)); ?>">Xem chi tiết</a>
                                    </em>
                                 </p>
                              </div>
                              <table>
                                 <tbody>
                                      <?php $__currentLoopData = $products[$order->order_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <?php 
                                          $title = $product->title;
                                          $slug  = $product->slug; 
                                          $price = $product->price;
                                          $image = $product->image;
                                          $quantity = $product->quantity_buy;
                                          $total += $price*$quantity;
                                       ?>
                                      <tr>
                                        <td style="width: 10%;" class="product-thumbnail"><a href="<?php echo e(url('collections/'.$slug)); ?>"><img src="<?php echo e(get_image_url($image)); ?>"></a></td>
                                         <td class="product-name"><a href="<?php echo e(url('collections/'.$slug)); ?>"><?php echo e($title); ?></a></td>
                                         <td class="product-price">
                                            <div class="price-box">
                                               <span class="special-price">
                                               <?php echo e(number_format($price,0,'.','.')); ?>₫
                                               </span>
                                            </div>
                                         </td>
                                         <td class="quantity">
                                            Số lượng : <?php echo e($quantity); ?>

                                         </td>
                                         <td class="product-price">
                                            <div class="price-box">
                                               <span class="special-price">
                                               <?php echo e(number_format($price*$quantity,0,'.','.')); ?>₫
                                               </span>
                                            </div>
                                         </td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  <?php endif; ?>
        
               </div>
            </div>
            <nav class="pull-left">
               <div>
                   <?php echo $orders->render(); ?>

                </div>
               <script>
                  $(window).on("load resize scroll",function(e){
                     if($( window ).width() < 480){
                        $('.active.page-item').each(function(){
                           var $this = $(this);
                           var num = $this.text();
                           num = Number(num);
                           var size = 1/2;
                        switch (num)
                        {
                           case 1: $this.parent().find('.page-item:nth-child(4)').hide();
                              break;
                  
                           case 2: $this.parent().find('.page-item:nth-child(5),.page-item:nth-child(7) ').hide();
                              break;
                  
                           case 3: $this.parent().find('.page-item:nth-child(5),.page-item:nth-child(6),.page-item:nth-child(8)').hide();
                              break;
                           case 4: $this.parent().find('.page-item:nth-child(3),.page-item:nth-child(7), .page-item:nth-child(9)').hide();
                              $this.parent().find('.page-item:nth-child(2) a').text('...');
                              break;
                           case size: $this.parent().find('.page-item:nth-child(4)').hide();
                              break;
                           case size-2: $this.parent().find('.page-item:nth-child(2), .page-item:nth-child(4), .page-item:nth-child(5)').hide();
                              break;
                           case size-3: $this.parent().find('.page-item:nth-child(2),.page-item:nth-child(4), .page-item:nth-child(9)').hide();
                              $this.parent().find('.page-item:nth-child(8) a').text('...');
                              break;
                  
                           default: $this.parent().find('.page-item:nth-child(4),.page-item:nth-child(8), .page-item:nth-child(2), .page-item:nth-child(10)').hide();
                        }
                     });
                  }
                            });     
               </script>
            </nav>
         </div>
         <aside class="col-right sidebar col-sm-4">
            <div class="block block-account">
               <div class="block-title" style="padding:10px;"><span>Thông tin tài khoản</span></div>
               <div class="block-content">
                  <ul>
                     <li class="current"><a>Tên tài khoản: <?php echo e($fullname); ?></a></li>
                     <li><a>Địa chỉ: <?php echo e($address); ?></a></li>
                     <li><a>Tỉnh/Thành phố: <?php echo e($province_name); ?></a></li>
                     <li><a>Quận/Huyện: <?php echo e($district_name); ?></a></li>
                     <li><a>Số điện thoại: <?php echo e($phone); ?></a></li>
                     <li><a href="<?php echo e(url('customer/edit')); ?>">Thay đổi địa chỉ</a></li>
                  </ul>
               </div>
            </div>
         </aside>
      </div>
   </div>
</div>



<style>
.faq-area {
    margin-bottom: 110px;
}
h3.faq-title {
    color: #4c4c4c;
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 15px;
}
.faq-desc {
    margin-bottom: 45px;
}
.faq-desc h3 {
    color: #333;
    font-size: 18px;
}
.faq-accordion .panel.panel-default.actives {
    border: 1px solid #363533;
}
.faq-accordion .panel-default > .panel-heading {
    background-color: #f5f5f5;
}
.faq-accordion .panel-heading {
    padding: 0;
}
.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
}
.faq-accordion .panel.panel-default.actives .panel-title a {
    color: #363533;
}
.faq-accordion .panel-title a {
    display: block;
    position: relative;
    padding: 15px 10px 15px 25px;
    color: #222;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.5;
}
.faq-accordion .panel-title a.collapsed::before, .faq-accordion .panel-title a::after {
    content: "";
    font-family: fontawesome;
    position: absolute;
    right: 15px;
    top: 16px;
}


/*right*/
.block-account {
    background-color: #f8f8f8;
}
.block-account .block-title {
    padding-left: 10px;
    background-color: #363533;
    color: #fff;
    border: none;
}
.block-account .block-content {
    padding: 0 10px;
}
.block-account .block-content ul {
    margin-top: 5px;
    margin-bottom: 5px;
}
.sidebar .block-content li.current {
    font-weight: bold;
    color: #333;
}
.block-account .block-content li {
    padding: 10px 0px;
    border-top: 1px #fff solid;
    border-bottom: 1px #ddd solid;
}
.block-account .block-content li:first-child {
    border-top: none;
}
.block-account .block-content li:before {
    content: "\f105";
    font-family: FontAwesome;
    font-size: 10px;
    display: inline-block;
    position: absolute;
    cursor: pointer;
    line-height: 16px;
    color: #333;
}
.block-account .block-content li a {
    cursor: pointer;
    padding: 0 12px;
    transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s;
}

</style> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>