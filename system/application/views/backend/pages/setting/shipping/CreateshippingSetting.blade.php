@extends('backend.layouts.default')
@section('titlePage','Tạo khu vực vận chuyển')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Tạo khu vực vận chuyển'
    );
    $setion_heading = section_title($heading);
?>
<div>
    <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
    <form id="order-form" action="{{ url('admin/setting/shipping/create') }}" method="post">
        @include('backend.includes.token')
        <label>Nhập khu vực vận chuyển</label>
        <select name="province_shipping">
            @foreach($provinces as $p)
            <option value="{{$p['id']}}">{{$p['name']}}</option>
            @endforeach
        </select>
        <input type="submit" name="ok" value="create">
    </form>
</div>
@stop