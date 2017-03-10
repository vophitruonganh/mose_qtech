<?php $__env->startSection('titlePage','Đăng ký'); ?>
<?php $__env->startSection('content'); ?>
<div id="preloader" style="display: none;"><div class="refresh-preloader"><div class="preloader"><i>.</i><i>.</i><i>.</i></div><h4>Đang tiến hành cài đặt</h4></div></div>
<div class="container-fluid">
	<div class="install-signup">
        <div class="form-alerts"></div>
        <form action="<?php echo e(url('admin/install/signup')); ?>" method="post" data-bind="form: disable">
			<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="heading">
				<h2 class="text-xs-center m-b-2">Chào mừng bạn đến với <b>MOSE</b></h2>
			</div>
            <div class="step-1">
				<ol class="nav-process text-xs-center">
	                <li class="active"></li>
	                <li></li>
	            </ol>
	            <div class="list-option">
					<ul>
						<li class="box-typical clearfix">
							<div class="tbl">
								<div class="thumb tbl-cell"><img src="<?php echo e($cdn_domain_image.'/flat-icons/template-48.png'); ?>" class="img-100" /></div>
								<div class="info tbl-cell">
									<h6>Tạo website miễn phí</h6>
									<p>Mose cung cấp cho bạn một website chuyên nghiệp đầy đủ tính năng, sử dụng được nhiều lĩnh vực khác nhau.</p>
								</div>
								<div class="check tbl-cell"><input id="website" type="checkbox" name="product_category[0]" value="website"><label for="website"></label></div>
							</div>
						</li>
						<li class="box-typical clearfix">
							<div class="tbl">
								<div class="thumb tbl-cell"><img src="<?php echo e($cdn_domain_image.'/flat-icons/collaboration-96.png'); ?>" class="img-100" /></div>
								<div class="info tbl-cell">
									<h6>Bán hàng trên Facebook</h6>
									<p>Quản lý tất cả inbox, comment, khách hàng, đơn hàng đến từ Facebook một cách dễ dàng và hiệu quả.</p>
								</div>
								<div class="check tbl-cell"><input id="facebook" type="checkbox" name="product_category[0]" value="website"><label for="facebook"></label></div>
							</div>
						</li>
						<li class="box-typical clearfix">
							<div class="tbl">
								<div class="thumb tbl-cell"><img src="<?php echo e($cdn_domain_image.'/flat-icons/shop-96.png'); ?>" class="img-100" /></div>
								<div class="info tbl-cell">
									<h6>Bán hàng tại cửa hàng</h6>
									<p>Mose POS là phần mềm giúp bạn bán hàng tại cửa hàng dành cho mọi thiết bị</p>
								</div>
								<div class="check tbl-cell"><input id="pos" type="checkbox" name="product_category[0]" value="website"><label for="pos"></label></div>
							</div>
						</li>
					</ul>
	            </div>
	            <div class="clearfix m-t-1">
					<div class="pull-xs-right">
						<button type="button" class="btn btn-primary btn-lg" data-bind="click: Install.Step1">Tiếp theo</button>
					</div>
	            </div>
            </div>
            <div class="step-2" style="display: none;">
				<ol class="nav-process text-xs-center">
	                <li></li>
	                <li class="active"></li>
	            </ol>
				<div class="box-typical b-t-p clearfix">
					<div class="form-group">
						<label>Lĩnh vực kinh doanh</label>
						<select class="form-control" name="">
                            <option value="" selected>— Chọn một lĩnh vực —</option>
                            <option value="1">Thời trang</option>
                            <option value="2">Mẹ và Bé</option>
                            <option value="3">Công nghệ</option>
                            <option value="4">Nội thất</option>
                            <option value="5">Ẩm thực / Ăn uống</option>
                            <option value="6">Sản phẩm khác</option>
						</select>
					</div>
					<div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" id="phone" placeholder="Địa chỉ" name="address" required data-parsley-trigger="change focusout" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" />
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
                            <div class="form-group">
                                <label>Tỉnh/Thành phố</label>
                                <?php $user_province = old('provinces'); ?>
                                <select name="provinces" id="provinces" class="form-control" data-bind="change: General.GetDistricts">
                                    <option value="choose">Chọn tỉnh/thành phố</option>
                                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option <?php if( $user_province == $province->province_id ): ?> selected <?php endif; ?> value="<?php echo e($province->province_id); ?>"><?php echo e($province->province_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                      	</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quận/Huyện</label>
                                <?php $user_district = old('districts'); ?>
                                <select name="districts" id="districts" class="form-control">
                                    <option value="choose">Chọn quận/huyện</option>     
                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option <?php if( $user_district == $district->district_id ): ?> selected <?php endif; ?> value="<?php echo e($district->district_id); ?>"><?php echo e($district->district_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                
                                </select>
                            </div>
                        </div>
                    </div>
					<div class="form-group m-b-0">
						<input id="simple-data" class="filled-in" type="checkbox" name="simple_data" checked="checked" /><label for="simple-data">Tôi muốn sử dụng dữ liệu mẫu</label>
					</div>
				</div>
				<div class="clearfix m-t-1">
					<div class="pull-xs-right">
						<button type="button" class="btn btn-link btn-lg" data-bind="click: Install.Step1Back">Quay lại</button>
						<button type="button" class="btn btn-primary btn-lg" data-bind="click: Install.Step2">Hoàn tất</button>
					</div>
	            </div>
            </div>
        </form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.install', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>