@extends('backend.layouts.default')
@section('titlePage','Product Create')
@section('content')
    @include('backend.includes.showErrorValidator')
    {!!section_title('Thêm mới sản phẩm')!!}
    <div class="section-post edit-page">
        <div class="form-alerts"></div>
        <form id="post-form" action="{{ url('admin/product/create') }}" method="post">
            @include('backend.includes.token')
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical box-typical-padding">
                        <div class="form-group">
                            <label for="title">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Mô tả</label>
                            <textarea rows="5" class="form-control" id="excerpt" name="excerpt" class="editor">{{ old('excerpt') }}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="editor-area form-control" name="content">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="box-typical box-typical-padding">
                        <div class="form-group">
                            <label for="product_code">Mã sản phẩm</label>
                            <input type="text" class="form-control" id="product_code" name="product_code" value="{{ old('product_code')}}" />
                        </div>
                        <div class="form-group">
                            <label for="price_old">Giá cũ</label>
                            <input type="text" class="form-control" id="price_old" name="price_old" value="{{ old('price_old') }}" />
                        </div>
                        <div class="form-group">
                            <label for="price_new">Giá mới</label>
                            <input type="text" class="form-control" id="price_new" name="price_new" value="{{ old('price_new') }}" />
                        </div>
                    </div>
                    <div class="box-typical">
                        <div class="box-typical-header box-typical-header-bordered">
                            <h3>Tối ưu SEO</h3>
                        </div>
                        <div class="box-typical-body">
                            <div id="snippet-preview">
                                <div class="snippet-text">
                                    <span class="snippet-title"> - {{ $seoData['title'] }}</span>
                                </div>
                                <div class="snippet-text">
                                    <cite class="snippet-cite">{{ $seoData['url'] }}</cite>
                                </div>
                                <div class="snippet-text">
                                    <span class="snippet-desc"></span>
                                </div>
                                <div class="snippet-def">Thiết lập các thẻ mô tả giúp khách hàng dễ dàng tìm thấy website trên công cụ tìm kiếm như Google.</div>
                                <div class="snippet-btn">
                                    <button class="btn" type="button" data-toggle="collapse" aria-expanded="false" data-target="#snippet-editor" aria-controls="snippet-editor"><span class="dashicons dashicons-edit"></span> Tùy chỉnh SEO</button>
                                </div>
                            </div>
                            <div id="snippet-editor" class="collapse">
                                <div class="form-group">
                                    <label for="snippet_title">Tiêu đề trang</label>
                                    <input type="text" class="form-control" id="snippet-editor-meta-description" name="seo_title" value="{{old('seo_title')}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="snippet_title">Đường dẫn trang</label>
                                    <input type="text" class="form-control" id="snippet-editor-meta-description" name="slug" value="{{ old('slug') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="snippet_title">Mô tả trang</label>
                                    <textarea class="form-control" id="snippet-editor-meta-description" rows="3" name="seo_description">{{old('seo_description')}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="snippet_title">Từ khóa trang</label>
                                    <input type="text" class="form-control" id="snippet-editor-meta-description" name="seo_keyword" value="{{old('seo_keyword')}}"  />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action">
                            <div class="tbl">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-btn"><button type="submit" class="btn" name="submit" value="0">Nháp</button> <button type="submit" class="btn btn-primary" name="submit" value="1">Công khai</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="proj-page-subtitle">
                                <h3>Thông tin</h3>
                            </div>
                            <div class="misc-actions">
                                <div class="form-group">
                                    <div class="inner" data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select">
                                        <label class="misc-label"><span class="dashicons dashicons-post-status"></span>Tình trạng:</label>
                                        <span class="misc-text">Công khai</span>
                                    </div>
                                    <div id="post-status-select" class="form-inline collapse extend">
                                        <input type="hidden" name="hidden_post_status" id="hidden_post_status" value="{{old('post_status')}}">
                                        <select name="post_status" id="post_status" class="form-control">
                                            <option value="publish">Công khai</option>
                                            <option value="pending">Đang chờ duyệt</option>
                                            <option value="draft">Nháp</option>
                                        </select>
                                        <button type="button" class="btn change-post-status" data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select">Áp dụng</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date">
                                        <label class="misc-label"><span class="dashicons dashicons-calendar"></span>Vào lúc:</label>
                                        <span class="misc-text"></span>
                                    </div>
                                    <div id="misc-post-date" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <input type="text" name="newcategory" id="newcategory" class="form-control" value="" placeholder="Ngày"/>
                                            <select name="post_status" id="post_status" class="form-control">
                                                <option>Tháng</option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                            <input type="text" name="newcategory" id="newcategory" class="form-control" value="" placeholder="Năm"/>
                                            <span class="">@</span>
                                            <input type="text" name="newcategory" id="newcategory" class="form-control" value="" placeholder="Giờ"/>
                                            <input type="text" name="newcategory" id="newcategory" class="form-control" value="" placeholder="Phút"/>
                                        </div>
                                        <button type="button" class="btn change-comment-status" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date">Áp dụng</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inner" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select">
                                        <label class="misc-label"><span class="dashicons dashicons-admin-comments"></span>Bình luận:</label>
                                        <span class="misc-text">Đóng</span>
                                    </div>
                                    <div id="post-comment-select" class="form-inline collapse extend">
                                        <input type="hidden" name="hidden_post_comment" id="hidden_post_comment" value="{{old('comment_status')}}">
                                        <select name="post_comment" id="post_comment" class="form-control">
                                            <option value="yes">Mở</option>
                                            <option value="no">Đóng</option>
                                        </select>
                                        <button type="button" class="btn change-comment-status" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select">Áp dụng</button>
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
                                        <?php categoryInMenu($category_products,'post_category') ?>
                                    </ul>
                                </div>
                            </div>
                            <a id="category-add-toggle" href="#category-add" class="category-addnew" data-toggle="collapse" aria-expanded="false" aria-controls="category-add">+ Thêm mới danh mục</a>
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
                                <div class="tabs-panel">
                                    <ul class="taxonomy-checklist">
                                        <?php categoryInMenu($group_products,'group_product') ?>
                                    </ul>
                                </div>
                            </div>
                            <a id="category-add-toggle" href="#category-add" class="category-addnew" data-toggle="collapse" aria-expanded="false" aria-controls="category-add">+ Thêm mới nhóm sản phẩm</a>
                                <div id="category-add" class="collapse">
                                    <div class="form-group">
                                        <label class="sr-only" for="newcategory">Add New Group Product</label>
                                        <input type="text" name="newcategory" id="newcategory" class="form-control" value="" placeholder="Nhập tên nhóm sản phẩm mới"/>
                                    </div>
                                    
                                    <input type="button" id="category-add-submit" class="btn" value="Thêm nhóm sản phẩm" />
                                </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle">
                                <h3>Nhà cung cấp</h3>
                            </div>
                            <div class="taxonomy-list">
                                <div class="tabs-panel">
                                    <ul class="taxonomy-checklist">
                                        <?php categoryInMenu($manufactory_products,'manufactory_product') ?>
                                    </ul>
                                </div>
                            </div>
                            <a id="category-add-toggle" href="#category-add" class="category-addnew" data-toggle="collapse" aria-expanded="false" aria-controls="category-add">+ Thêm mới nhà cung cấp</a>
                                <div id="category-add" class="collapse">
                                    <div class="form-group">
                                        <label class="sr-only" for="newcategory">Add New Manufactory Product</label>
                                        <input type="text" name="newcategory" id="newcategory" class="form-control" value="" placeholder="Nhập tên nhà cung cấp mới"/>
                                    </div>
                                    
                                    <input type="button" id="category-add-submit" class="btn" value="Thêm nhóm sản phẩm" />
                                </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle">
                                <h3>Nhãn</h3>
                            </div>
                            <div id="post-tags" class="tags-choose">
                                <div class="form-group">
                                    <input type="text" name="newtags" id="newtags" class="form-control" value="{{old('tag_name')}}" placeholder="Nhập nhãn bài viết" />
                                </div>
                            </div>
                        </div>
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
                                            <!-- <p>One fine body&hellip;</p> -->
                                            {!! $listFeaturedImage !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                            <button type="button" class="btn btn-primary">Đặt làm ảnh đại diện</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop