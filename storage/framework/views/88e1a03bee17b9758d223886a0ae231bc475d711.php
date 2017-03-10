<?php $__env->startSection('titlePage','Chỉnh sửa sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/product"),
        'heading_link_text' => 'Danh sách sản phẩm',
        'heading_text' => 'Chỉnh sửa',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-product">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form id="product-form" action="<?php echo e(url('admin/product/edit/'.$post->product_id)); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p b-t-m">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control meta-title"  name="title" value="<?php echo e(old('title',$post->product_title)); ?>" />
                        </div>
                        <div class="form-group">
                            <div class="slug-group input-group">
                                <label class="sr-only">Đường dẫn</label>
                                <span class="input-group-addon"><?php echo e(main_site_url()); ?>/collections/</span>
                                <input type="text" name="slug" value="<?php echo e(old('slug',$post->product_slug)); ?>" class="form-control" readonly="readonly" />
                                <span class="input-group-btn"><button type="button" class="btn btn-secondary" data-bind="click: General.ChangeSlug"><i class="font-icon material-icons md-16">mode_edit</i></button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="content" data-plugin="tinymce"><?php echo e(old('content',$post->product_content)); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea rows="3" class="form-control meta-description" name="excerpt"><?php echo e(old('excerpt',$post->product_excerpt)); ?></textarea>
                            <small class="text-muted">Mặc định nếu mô tả để trống sẽ lấy từ nội dung để hiển thị.</small>
                        </div>
                    </div>
                    <div class="box-typical b-t-p b-t-m">
                        <div class="image-group">
                            <div class="box-typical-heading heading-group">
                                <h4 class="heading-text">Hình ảnh sản phẩm</h4>
                                <div class="heading-action pull-xs-right">
                                    
                                </div>
                                <div class="heading-action">
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-urlimage"><i class="material-icons md-18">link</i> Thêm bằng URL</button>
                                    <button type="button" class="btn btn-link" data-bind="click: Modal.LoadImage"><i class="material-icons md-18">add_a_photo</i> Chọn hình</button>
                                </div>
                            </div>
                            <div class="image-group-main">
                                <div class="image-group-info" <?php if($productImage): ?>style="display: none;"<?php endif; ?>>
                                    <i class="font-icon material-icons">image</i>
                                    <p class="font-lg-size">Sử dụng nút Chọn hình để thêm hình vào sản phẩm.</p>
                                </div>
                                <div class="image-group-list" <?php if(!$productImage): ?>style="display: none;"<?php endif; ?>>
                                    <ul class="clearfix" data-plugin="sortable">
                                        <?php $__currentLoopData = $productImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <li class="box-product-images ui-sortable-handle"><input type="hidden" name="product_image[]" value="<?php echo e($image); ?>" /><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="<?php echo e(get_image($image,'thumb')); ?>" /></div></div></div></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="box-typical b-t-m">
                        <div class="box-typical-body b-t-p">
                            <div class="box-typical-heading heading-group">
                                <h3 class="heading-text">Sản phẩm có nhiêu phiên bản</h3>
                                <div class="heading-action">
                                    <button type="button" class="btn btn-link" data-bind="click: Variant.LoadSortModal">Sắp xếp</button>
                                    <button type="button" class="btn btn-link" data-bind="click: Variant.LoadEditModal">Chỉnh sửa</button>
                                    <button type="button" class="btn btn-link" data-bind="click: Variant.LoadAddModal">Thêm mới</button>
                                </div>
                            </div>
                            <div class="variant-table" data-bind="" data-product-id="<?php echo e($post->product_id); ?>">
                                <?php echo $__env->make('backend.pages.store.product.listVariant', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <?php /*
                    <div class="box-typical b-t-m">
                        <div class="list-variant">
                            <table width="800">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td>Hình</td>
                                        @foreach( $array_title_table as $value )
                                        <td>{{$value}}</td>
                                        @endforeach
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $array_variant_key as $variant_key)
                                    <input type="hidden" name="variant_key[]" value="{{$variant_key}}" />
                                    @endforeach
                                    @foreach( $variants as $key=>$variant)
                                    <tr>
                                        <th><input type="hidden" name="variant_id[]" value="{{$variant->variant_id}}" /></th>
                                        <td>
                                            @if(count($image_variant_value)>0)
                                            <?php  
                                                $image_variant = isset($image_variant_value[$key])?$image_variant_value[$key]:'';
                                            ?>
                                            <img src="{{ $image_variant }}" width="100" />
                                            @endif
                                            <input type="text" name="image_variant[]" value="{{$variant->image}}">

                                        </td>
                                        @if(count($variant_meta_arr[0])>0)
                                        @foreach( $variant_meta_arr[$key] as $variant_extra)
                                        <td><input type="text" name="variants[{{$variant_extra->variant_name}}][]" value="{{$variant_extra->variant_value}}"></td>
                                        @endforeach
                                        @endif
                                        <td><input type="text" name="sku[]" value="{{$variant->sku}}"></td>
                                        <td><input type="text" name="price_variant[]" value="{{$variant->price_new}}"></td>
                                        <td><input type="text" name="quantity[]" value="{{$variant->quantity}}"></td>
                                        <td><a class="edit_variant" href="{{url('admin/variant/edit/'.$variant->variant_id) }}">Sửa</a><a class="delete_variant" href="javascript:;">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-typical-body b-t-p">
                        
                            <div class="my_row">
                                <h1>Variant</h1>
                                @foreach($variant_att_list as $value)
                                <div class="row">
                                    <select class="select_variant_old" name="variant_name_select[]" class="select_attr">
                                    <?php
                                        $att_name=$value->variant_name;
                                        $style='display: none;';
                                        if( !array_key_exists($att_name, $array_variant_select)){
                                            $att_name = 'custom';
                                            $style = '';
                                        }
                                        
                                        foreach ($array_variant_select as $key1 => $value1) {
                                            $check='';
                                            if($att_name==$key1){
                                                $check='selected';
                                            }
                                      ?>
                                        <option value="{{$key1}}" {{$check}}>{{$value1}}</option> 
                                    <?php
                                    }?>
                                    </select>
                                    
                                    
                                        <input class="att_old" type="text" name="att_old[]" style="display:none" value="{{$value->variant_name}}" />
                                        <input class="att_old_update" type="text" name="att_old_update[]" value="{{$value->variant_name}}" style="{{$style}}" />
                                        @if($count_variant==1)
                                            <a class="hide_row" href="javascript:;">thung rac</a>
                                        @endif
                                    
                                    
                                </div>
                                @endforeach
                            </div>
                            <a class="add_variant_att" href="javascript:;">Thêm Attribute</a>
                            <a class="edit_variant_att" href="javascript:;">Update Variant</a>
                            <div class="row">
                                @foreach ($variant_att_list as $variant_extra)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span>{{$variant_extra->variant_name}}</span>
                                            <input type="text" class="form-control" id="variant_value" name="variant_value[]" value="" />
                                            <input type="hidden" class="form-control" id="variant_name" name="variant_name[]" value="{{$variant_extra->variant_name}}" />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            <a class="add_variant" href="javascript:;">Thêm</a>
                        </div>
                    </div>*/ ?>
                    <?php echo seo_content([
                        'seo_slug' => 'collections/'.$post->product_slug,
                    ]); ?>

                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link text-danger" href="<?php echo e(url('admin/product/delete/'.$post->product_id)); ?>">Xóa sản phẩm</a>
                                <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Product.Edit">Cập nhật</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="proj-page-subtitle">
                                <h3>Thông tin</h3>
                            </div>
                            <div class="misc-actions">
                                <div class="misc-group">
                                    <div data-toggle="collapse" data-target="#misc-product-status" aria-expanded="false" aria-controls="misc-status-select">
                                        <label class="misc-label m-b-0">Tình trạng:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: product_status"><?php if( $post->product_status == 'public' ): ?> Công khai <?php elseif( $post->product_status == 'pending' ): ?> Đang chờ duyệt <?php elseif( $post->product_status == 'draft' ): ?> Nháp <?php elseif( $post->product_status == 'trash' ): ?> Xóa <?php endif; ?></label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_product_status" id="hidden_product_status" value="<?php echo e(old('product_status','public')); ?>" data-bind="value: product_status" />
                                    </div>
                                    <div id="misc-product-status" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <select name="product_status" id="product_status" class="form-control misc-select-text" data-model="product_status">
                                                <option <?php if($post->product_status=='public'): ?><?php echo e('selected="selected"'); ?> <?php endif; ?> value="public">Công khai</option>
                                                <option <?php if($post->product_status=='pending'): ?><?php echo e('selected="selected"'); ?><?php endif; ?> value="pending">Đang chờ duyệt</option>
                                                <option <?php if($post->product_status=='draft'): ?><?php echo e('selected="selected"'); ?><?php endif; ?> value="draft">Nháp</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-status-select" aria-expanded="false" aria-controls="misc-status-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-product-date" aria-expanded="false" aria-controls="misc-product-date">
                                        <label class="misc-label m-b-0">Vào lúc:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: product_date"><?php echo e(date('H:i d/m/Y',$post->product_date)); ?></label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                    </div>
                                    <div id="misc-product-date" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <input type="text" name="product_date" class="form-control" data-plugin="datetimepicker" value="<?php echo e(date('H:i d/m/Y',$post->product_date)); ?>" placeholder="Ngày tạo" data-model="product_date" />
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-product-date" aria-expanded="false" aria-controls="misc-product-date"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-product-comment" aria-expanded="false" aria-controls="misc-product-comment">
                                        <label class="misc-label m-b-0">Bình luận:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: product_comment"><?php if( $post->comment_status == 'yes' ): ?> Mở <?php elseif( $post->comment_status == 'no' ): ?> Đóng <?php endif; ?></label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_product_comment" id="hidden_product_comment" value="<?php echo e($post->comment_status); ?>" data-bind="value: post_comment" />
                                    </div>
                                    <div id="misc-product-comment" class="form-inline collapse extend">
                                        <select name="product_comment" id="product_comment" class="form-control misc-select-text" data-model="product_comment">
                                            <option <?php if($post->comment_status=='yes'): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?> value="yes">Mở</option>
                                            <option <?php if($post->comment_status=='no'): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?> value="no">Đóng</option>
                                        </select>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-product-comment" aria-expanded="false" aria-controls="misc-product-comment"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle">
                                <h3>Danh mục</h3>
                            </div>
                            <div class="taxonomy-list">
                                <div class="tabs-panel">
                                    <ul class="taxonomy-checklist">
                                        <?php categoryInMenu($category_products,'product_category',0,'',$product_category) ?>
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
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-product-group" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text pull-left" data-title="Chọn nhóm sản phẩm">Chọn nhóm sản phẩm <span class="count-selected" <?php if(!$product_group): ?>style="display: none;"<?php endif; ?>><?php if(!$product_group){ echo '(0)'; }else{ echo '('.count($product_group).')';}?></span></span></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-product-group">
                                        <div class="dropdown-search"><input type="text" class="form-control" placeholder="Tìm nhóm sản phẩm" data-bind="keyup: Product.SearchProductTaxonomy" /></div>
                                        <ul>
                                            <?php $__currentLoopData = $product_group_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_group_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <li <?php if(in_array($product_group_list['taxonomy_id'],$product_group)): ?>class="selected" <?php endif; ?>><a class="dropdown-item" href="javascript:;" data-id="<?php echo e($product_group_list['taxonomy_id']); ?>"><span><?php echo e($product_group_list['taxonomy_name']); ?></span><i class="font-icon material-icons md-18">check</i></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>
                                    <?php if($product_group): ?>
                                        <?php $__currentLoopData = $product_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <input class="product-group product-group-<?php echo e($item); ?>" type="hidden" name="product_group[]" value="<?php echo e($item); ?>" />
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle">
                                <h3>Nhà cung cấp</h3>
                            </div>
                            <div class="dropdown-select" data-slug="product-vendor" data-name="product_vendor" data-type="single">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-product-vendor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text pull-left" data-title="Chọn nhà cung cấp">Chọn nhà cung cấp <span class="count-selected" <?php if(!$product_vendor): ?>style="display: none;"<?php endif; ?>><?php if(!$product_vendor){ echo '(0)'; }else{ echo '('.count($product_vendor).')';}?></span></span></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-product-vendor">
                                        <div class="dropdown-search"><input type="text" class="form-control" placeholder="Tìm nhà cung cấp" data-bind="keyup: Product.SearchProductTaxonomy" /></div>
                                        <ul>
                                            <?php $__currentLoopData = $product_vendor_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_vendor_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if(in_array($product_vendor_list['taxonomy_id'],$product_vendor)){ $title = $product_vendor_list['taxonomy_name'];}else { $title ='';} ?>
                                            <li <?php if(in_array($product_vendor_list['taxonomy_id'],$product_vendor)): ?>class="selected" <?php endif; ?>><a class="dropdown-item" href="javascript:;" data-id="<?php echo e($product_vendor_list['taxonomy_id']); ?>"><span><?php echo e($product_vendor_list['taxonomy_name']); ?></span><i class="font-icon material-icons md-18">check</i></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>
                                    <?php if($product_vendor): ?>
                                        <?php $__currentLoopData = $product_vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <input class="product-vendor product-vendor-<?php echo e($item); ?>" type="hidden" name="product_vendor[]" value="<?php echo e($item); ?>" />
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle"><h3>Nhãn</h3></div>
                            <div class="form-group m-b-0">
                                <input type="text" name="newtags" class="form-control" data-plugin="tagsinput" value="<?php echo e(old('tag_name',$tag_name)); ?>" placeholder="Nhập nhãn bài viết" />
                            </div>
                        </div>
                        <?php
                        /*
                        <!--
                        <div class="proj-page-section proj-page-fi">
                            <div class="proj-page-subtitle">
                                <h3>Ảnh đại diện</h3>
                            </div>
                            <div class="featured-image">
                                <a href="#post-media" class="set-image" data-toggle="modal">Thêm ảnh đại diện</a>
                            </div>
                            <div id="post-media" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Ảnh đại diện</h4>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                            <button type="button" class="btn btn-primary">Đặt làm ảnh đại diện</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                        */
                        ?>
                        <?php
                        /*
                        <div class="proj-page-section proj-page-fi">
                            <div class="proj-page-subtitle"><h3>Ảnh đại diện</h3></div>
                            <div id="featured-image-group">
                                <div id="featured-thumbnail"@if(!$imageFeature) class="hidden-xs-up" @endif data-image="1" data-type="featured">
                                    <a href="javascript:;" data-bind="click: General.GetImage"><img src="{{ $imageFeature }}" /></a>
                                    <input type="hidden" name="product_featured_image" id="hidden_featured_image" value="" />
                                    <div id="featured-remove"><button id="btn-remove-fi" class="btn btn-link text-danger" data-bind="click: General.RemoveImage">Xóa ảnh đại diện</button></div>
                                </div>
                                <div id="featured-modal" @if($imageFeature) class="hidden-xs-up" @endif data-image="1" data-type="featured">
                                    <a href="javascript:;" data-bind="click: General.GetImage"><i class="material-icons">add_to_photos</i><span>Thêm ảnh đại diện</span></a>
                                </div>
                                {!! media_modal() !!}
                            </div>
                        </div>
                        */
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php echo media_modal('product'); ?>

    
    <div id="modal-variant-edit" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo e(url('admin/product/variant/option/'.$post->product_id)); ?>" method="post" data-bind="form: disable">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Chỉnh sửa thuộc tính</h4>
                </div>
                <div class="modal-body">
                    <div class="variant-option-content">
                        <div class="variant-attributes" data-bind="load: Variant.RemoveOption, load: Variant.ChangeOption">
                            <table class="table">
                                <tbody>
                                    
                                </tbody>
                            </table>
                            <div class="variant-option-add m-t-1">
                                <button type="button" class="btn btn-secondary" data-bind="click: Variant.AddOption">Thêm thuộc tính khác</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bind="click: Variant.EditModal">Lưu thay đổi</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modal-variant-add" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(url('admin/product/variant/item/'.$post->product_id)); ?>" method="post" data-bind="form: disable">
                    <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Tạo biến thể mới</h4></div>
                    <div class="modal-body">
                        <div class="variant-option-data"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Giá</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="price_new" value="" data-bind="keyup: Format.Number" />
                                        <span class="input-group-addon">&#8363;</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Giá so sánh</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="price_old" value="" data-bind="keyup: Format.Number" />
                                        <span class="input-group-addon">&#8363;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Mã sản phẩm</label>
                                    <input type="text" class="form-control" name="sku" value="" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Mã vạch / Barcode</label>
                                    <input type="text" class="form-control" name="barcode" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Khối lượng</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="product-weight" name="product_weight" value="" data-bind="keyup: Format.Number">
                                <span class="input-group-addon p-y-0">(grams)</span>
                                <span class="input-group-addon p-y-0"><input type="checkbox" id="product-ship" name="product_ship" class="filled-in" checked=""> <label for="product-ship">Có giao hàng</label></span>
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
                                <input type="text" class="form-control" id="product-quantity" name="product_quantity" value="" placeholder="Số lượng" readonly="readonly" data-bind="keyup: Format.Integer, keyup: Variant.SetValue" data-value="quantity">
                            </div>
                        </div>
                        <div class="form-group m-t-1 m-b-0" style="display: none;">
                            <input type="checkbox" id="quantity-limit" name="quantity_limit" class="filled-in"> <label for="quantity-limit">Cho đặt hàng khi đã hết hàng</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" data-bind="click: Variant.AddModal">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modal-variant-sort" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(url('admin/product/variant/sort/'.$post->product_id)); ?>" method="post" data-bind="form: disable">
                    <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Kéo để sắp xếp lại thuộc tính và chủng loại</h4></div>
                    <div class="modal-body">
                        <p class="font-lg-size m-t-0 m-b-1">Sắp xếp lại chủng loại sẽ thay đổi thứ tự xuất hiện của chúng ở ngoài website. Kéo thuộc tính(ví dụ như : màu sắc,kích thước) theo chiều dọc, và kéo chủng loại (ví dụ như : đỏ,lớn) theo chiều ngang.</p>
                        <div class="variant-sort-data"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" data-bind="click: Variant.SortModal">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(document).on('click','.add_variant',function(){
                var variant_name = $('input[name="variant_name[]"]').map(function(){ 
                    return this.value; 
                }).get();
                var variant_value = $('input[name="variant_value[]"]').map(function(){ 
                    return this.value; 
                }).get();
                var variant_key = $('input[name="variant_key[]"]').map(function(){ 
                    return this.value; 
                }).get();
                var post_list_image = $('input[name="post_list_image[]"]').map(function(){ 
                    return this.value; 
                }).get();

                var product_id = $(this).parent().find('input[name=product_id]').val();
                var image_variant = $(this).parent().find('input[name=image_variant]').val();
                var product_code = $(this).parent().find('input[name=product_code]').val();
                var price_old = $(this).parent().find('input[name=price_old]').val();
                var price_new = $(this).parent().find('input[name=price_new]').val();
                var tracking = $(this).parent().find('select[name=tracking]').val();
                var product_quantity = $(this).parent().find('input[name=product_quantity]').val();
                var quantity_limit = $(this).parent().find('input[name=quantity_limit]').val();
                var product_weight = $(this).parent().find('input[name=product_weight]').val();
                var product_ship = $(this).parent().find('input[name=product_ship]').val();

                $.ajax({
                    type: 'post',
                    url: "/admin/variant/add",

                    data: {
                        _token: $('#page_token').val(),
                        product_id: product_id,
                        post_list_image: post_list_image,
                        product_code: product_code,
                        price_old: price_old,
                        price_new: price_new,
                        tracking: tracking,
                        product_quantity: product_quantity,
                        quantity_limit: quantity_limit,
                        product_weight: product_weight,
                        product_ship: product_ship,
                        variant_name: variant_name,
                        variant_value: variant_value,
                    },
                    success: function (data) {
                        var json;
                        try {
                            json = JSON.parse(data);
                        } catch (exception) {
                            json = null;
                        }
                        if (json) {
                            var obj = JSON.parse(data);
                            if(obj['Response']=="False"){
                                alert(obj['Message']);
                                return;
                            }
                            else{
                                window.location.href = obj['url_redirect'];
                            }
                        }
                        else{
                            
                        }
                        
                        
                        // var output = '';
                        // output += '<tr>';
                        // output += '<th><input type="hidden" name="variant_id[]" value="'+data+'" /></th>';
                        // output += '<td></td>';
                        // for(i=0; i<variant_value.length; i++){
                        //     output += '<td><input type="text" name="variants['+variant_key[i]+'][]" value="'+variant_value[i]+'"></td>';
                        // }
                        // output += '<td><input type="text" name="sku[]" value="'+product_code+'"></td>';
                        // output += '<td><input type="text" name="price_variant[]" value="'+price_new+'"></td>';
                        // output += '<td><input type="text" name="quantity[]" value="0"></td>';
                        // output += '<td><a class="delete_variant" href="javascript:;">Delete</a></td>';
                        // output += '</tr>';
                        // $('.list-variant tbody').append(output);
                    }
                });
                
            });
            $(document).on('click','.delete_variant',function(){
                var self = $(this);
                var id= self.parent().parent().find('input[name="variant_id[]"]').val()
                $.ajax({
                    type: 'get',
                    url: "/admin/variant/destroy/"+id,

                    
                    success: function (data) {
                        var obj = JSON.parse(data);
                        if(obj['Response']=="True"){
                            $(self).parent().parent().remove();
                            console.log(obj['Message']);  
                        }
                        else{
                            console.log(obj['Message']);
                        }
                        
                    }
                });
                
                return false;

            });
            
           
            $(document).on('change','.select_variant', function(){

                var option_value = $(this).val();
                if( option_value == 'custom' )
                {
                    $(this).parent().find('.custom_name_new').show();
                }
                else
                {
                    $(this).parent().find('.custom_name_new').hide();
                }
            });
            $(document).on('change','.select_variant_old', function(){
                var option_value = $(this).val();
                if( option_value == 'custom' )
                {
                    $(this).parent().find('.att_old_update').show();
                }
                else
                {
                    $(this).parent().find('.att_old_update').hide();
                }
            });
        });
        $(document).on('click','.add_variant_att',function(){
            var size = $('.my_row .row').size();
            if( size < 3 )
            {
                var output = '';
                $.ajax({
                    type: 'get',
                    url: "/admin/variant/getlistvariantname",

                    
                    success: function (data) {
                        var obj = JSON.parse(data);
                        var output = '';
                        output += '<div class="row">';
                        output += '<select class="select_variant" name="variant_name_new_select[]" class="select_attr">';
                        $.each(obj, function(key, value) {    
                            output += '<option value="'+key+'">'+value+'</option>';   
                        });
                        output += '</select>';
                        output += '<input class="custom_name_new" type="text" name="custom_name_new[]" style="display:none" placeholder="nhap variant name" />';
                        output += '<input type="text" name="variant_value_new[]" placeholder="nhap variant value" />';
                        output += '<a class="hide_row_new" href="javascript:;">thung rac</a>';
                        output += '</div>';
                        $('.my_row').append(output);
                    }
                });
                
                if( size == 2 )
                {
                    $('.add_variant_att').hide();
                }
            }
        });
        $(document).on('click','.edit_variant_att',function(){
            var att_old_update=[];
            var att_old = $('input[name="att_old[]"]').map(function(){ 
                    return this.value; 
                }).get();
            var att_new =[];
            var variant_value =[];
            $('select[name^="variant_name_select"]').each(function() {
                
                if($(this).val()=="custom"){
                    att_old_update.push($(this).parent().find('.att_old_update').val());
                }
                else{
                    att_old_update.push($(this).val());
                }
            });
            $('select[name^="variant_name_new_select"]').each(function() {
                
                if($(this).val()=="custom"){
                    att_new.push($(this).parent().find('.custom_name_new').val());
                }
                else{
                    att_new.push($(this).val());
                }
            });
            $('input[name^="variant_value_new"]').each(function() {
                variant_value.push($(this).val());
            });
            var self = $(this);
            var product_id = $(document).find('input[name=product_id]').val();
            $.ajax({
                type: 'post',
                url: "/admin/variant/add-att",

                data: {
                    _token: $('#page_token').val(),
                    product_id: product_id,
                    att_old: att_old,
                    att_old_update: att_old_update,
                    att_new: att_new,
                    variant_value_new: variant_value
                },
                success: function (data) {
                    var json;
                    try {
                        json = JSON.parse(data);
                    } catch (exception) {
                        json = null;
                    }
                    if (json) {
                        var obj = JSON.parse(data);
                        if(obj['Response']=="False"){
                            console.log(obj['Message']); 
                            return;
                        }
                        else{
                            window.location.href = obj['url_redirect'];
                        }
                    }
                    else{
                        
                    }
                }
            });
            
            return false;
            

        });
        $(document).on('click','.hide_row',function(){
            var product_id = $(document).find('input[name=product_id]').val();
            var self = $(this);
            $.ajax({
                type: 'get',
                url: "/admin/variant/destroy_variant_meta/"+product_id,

                
                success: function (data) {
                    var obj = JSON.parse(data);
                    if(obj['Response']=="True"){
                        $('.add_variant_att').show();
                        $(self).parent().remove();
                    }
                    else{

                        console.log(obj['Message']);
                    }
                    
                }
            });
            
        });
        $(document).on('click','.hide_row_new',function(){
            var self = $(this);
            $(self).parent().remove();
            
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>