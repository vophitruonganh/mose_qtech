@extends('backend.layouts.default')
@section('titlePage','Templates')
@section('content')
    <div class="section-header add-btn">
       <h1><span>Quản lý menu</span><a href="{{ url('admin/menu') }}" class="btn btn-primary">Thêm mới</a></h1>
    </div>
    {!!section_title('Chỉnh sửa bài viết','Thêm mới',url('admin/post/create'))!!}
    <form action="{{ url('admin/menu') }}" method="post">
        @include('backend.includes.token')
        <div class="section-navigation">
            <div class="form-alerts"></div>
            <div class="navigation-main">
                <div class="">
                    <div class="tabs-section">
                        <div class="tabs-section-nav">
                            <ul class="nav nav-tabs">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#tabs-1-tab-1" role="tab" data-toggle="tab"><span class="nav-link-in">Chỉnh sửa</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs-1-tab-2" role="tab" data-toggle="tab"><span class="nav-link-in">Vị trí hiển thị</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tabs-1-tab-1" aria-expanded="true">
                                <div class="navigation-actions">
                                    <select name="" id="" class="form-control">
                                        <option value="choise">— Chọn menu —</option>
                                        <option value="">Nav Menu</option>
                                    </select>
                                    <button type="button" class="btn" value="action">Chọn</button>
                                    <button type="button" class="btn btn-primary" value="action">Tạo mới</button>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2" aria-expanded="false">Tab 2</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation-frame">
                <div class="navigation-widget">
                    <div class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">Danh mục bài viết <span class="font-icon icon-arrow-up"></span></a>
                            </div>
                            <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1">
                                <div class="panel-collapse-in">
                                    <div class="taxonomy-list">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php categoryInMenu($categoryPosts); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">Tùy chỉnh menu<span class="font-icon icon-arrow-up"></span></a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2">
                                <div class="panel-collapse-in">
                                    <div class="form-group">
                                        <input type="text" placeholder="http://" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Tên đường dẫn" class="form-control" />
                                    </div>
                                    <button type="button" class="btn">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">Danh mục sản phẩm <span class="font-icon icon-arrow-up"></span></a>
                            </div>
                            <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-3">
                                <div class="panel-collapse-in">
                                    <div class="taxonomy-list">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php categoryInMenu($categoryProducts,'product_category'); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navigation-menu">
                    <div class="box-typical">
                        <div class="box-typical-header box-typical-header-bordered">
                            <div class="list-nav clearfix">
                                <div class="list-actions">
                                    <input id="" name="" class="form-control" placeholder="Tên menu" value="" />
                                    <button type="submit" class="btn" name="type_submit" value="action">Áp dụng</button>
                                    <button type="submit" class="btn btn-danger" name="type_submit" value="action">Xóa menu</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-typical-body">
                            <div class="navigation-instructions">
                                <ol class="menu-sortable">
                                   <li id="menu-item-2" class="menu-item-edit-inactive">
                                        <div class="menu-item-bar">
                                           <div class="menu-item-handle">
                                                <span class="item-title">
                                                   <span data-id="2" class="menu-item-title">Trang chủ</span>
                                                </span>
                                                <span class="item-controls">
                                                    <span data-id="2" class="item-edit font-icon icon-arrow-up"></span>
                                                </span>
                                               <div id="menu-item-settings-2" class="menu-item-settings" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="sr-only">Đường dẫn</label>
                                                        <input type="text" placeholder="http://" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only">Tên đường dẫn</label>
                                                        <input type="text" placeholder="Tên đường dẫn" class="form-control">
                                                    </div>
                                                    <div class="settings-action">
                                                        <span class="item-delete" data-id="2"><span class="dashicons dashicons-trash"></span>Xóa mục</span>
                                                    </div>
                                               </div>
                                           </div>
                                        </div>
                                    </li>
                                    <li id="menu-item-2" class="menu-item-edit-inactive">
                                        <div class="menu-item-bar">
                                           <div class="menu-item-handle">
                                                <span class="item-title">
                                                   <span data-id="2" class="menu-item-title">Trang chủ</span>
                                                </span>
                                                <span class="item-controls">
                                                    <span data-id="2" class="item-edit font-icon icon-arrow-up"></span>
                                                </span>
                                               <div id="menu-item-settings-2" class="menu-item-settings" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="sr-only">Đường dẫn</label>
                                                        <input type="text" placeholder="http://" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only">Tên đường dẫn</label>
                                                        <input type="text" placeholder="Tên đường dẫn" class="form-control">
                                                    </div>
                                                    <div class="settings-action">
                                                        <span class="item-delete" data-id="2"><span class="dashicons dashicons-trash"></span>Xóa mục</span>
                                                    </div>
                                               </div>
                                           </div>
                                        </div>
                                    </li>
                                    <li id="menu-item-2" class="menu-item-edit-inactive">
                                        <div class="menu-item-bar">
                                           <div class="menu-item-handle">
                                                <span class="item-title">
                                                   <span data-id="2" class="menu-item-title">Trang chủ</span>
                                                </span>
                                                <span class="item-controls">
                                                    <span data-id="2" class="item-edit font-icon icon-arrow-up"></span>
                                                </span>
                                               <div id="menu-item-settings-2" class="menu-item-settings" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="sr-only">Đường dẫn</label>
                                                        <input type="text" placeholder="http://" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only">Tên đường dẫn</label>
                                                        <input type="text" placeholder="Tên đường dẫn" class="form-control">
                                                    </div>
                                                    <div class="settings-action">
                                                        <span class="item-delete" data-id="2"><span class="dashicons dashicons-trash"></span>Xóa mục</span>
                                                    </div>
                                               </div>
                                           </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop