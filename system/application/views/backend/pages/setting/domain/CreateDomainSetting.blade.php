@extends('backend.layouts.default')
@section('titlePage','Tạo tên miền')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Tạo tên miền',
    );
    $setion_heading = section_title($heading);
?>
    <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
	<form action="{{ url('admin/setting/domain/create') }}" method="post">
    @include('backend.includes.token')
        <label>Tên miền</label>
        <input type="text" name="domain_name">
        <input type="submit" value="Lưu">
    
    </form>
@stop