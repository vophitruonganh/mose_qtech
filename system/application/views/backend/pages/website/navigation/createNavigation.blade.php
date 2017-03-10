@extends('backend.layouts.default')
@section('titlePage','Thêm mới menu')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/navigation"),
        'heading_link_text' => 'Danh sách menu',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-navigation">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form action="{{ url('admin/navigation/create') }}" method="post">
            @include('backend.includes.token')
            <div class="navigation-frame">
                <div class="navigation-widget">
                    <div class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="widget-item">
                            <div class="widget-item-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">Danh mục bài viết <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1">
                                <div class="collapse-in" data-type="post">
                                    <div class="taxonomy-list m-b-1">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php categoryInMenu($categoryPosts); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bind="click: Website.Navigation.AddItem">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <div class="widget-item">
                            <div class="widget-item-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">Tùy chỉnh menu <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2">
                                <div class="collapse-in" data-type="custom">
                                    <div class="form-group">
                                        <input type="text" placeholder="http://" class="form-control custom-url" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Tên đường dẫn" class="form-control custom-name" />
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bind="click: Website.Navigation.AddItem">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <div class="widget-item">
                            <div class="widget-item-heading" role="tab" id="headingTwo">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">Danh mục sản phẩm <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-3">
                                <div class="collapse-in" data-type="product">
                                    <div class="taxonomy-list m-b-1">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php categoryInMenu($categoryProducts,'product_category'); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bind="click: Website.Navigation.AddItem">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        @if( count($pages) > 0 )
                        <div class="widget-item">
                            <div class="widget-item-heading" role="tab" id="headingThree">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">Trang <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-4">
                                <div class="collapse-in" data-type="page">
                                    <div class="taxonomy-list m-b-1">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                @foreach( $pages as $page )
                                                <li data-id="{{ $page->post_id }}" data-text="{{ $page->post_title }}"><input id="page-{{ $page->post_id }}" type="checkbox" class="filled-in" value="{{ $page->post_id }}"><label for="page-{{ $page->post_id }}">{{ $page->post_title }}</label></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bind="click: Website.Navigation.AddItem">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="navigation-menu">
                    <div class="box-typical">
                        <div class="box-typical-header box-typical-header-bordered">
                            <div class="list-nav clearfix">
                                <div class="navigation-actions">
                                    <input id="menu-title" name="title" class="form-control" placeholder="Tên menu" value="" />
                                    <select name="select_index" id="select_index" class="form-control">
                                        <option selected="selected" value="0">Chưa xác định</option>
                                        @foreach( $registerNavigation as $key => $value )
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach;
                                    </select>
                                    <button id="navigation-submit-btn" type="submit" class="btn btn-primary" data-bind="click: Website.Navigation.SubmitItem">Thêm mới</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body box-body-padding">
                            <div class="navigation-instructions">
                                <ol class="menu-sortable" data-bind="load: Website.Navigation.SortableItem, load: Website.Navigation.EditItem, load: Website.Navigation.RemoveItem"></ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop