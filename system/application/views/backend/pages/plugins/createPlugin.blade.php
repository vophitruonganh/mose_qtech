@extends('backend.layouts.default')
@section('titlePage','Danh sách ứng dụng')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/plugin"),
        'heading_link_text' => 'Danh sách ứng dụng',
        'heading_text' => 'Thêm mới ứng dụng',
    );
    $setion_heading = section_title($heading);
?>
    @include('backend.layouts.building')
@stop