<?php $__env->startSection('titlePage','Chi tiết đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Danh sách đơn hàng',
        'heading_text' => 'Thông tin đơn hàng',
    );
    $country_currency = 2;
    if(isset($option_load['country_currency'])){
        $country_currency = $option_load['country_currency'];
    }
    
    $setion_heading = section_title($heading);
    $fullname = isset($order_meta['fullname']) ? $order_meta['fullname'] : '';
    $company = isset($order_meta['company']) ? $order_meta['company'] : '';
    $phone = isset($order_meta['phone']) ? $order_meta['phone'] : '';
    $address = isset($order_meta['address']) ? $order_meta['address'] : '';
    $province = isset($order_meta['province']) ? $order_meta['province'] : '';
    $district = isset($order_meta['district']) ? $order_meta['district'] : '';
    $email = isset($order_meta['email']) ? $order_meta['email'] : '';
?>
    <?php if(count($data_cancel)>0): ?>
        <p>Đơn hàng được hủy vào lúc <?php echo e($data_cancel['time']); ?></p>
        <p>Bởi <?php echo e($data_cancel['user_cancel']); ?> Lý do: <?php echo e($data_cancel['reason_cancel']); ?></p>
        <?php if($data_cancel['note']!=''): ?>
        <p>Ghi chú: <?php echo e($data_cancel['note']); ?></p>
        <?php endif; ?>
    <?php endif; ?>
    <div class="section-order order-detail">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form action="<?php echo e(url('admin/order/create')); ?>" method="post">
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical box-typical-margin">
                        <div class="box-heading box-heading-padding">
                            <h3>Mã đơn hàng: <?php echo e($order_code); ?></h3>
                        </div>
                        <div class="box-body box-body-padding p-t-0">
                            <div class="detail-table">
                                <table class="table table-np">
                                    <tbody>

                                        <?php $__currentLoopData = $product_temp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php 
                                            $quantity_buy = $product['quantity_buy'];
                                            $price = number_format($product['price'], 0, ',', ',');
                                            $total_product = number_format($quantity_buy*$product['price'], 0, ',', ',');
                                        ?>
                                        <tr>
                                            <td class="col-1"><div class="product-thumb"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="<?php echo e($product['image']); ?>"></div></div></div></div></td>
                                            <td class="col-2">
                                                <div class="title-link"><a href="<?php echo e($product['product_url']); ?>"><?php echo e($product['title']); ?></a></div>
                                                <div><?php echo e($product['variant_name']); ?></div>
                                            </td>
                                            <td class="col-3 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount"><?php echo e($price); ?></span> <span class="currency-symbols" data-type="VND">₫</span>
                                                </div>
                                            </td>
                                            <td class="col-4 text-xs-center text-muted">x</td>
                                            <td class="col-5 text-muted"><?php echo e($quantity_buy); ?></td>
                                            <td class="col-6 text-nowrap text-xs-right">
                                                <div class="price-group">
                                                    <span class="amount"><?php echo e($total_product); ?></span> <span class="currency-symbols" data-type="VND">₫</span>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
        <!--     <p>Mã khuyến mãi:  -<?php echo e(number_format($order->amount_discount, 0, ',', '.')); ?> ₫</p>
            <?php if($order->order_discount_notes): ?><p><?php echo e($order->order_discount_notes); ?></p><?php endif; ?>
            <?php if(count($order_shipping)>0): ?>Phí vận chuyển (<?php echo e($order_shipping['shipping_name']); ?>)  <?php echo e($order_shipping['shipping_price']); ?> ₫<?php endif; ?>
            <p>Số tiền phải thanh toán:    <?php echo e(number_format($order->amount_payment, 0, ',', '.')); ?> ₫</p>
            <p>Số tiền đã thanh toán:  415,000 ₫</p>
            <p>Số tiền đã hoàn trả:    <?php echo e(number_format($order->amount_refuned, 0, ',', '.')); ?> ₫</p>
            <p>Số tiền thực nhận:  415,000 ₫</p> -->
                            <div class="amount-table">
                                <table class="table table-np">
                                    <tbody>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Tổng giá trị sản phẩm:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount"><?php echo e(number_format($order->amount_order)); ?></span> <?php echo get_currency($country_currency); ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Mã khuyến mãi:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount"><?php echo e(number_format($order->amount_order)); ?></span> <?php echo get_currency($country_currency); ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Số tiền đã thanh toán:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount"><?php echo e(number_format($order->amount_order)); ?></span> <?php echo get_currency($country_currency); ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Tổng giá trị sản phẩm:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount"><?php echo e(number_format($order->amount_order)); ?></span> <?php echo get_currency($country_currency); ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Số tiền thực nhận:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount"><?php echo e(number_format($order->amount_order)); ?></span> <?php echo get_currency($country_currency); ?>

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="box-typical">
                        <div class="box-body box-body-padding">
                            <div class="form-group m-b-0">
                                <label for="">Ghi chú đơn hàng</label>
                                <textarea name="" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link" href="<?php echo e(url('admin/order/trash/'.$order->order_code)); ?>">Hủy</a>
                                <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Product.Submit">Cập nhật</button>
                            </div>
                        </div>
                        <div class="proj-page-section order-customer">
                            <div class="proj-page-subtitle">
                                <h3>Thông tin giao hàng</h3>
                                <div class="dropdown-action">
                                    <div class="dropdown">
                                        <button class="btn btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-20">more_vert</i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item modal-render" href="javascript:;" data-action="update" data-type="customer" data-bind="click: Order.RenderModal">Chỉnh sửa thông tin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-customer-info">
                                <ul>
                                    <li><span class="label-heading">Họ tên:</span> <span class="text"><?php echo e($fullname); ?></span></li>
                                    <li><span class="label-heading">Số điện thoại:</span> <span class="text"><?php echo e($phone); ?></span></li>
                                    <li><span class="label-heading">Email:</span> <span class="text"><?php echo e($email); ?></span></li>
                                    <li><span class="label-heading">Địa chỉ:</span> <span class="text"><?php echo e($address); ?></span></li>
                                    <li><span class="label-heading">Quận/Huyện:</span> <span class="text"><?php echo e($district); ?></span></li>
                                    <li><span class="label-heading">Tỉnh/Thành phố:</span> <span class="text"><?php echo e($province); ?></span></li>
                                    <li><a href="<?php echo e($urlMap); ?>" target="_blank"><i class="material-icons md-18">location_on</i> Xem bản đồ</a></li>
                                    <li><a href=""><i class="material-icons md-18">location_on</i> Thông tin khách hàng</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="proj-page-subtitle"><h3>Thông tin vận chuyển</h3></div>
                            <div class="">
                                <ul>
                                    <li>Tổng khối lượng: 0</li>
                                    <li>Phí vận chuyển: 0</li>
                                    <li>Phương thức: Giao hàng tận nơi</li>
                                    <li>Nhà vận chuyển: Giaohangnhanh</li>
                                    <li>Mã vận chuyển: #jdksaj</li>
                                    <li>Trạng thái thu hộ (COD): chưa thu</li>
                                    <li>Trạng thái vận chuyển: Chờ lấy hàng</li>
                                    <li>Tình trạng: Đang vận chuyển</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <a href="#">Giao hàng</a>
    <a href="<?php echo e(url('admin/order/refuned/'.$order->order_code)); ?>">Hoàn trả</a>
    <form id="form" name="form" action="<?php echo e(url('admin/order/update-status/'.$order->order_code)); ?>" method="post" enctype="multipart/form-data">
        <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php if($order->order_status!=0 && $order->order_status!=2): ?>
            <input type="submit" value="Xác nhận đã thanh toán">
        <?php endif; ?>
        <?php if($order->order_active==0): ?>
            <a href="<?php echo e(url('admin/order/active-order/'.$order->order_code)); ?>">Xác thực</a>
        <?php endif; ?>
        <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <input id="order_code" name="order_code" type="hidden" value="<?php echo e($order->order_code); ?>"/>
        <table>
            <tbody>
                <?php $i=0; ?>
                <?php $__currentLoopData = $product_temp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php 
                    $quantity_buy = $product['quantity_buy'];
                    $quantity_refuned = $product['quantity_refuned'];
                    $price = number_format($product['price'], 0, ',', '.');
                    $total_product = number_format($quantity_buy*$product['price'], 0, ',', '.');
                    
                 ?>
                <tr>
                    <td><img src="<?php echo e($product['image']); ?>">   </td>
                    <td><?php echo e($product_temp[$i]['title']); ?><br><?php echo e($product_temp[$i]['variant_name']); ?><br><?php echo e($quantity_buy); ?> chưa hoàn thành <?php if($quantity_refuned!=0): ?><br><?php echo e($quantity_refuned); ?> nhập kho <?php endif; ?></td>
                    <td><?php echo e($quantity_buy); ?> * <?php echo e($price); ?> đ</td>
                    <td><?php echo e($total_product); ?> đ</td>
                </tr>
                <?php $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
        <div class="row">
            <p>Tổng giá trị sản phẩm:  <?php echo e(number_format($order->amount_order, 0, ',', '.')); ?>đ</p>
            <p>Mã khuyến mãi:  -<?php echo e(number_format($order->amount_discount, 0, ',', '.')); ?> ₫</p>
            <?php if($order->order_discount_notes): ?><p><?php echo e($order->order_discount_notes); ?></p><?php endif; ?>
            <?php if(count($order_shipping)>0): ?>Phí vận chuyển (<?php echo e($order_shipping['shipping_name']); ?>)  <?php echo e($order_shipping['shipping_price']); ?> ₫<?php endif; ?>
            <p>Số tiền phải thanh toán:    <?php echo e(number_format($order->amount_payment, 0, ',', '.')); ?> ₫</p>
            <p>Số tiền đã thanh toán:  415,000 ₫</p>
            <p>Số tiền đã hoàn trả:    <?php echo e(number_format($order->amount_refuned, 0, ',', '.')); ?> ₫</p>
            <p>Số tiền thực nhận:  415,000 ₫</p>
        </div>
        <hr>
        <div class="row">
            <a href="<?php echo e(url('admin/order/shipping-info/'.$order->order_code)); ?>">Chỉnh sửa địa chỉ </a><br>
            Địa chỉ giao hàng<br>
            <?php echo e($company); ?>

            <?php echo e($fullname); ?><br>
            <?php echo e($address); ?><br>
            <?php echo e($province); ?><br>
            <?php echo e($district); ?><br>
            <?php echo e($phone); ?><br>
            <?php echo e($email); ?><br>
            <!-- Phương thức: Giao hàng tận nơi<br> -->
            Tổng khối lượng: <?php echo e($order_weight); ?> kg<br>
        </div>
        <hr>
        <div class="row">
            <?php if($user_create!=''): ?>
                Nhân viên tạo: <?php echo e($user_create); ?>

            <?php endif; ?>
        </div>
    </form>
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>