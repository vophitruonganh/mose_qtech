@extends('backend.layouts.default')
@section('titlePage','Chỉnh sửa trang')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/page"),
        'heading_link_text' => 'Danh sách trang',
        'heading_text' => 'Chỉnh sửa',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/page/create').'">Thêm mới trang</a>'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-post">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form action="{{ url('admin/page/edit/'.$post->post_id) }}" method="post">
            @include('backend.includes.token')
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p b-t-m">
                        <div class="form-group">
                            <label>Tiêu đề trang</label>
                            <input type="text" class="form-control meta-title" name="title" value="{{ old('title',$post->post_title) }}" />
                        </div>
                        <div class="form-group">
                            <div class="post-slug-group input-group">
                                <label class="sr-only">Đường dẫn</label>
                                <span class="input-group-addon">{{ main_site_url() }}/{{ $seo_data['seo_url'] }}</span>
                                <input type="text" name="slug" value="{{ old('slug',$post->post_slug) }}" class="form-control" readonly="readonly" />
                                <span class="input-group-btn"><button type="button" class="btn btn-secondary" data-bind="click: General.ChangeSlug"><i class="font-icon material-icons md-16">mode_edit</i></button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="6" name="content" data-plugin="tinymce">{{ old('content',$post->post_content) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea rows="3" class="form-control meta-description" name="excerpt" class="editor">{{ old('excerpt',$post->post_excerpt) }}</textarea>
                            <small class="text-muted">Mặc định nếu mô tả để trống sẽ lấy từ nội dung để hiển thị.</small>
                        </div>
                    </div>
                    {!! seo_content($seo_data) !!}
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link text-danger" href="{{ url('admin/page/trash/'.$post->post_id) }}">Xóa trang</a>
                                <button type="submit" class="btn btn-primary waves-effect">Cập nhật</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="proj-page-subtitle"><h3>Thông tin</h3></div>
                            <div class="misc-actions">
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select">
                                        <label class="misc-label m-b-0">Tình trạng:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_status">@if( $post->post_status == 'public' ) Công khai @elseif( $post->post_status == 'pending' ) Đang chờ duyệt @elseif( $post->post_status == 'draft' ) Nháp @elseif( $post->post_status == 'trash' ) Xóa @endif</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_post_status" value="{{$post->post_status}}" data-bind="value: post_status" />
                                    </div>
                                    <div id="post-status-select" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <select name="post_status" class="form-control misc-select-text" data-model="post_status">
                                                <option @if($post->post_status=='public'){{'selected="selected"'}} @endif value="public">Công khai</option>
                                                <option @if($post->post_status=='pending'){{'selected="selected"'}}@endif value="pending">Đang chờ duyệt</option>
                                                <option @if($post->post_status=='draft'){{'selected="selected"'}}@endif value="draft">Nháp</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date">
                                        <label class="misc-label m-b-0">Vào lúc:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_date">{{ date('H:i d/m/Y',$post->post_date)}}</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                    </div>
                                    <div id="misc-post-date" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <input type="text" name="post_date" class="form-control" data-plugin="datetimepicker" value="{{ date('H:i d/m/Y',$post->post_date)}}" placeholder="Ngày tạo" data-model="post_date" />
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select">
                                        <label class="misc-label m-b-0">Bình luận:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_comment">@if( $post->comment_status == 'yes' ) Mở @elseif( $post->comment_status == 'no' ) Đóng @endif</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_post_comment" value="{{$post->comment_status}}" data-bind="value: post_comment" />
                                    </div>
                                    <div id="post-comment-select" class="form-inline collapse extend">
                                        <select name="post_comment" class="form-control misc-select-text" data-model="post_comment">
                                            <option @if($post->comment_status=='yes') {{'selected="selected"'}} @endif value="yes">Mở</option>
                                            <option @if($post->comment_status=='no') {{'selected="selected"'}} @endif value="no">Đóng</option>
                                        </select>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <label class="misc-label m-b-0">Người đăng:</label>
                                    <label class="misc-label-text m-b-0"><a href="{{url('admin/page?user_id='.$post->user_id)}}">@if( strlen($post->user_fullname) > 0 ) {{ $post->user_fullname }} @else {{ $post->user_email }} @endif</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-fi">
                            <div class="proj-page-subtitle"><h3>Ảnh đại diện</h3></div>
                            <div id="post-image-group">
                                <div id="post-image-thumbnail" @if(!old('post_image_id',$post->post_image)) style="display: none;" @endif>
                                    <a href="javascript:;" data-bind="click: Modal.LoadImage"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="{{ get_image_url($post->post_image) }}" /></div></div></div></a>
                                    <input type="hidden" name="post_image_url" value="{{ old('post_image_url',get_image_url($post->post_image)) }}" />
                                    <input type="hidden" name="post_image_id" value="{{ old('post_image_id',$post->post_image) }}" />
                                    <div class="thumbnail-remove"><button class="btn btn-link text-danger" data-bind="click: Post.RemoveImage">Xóa ảnh đại diện</button></div>
                                </div>
                                <div id="post-image-modal" @if(old('post_image_id',$post->post_image)) style="display: none;" @endif><a href="javascript:;" data-bind="click: Modal.LoadImage"><i class="material-icons">add_to_photos</i><span>Thêm ảnh đại diện</span></a></div>
                                {!! media_modal() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
