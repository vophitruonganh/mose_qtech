@extends('backend.layouts.default')
@section('titlePage','Danh sách nhân viên')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách nhân viên',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/user/create').'">Thêm mới nhân viên</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-user">
        <div class="form-alerts"></div>
        <form id="account-form" action="{{ url('admin/user') }}" method="post">
            @include('backend.includes.token')
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <div class="form-group">
                                <select name="user_status" id="action_status" class="form-control" data-bind="change: Table.StatusChange">
                                    <option selected="selected" value="">Chọn tình trạng</option>
                                    <option @if($user_status == '1') selected="selected" @endif value="1">Đã Kích hoạt</option>
                                    <option @if($user_status == '0') selected="selected" @endif value="0">Vô hiệu hóa</option>
                                </select>
                            </div>
                            <?php
                                $arr = array('activate'=> 'Kích hoạt','disable'=>'Vô hiệu hóa','edit'=>'Chỉnh sửa','delete'=>'Xóa')
                            ?>
                            {!! tableActionForm($arr,'','','click: Table.Action') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','click: User.TableSearch') !!}
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="user-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        @include('backend.pages.account.user.listViewUser')
                    </div>
                </div>
            </div>
        </form>
    </div>
     {!!pagination($users,$pagination)!!}
@stop