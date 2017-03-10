@extends('backend.layouts.default')
@section('titlePage','Danh sách giao diện')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/themes"),
        'heading_link_text' => 'Danh sách giao diện',
        'heading_text' => 'Thêm mới giao diện',
    );
    $setion_heading = section_title($heading);
?>
    @include('backend.layouts.building')
@stop