@extends('backend.layouts.default')
@section('titlePage','Product List')
@section('content')

    <form action="{{ url('admin/product/postAction') }}" method="post" enctype="multipart/form-data">
        @include('backend.includes.token')
        <div class="post-list-nav clearfix">
            <div class="post-list-actions">
                <select name="post_action" id="post_action" class="form-control post_action" data-bind="">
                    <option selected="selected" value="publish">Chọn hành động</option>
                    <option value="trash">Xóa</option>
                </select>
                 <button type="button" class="btn" data-bind="click: ProductActionApply">Áp dụng</button>
            </div>
            <div class="post-list-search">
                <div class="search-form">
                    <div class="input-group">
                        <input type="text" name="s" class="form-control" placeholder="Tìm kiếm bài viết...">
                        <span class="input-group-btn"><button class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button></span>
                    </div>
                </div>
            </div>
        </div>
	@if( count($posts) == 0 )
        @include('backend.includes.nodata')
    @else
        <div class="box-typical box-typical-padding">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th class="check-column"><input type="checkbox" id="checkall" /></th>
                    <th>Sản phẩm</th>
                    <th></th>
                </tr>
            </thead>
            <!--
            <tr>
                
                <td>ID</td>
                <td>title</td>
                <td>slug</td>
                <td>parent</td>
                <td>description</td>
                <td>SEO title</td>
                <td>SEO description</td>
                <td>SEO keyword</td>
                <td></td>
            </tr> -->
            <tbody>
            @foreach( $posts as $post )
            <tr>   
                <th class="check-column"><input type="checkbox" class="pcb" name="check[]" id="check[]" value="{{$post->post_id}}" /></th>
                <td><a class="row-title" href="{{ url('admin/product/edit/'.$post->post_id) }}">{{$post->post_title}}</a></td>
                <td>{{$post->post_slug}}</td>
                <td>{{$post->post_parent}}</td>
                <td>{{$post->post_excerpt}}</td>
                <?php 
                    $value=decode_serialize($post->meta_value);
                ?>
                <td>{{$value["seo_title"]}}</td>
                <td>{{$value["seo_description"]}}</td>
                <td>{{$value["seo_keyword"]}}</td>
                <td><a href="{{ url('admin/product/edit/'.$post->post_id) }}" title="Edit">Edit</a> - <a href="{{ url('admin/product/delete/'.$post->post_id) }}" title="Delete">Delete</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        {!! $posts->render() !!}
        @endif
        </form>
@stop