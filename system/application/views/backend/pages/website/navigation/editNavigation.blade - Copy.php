@extends('backend.layouts.default')
@section('titlePage','Templates')
@section('content')
    {!!section_title('Chỉnh sửa menu','Thêm mới',url('admin/navigation/create'))!!}
    <div class="section-navigation">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form id="navigation-form" action="{{ url('admin/navigation/edit/') }}" method="post">
            @include('backend.includes.token')
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
                                    <button type="button" class="btn taxonomy-list-btn">Thêm vào menu</button>
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
                                        <input type="text" placeholder="http://" class="form-control custom-url" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Tên đường dẫn" class="form-control custom-name" />
                                    </div>
                                    <button type="button" class="btn taxonomy-list-btn">Thêm vào menu</button>
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
                                    <button type="button" class="btn taxonomy-list-btn">Thêm vào menu</button>
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
                                    <select name="select_index" id="select_index" class="form-control">
                                        <option selected="selected" value="0">Chưa xác định</option>
                                        <option value="">Top Menu</option>
                                        <option value="">Chỉnh sửa</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" value="action">Cập nhật</button>
                                    <a href="" class="btn-delete"><span class="font-icon dashicons dashicons-trash"></span>Xóa menu</a>
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
        </form>
    </div>
@stop