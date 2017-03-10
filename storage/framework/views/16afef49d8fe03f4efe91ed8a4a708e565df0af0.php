<?php $__env->startSection('titlePage','Thêm mới khuyến mãi'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/discount"),
        'heading_link_text' => 'Danh sách khuyến mãi',
        'heading_text' => 'Thêm mới'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-discount">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form id="discount-form" action="<?php echo e(url('admin/discount/create')); ?>" method="post" data-parsley-validate>
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p b-t-m">
                        <div class="form-group">
                            <label for="">Loại khuyến mãi</label>
                            <select id="discount-type" name="discount_type" class="form-control" data-bind="change: Discount.TypeChange, change: Discount.OfferOption">
                                <option value="1" <?php if( old('discount_type') == 1 ): ?> selected="selected" <?php endif; ?> >Mã khuyến mãi (Coupon)</option>
                                <option value="2" <?php if( old('discount_type') == 2 ): ?> selected="selected" <?php endif; ?> >Chương trình khuyến mãi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label id="discount-title-lbl">Tên mã khuyến mãi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="discount-title" name="discount_title" value="<?php echo e(old('discount_title')); ?>" required data-parsley-trigger="change focusout" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" data-parsley-errors-messages-disabled />
                                <span class="input-group-btn discount-coupon">
                                    <button id="generate-code-btn" type="button" class="btn btn-info waves-effect" data-bind="click: Discount.GenerateCode">Tạo mã tự động</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group discount-coupon">
                            <input type="checkbox" id="promotion-allow" class="filled-in" name="promotion_allow" /><label for="promotion-allow">Cho phép sử dụng chung với chương trình khuyến mãi</label>
                        </div>
                        <div class="form-group discount-coupon">
                            <div class="input-group">
                                <span class="input-group-addon p-y-0">Số lần sử dụng</span>
                                <input type="text" class="form-control" id="discount-limit" name="discount_limit" value="<?php echo e(old('discount_limit')); ?>" readonly="readonly" min="1" data-bind="keyup: Format.Integer" data-parsley-trigger="change focusout" data-parsley-pattern="^[\d\+\-\,\.\(\)\/\s]*$" data-parsley-pattern-message="Số lần khuyến mãi không hợp lệ" data-parsley-maxlength="8" data-parsley-maxlength-message="Số lần khuyến mãi quá lớn" data-parsley-min="1" data-parsley-min-message="Số lần khuyến mãi phải lớn hơn 0" data-parsley-errors-messages-disabled />
                                <span class="input-group-addon p-y-0"><input type="checkbox" id="limit" class="filled-in" checked="checked" name="limit" data-bind="change: Discount.LimitSet" /> <label for="limit">Không giới hạn</label></span>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Loại khuyến mãi</span>
                                    <span class="input-group-btn">
                                        <select id="discount-option" name="discount_option" class="form-control" data-model="discount_option" data-bind="change: Discount.OptionChange, change: Discount.OfferOption">
                                            <option value="amount" <?php if( old('discount_option') == 'amount' ): ?> selected="selected" <?php endif; ?> >VNĐ</option>
                                            <option value="percentage" <?php if( old('discount_option') == 'percentage' ): ?> selected="selected" <?php endif; ?> >%</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Giảm</span>
                                    <input type="text" class="form-control" id="discount-take" name="discount_take" value="<?php echo e(old('discount_take')); ?>" data-bind="keyup: Discount.TakeSet" required data-parsley-trigger="change focusout" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" data-parsley-errors-messages-disabled />
                                    <span class="input-group-addon discount_unit" data-bind="text: discount_option">VNĐ</span>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <select id="discount-offer" name="discount_offer" class="form-control" data-bind="change: Discount.OfferOption">
                                    <option value="all" <?php if( old('discount_offer') == 'all' ): ?> selected="selected" <?php endif; ?> >Tất cả đơn hàng</option>
                                    <option value="amount_order" <?php if( old('discount_offer') == 'amount_order' ): ?> selected="selected" <?php endif; ?> >Trị giá đơn hàng</option>
                                    <option value="product_group" <?php if( old('discount_offer') == 'product_group' ): ?> selected="selected" <?php endif; ?> >Nhóm sản phẩm</option>
                                    <option value="product" <?php if( old('discount_offer') == 'product' ): ?> selected="selected" <?php endif; ?> >Sản phẩm</option>
                                    <option value="customer_group" <?php if( old('discount_offer') == 'customer_group' ): ?> selected="selected" <?php endif; ?> >Nhóm khách hàng</option>
                                </select>
                            </div>
                        </div>
                        <div id="offer-content" class="m-t-1" data-bind="load: Discount.OfferOption, load: Discount.OfferItemSet" >
                            <div id="offer-amount-order" class="offer-content-group" style="display: none;">
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">Từ</span><input type="text" class="form-control" id="money" name="money" value="<?php echo e(old('money')); ?>" data-bind="keyup: Format.Number" /><span class="input-group-addon">VNĐ</span></div>
                                </div>
                            </div>
                            <div id="offer-product-group" class="offer-content-group" style="display: none;">
                                <div class="form-group">
                                    <input type="hidden" class="offer-value" name="product_group_id" value="" />
                                    <div class="dropdown-search">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-type="product_group" data-bind="click: Discount.OfferItemSearch"><span>Chọn nhóm sản phẩm</span></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-search-input"><input type="text" class="form-control" placeholder="Tìm nhóm sản phẩm" value="" data-type="product_group" data-bind="keyup: Discount.OfferItemSearch" /></div>
                                                <div class="dropdown-search-content">
                                                    <div class="dropdown-item-list"></div>
                                                    <div class="dropdown-loading">Đang tìm kiếm..</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <div id="offer-product" class="offer-content-group" style="display: none;">
                                <div class="form-group">
                                    <input type="hidden" class="offer-value" name="product_id" value="" />
                                    <div class="dropdown-search">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-type="product" data-bind="click: Discount.OfferItemSearch"><span>Chọn sản phẩm</span></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-search-input"><input type="text" class="form-control" placeholder="Tìm sản phẩm" value="" data-type="product" data-bind="keyup: Discount.OfferItemSearch" /></div>
                                                <div class="dropdown-search-content">
                                                    <div class="dropdown-item-list"></div>
                                                    <div class="dropdown-loading">Đang tìm kiếm..</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <div id="offer-customer-group" class="offer-content-group" style="display: none;">
                                <div class="form-group">
                                    <input type="hidden" class="offer-value" name="customer_group_id" value="" />
                                    <div class="dropdown-search">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-type="customer_group" data-bind="click: Discount.OfferItemSearch"><span>Chọn nhóm khách hàng</span></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-search-input"><input type="text" class="form-control" placeholder="Tìm nhóm khách hàng" value="" data-type="product_group" data-bind="keyup: Discount.OfferItemSearch" /></div>
                                                <div class="dropdown-search-content">
                                                    <div class="dropdown-item-list"></div>
                                                    <div class="dropdown-loading">Đang tìm kiếm..</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <div id="offer-option" class="form-group m-b-0 m-t-1">
                                <div id="offer-option-1" class="offer-option-group" style="display: none;">
                                    <div class="form-group m-b-0">
                                        <select class="form-control" name="offer_option_1">
                                            <option value="per_order" <?php if( old('offer_option_1') == 'per_order' ): ?> selected="selected" <?php endif; ?> >Một lần trên một đơn hàng</option>
                                            <option value="per_every_item" <?php if( old('offer_option_1') == 'per_every_item' ): ?> selected="selected" <?php endif; ?> >Cho từng mặt hàng trong giỏ hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="offer-option-2" class="offer-option-group" style="display: none;">
                                    <div class="form-group m-b-0">
                                        <div class="input-group">
                                            <span class="input-group-addon">Số lượng sản phẩm áp dụng</span>
                                            <input type="text" class="form-control" id="discount-take" name="offer_option_2" value="<?php echo e(old('offer_option_2')); ?>" data-bind="keyup: Format.Integer" data-parsley-trigger="change focusout" data-parsley-type="integer" data-parsley-type-message="Giá trị không hợp lệ" data-parsley-min="1" data-parsley-min-message="Số lượng sản phẩm phải từ 1 trở lên" data-parsley-errors-messages-disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link" href="<?php echo e(url('admin/discount/')); ?>">Hủy</a>
                               <!--  <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Discount.Create">Thêm khuyến mãi</button> -->
                                <button type="submit" class="btn btn-primary waves-effect">Thêm khuyến mãi</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="form-group">
                                <label for="">Bắt đầu khuyến mãi</label>
                                <input type="text" name="start_date" id="start-date" class="form-control" data-plugin="datetimepicker" value="<?php echo e(old('start_date',date('H:i d/m/Y',time()))); ?>" placeholder="Ngày bắt đầu" />
                            </div>
                            <div class="form-group">
                                <label for="">Kết thúc khuyến mãi</label>
                                <input type="text" name="end_date" id="end-date" class="form-control" data-plugin="datetimepicker" value="<?php echo e(old('end_date')); ?>" placeholder="Ngày kết thúc" readonly="readonly" />
                            </div>
                            <div class="form-group m-b-0">
                                <input type="checkbox" id="date_limit" class="filled-in" checked="checked" name="date_limit" data-bind="change: Discount.DateLimit" /><label for="date_limit">Không bao giờ hết hạn</label>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>