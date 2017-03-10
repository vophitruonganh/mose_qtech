@extends('backend.layouts.default')
@section('titlePage','Show Option')
@section('content')
    {!!section_title('Cấu hình - Hình ảnh')!!}
    @include('backend.includes.showErrorValidator')
    <form action="{{ url('admin/setting/image') }}" method="post">
        @include('backend.includes.token')
        <?php
            $_explode = explode('x',$imageSetting['sizeThumbImage']);
            $widthThumb = $_explode[0];
            $heightThumb = $_explode[1];
        ?>
        <div class="row">
            <label>Size Thumb Image</label>
            <input name="widthSizeThumbImage" type="text" value="{{ old('widthSizeThumbImage',$widthThumb) }}"/> x <input name="heightSizeThumbImage" type="text" value="{{ old('heightSizeThumbImage',$heightThumb) }}"/>
        </div>
        <?php
            $_explode = explode('x',$imageSetting['sizeMediumImage']);
            $widthMedium = $_explode[0];
            $heightMedium = $_explode[1];
        ?>
        <div class="row">
            <label>Size Medium Image</label>
            <input name="widthSizeMediumImage" type="text" value="{{ old('widthSizeMediumImage',$widthMedium) }}"/> x <input name="heightSizeMediumImage" type="text" value="{{ old('heightSizeMediumImage',$heightMedium) }}"/>
        </div>
        <?php
            $_explode = explode('x',$imageSetting['sizeLargerImage']);
            $widthLarger = $_explode[0];
            $heightLarger = $_explode[1];
        ?>
        <div class="row">
            <label>Size Larger Image</label>
            <input name="widthSizeLargerImage" type="text" value="{{ old('widthSizeLargerImage',$widthLarger) }}"/> x <input name="heightSizeLargerImage" type="text" value="{{ old('heightSizeLargerImage',$heightLarger) }}"/>
        </div>
        <div class="row">
            <input value="Submit" type="submit"/>
        </div>
    </form>
@stop