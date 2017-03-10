@extends('backend.layouts.default')
@section('titlePage','Chỉnh sửa tiện ích')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/widget"),
        'heading_link_text' => 'Danh sách tiện ích',
        'heading_text' => $pluginName,
    );
    $setion_heading = section_title($heading);
?>
{!! $widgetForm !!}
@stop