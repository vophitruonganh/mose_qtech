<?php $__env->startSection('titlePage','Cập nhật đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Cập nhật đơn hàng',
        'heading_text' => 'Cập nhật',
    );
    $setion_heading = section_title($heading);
    $country_currency = 2;
    if(isset($option_load['country_currency'])){
        $country_currency = $option_load['country_currency'];
    }
?>
    <div class="section-order order-create" data-bind="load: Order.DropdownSet, load: Order.RenderModal">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form action="<?php echo e(url('admin/order/draft/'.$order->order_code)); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical">
                        <div class="box-heading box-heading-padding">
                            <h3>Chi tiết đơn hàng</h3>
                        </div>
                        <div class="box-body box-body-padding p-t-0">
                            <div class="product-table m-b-1" data-bind="load: Order.RemoveProduct, load: Order.UpdateProduct">
                                <div class="product-table-alerts"></div>
                                <table class="table table-np">
                                    <tbody>
                                        <?php 
                                            $amount_order = number_format($order->amount_order, 0, ',', ',');
                                            $amount_payment = number_format($order->amount_payment, 0, ',', ',');
                                            $order_discount = number_format($order->order_discount, 0, ',', ',');
                                        ?>
                                        <?php $__currentLoopData = $array_product_temp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php 
                                            $price = number_format($value['price'], 0, ',', ',');
                                            $price_total = number_format($value['price']*$value['quantity_buy'], 0, ',', ',');
                                            $weight_total = $value['weight']*$value['quantity_buy'];
                                            $tracking = $value['weight'];
                                            $over = $value['out_of_stock'];
                                            $inventory = $value['inventory'];
                                            $quantity_buy = $value['quantity_buy'];

                                        ?>
                                        <tr data-id="<?php echo e($value['variant_id']); ?>">
                                            <td class="col-1">
                                                <div class="product-thumb">
                                                    <div class="thumbnail-preview">
                                                        <div class="thumbnail">
                                                            <div class="centered"><img src="<?php echo e($value['image']); ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-2">
                                                <div class="title-link"><a href="<?php echo e(url('admin/product/edit/'.$value['product_id'])); ?>"><?php echo e($value['title']); ?></a></div>
                                                <div><?php echo e($value['variant_name']); ?></div>
                                                <input type="hidden" name="variant_id[]" value="<?php echo e($value['variant_id']); ?>">
                                            </td>
                                            <td class="col-3 text-nowrap text-xs-right">
                                                <div class="price-group"><span class="price text-inline-hidden"><?php echo e($price); ?></span> <span class="currency-symbols" data-type="VND">₫</span></div>
                                                <input type="hidden" class="variant-price" name="variant_price[]" value="<?php echo e($value['price']); ?>"><input type="hidden" class="variant-weight" value="<?php echo e($value['weight']); ?>">
                                            </td>
                                            <td class="col-4 text-xs-center text-muted">x</td>
                                            <td class="col-5">
                                                <div class="product-number"><input type="text" class="form-control" name="variant_number[]" data-over="<?php echo e($over); ?>" data-policy="<?php echo e($tracking); ?>" data-inventory="<?php echo e($inventory); ?>" value="<?php echo e($quantity_buy); ?>"></div>
                                            </td>
                                            <td class="col-6 text-nowrap text-xs-right">
                                                <div class="price-group"><span class="order-product-price price text-inline-hidden"><?php echo e($price_total); ?></span> <span class="currency-symbols" data-type="VND">₫</span></div>
                                                <input type="hidden" class="variant-price-quantity" name="variant_price_quantity[]" value="<?php echo e($value['price']*$value['quantity_buy']); ?>"><input type="hidden" class="variant-weight-quantity" name="variant_weight_quantity[]" value="<?php echo e($weight_total); ?>">
                                            </td>
                                            <td class="col-7"><button type="button" class="btn btn-link btn-remove p-a-0"><i class="material-icons md-20">close</i></button></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <div class="box-search-advance" data-bind="load: Order.Dropdown" data-type="product">
                                    <div class="box-search-field"><input type="text" class="form-control" name="search_product" value="" placeholder="Tìm hoặc tạo mới 1 sản phẩm" data-bind="keyup: Order.DropdownSearch" /><div class="search-panel"><div class="search-panel-header"><div class="search-additem" data-type="product" data-bind="click: Order.RenderModal"><i class="font-icon material-icons md-18">add_circle</i><span>Tạo mới sản phẩm</span></div></div><div class="search-panel-body"></div></div></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="order_content">Ghi chú</label>
                                        <textarea rows="3" class="form-control" placeholder="Ghi chú đơn hàng" id="order_content" name="order_content" data-plugin="autosize"><?php echo e($order->order_content); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="amount-table m-t-1">
                                        <table class="table table-np">
                                            <tbody>
                                                <tr>
                                                    <td class="col-1 text-xs-right"><span class="text-muted">Tổng giá trị sản phẩm:</span></td>
                                                    <td class="col-2 text-xs-right text-nowrap"><div class="price-group"><span class="amount-order price text-inline-hidden"><?php echo e($amount_order); ?></span> <span class="currency-symbols" data-type="VND"></span><input type="hidden" name="amount_order" value="<?php echo e($order->amount_order); ?>" /><input type="hidden" name="order_weight" value="<?php echo e($order->order_weight); ?>" /></div></td>
                                                </tr>
                                                <?php if($order->order_discount==0): ?>
                                                <tr>
                                                   <td class="col-1 text-xs-right">
                                                      <div class="discount-add"><a href="#modal-sale" data-toggle="modal"><i class="font-icon material-icons md-18">add_circle</i> Thêm giảm giá:</a></div>
                                                      <div class="discount-edit" style="display: none;">
                                                         <a href="#modal-sale" data-toggle="modal">Giảm giá:</a>
                                                         <p class="m-a-0"></p>
                                                      </div>
                                                   </td>
                                                   <td class="col-2 text-xs-right text-nowrap">
                                                      <div class="price-group"><span class="amount-discount price text-inline-hidden" data-option="amount">0</span> <span class="currency-symbols" data-type="VND">₫</span><input type="hidden" name="amount_discount_notes" value=""><input type="hidden" name="amount_discount" value="0"></div>
                                                   </td>
                                                </tr>
                                                <?php else: ?>
                                                <tr>
                                                    <td class="col-1 text-xs-right">
                                                      <div class="discount-add" style="display: none;"><a href="#modal-sale" data-toggle="modal"><i class="font-icon material-icons md-18">add_circle</i> Thêm giảm giá:</a></div>
                                                      <div class="discount-edit" style="">
                                                         <a href="#modal-sale" data-toggle="modal">Giảm giá:</a>
                                                         <p class="m-a-0"><?php echo e($order->amount_discount_notes); ?></p>
                                                      </div>
                                                    </td>
                                                    <td class="col-2 text-xs-right text-nowrap">
                                                      <div class="price-group"><span class="amount-discount price text-inline-hidden" data-option="amount"><?php echo e($order_discount); ?></span> <span class="currency-symbols" data-type="VND">₫</span><input type="hidden" name="amount_discount_notes" value="<?php echo e($order->amount_discount_notes); ?>"><input type="hidden" name="amount_discount" value="<?php echo e($order->order_discount); ?>"></div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                                <?php if(count($order_shipping)==0): ?>
                                                <tr>
                                                    <td class="col-1 text-xs-right">
                                                        <div class="shipping-add"><a href="#modal-shipping" data-toggle="modal"><i class="font-icon material-icons md-18">add_circle</i> Thêm phí vận chuyển:</a></div>
                                                        <div class="shipping-edit" style="display: none;"><a href="#modal-shipping" data-toggle="modal">Phí vận chuyển:</a><p class="m-a-0"></p><input type="hidden" name="shipping_id" value="0" /><input type="hidden" name="shipping_name" value="" /><input type="hidden" name="shipping_custom" value="" /></div>
                                                    </td>
                                                    <td class="col-2 text-xs-right text-nowrap">
                                                        <div class="price-group"><span class="amount-shipping price text-inline-hidden">0</span> <span class="currency-symbols" data-type="VND"></span><input type="hidden" name="amount_shipping" value="0" /></div>
                                                    </td>
                                                </tr>
                                                <?php else: ?>
                                                <?php 
                                                    $shipping_price = number_format($order_shipping['shipping_price'], 0, ',', ',');
                                                ?>
                                                <tr>
                                                   <td class="col-1 text-xs-right">
                                                      <div class="shipping-add" style="display: none;"><a href="#modal-shipping" data-toggle="modal"><i class="font-icon material-icons md-18">add_circle</i> Thêm phí vận chuyển:</a></div>
                                                      <div class="shipping-edit" style="">
                                                         <a href="#modal-shipping" data-toggle="modal">Phí vận chuyển:</a>
                                                         <p class="m-a-0"><?php echo e($order_shipping['shipping_name']); ?></p>
                                                         <input type="hidden" name="shipping_id" value="<?php echo e($order->shipping_id); ?>"><input type="hidden" name="shipping_name" value="<?php echo e($order_shipping['shipping_name']); ?>"><input type="hidden" name="shipping_custom" value="">
                                                      </div>
                                                   </td>
                                                   <td class="col-2 text-xs-right text-nowrap">
                                                      <div class="price-group"><span class="amount-shipping price text-inline-hidden"><?php echo e($shipping_price); ?></span> <span class="currency-symbols" data-type="VND">₫</span><input type="hidden" name="amount_shipping" value="<?php echo e($order_shipping['shipping_price']); ?>"></div>
                                                   </td>
                                                </tr>
                                                <?php endif; ?>
                                                <?php if($order->order_discount_notes==''): ?>
                                                <tr class="order-discount" style="display: none;">
                                                    <td class="col-1 text-xs-right"><span class="discount-title text-danger font-weight-bold"></span></td>
                                                    <td class="col-2 text-xs-right text-nowrap">
                                                        <div class="price-group"><span class="discount-price price text-inline-hidden">0</span> <span class="currency-symbols" data-type="VND"></span><input type="hidden" name="order_discount_notes" value="" /><input type="hidden" name="order_discount" value="0" /></div>
                                                    </td>
                                                </tr>
                                                <?php else: ?>
                                                <?php 
                                                    $amount_discount = number_format($order->amount_discount, 0, ',', ',');
                                                ?>
                                                <tr class="order-discount" style="">
                                                    <td class="col-1 text-xs-right"><span class="discount-title text-danger font-weight-bold"><?php echo e($order->order_discount_notes); ?></span></td>
                                                    <td class="col-2 text-xs-right text-nowrap">
                                                        <div class="price-group"><span class="discount-price price text-inline-hidden"><?php echo e($amount_discount); ?></span> <span class="currency-symbols" data-type="VND">₫</span><input type="hidden" name="order_discount_notes" value="<?php echo e($order->order_discount_note); ?>"><input type="hidden" name="order_discount" value="<?php echo e($order->amount_discount); ?>"></div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                                <tr>
                                                    <td class="col-1 text-xs-right"><span class="font-weight-bold">Số tiền phải thanh toán:</span></td>
                                                    <td class="col-2 text-xs-right font-weight-bold text-nowrap"><div class="price-group"><span class="amount-payment price text-inline-hidden"><?php echo e($amount_payment); ?></span> <span class="currency-symbols" data-type="VND"></span></div><input type="hidden" name="amount_payment" value="<?php echo e($order->amount_payment); ?>" /></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix m-t-1">
                                <div class="pull-xs-right">
                                    <button type="submit" class="btn btn-secondary waves-effect" data-type="draft" data-bind="click: Order.Create">Lưu nháp</button>
                                    <button type="submit" class="btn btn-primary waves-effect" data-type="pending" data-bind="click: Order.Create">Thanh toán sau</button>
                                    <button type="submit" class="btn btn-success waves-effect" data-type="paid" data-bind="click: Order.Create">Đã thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section order-customer">
                            <div class="proj-page-subtitle">
                                <h3>Khách hàng</h3>
                                <div class="dropdown-action">
                                    <div class="dropdown">
                                        <button class="btn btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-20">more_vert</i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="javascript:;" data-bind="click: Order.RemoveCustomer">Xóa khách hàng</a>
                                            <a class="dropdown-item modal-render" href="javascript:;" data-action="update" data-type="customer" data-bind="click: Order.RenderModal">Cập nhật thông tin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-customer-search" style="display: none;">
                                <div class="form-group m-b-0">
                                    <div class="box-search-advance" data-bind="load: Order.Dropdown" data-type="customer">
                                        <div class="box-search-field"><input type="text" name="search_customer" class="form-control" value="" placeholder="Tìm hoặc tạo mới khách hàng" data-bind="keyup: Order.DropdownSearch" /><div class="search-panel"><div class="search-panel-header"><div class="search-additem" data-action="create" data-type="customer" data-bind="click: Order.RenderModal"><i class="font-icon material-icons md-18">add_circle</i><span>Tạo mới khách hàng</span></div></div><div class="search-panel-body"></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-customer-info">
                                <ul>
                                   <li>
                                      <div class="customer-avatar tbl-cell"><i class="font-icon material-icons">account_circle</i></div>
                                      <div class="customer-fullname tbl-cell"><a href="" class="font-weight-bold"><?php echo e($order_meta['fullname']); ?></a></div>
                                   </li>
                                   <li class="customer-email"><span class="label-heading">Email:</span> <span class="text"><?php echo e($order_meta['email']); ?></span><input type="hidden" name="customer_email" value="buoin1t@gmail.com"></li>
                                   <li class="customer-email"><span class="label-heading">Tổng đơn hàng:</span> <span class="text"><?php echo e($order_count); ?></span><input type="hidden" name="customer_order_count" value="<?php echo e($order_count); ?>"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="proj-page-section order-customer-ship">
                            <div class="proj-page-subtitle"><h3>Thông tin giao hàng</h3></div>
                            <ul>
                               <li class="shipping-fullname"><span class="label-heading">Họ tên:</span> <span class="text"><?php echo e($order_meta['fullname']); ?></span><input type="hidden" name="shipping_fullname" value="<?php echo e($order_meta['fullname']); ?>"></li>
                               <li class="shipping-phone"><span class="label-heading">Số điện thoại:</span> <span class="text"><?php echo e($order_meta['phone']); ?></span><input type="hidden" name="shipping_phone" value="<?php echo e($order_meta['phone']); ?>"></li>
                               <li class="shipping-address"><span class="label-heading">Địa chỉ:</span> <span class="text"><?php echo e($order_meta['address']); ?></span><input type="hidden" name="shipping_address" value="<?php echo e($order_meta['address']); ?>"></li>
                               <li class="shipping-district"><span class="label-heading">Quận/Huyện:</span> <span class="text"><?php echo e($order_meta['district']); ?></span><input type="hidden" name="shipping_district" value="642"><input type="hidden" name="shipping_district_name" value="<?php echo e($order_meta['district']); ?>"></li>
                               <li class="shipping-province"><span class="label-heading">Tỉnh/Thành phố:</span> <span class="text"><?php echo e($order_meta['province']); ?></span><input type="hidden" name="shipping_province" value="89"><input type="hidden" name="shipping_province_name" value="<?php echo e($order_meta['province']); ?>"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="modal-sale" class="modal fade in" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Giảm giá đơn hàng</h4>
               </div>
               <div class="modal-body">
                  <div class="modal-alerts"></div>
                  <div class="form-group">
                     <label>Giảm giá đơn hàng này theo</label>
                     <div class="input-group">
                        <span class="input-group-btn"><button type="button" class="btn btn-secondary btn-option btn-active" data-option="amount" data-bind="click: Order.OptionSale">₫</button></span>
                        <span class="input-group-btn"><button type="button" class="btn btn-secondary btn-option" data-option="percentage" data-bind="click: Order.OptionSale">%</button></span>
                        <input type="text" class="form-control sale-amount" value="<?php echo e($order_discount); ?>" data-bind="keyup: Order.ChangeSale">
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Lý do giảm giá</label>
                     <input type="text" class="form-control sale-notes" value="<?php echo e($order->amount_discount_notes); ?>">
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                  <button type="button" class="btn btn-primary" data-bind="click: Order.CreateSale">Thêm giảm giá</button>
               </div>
            </div>
        </div>
    </div>
    <div id="modal-shipping" class="modal fade" data-bind="load: Order.ChangeShipping">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Phí vận chuyển</h4></div>
                <div class="modal-body">
                    <div class="modal-alerts"></div>
                    <div class="shipping-place">
                        <?php 
                            $check_shipping = 0;
                        ?>
                        <?php $__currentLoopData = $shipping_info->shipping_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php                            
                            if($order->shipping_id == $value->id){
                                $check_shipping = 1;
                            }
                        ?>
                        <div class="form-check <?php echo ($order->shipping_id == $value->id)? ' selected' : ''; ?>" data-id="<?php echo e($value->id); ?>" 
                            <?php if($value->type=='weight'): ?>
                                <?php if($value->rate_to>0): ?>
                                    <?php echo ($order->order_weight<$value->rate_from || $order->order_weight>$value->rate_to)? 'style="display: none;"' : ''; ?>

                                <?php else: ?>
                                    <?php echo ($order->order_weight<$value->rate_from)? 'style="display: none;"' : ''; ?>

                                <?php endif; ?>
                            <?php elseif($value->type=="price"): ?>
                                <?php if($value->rate_to>0): ?>
                                <?php echo ($order->amount_order<$value->rate_from || $order->amount_order>$value->rate_to)? 'style="display: none;"' : ''; ?>

                                <?php else: ?>
                                <?php echo ($order->amount_order<$value->rate_from)? 'style="display: none;"' : ''; ?>

                                <?php endif; ?>
                            <?php endif; ?>

                        >
                            <input id="<?php echo e($value->id); ?>-shipping" type="radio" class="with-gap" name="shipping" value="<?php echo e($value->id); ?>-shipping" <?php echo ($order->shipping_id == $value->id)? ' checked' : ''; ?>><label for="<?php echo e($value->id); ?>-shipping"><?php echo e($value->name); ?> (<?php echo e(number_format($value->price,0,',',',')); ?> <span class="currency-symbols" data-type="VND">₫</span>)</label><input type="hidden" class="shipping-type" value="<?php echo e($value->type); ?>"><input type="hidden" class="shipping-rate-from" value="<?php echo e($value->rate_from); ?>">
                            <input type="hidden" class="shipping-rate-to" value="<?php echo e($value->rate_to); ?>">
                            <input type="hidden" class="shipping-price" value="<?php echo e($value->price); ?>"><input type="hidden" class="shipping-name" value="<?php echo e($value->name); ?>">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                    <div class="shipping-default">
                        <div class="form-check <?php echo ($order->shipping_id==0)? ' selected' : ''; ?>" data-id="0">
                            <input id="free-shipping" type="radio" class="with-gap" name="shipping" value="free"
                            <?php echo ($order->shipping_id==0)? ' checked' : ''; ?>

                            /><label for="free-shipping">Miễn phí vận chuyển</label>
                            <input type="hidden" class="shipping-name" value="Miễn phí vận chuyển" />
                            <input type="hidden" class="shipping-price" value="0" />
                        </div>
                        <div class="form-check <?php echo ($check_shipping==0 && $order->shipping_id!=0)? ' selected' : ''; ?>" data-id="0">
                            <input id="custom-shipping" type="radio" class="with-gap" name="shipping" value="custom" <?php echo ($check_shipping==0 && $order->shipping_id!=0)? ' checked' : ''; ?> /><label for="custom-shipping">Tùy chỉnh</label>
                        </div>
                    </div>
                    <div class="row shipping-custom">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="form-control shipping-name" placeholder="Tên phí vận chuyển" 
                                value="<?php echo ($check_shipping==0 && $order->shipping_id!=0)? $order_shipping['shipping_name'] : ''; ?>"  
                                <?php echo ($check_shipping==0 && $order->shipping_id!=0)? '' : 'readonly'; ?>/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control shipping-price" 
                                    value="<?php echo ($check_shipping==0 && $order->shipping_id!=0)? number_format($order_shipping['shipping_price'],0,',',',') : 0; ?>" 
                                    data-bind="keyup: Format.Number" <?php echo ($check_shipping==0 && $order->shipping_id!=0)? '' : 'readonly'; ?> />
                                    <span class="input-group-addon">&#8363;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bind="click: Order.CreateShipping">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-product" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(url('admin/order/create-product')); ?>" data-parsley-validate>
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Thêm sản phẩm</h4></div>
                <div class="modal-body">
                    <div class="modal-alerts"></div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="product_title" value="" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Giá</span>
                                    <input type="text" class="form-control" name="price_new" value="" data-bind="keyup: Format.Number" />
                                    <span class="input-group-addon"><?php echo get_currency($country_currency); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Số lượng</span>
                                    <input type="text" class="form-control" name="product_quantity" value="1" data-bind="keyup: Format.Number" />
                                </div>
               
                            </div>
                        </div>
                    </div>
                    <input id="product-ship" type="checkbox" class="filled-in" name="product_ship" checked="checked" /><label for="product-ship">Có giao hàng</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bind="click: Order.CreateProduct">Lưu</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modal-customer" class="order-modal modal fade" data-action="create">
        <div class="modal-dialog" role="customer">
            <div class="modal-content">
                <form action="<?php echo e(url('admin/order/create-customer')); ?>" data-parsley-validate>
                    <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Thêm khách hàng</h4></div>
                    <div class="modal-body">
                        <div class="modal-alerts"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" name="fullname" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-length="[8, 11]" data-parsley-pattern-message="Số điện thoại không hợp lệ" data-parsley-length-message="Số điện thoại không hợp lệ" data-parsley-type="integer" data-parsley-type-message="Số điện thoại không hợp lệ" data-parsley-trigger="change focusout" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group create-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="" maxlength="60" data-parsley-trigger="change focusout" data-parsley-type="email" data-parsley-type-message="Địa chỉ Email không hợp lệ" data-parsley-maxlength="60" data-parsley-maxlength-message="Địa chỉ Email quá dài." />
                        </div>
                        <div class="form-group create-group">
                            <input id="email-advertising" type="checkbox" class="filled-in" name="email_advertising" checked /><label for="email-advertising">Nhận email quảng cáo</label>
                        </div>
                      
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea rows="2" class="form-control" name="address"></textarea>
                        </div>
                          
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tỉnh/Thành phố</label>
                                    <?php $customer_province = old('provinces'); ?>
                                    <select id="provinces" name="provinces" class="form-control" data-bind="change: General.GetDistricts">
                                        <option value="">Chọn tỉnh/thành phố</option>    
                                        <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option <?php if( $customer_province == $province->province_id ): ?> selected <?php endif; ?> value="<?php echo e($province->province_id); ?>"><?php echo e($province->province_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                 
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Quận/Huyện</label>
                                    <select id="districts" name="districts" class="form-control">
                                        <option value="">Chọn quận/huyện</option>                     
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="update-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" data-bind="click: Order.UpdateCustomer">Lưu</button>
                        </div>
                        <div class="create-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" data-bind="click: Order.CreateCustomer">Thêm mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>