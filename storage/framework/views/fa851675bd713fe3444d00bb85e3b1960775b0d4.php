<?php $__env->startSection('titlePage','Cấu hình vận chuyển'); ?>
<?php $__env->startSection('content'); ?>
<?php
    $heading = array(
        'heading_text' => 'Cấu hình vận chuyển'
    );
    $setion_heading = section_title($heading);
?>
<div class="section-setting">
    <div class="form-alerts"></div>
    <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="shipping-setting">
        <div class="section-group">
            <div class="row">
                <div class="section-group-heading col-lg-3">
                    <h4>Khu vực vận chuyển</h4>
                    <p>Thêm phí vận chuyển mới cho các khu vực vận chuyển khác nhau.</p>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-shipping">Thêm khu vực vận chuyển</button>
                </div>
                <div class="section-group-body col-lg-9">
                    <div class="box-typical shipping-data">
                        <?php echo $__env->make('backend.pages.setting.shipping.viewShippingSetting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-shipping" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?php echo e(url('admin/setting/shipping/create')); ?>" method="post">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">Thêm khu vực vận chuyển</h4></div>
            <div class="modal-body">
                <div class="modal-alerts"></div>
                <div class="form-group">
                    <label>Nhập khu vực vận chuyển</label>
                    <select class="form-control custom-select" name="province_shipping">
                        <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($p['id']); ?>"><?php echo e($p['name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary waves-effect" data-bind="click: Setting.Shipping.Add">Thêm khu vực</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div id="modal-rate" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(url('admin/setting/shipping/rate/create')); ?>" method="post" data-bind="form: disable">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">Thêm phí vận chuyển cho khu vực</h4></div>
                <div class="modal-body">
                    <div class="modal-alerts"></div>
                    <div class="form-group">
                        <label>Tên tỷ lệ vận chuyển</label>
                        <input type="text" name="rate_name" class="form-control" value="" />
                        <input type="hidden" name="shipping" value="0">
                    </div>
                    <div class="form-group">
                        <label>Tiêu chuẩn tính phí</label>
                        <select name="shipping_criteria" class="form-control" data-bind="change: Setting.Shipping.ChangeCriteria">
                            <option value="price">Dựa trên giá sản phẩm</option>
                            <option value="weight">Dựa trên khối lượng sản phẩm</option>
                        </select>
                    </div>
                    <label><span class="criteria-price">Giá trị đơn hàng khoảng (Đơn vị: <?php echo get_currency($option_load['country_currency']); ?>)</span><span class="criteria-weight" style="display: none;">Trọng lượng đơn hàng khoảng (Đơn vị: grams)</span></label>
                    <div class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Từ</span>
                                <input type="text" name="range_from" class="form-control" value="0" data-bind="keyup: Format.Number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Đến</span>
                                <input type="text" name="range_to" class="form-control" value="0" data-bind="keyup: Format.Number"  />
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-t-1 m-b-0">
                        <label>Giá vận chuyển</label>
                        <div class="input-group">
                            <input type="text" name="shipping_price" class="form-control" value="" data-bind="keyup: Format.Number"  />
                            <span class="input-group-addon"><?php echo get_currency($option_load['country_currency']); ?></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Hủy</button>
                    <button id="set-image-btn" type="button" class="btn btn-primary waves-effect" data-bind="click: Setting.Shipping.Add">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div style="display: none;">
    <a href="<?php echo e(url('admin/setting/shipping/create')); ?>">Thêm khu vực vận chuyển</a>
    <?php $__currentLoopData = $array_shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div>
        <p>
            <span style="color:red;font-size:18px">+<?php echo e($shipping['shipping_name']); ?></span><a href="<?php echo e(url('admin/setting/shipping-rate/create/'.$shipping['shipping_id'])); ?>">Thêm phí vận chuyển</a><a href="<?php echo e(url('admin/setting/shipping/delete/'.$shipping['shipping_id'])); ?>">Xóa</a>
            <div>
                <ul>
                    <?php $__currentLoopData = $shipping['shipping_child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arr_c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <?php
                        $dvt='';
                        if($arr_c['type']=='price'){
                        $dvt='đ';
                        }
                        else{
                        $dvt='gr';
                        }
                        ?>
                        <?php echo e($arr_c['name']); ?> :
                        <?php if($arr_c['rate_to']==0): ?>
                        <p><?php echo e($arr_c['rate_from']); ?><?php echo e($dvt); ?> trở lên</p>
                        <?php else: ?>
                        <p><?php echo e($arr_c['rate_from']); ?><?php echo e($dvt); ?> - <?php echo e($arr_c['rate_to']); ?><?php echo e($dvt); ?></p>
                        <?php endif; ?>
                        <p>Loại: <?php echo e($arr_c['type']); ?></p>
                        <p>Giá: <?php echo e($arr_c['price']); ?>đ</p>
                        <p>Điều chỉnh</p>
                        <div>
                            <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                            <form action="<?php echo e(url('admin/setting/shipping-rate/edit/'.$arr_c['shipping_id'])); ?>" method="post">
                                <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <dir>
                                <label>Tên tỷ lệ vận chuyển</label>
                                <input type="text" name="rate_name" value="<?php echo e($arr_c['name']); ?>">
                                </dir>
                                <dir>
                                <label>Tiểu chuẩn tính phí</label>
                                <select name="shipping_criteria">
                                    <option value="price" <?php echo e(($arr_c['type']=='price')? 'selected' : ''); ?>>Dựa trên giá sản phẩm</option>
                                    <option value="weight" <?php echo e(($arr_c['type']=='weight')? 'selected' : ''); ?>>Dựa trên khối lượng sản phẩm</option>
                                </select>
                                
                                <label>Hạn mức đơn hàng khoảng</label>
                                <input type="text" name="range_from" value="<?php echo e($arr_c['rate_from']); ?>">--<input type="text" name="range_to" value="<?php echo e($arr_c['rate_to']); ?>">
                                </dir>
                                <dir>
                                <label>Giá vận chuyển</label>
                                <input type="text" name="shipping_price" value="<?php echo e($arr_c['price']); ?>">
                                </dir>
                                <dir>
                                <input type="submit" name="save-district-province" value="Lưu">
                                <a href="<?php echo e(url('admin/setting/shipping/delete/'.$arr_c['shipping_id'])); ?>">Xóa</a>
                                </dir>
                            </form>
                        </div>
                        <?php if(count($arr_c['district'])>0): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Quận / Huyện</th>
                                    <th>Giá điều chỉnh</th>
                                    <th>Giá cuối cùng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="<?php echo e(url('admin/setting/shipping/edit/'.$shipping['shipping_id'])); ?>" method="post">
                                    <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <!-- <input type="hidden" name="place_id" value="<?php echo e($shipping['place_id']); ?>"> -->
                                    <input type="hidden" name="district_parent" value="<?php echo e($arr_c['shipping_id']); ?>">
                                    <?php $__currentLoopData = $arr_c['district']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <!-- <input type="hidden" name="district_place_id[]" value="<?php echo e($district['place_id']); ?>"> -->
                                    <input type="hidden" name="district_shipping_id[]" value="<?php echo e($district['shipping_id']); ?>">
                                    <tr>
                                        <td><input type="checkbox" name="is_district_shipping[]" value="<?php echo e($district['shipping_id']); ?>" style=" position: static; left: -9999px; opacity: 1; " <?php echo e(($district['status']==1)? 'checked' : ''); ?>></td>
                                        <td><?php echo e($district['name']); ?></td>
                                        <td><input type="text" name="district_shipping[]" value="<?php echo e($district['price']); ?>"
                                            <?php echo e(($district['status']==0)? 'style=display:none' : ''); ?>

                                        ></td>
                                        <td>
                                            <?php if($district['status']==1): ?>
                                            <?php echo e($district['price_ship']); ?>đ (<?php echo e($district['price']); ?>đ)
                                            <?php else: ?>
                                            Không giao hàng
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <input type="submit" name="update" value="update">
                                </form>
                            </tbody>
                        </table>
                        <?php endif; ?>
                        <ul>
                            
                        </ul>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
        </p>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>