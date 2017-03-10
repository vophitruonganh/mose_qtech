<?php $__env->startSection('titlePage','Thêm mới sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Danh sách sản phẩm',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-product">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form id="product-form" action="<?php echo e(url('admin/product/create')); ?>" method="post" data-bind="form: disable">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p b-t-m">
                        <div class="form-group">
                            <label for="title">Tên sản phẩm</label>
                            <input type="text" class="form-control meta-title" id="title" name="title" value="<?php echo e(old('title')); ?>" />
                        </div>
                        <div class="form-group">
                            <div class="slug-group input-group">
                                <label class="sr-only">Đường dẫn</label>
                                <span class="input-group-addon"><?php echo e($prefixSlug); ?>/collections/</span>
                                <input type="text" name="slug" value="<?php echo e(old('slug')); ?>" class="form-control" readonly="readonly" />
                                <span class="input-group-btn"><button type="button" class="btn btn-secondary" data-bind="click: General.ChangeSlug"><i class="font-icon material-icons md-16">mode_edit</i></button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="content" data-plugin="tinymce"><?php echo e(old('content')); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Mô tả</label>
                            <textarea rows="3" class="form-control meta-description" name="excerpt"><?php echo e(old('excerpt')); ?></textarea>
                            <small class="text-muted">Mặc định nếu mô tả để trống sẽ lấy từ nội dung để hiển thị.</small>
                        </div>
                    </div>
                    <div class="box-typical b-t-p b-t-m">
                        <div class="image-group">
                            <div class="image-group-heading clearfix">
                                <h4 class="pull-xs-left">Hình ảnh sản phẩm</h4>
                                <div class="heading-action pull-xs-right">
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-urlimage"><i class="material-icons md-18">link</i> Thêm bằng URL</button>
                                    <button type="button" class="btn btn-link" data-bind="click: Modal.LoadImage"><i class="material-icons md-18">add_a_photo</i> Chọn hình</button>
                                </div>
                            </div>
                            <div class="image-group-main">
                                <div class="image-group-info">
                                    <i class="font-icon material-icons">image</i>
                                    <p class="font-lg-size">Sử dụng nút Chọn hình để thêm hình vào sản phẩm.</p>
                                </div>
                                <div class="image-group-list" style="display: none;">
                                    <ul class="clearfix" data-plugin="sortable"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-typical b-t-m">
                        <div class="box-typical-body b-t-p">
                            <div class="box-typical-heading"><h3 class="heading-text">Thông tin sản phẩm</h3></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Giá sản phẩm</span>
                                            <input type="text" class="form-control" id="price-new" name="price_new" value="<?php echo e(old('price_new')); ?>" data-bind="keyup: Format.Number, keyup: Variant.SetValue" data-value="price" />
                                            <input type="hidden" class="price_new" value="" />
                                            <span class="input-group-addon">&#8363;</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Giá so sánh</span>
                                            <input type="text" class="form-control" id="price_old" name="price_old" value="<?php echo e(old('price_old')); ?>" data-bind="keyup: Format.Number" />
                                            <span class="input-group-addon">&#8363;</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input type="text" id="product-sku" class="form-control" name="sku" value="<?php echo e(old('sku')); ?>" data-bind="keyup: Variant.SetValue" data-value="sku" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã vạch / Barcode</label>
                                        <input type="text" id="product-barcode" class="form-control" name="barcode" value="<?php echo e(old('barcode')); ?>" data-bind="keyup: Variant.SetValue" data-value="barcode" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon p-y-0">Khối lượng</span>
                                    <input type="text" class="form-control" id="product-weight" name="product_weight" value="<?php echo e(old('product_weight')); ?>" data-bind="keyup: Format.Number" />
                                    <span class="input-group-addon p-y-0">(grams)</span>
                                    <span class="input-group-addon p-y-0"><input type="checkbox" id="product-ship" name="product_ship" class="filled-in" checked /> <label for="product-ship">Có giao hàng</label></span>
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="form-group">
                                    <select id="tracking-select" name="tracking" class="form-control" data-bind="change: Product.ChangeTracking">
                                        <option value="notracking" selected="selected">Không quản lý tồn kho</option>
                                        <option value="tracking">Quản lý tồn kho</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="product-quantity" name="product_quantity" value="<?php echo e(old('product_quantity')); ?>" placeholder="Số lượng" readonly="readonly" data-bind="keyup: Format.Integer, keyup: Variant.SetValue" data-value="quantity" />
                                </div>
                                <div class="form-group" style="display: none;">
                                    <input type="checkbox" id="quantity-limit"  name="quantity_limit" class="filled-in" /> <label for="quantity-limit">Cho đặt hàng khi đã hết hàng</label>
                                </div>
                            </div>
                        </div>
                        <div class="box-variant">
                            <div class="box-variant-heading b-t-p">
                                <h4>Sản phẩm có nhiều phiên bản <a href="#variant-group" data-toggle="collapse" aria-expanded="false" aria-controls="variant-group">+Thêm phiên bản</a></h4>
                                <p class="m-a-0 text-muted font-lg-size">Sản phẩm có các phiên bản dựa theo thuộc tính như kích thước hoặc màu sắc?</p>
                            </div>
                            <div id="variant-group" class="collapse">
                                <div class="variant-option-content b-t-p">
                                    <div class="variant-attributes" data-bind="load: Variant.RemoveOption, load: Variant.ChangeOption">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="col-1">Tên thuộc tính</th>
                                                    <th class="col-2">Giá trị thuộc tính (Các giá trị cách nhau bởi dấu phẩy)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="variant-option">
                                                    <td class="col-1">
                                                        <select class="form-control">
                                                            <option value="title">Tiêu đề</option>
                                                            <option value="size">Kích thước</option>
                                                            <option value="color">Màu sắc</option>
                                                            <option value="material">Vật liệu</option>
                                                            <option value="style">Kiểu dáng</option>
                                                            <option value="custom">Tạo tùy chọn mới</option>
                                                        </select>
                                                        <input type="hidden" class="form-control" name="variant_option[]" value="Tiêu đề" />
                                                    </td>
                                                    <td class="col-2"><div class="input-group"><input type="text" class="form-control" name="variant_option_name[]" value="Default Title" data-plugin="tagsinput" /><span class="input-group-btn"><button class="btn btn-remove" type="button"><i class="font-icon material-icons md-18">delete_forever</i></button></span></div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="variant-option-add m-t-1">
                                            <button type="button" class="btn btn-secondary" data-bind="click: Variant.AddOption">Thêm thuộc tính khác</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="variant-option-item b-t-p">
                                    <div class="box-typical-heading"><h4 class="heading-text">Chỉnh sửa mẫu sản phẩm để khởi tạo</h4></div>
                                    <div class="variant-item-list" data-bind="load: Variant.ChangeOptionItem">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="col-1"></th>
                                                    <th class="col-2">Mẫu sản phẩm</th>
                                                    <th class="col-3 text-nowrap">Giá cả</th>
                                                    <th class="col-4 text-nowrap">Mã sản phẩm</th>
                                                    <th class="col-5 text-nowrap">Barcode</th>
                                                    <th class="col-6 text-nowrap" style="display: none;">Số lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="variant-item">
                                                    <th class="col-1 table-check"><input id="variant-id-1" class="filled-tbl" type="checkbox" name="variant_item[][id]" value="1" checked /><label for="variant-id-1"></label></th>
                                                    <td class="col-2"><span class="variant-title text-primary">Default Title</span></td>
                                                    <td class="col-3"><div class="input-group"><input type="text" class="form-control variant-price" name="variant_item[][price]" /><span class="input-group-addon">&#8363;</span></div></td>
                                                    <td class="col-4"><input type="text" class="form-control variant-sku" name="variant_item[][sku]" /></td>
                                                    <td class="col-5"><input type="text" class="form-control variant-barcode" name="variant_item[][barcode]" /></td>
                                                    <td class="col-6" style="display: none;"><input type="number" class="form-control variant-quantity" name="variant_item[][quantity]" /></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo seo_content([
                        'seo_slug' => 'collections/',
                    ]); ?>

                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link" href="<?php echo e(url('admin/product/')); ?>">Hủy</a>
                                <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Product.Submit">Thêm mới</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="proj-page-subtitle"><h3>Thông tin</h3></div>
                            <div class="misc-actions">
                                <div class="misc-group">
                                    <div data-toggle="collapse" data-target="#misc-product-status" aria-expanded="false" aria-controls="misc-status-select">
                                        <label class="misc-label m-b-0">Tình trạng:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: product_status">Công khai</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_product_status" id="hidden_product_status" value="<?php echo e(old('product_status','public')); ?>" data-bind="value: product_status" />
                                    </div>
                                    <div id="misc-product-status" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <select name="product_status" id="product_status" class="form-control misc-select-text" data-model="product_status">
                                                <option selected="selected" value="public">Công khai</option>
                                                <option value="pending">Đang chờ duyệt</option>
                                                <option value="draft">Nháp</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-status-select" aria-expanded="false" aria-controls="misc-status-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-product-date" aria-expanded="false" aria-controls="misc-product-date">
                                        <label class="misc-label m-b-0">Vào lúc:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: product_date"><?php echo e(old('product_date',date('H:i d/m/Y',time()))); ?></label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                    </div>
                                    <div id="misc-product-date" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <input type="text" name="product_date" class="form-control" data-plugin="datetimepicker" value="<?php echo e(old('product_date',date('H:i d/m/Y',time()))); ?>" placeholder="Ngày tạo" data-model="product_date" />
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-product-date" aria-expanded="false" aria-controls="misc-product-date"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-product-comment" aria-expanded="false" aria-controls="misc-product-comment">
                                        <label class="misc-label m-b-0">Bình luận:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: product_comment">Mở</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_product_comment" id="hidden_product_comment" value="<?php echo e(old('product_comment','yes')); ?>">
                                    </div>
                                    <div id="misc-product-comment" class="form-inline collapse extend">
                                        <select name="product_comment" id="product_comment" class="form-control misc-select-text" data-model="product_comment">
                                            <option value="yes">Mở</option>
                                            <option value="no">Đóng</option>
                                        </select>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-product-comment" aria-expanded="false" aria-controls="misc-product-comment"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle"><h3>Danh mục</h3></div>
                            <div class="taxonomy-list">
                                <div class="tabs-panel">
                                    <ul class="taxonomy-checklist">
                                        <?php categoryInMenu($category_products,'product_category') ?>
                                    </ul>
                                </div>
                            </div>
                            <button id="category-toggle-add" type="button" class="btn btn-link btn-category-toggle" data-toggle="collapse" aria-expanded="false" aria-controls="category-add" data-target="#category-add">+ Thêm mới danh mục</button>
                            <div id="category-add" class="collapse m-t-1">
                                <div class="form-group">
                                    <label class="sr-only">Add New Category</label>
                                    <input type="text" name="newcategory" class="form-control new-category" value="" placeholder="Nhập tên danh mục mới" />
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Danh mục cha:</label>
                                    <select name="newcategory_parent" class="form-control new-category-parent">
                                        <option value="0" selected="selected">— Danh mục cha —</option>
                                        <?php $__currentLoopData = $category_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option value="<?php echo e($category->taxonomy_id); ?>"><?php echo e($category->taxonomy_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bind="click: Product.AddCategory">Thêm danh mục</button>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle">
                                <h3>Nhóm sản phẩm</h3>
                            </div>
                            <div class="dropdown-select" data-slug="product-group" data-name="product_group" data-type="multiple">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-product-group" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text pull-left" data-title="Chọn nhóm sản phẩm">Chọn nhóm sản phẩm <span class="count-selected" style="display: none;">(0)</span></span></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-product-group">
                                        <div class="dropdown-search"><input type="text" class="form-control" placeholder="Tìm nhóm sản phẩm" data-bind="keyup: Product.SearchProductTaxonomy" /></div>
                                        <ul>
                                            <?php $__currentLoopData = $product_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_group): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <li><a class="dropdown-item" href="javascript:;" data-id="<?php echo e($product_group->taxonomy_id); ?>"><span><?php echo e($product_group->taxonomy_name); ?></span><i class="font-icon material-icons md-18">check</i></a></li>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle">
                                <h3>Nhà cung cấp</h3>
                            </div>
                            <div class="dropdown-select" data-slug="product-vendor" data-name="product_vendor" data-type="single">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-product-vendor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text pull-left" data-title="Chọn nhà cung cấp">Chọn nhà cung cấp <span class="count-selected" style="display: none;">(0)</span></span></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-product-vendor">
                                        <div class="dropdown-search"><input type="text" class="form-control" placeholder="Tìm nhà cung cấp" data-bind="keyup: Product.SearchProductTaxonomy" /></div>
                                        <ul>
                                            <?php $__currentLoopData = $product_vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_vendor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <li><a class="dropdown-item" href="javascript:;" data-id="<?php echo e($product_vendor->taxonomy_id); ?>"><span><?php echo e($product_vendor->taxonomy_name); ?></span><i class="font-icon material-icons md-18">check</i></a></li>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle"><h3>Nhãn</h3></div>
                            <div id="post-tags">
                                <div class="form-group m-b-0">
                                    <input type="text" name="newtags" id="newtags" class="form-control" data-plugin="tagsinput" value="<?php echo e(old('tag_name')); ?>" placeholder="Nhập nhãn bài viết" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php echo media_modal('product'); ?>

    <div id="modal-urlimage" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(url('admin/attachment/upload-from-url')); ?>" method="post" data-bind="form: disable">
                    <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">Thêm mới hình ảnh từ đường dẫn</h4></div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Đường dẫn hình ảnh</label>
                            <input type="text" class="form-control" name="image_url" id="image-url" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Đóng</button>
                        <button id="set-image-btn" type="button" class="btn btn-primary waves-effect" data-bind="click: Product.UploadFromUrl">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>