@extends('backend.layouts.default')
@section('titlePage','Chỉnh sửa '.$data_arr['tax_name'])
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/taxonomy/".$data_arr['tax_slug'].""),
        'heading_link_text' => $data_arr['section_title'],
        'heading_text' => 'Chỉnh sửa',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/taxonomy/'.$data_arr['tax_slug'].'/create').'">Thêm mới '.$data_arr['tax_name'].'</a>'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-taxonomy">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form id="taxonomy-form" action="{{ url('admin/taxonomy/'.$data_arr['tax_slug'].'/edit/'.$tax->taxonomy_id) }}" method="post">
            @include('backend.includes.token')
            <div class="box-typical b-t-p b-t-m">
                @if(isset($data_arr['edit_view']['title']))
                <div class="form-group">
                    <label>{{ $data_arr['edit_view']['title'] }}</label>
                    <input type="text" name="name" class="form-control meta-title" value="{{ old('name',$tax->taxonomy_name) }}" />
                </div>
                @endif
                @if(isset($data_arr['edit_view']['slug']))
                <div class="form-group">
                    <label>{{ $data_arr['edit_view']['slug'] }}</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug',$tax->taxonomy_slug) }}" />
                </div>
                @endif
                @if($data_arr['tax_level'] == '1')
                    @if(isset($data_arr['edit_view']['level']))
                    <div class="form-group">
                        <label>{{ $data_arr['edit_view']['level'] }}</label>
                        <select name="parent" class="form-control">
                            <option value="0">— Chọn danh mục —</option>
                            @if($parent)
                                {{ taxonomy_list($parent,0,"",old('parent',$tax->taxonomy_parent)) }}
                            @endif()
                        </select>
                    </div>
                    @endif
                @endif
                @if(isset($data_arr['edit_view']['excerpt']))
                <div class="form-group">
                    <label for="excerpt">{{ $data_arr['edit_view']['excerpt'] }}</label>
                    <textarea rows="5" class="form-control meta-description" name="excerpt">{{ old('excerpt',$tax->taxonomy_excerpt) }}</textarea>
                </div>
                @endif
                <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Taxonomy.Submit">Cập nhật</button>
                <a href="{{ url('admin/taxonomy/'.$data_arr['tax_slug'].'/delete/'.$tax->taxonomy_id) }}" class="btn btn-link text-danger">Xóa {{$data_arr['tax_name']}}</a>
            </div>            
            @if(isset($data_arr['edit_view']['seo']))
                @if($data_arr['edit_view']['seo'] ==  true)
                    {!! seo_content($seo_data) !!}
                @endif
            @endif
        </form>
    </div>
@stop