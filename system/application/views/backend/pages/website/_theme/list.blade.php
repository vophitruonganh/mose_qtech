@extends('backend.layouts.default')
@section('titlePage','Page List')
@section('content')
    <div class="section-header add-btn">
       <h1>Danh sách trang</h1>
       <a href="{{ url('admin/page/create.html') }}" class="btn">Thêm mới</a>
    </div>
    <form action="{{ url('admin/page.html') }}" method="get" enctype="multipart/form-data">
        <input type="hidden" name="post_status" value="{{$post_status}}"></input>
        <ul class="post-list-status clearfix">
            <li><a href="{{url('admin/page.html')}}" class="current">Tất cả <span class="count">({{$count['all']}})</span></a></li>
            <li><a href="{{url('admin/page.html?post_status=public')}}">Công khai <span class="count">({{$count['public']}})</span></a></li>
            <li><a href="{{url('admin/page.html?post_status=pending')}}">Đang chờ duyệt <span class="count">({{$count['pending']}})</span></a></li>
            <li><a href="{{url('admin/page.html?post_status=draft')}}">Nháp <span class="count">({{$count['draft']}})</span></a></li>
            <li><a href="{{url('admin/page.html?post_status=trash')}}">Xóa <span class="count">({{$count['trash']}})</span></a></li>
        </ul>
        <div class="post-list-nav clearfix">
            <div class="post-list-actions">
                <select name="post_action" id="post_action" class="form-control post_action">
                    <option selected="selected" value="publish">Chọn hành động</option>
                    <option value="trash">Xóa</option>
                </select>
                 <button type="submit" class="btn" data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select" name="type_submit" value="action">Áp dụng</button>
            </div>
            <div class="post-list-search">
                <div class="search-form">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Tìm kiếm bài viết...">
                        <span class="input-group-btn"><button class="btn" type="submit" name="type_submit" value="search"><span class="glyphicon glyphicon-search"></span></button></span>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="row">
            <select name="action" id="action">
                <option value="delete">delete</option>
                <option value="draft">draft</option>
                <option value="public">public</option>
            </select>
            <input type="submit" value="apply" >
        </div>
        -->
        @if( count($pages) == 0 )
        @include('backend.includes.nodata')
        @else
        <div class="box-typical box-typical-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="check-column"><input type="checkbox" id="checkall" /></th>
                        <th>Tiêu đề</th>
                        <th>Người viết</th>
                        <th>Ngày đăng</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                @foreach( $pages as $page )
                <?php
                        if( $page->user_nickname=='' )
                        {
                            $author = $page->user_email;
                        }
                        else
                        {
                            $author = $page->user_nickname;
                        }
                     ?>
                <tr>
                    <th class="check-column"><input type="checkbox" class="pcb" name="check[]" id="check[]" value="{{$page->post_id}}" /></th>
                    <td><a href="{{ url('admin/page/edit/'.$page->post_id.'.html') }}" title="Edit">{{ $page->post_title }}</a></td>
                    <td>{{ $author }}</td>
                    <td>{{ date('d-m-Y H:i:s',$page->post_date) }}</td>
                    <td>{{ $page->post_status }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>  
            {!! $pages->appends(['post_status' => $post_status, 'query'=>$query,'type_submit'=>$type_submit])->render() !!}
        @endif
    </form>    

@stop