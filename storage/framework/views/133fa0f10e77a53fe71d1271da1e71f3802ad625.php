<?php $__env->startSection('content'); ?>

<?php 
    $email = isset($order_meta['email']) ? $order_meta['email']: '';
    $address = isset($order_meta['address']) ? $order_meta['address']: '';
    $fullname =  isset($order_meta['fullname']) ? $order_meta['fullname']: '';
    $province =  isset($order_meta['province']) ? $order_meta['province']: '';
    $district =  isset($order_meta['district']) ? $order_meta['district']: '';
    $phone =  isset($order_meta['phone']) ? $order_meta['phone']: '';
    $total_temp = $order->amount_order;
    $total = $order->amount_payment;
    $discount_title = $order->order_discount_notes
 ?>
 <div context="checkout" class="container">         
<div class="main">
    <div class="wrap clearfix">
        <div class="row thankyou-message">
            <div class="col-md-12">
                <div class="thankyou-message-icon">
                    <div class="icon icon--order-success svg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="thankyou-message-text">
                    <h3>Cảm ơn bạn đã đặt hàng</h3>
                    <p>
                        Một email xác nhận đã được gửi tới <?php echo e($email); ?>. Xin vui lòng kiểm tra email của bạn
                    </p>
                    <em>
                    </em>
                </div>
            </div>
        </div>
        <div class="row thankyou-infos">
            <div class="col-md-4 thankyou-infos-left">
                <div class="order-summary order-summary--custom-background-color ">
                    <div class="order-summary-header">
                        <h2>
                            <label class="control-label">Địa chỉ giao hàng & thanh toán</label>
                        </h2>
                    </div>
                    <div class="summary-section">
                        <p class="address-name">
                            <?php echo e($fullname); ?>

                        </p>
                        <p class="address-address">
                            <?php echo e($address); ?>

                        </p>
                        <p class="address-province">
                            <?php echo e($district); ?> - <?php echo e($province); ?>

                        </p>
                        <p class="address-phone">
                            <?php echo e($phone); ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 thankyou-infos-right">
                <div class="order-summary order-summary--custom-background-color ">
                    <div class="order-summary-header">
                        <h2>
                            <label class="control-label">Đơn hàng</label>
                            <?php echo e(get_template_order_code($order->order_code)); ?>

                        </h2>
                    </div>
                    <div class="summary-body  summary-section">
                        <div class="summary-product-list">
                            <ul class="product-list">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php 
                                    $title = $product->title;
                                    $quantity = $product->quantity_buy;
                                    $variant_name = $product->variant_name;
                                    $total_price = $quantity* $product->price;
                                    $image = set_image_size(get_image_url($product['image']),'thumb')
                                 ?>
                                <li class="product product-has-image clearfix">
                                    <img src='<?php echo e($image); ?>' alt='File hộp gập 4cm Hồng' class='pull-left product-image' />
                                    <div class="product-info pull-left">
                                        <span class="product-info-name">
                                            <strong><?php echo e($title); ?></strong> x <?php echo e($quantity); ?>

                                        </span>
                                        <span class="product-info-description">
                                           <?php echo e($variant_name); ?>

                                        </span>
                                    </div>
                                        <strong class="product-price pull-right">
                                    <?php echo e(number_format($total_price, 0, ',', '.')); ?>&#8363;
                                    </strong>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            </ul>
                        </div>
                    </div>
                    <div class="summary-section">
                        <div class="total-line total-line-subtotal clearfix">
                            <span class="total-line-name pull-left">
                            Giá
                            </span>
                            <span class="total-line-subprice pull-right">
                            <?php echo e(number_format($total_temp, 0, ',', '.')); ?>&#8363;
                            </span>
                        </div>
                        <!-- <div class="total-line total-line-shipping clearfix">
                            <span class="total-line-name pull-left">
                            Phí ship
                            </span>
                            <span class="pull-right">
                            40.000&#8363;
                            </span>
                        </div> -->
                        <div class="total-line total-line-shipping clearfix">
                            <span class="total-line-name pull-left">
                            <?php echo e($discount_title); ?>

                            </span>
                            <span class="pull-right">
                            <?php if($discount_title): ?> <?php echo e(number_format($total-$total_temp, 0, ',', '.')); ?>&#8363; <?php endif; ?>
                            </span>
                        </div>
                        <!-- <div class="total-line payment-info clearfix">
                            <span class="total-line-name pull-left">
                            Phương thức thanh toán
                            </span>
                            <span class="pull-right text-right">
                            <span>Thanh toán khi giao hàng (COD)</span><br />
                            <small>
                            cod
                            </small>
                            </span>
                        </div> -->
                        <!-- <div class="total-line payment-info clearfix">
                            <span class="total-line-name">
                            Hướng dẫn thanh toán
                            </span>
                            <p>cod</p>
                        </div> -->
                    </div>
                    <div class="summary-section">
                        <div class="total-line total-line-total clearfix">
                            <strong class="total-line-name pull-left">
                            Tổng cộng
                            </strong>
                            <span class="total-line-price pull-right">
                            <?php echo e(number_format($total, 0, ',', '.')); ?>&#8363;
                            </span>
                        </div>
                    </div>
                </div>
                <div class="order-success unprint">
                    <a href="<?php echo e(url('collections')); ?>" class="btn btn-primary">
                    Tiếp tục mua hàng
                    </a>
                    <a onClick="window.print()" class="nounderline print-link" href="javascript:void(0)">
                    In 
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien6.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>