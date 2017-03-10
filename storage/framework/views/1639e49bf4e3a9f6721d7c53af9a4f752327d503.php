<?php $__env->startSection('titlePage','Câu hình chung'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Cấu hình chung'
    );
    $setion_heading = section_title($heading);
?>
	<div class="section-setting">
		<div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
		<form action="<?php echo e(url('admin/setting/general')); ?>" method="post" data-parsley-validate>
			<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="section-group">
				<div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Thông tin chung cửa hàng</h4>
                        <p>Tên cửa hàng xuất hiện trên cửa hàng của bạn. Thẻ tiêu đề và thẻ mô tả giúp xác định cửa hàng của bạn xuất hiện trên công cụ tìm kiếm</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label>Tên cửa hàng</label>
                                <input class="form-control" type="text" value="<?php echo e(old('store_name',$options['store_name'])); ?>" name="store_name" data-parsley-trigger="change focusout" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-end">
                                        <label>Tài khoản Email</label>
                                        <input type="text" class="form-control" name="account_email" value="<?php echo e(old('account_email',$options['account_email'])); ?>"  />
                                        <small class="text-muted">Email được sử dụng cho Haravan liên lạc với bạn</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-end">
                                        <label>Email khách hàng</label>
                                        <input type="text" class="form-control" name="customer_email" value="<?php echo e(old('customer_email',$options['customer_email'])); ?>" />
                                        <small class="text-muted">Email được sử dụng cho hỗ trợ khách hàng</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="section-group">
				<div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Địa chỉ cửa hàng</h4>
                        <p>Địa chỉ này sẽ xuất hiện trên hoá đơn của bạn và sẽ được sử dụng để tính toán mức giá vận chuyển của bạn.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label>Tên đăng ký giấy phép kinh doanh (GPKD) của doanh nghiệp</label>
                                <input class="form-control" type="text" name="business_name" value="<?php echo e(old('business_name',$options['business_name'])); ?>" data-parsley-trigger="change focusout" />
                            </div>
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input class="form-control" type="text" name="store_phone" value="<?php echo e(old('store_phone',$options['store_phone'])); ?>" data-parsley-trigger="change focusout" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="store_address" value="<?php echo e(old('store_address',$options['store_address'])); ?>" data-parsley-trigger="change focusout" />
                            </div>
                            <div class="row">
	                            <div class="col-md-6">
	                                <div class="form-group form-group-end">
	                                    <label for="">Tỉnh/Thành phố</label>
                                        <?php $store_province = old('store_province',$options['store_province']); ?>
	                                    <select name="store_province" id="provinces" class="form-control" data-bind="change: General.GetDistricts">
	                                        <option value="choose">Chọn tỉnh/thành phố</option>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option <?php if( $store_province == $province->province_id ): ?> selected <?php endif; ?> value="<?php echo e($province->province_id); ?>"><?php echo e($province->province_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <div class="form-group form-group-end">
	                                    <label for="">Quận/Huyện</label>
                                        <?php $store_district = old('store_district',$options['store_district']); ?>
	                                    <select name="store_district" id="districts" class="form-control">
	                                        <option value="choose">Chọn quận/huyện</option>
                                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option <?php if( $store_district == $district->district_id ): ?> selected <?php endif; ?> value="<?php echo e($district->district_id); ?>"><?php echo e($district->district_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                                    </select>
	                                </div>
	                            </div>
	                        </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="section-group">
				<div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Tiêu chuẩn & Định dạng</h4>
                        <p>Các tiêu chuẩn và các định dạng được sử dụng để tính toán những thứ như giá cả sản phẩm, trọng lượng vận chuyển và thời gian đơn hàng được đặt.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                        	<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Múi giờ</label>
                                        <?php $timezone = old('timezone',$options['timezone']); ?>
                                        <select name="timezone" id="timezone" class="form-control">
                                            <option value="choose">Chọn múi giờ</option>
                                            <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                                        <option <?php if( $timezone == $key ): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Chọn định dạng số / ngày tháng theo</label>
                                        <?php $country_format = old('country_format',$options['country_format']); ?>
                                        <select name="country_format" id="country-format" class="form-control">
                                            <option value="choose">Chọn định dạng</option>
	                                        <option <?php if( $country_format == 1 ): ?> selected <?php endif; ?> value="1">USA</option>
                                            <option <?php if( $country_format == 2 ): ?> selected <?php endif; ?> value="2">Vietnam</option>
	                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiền tệ</label>
                                <?php $country_currency = old('country_currency',$options['country_currency']); ?>
                                <select name="country_currency" id="country-currency" class="form-control">
                                    <option value="choose">Chọn định dạng</option>
                                    <option <?php if( $country_currency == 1 ): ?> selected <?php endif; ?> value="1">United States Dollars (USD)</option>
                                    <option <?php if( $country_currency == 2 ): ?> selected <?php endif; ?> value="2">Vietnam đồng (VND)</option>
                                </select>
                            </div>
                            <div class="form-group">
								<label for="">Chỉnh sửa định dạng mã đơn hàng (tùy chọn)</label>
								<p class="text-muted m-a-0 font-lg-size">Mã đơn hàng mặc định bắt đầu từ 1000.Bạn có thể thay đổi chuỗi bắt đầu hoặc kết thúc để tạo mã đơn hàng theo ý bạn, ví dụ "DH1001" hoặc "1001-A"</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bắt đầu bằng</label>
                                        <input type="text" class="form-control" name="order_prefix" value="<?php echo e(old('order_prefix',$options['order_prefix'])); ?>" data-model="order_prefix" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kết thúc bằng</label>
                                        <input type="text" class="form-control" name="order_suffix" value="<?php echo e(old('order_suffix',$options['order_suffix'])); ?>" data-model="order_suffix" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
								<p class="text-muted m-a-0 font-lg-size">Mã đơn hàng của bạn sẽ hiển thị theo mẫu <span data-bind="text: order_prefix"></span>1000<span data-bind="text: order_suffix"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="section-group">
                <div class="clearfix">
                    <div class="pull-xs-right">
                        <button type="submit" class="btn btn-primary waves-effect">Lưu</button>
                    </div>
                </div>
            </div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>