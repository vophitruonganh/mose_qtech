@extends('backend.layouts.default')
@section('titlePage','Thêm mới sản phẩm')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Danh sách sản phẩm',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-product">
        <div class="form-alerts"> @include('backend.includes.showErrorValidator')</div>
        <form id="product-form" action="{{ url('admin/product/create') }}" method="post">
            @include('backend.includes.token')
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p b-t-m">
                        <div class="form-group">
                            <label for="title">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <div class="slug-group input-group">
                                <label class="sr-only">Đường dẫn</label>
                                <span class="input-group-addon">{{ $prefixSlug }}/collections/</span>
                                <input id="slug-input" type="text" name="slug" value="{{ old('slug') }}" class="form-control" readonly="readonly" />
                                <span class="input-group-btn"><button id="slug-edit" type="button" class="btn btn-secondary" data-on-click="General.ChangeSlug"><i class="font-icon material-icons md-16">mode_edit</i></button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="editor-area form-control" name="content">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Mô tả</label>
                            <textarea rows="3" class="form-control" id="excerpt" name="excerpt" class="editor">{{ old('excerpt') }}</textarea>
                            <small class="text-muted">Mặc định nếu mô tả để trống sẽ lấy từ nội dung để hiển thị.</small>
                        </div>
                    </div>
                    <div class="box-typical b-t-p b-t-m">
                        <div class="image-group">
                            <div class="image-group-heading clearfix">
                                <h4 class="pull-xs-left">Hình ảnh sản phẩm</h4>
                                <div class="heading-action pull-xs-right">
                                    <button type="button" class="btn btn-link" data-bind="click: Product.ModalURLImage"><i class="material-icons md-18">link</i> Thêm bằng URL</button>
                                    <button type="button" class="btn btn-link" data-bind="click: Product.ModalListImage"><i class="material-icons md-18">add_a_photo</i> Chọn hình</button>
                                </div>
                            </div>
                            <div class="image-group-main">
                                <div class="image-group-info">
                                    <i class="font-icon material-icons">image</i>
                                    <p class="font-lg-size">Sử dụng nút Chọn hình để thêm hình vào sản phẩm.</p>
                                </div>
                                <div class="image-group-list">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-typical b-t-m">
                        <div class="box-typical-header box-typical-header-bordered panel-heading"><h3>Thông tin sản phẩm</h3></div>
                        <div style="height:300px">
                            <a class="add_version" href="javascript:;">Them phien ban</a>
                            <a class="huy_version" href="javascript:;" style="display:none;">Huy</a>
                            <div class="my_content" style="display:none;">
                                <div class="my_row">
                                    <div class="row">
                                        <select class="select_variant" name="variant_name[]" class="select_attr">
                                            <option value="tieu de">Tieu de</option>
                                            <option value="kick thuoc">Kich thuoc</option>
                                            <option value="mau sac">Mau sac</option>
                                            <option value="vat lieu">Vat lieu</option>
                                            <option value="kieu dang">Kieu dang</option>
                                            <option value="custom">Tao tuy chon moi</option>
                                        </select>
                                        <input class="custom_name" type="text" name="custom_name[]" style="display:none" placeholder="nhap variant name" />
                                        <input type="text" name="variant_value[]" placeholder="nhap variant value" />
                                        <a class="hide_row" href="javascript:;">thung rac</a>
                                    </div>
                                </div>
                                <a class="add_attr" href="javascript:;">Them thuoc tinh</a>
                            </div>
                        </div>
                        <div class="box-typical-body b-t-p">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Mã sản phẩm</span>
                                    <input type="text" class="form-control" id="product_code" name="product_code" value="{{ old('product_code')}}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Giá cũ</span>
                                            <input type="text" class="form-control" id="price_old" name="price_old" value="{{ old('price_old') }}" />
                                            <span class="input-group-addon">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Giá mới</span>
                                            <input type="text" class="form-control" id="price_new" name="price_new" value="{{ old('price_new') }}" />
                                            <span class="input-group-addon">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select id="tracking-select" name="tracking" class="form-control" data-on-change="Store.ProductTrackingChange">
                                            <option value="notracking" selected="selected">Không quản lý tồn kho</option>
                                            <option value="tracking">Quản lý tồn kho</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon p-y-0">Số lượng</span>
                                            <input type="number" class="form-control" id="product-quantity" name="product_quantity" value="{{ old('product_quantity') }}" readonly="readonly" />
                                            <span class="input-group-addon p-y-0"><input type="checkbox" id="quantity-limit"  name="quantity-limit" class="filled-in" /> <label for="quantity-limit">Cho đặt hàng khi đã hết hàng</label></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon p-y-0">Khối lượng</span>
                                    <input type="text" class="form-control" id="product-weight" name="product_weight" value="{{ old('product_weight') }}" />
                                    <span class="input-group-addon p-y-0">(grams)</span>
                                    <span class="input-group-addon p-y-0"><input type="checkbox" id="product-ship" name="product-ship" class="filled-in" /> <label for="product-ship">Có giao hàng</label></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! seo_content([
                        'seo_slug' => 'collections/',
                    ]) !!}
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link" href="{{ url('admin/product/') }}">Hủy</a>
                                <button type="submit" class="btn btn-primary waves-effect">Thêm mới</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="proj-page-subtitle"><h3>Thông tin</h3></div>
                            <div class="misc-actions">
                                <div class="misc-group">
                                    <div data-toggle="collapse" data-target="#misc-product-status" aria-expanded="false" aria-controls="misc-status-select">
                                        <label class="misc-label m-b-0">Tình trạng:</label>
                                        <label class="misc-label-text m-b-0" data-text="product_status">Công khai</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_product_status" id="hidden_product_status" value="{{old('product_status')}}" data-value="product_status" />
                                    </div>
                                    <div id="misc-product-status" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <select name="product_status" id="product_status" class="form-control misc-select-text" data-change="product_status">
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
                                        <label class="misc-label-text m-b-0" data-text="product_date">{{ date('H:i d/m/Y',time())}}</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                    </div>
                                    <div id="misc-product-date" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <input type="text" name="product_date" class="form-control" data-plugin="datetimepicker" value="{{ date('H:i d/m/Y',time())}}" placeholder="Ngày tạo" data-change="product_date" />
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-product-date" aria-expanded="false" aria-controls="misc-product-date"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-product-comment" aria-expanded="false" aria-controls="misc-product-comment">
                                        <label class="misc-label m-b-0">Bình luận:</label>
                                        <label class="misc-label-text m-b-0" data-text="product_comment">Mở</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_product_comment" id="hidden_product_comment" value="yes">
                                    </div>
                                    <div id="misc-product-comment" class="form-inline collapse extend">
                                        <select name="product_comment" id="product_comment" class="form-control misc-select-text" data-change="product_comment">
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

                            <button id="category-toggle-add" data-target="#category-add" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="category-add">+ Thêm mới danh mục</button>
                            <div id="category-add" class="collapse">
                                <div class="form-group">
                                    <label class="sr-only" for="newcategory">Add New Category</label>
                                    <input type="text" name="newcategory" id="newcategory" class="form-control" value="" placeholder="Nhập tên danh mục mới"/>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Danh mục cha:</label>
                                    <select name="newcategory_parent" id="newcategory-parent" class="form-control">
                                        <option value="0">— Danh mục cha —</option>
                                        @foreach($category_products as $category)
                                            <option value="{{$category->term_id}}">{{$category->name}}</option>
                                        @endforeach()
                                    </select>
                                </div>
                                <input type="button" id="category-add-submit" class="btn" value="Thêm danh mục" />
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle">
                                <h3>Nhóm sản phẩm</h3>
                            </div>
                            <div class="taxonomy-list">
                                <select id="discount_promotion" name="discount_promotion" class="form-control" data-plugin="select2">
                                    <option value="1" selected="selected">Nhóm 1</option>
                                    <option value="2">Nhóm 2</option>
                                </select>
                                <!-- <div class="tabs-panel">
                                    <ul class="taxonomy-checklist">
                                        <?php categoryInMenu($group_products,'product_group') ?>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle">
                                <h3>Nhà cung cấp</h3>
                            </div>
                            <div class="taxonomy-list">
                                <div class="tabs-panel">
                                    <ul class="taxonomy-checklist">
                                        <?php categoryInMenu($manufactory_products,'product_manufactory') ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle"><h3>Nhãn</h3></div>
                            <div id="post-tags">
                                <div class="form-group">
                                    <input type="text" name="newtags" id="newtags" class="form-control" data-plugin="tagsinput" value="{{old('tag_name')}}" placeholder="Nhập nhãn bài viết" />
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            Ảnh của sản phẩm
                            <input type="text" name="post_list_image[]" value="360" />
                        </div>
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
                        <!--
                        <div class="proj-page-section proj-page-fi">
                            <div class="proj-page-subtitle"><h3>Ảnh đại diện</h3></div>
                            <div id="featured-image-group">
                                <div id="featured-thumbnail" class="hidden-xs-up" data-image="1" data-type="featured">
                                    <a href="javascript:;" data-bind="click: General.GetImage"><img src="" /></a>
                                    <input type="hidden" name="product_featured_image" id="hidden_featured_image" value="{{ old('post_featured_image') }}" />
                                    <div id="featured-remove"><button id="btn-remove-fi" class="btn btn-link text-danger" data-bind="click: General.RemoveImage">Xóa ảnh đại diện</button></div>
                                </div>
                                <div id="featured-modal"  data-image="1" data-type="featured">
                                    <a href="javascript:;" data-bind="click: General.GetImage"><i class="material-icons">add_to_photos</i><span>Thêm ảnh đại diện</span></a>
                                </div>
                                {!! media_modal() !!}
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <script>
        $(document).ready(function(){
            $(document).on('click','.add_version', function(){
                $(this).hide();
                $('.huy_version').show();
                $('.my_content').show();
                return false;
            });
            $(document).on('click','.huy_version', function(){
                $(this).hide();
                $('.add_version').show();
                $('.my_content').hide();
            });
            $(document).on('change','.select_variant', function(){
                var option_value = $(this).val();
                if( option_value == 'custom' )
                {
                    $(this).parent().find('.custom_name').show();
                }
                else
                {
                    $(this).parent().find('.custom_name').hide();
                }
            });
            $(document).on('click','.add_attr',function(){
                var size = $('.my_row .row').size();
                if( size < 3 )
                {
                    var output = '';
                    output += '<div class="row">';
                    output += '<select class="select_variant" name="variant_name[]" class="select_attr">';
                    output += '<option value="tieu de">Tieu de</option>';
                    output += '<option value="kick thuoc">Kich thuoc</option>';
                    output += '<option value="mau sac">Mau sac</option>';
                    output += '<option value="vat lieu">Vat lieu</option>';
                    output += '<option value="kieu dang">Kieu dang</option>';
                    output += '<option value="custom">Tao tuy chon moi</option>';
                    output += '</select>';
                    output += '<input class="custom_name" type="text" name="custom_name[]" style="display:none" placeholder="nhap variant name" />';
                    output += '<input type="text" name="variant_value[]" placeholder="nhap variant value" />';
                    output += '<a class="hide_row" href="javascript:;">thung rac</a>';
                    output += '</div>';
                    $('.my_row').append(output);
                    if( size == 2 )
                    {
                        $('.add_attr').hide();
                    }
                }
                
            });
             $(document).on('click','.hide_row',function(){
                $('.add_attr').show();
                $(this).parent().remove();
            });
        });
    </script>
@stop