<?php $__env->startSection('content'); ?>
<br/>
<form method="post" action="<?php echo e(url('cart/checkoutLogin')); ?>" data-toggle="validator" class="formCheckoutOrder">
    <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        <div context="checkout" class="container">
            <div class="main">
                <div class="wrap clearfix">
                    <div class="row">
                        
                         <!-- COL-FORM -->
                        <div class="col-md-4 col-sm-6">
                             <?php if( count($errors) > 0 ): ?>   
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <li><strong><?php echo e($error); ?></strong></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>  

                            <div class="form-group m0">
                                <h2>
                                    <label class="control-label">Thông tin mua hàng</label>
                                </h2>
                            </div>
                            <hr class="divider">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo e($user->user_email); ?>" disabled>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="phone" name="phone" id="phone" value="<?php echo e($user->user_telephone); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="address" id="address" value="<?php echo e($address); ?>" disabled>
                            </div>
                            <hr class="divider">
                            <div class="form-group">
                                <textarea name="note" class="form-control" placeholder="Ghi chú"><?php echo e(old('note')); ?></textarea>
                            </div>
                        </div>
                         <!-- END COL-FORM -->
                        
                        <!-- COL-MD-4 -->
                        <div class="col-md-4 col-sm-6">

                        </div>
                        <!-- END COL-MD-4 -->
                        
                        <!-- COL-SESSION -->
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
                                            <?php if(!empty($orderCart)): ?>
                                                <?php 
                                                    $total = 0;
                                                ?>
                                                <?php $__currentLoopData = $orderCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php 
                                                    $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->product_title);
                                                    $totalPrice = $priceHeader[$value->product_id] * $quantity[$value->product_id];
                                                    $total      += $totalPrice;
                                                    $post_meta  = decode_serialize($value->meta_value);
                                                    $post_meta['post_featured_image'] = isset($post_meta['post_featured_image'] ) ? $post_meta['post_featured_image'] : '';
                                                    $post_meta['post_featured_image'] = '';
                                                ?>
                                                    <li class="product product-has-image clearfix">
                                                        <img src="<?php echo e(get_image_url($post_meta['post_featured_image'])); ?>" alt="<?php echo e($title); ?>" class="pull-left product-image">
                                                        <div class="product-info pull-left">
                                                            <span class="product-info-name">
                                                            <strong><?php echo e($title); ?></strong> x <?php echo e($quantity[$value->product_id]); ?>

                                                            </span>
                                                        </div>
                                                        <strong class="product-price pull-right">
                                                        <?php echo e(number_format($totalPrice, 0, ',', '.')); ?>₫
                                                        </strong>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="summary-section">
                                    <div class="total-line total-line-subtotal clearfix">
                                        <span class="total-line-name pull-left">
                                        Tạm tính
                                        </span>
                                        <span class="total-line-subprice pull-right"><?php echo e(number_format($total, 0, ',', '.')); ?>₫</span>
                                    </div>
                                    <div class="total-line total-line-shipping clearfix" bind-show="requiresShipping">
                                        <span class="total-line-name pull-left">
                                        Phí ship
                                        </span>
                                        <span class="total-line-shipping pull-right">0₫</span>
                                    </div>
                                    <div class="total-line total-line-total">
                                        <span class="total-line-name pull-left">
                                        Tổng cộng
                                        </span>
                                        <span class="total-line-price pull-right"><?php echo e(number_format($total, 0, ',', '.')); ?>₫</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <input class="btn btn-primary col-md-12 mt10" type="submit" value="ĐẶT HÀNG">
                            </div>
                        </div>
                        <!-- END COL SESSION -->
                        
                    </div>
                </div>
            </div>
        </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>