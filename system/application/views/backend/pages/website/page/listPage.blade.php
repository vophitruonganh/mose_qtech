@extends('backend.layouts.default')
@section('titlePage','Danh sách trang')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách trang',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/page/create').'">Thêm mới trang</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-post">
        <div class="form-alerts"></div>
        <form id="post-form" action="{{ url('admin/page') }}" method="post" data-bind="form: disable">
            @include('backend.includes.token')  
            <div class="box-typical">
                 <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action clearfix">
                        <div class="pull-md-left">
                            @if($post_count['all'] > 0 || $post_count['trash'] > 0)
                            <div class="form-group">
                                <select name="post_status" id="action_status" class="form-control" data-bind="change: Table.ActionChange, change: Table.StatusChange">
                                    @if($post_count['all'] > 0)<option @if($post_status=='all') selected="selected" @endif value="all">Tất cả ({{$post_count['all']}})</option>@endif
                                    @if($post_count['public'] > 0)<option @if($post_status=='public') selected="selected" @endif value="public">Công khai ({{$post_count['public']}})</option>@endif
                                    @if($post_count['pending'] > 0)<option @if($post_status=='pending') selected="selected" @endif value="pending">Đang chờ duyệt ({{$post_count['pending']}})</option>@endif
                                    @if($post_count['draft'] > 0)<option @if($post_status=='draft') selected="selected" @endif value="draft">Nháp ({{$post_count['draft']}})</option>@endif
                                    @if($post_count['trash'] > 0)<option @if($post_status=='trash') selected="selected" @endif  value="trash">Xóa ({{$post_count['trash']}})</option>@endif
                                </select>
                            </div>
                            @endif
                            <?php
                                $arr = array();
                                if($post_status == 'trash'){
                                    $arr = array('restore'=> 'Khôi phục','delete'=>'Xóa vĩnh viễn');
                                }
                            ?>
                            {!! tableActionForm($arr,'','','click: Table.Action') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Post.TableSearch') !!}
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="page-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        @include('backend.pages.website.page.listViewPage')
                    </div>
                </div>
            </div>
        </form>    
    </div>
    {!! pagination($posts,$pagination) !!}
@stop