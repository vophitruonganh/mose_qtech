@extends('backend.layouts.default')
@section('titlePage','Danh sách ứng dụng')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/plugin"),
        'heading_link_text' => 'Danh sách ứng dụng',
        'heading_text' => 'Xóa ứng dụng',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/plugin/create').'">Thêm mới</a>',
    );
    $setion_heading = section_title($heading);
?>
	<div class="section-user mode-list">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form action="{{ url('admin/plugin') }}" method="post" enctype="multipart/form-data">
			@include('backend.includes.token')
            <div class="box-typical b-t-p">
                <div class="form-group">
                    <p class="m-t-0 font-weight-bold">Advanced Custom Fields</p>
                    <p class="m-t-0 text-muted">Master Slider is the most advanced responsive HTML5 WordPress slider plugin with touch swipe navigation that works smoothly on devices too.</p>
                    <p class="m-a-0 text-muted">Phiên bản: 1.0.0 | Nhà phát triển: Elliot Condon | Chi tiết</p>
                </div>
                <div class="form-group m-b-0">
                    <a href="{{ url('admin/plugin/pdelete/'.$folderPlugin.'/'.$fileNamePlugin) }}" class="btn btn-secondary waves-effect">Xóa ứng dụng</a>
                    <a href="{{ url('admin/plugin/pdelete/'.$folderPlugin.'/'.$fileNamePlugin.'/'.$deletaPluginData) }}" class="btn btn-danger waves-effect">Xóa ứng dụng và dữ liệu</a>
                </div>
            </div>
        </form>
	</div>
@stop