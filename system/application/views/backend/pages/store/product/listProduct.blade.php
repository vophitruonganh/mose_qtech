@extends('backend.layouts.default')
@section('titlePage','Danh sách sản phẩm')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách sản phẩm',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/product/create').'">Thêm mới sản phẩm</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-product">
        <div class="form-alerts"></div>
        <form id="product-form" action="{{ url('admin/product') }}" method="post" data-bind="form: disable">
            @include('backend.includes.token')
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action clearfix">
                        <div class="pull-md-left">
                            @if($product_count['all'] > 0 || $product_count['trash'] > 0)
                            <div class="form-group">
                                <select name="product_status" id="action_status" class="form-control" data-bind="change: Table.ActionChange, change: Table.StatusChange">
                                    @if($product_count['all'] > 0)<option @if($product_status=='all') selected="selected" @endif value="all">Tất cả ({{$product_count['all']}})</option>@endif
                                    @if($product_count['public'] > 0)<option @if($product_status=='public') selected="selected" @endif value="public">Công khai ({{$product_count['public']}})</option>@endif
                                    @if($product_count['pending'] > 0)<option @if($product_status=='pending') selected="selected" @endif value="pending">Đang chờ duyệt ({{$product_count['pending']}})</option>@endif
                                    @if($product_count['draft'] > 0)<option @if($product_status=='draft') selected="selected" @endif value="draft">Nháp ({{$product_count['draft']}})</option>@endif
                                    @if($product_count['trash'] > 0)<option @if($product_status=='trash') selected="selected" @endif  value="trash">Xóa ({{$product_count['trash']}})</option>@endif
                                </select>
                            </div>
                            @endif
                             <?php
                                $arr=array();
                                if($product_status == 'trash'){
                                    $arr=array('restore'=> 'Khôi phục','delete'=>'Xóa vĩnh viễn');
                                }
                            ?>
                            {!! tableActionForm($arr,'','','click: Table.Action') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Product.TableSearch') !!}

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="product-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        @include('backend.pages.store.product.listViewProduct')
                    </div>
                </div>
            </div>
        </form>
    </div>
     {!!pagination($products,$pagination)!!}
@stop