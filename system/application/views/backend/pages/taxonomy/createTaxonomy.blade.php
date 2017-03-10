@extends('backend.layouts.default')
@section('titlePage','Thêm mới '.$data_arr['tax_name'])
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/taxonomy/".$data_arr['tax_slug'].""),
        'heading_link_text' => $data_arr['section_title'],
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-taxonomy">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form id="taxonomy-form" action="{{ url('admin/taxonomy/'.$data_arr['tax_slug'].'/create') }}" method="post">
            @include('backend.includes.token')
            <div class="box-typical b-t-p b-t-m">
                @if(isset($data_arr['create_view']['title']))
                <div class="form-group">
                    <label>{{ $data_arr['create_view']['title'] }}</label>
                    <input type="text" name="name"  class="form-control meta-title" value="{{ old('name') }}" />
                </div>
                @endif
                @if(isset($data_arr['create_view']['slug']))
                <div class="form-group">
                    <label>{{ $data_arr['create_view']['slug'] }}</label>
                    <input class="form-control meta-slug" name="slug" type="text" value="{{ old('slug') }}" />
                </div>
                @endif
                @if($data_arr['tax_level'] == '1')
                    @if(isset($data_arr['create_view']['level']))
                    <div class="form-group">
                        <label>{{ $data_arr['create_view']['level'] }}</label>
                        <select name="parent" class="form-control">
                            <option value="0">— Chọn danh mục —</option>
                            @if($taxonomy)
                                {{ taxonomy_list($taxonomy,0,"",old('parent')) }}
                            @endif()
                        </select>
                    </div>
                    @endif
                @endif
                @if(isset($data_arr['create_view']['excerpt']))
                <div class="form-group">
                    <label for="excerpt">{{ $data_arr['create_view']['excerpt'] }}</label>
                    <textarea rows="5" class="form-control meta-description" name="excerpt">{{ old('excerpt') }}</textarea>
                </div>
                @endif
                <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Taxonomy.Submit">Thêm mới</button>
                <a href="{{ url('admin/taxonomy/'.$data_arr['tax_slug']) }}" class="btn btn-link">Hủy</a>
            </div>
            @if(isset($data_arr['create_view']['seo']))
                @if($data_arr['create_view']['seo'] ==  true)
                    {!! seo_content($seo_data) !!}
                @endif
            @endif
        </form>
    </div>
@stop