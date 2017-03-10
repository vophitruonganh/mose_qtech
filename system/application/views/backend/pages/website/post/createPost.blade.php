@extends('backend.layouts.default')
@section('titlePage','Thêm mới bài viết')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/post"),
        'heading_link_text' => 'Danh sách bài viết',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-post">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
		<form action="{{ url('admin/post/create') }}" method="post" data-bind="form: disable">
			@include('backend.includes.token')
			<div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p b-t-m">
                        <div class="form-group">
                            <label for="title">Tiêu đề bài viết</label>
                            <input type="text" class="form-control meta-title" name="title" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <div class="post-slug-group input-group">
                                <label class="sr-only">Đường dẫn</label>
                                <span class="input-group-addon">{{ main_site_url() }}/</span>
                                <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" readonly="readonly" />
                                <span class="input-group-btn"><button type="button" class="btn btn-secondary" data-bind="click: General.ChangeSlug"><i class="font-icon material-icons md-16">mode_edit</i></button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="content" data-plugin="tinymce">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group m-b-0">
                            <label>Mô tả</label>
                            <textarea class="form-control meta-description" rows="3" name="excerpt">{{old('excerpt')}}</textarea>
                            <small class="text-muted">Mặc định nếu mô tả để trống sẽ lấy từ nội dung để hiển thị.</small>
                        </div>
                    </div>
                    {!! seo_content() !!}
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link" href="{{ url('admin/post/') }}">Hủy</a>
                                <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Form.Submit">Thêm mới</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="proj-page-subtitle"><h3>Thông tin</h3> </div>
                            <div class="misc-actions">
                                <div class="misc-group">
                                    <div data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select">
                                        <label class="misc-label m-b-0">Tình trạng:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_status">Công khai</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_post_status" value="public" data-bind="value: post_status" />
                                    </div>
                                    <div id="post-status-select" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <select name="post_status" class="form-control misc-select-text" data-model="post_status">
                                                <option selected="selected" value="public">Công khai</option>
                                                <option value="pending">Đang chờ duyệt</option>
                                                <option value="draft">Nháp</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#post-status-select" aria-expanded="false" aria-controls="post-status-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date">
                                        <label class="misc-label m-b-0">Vào lúc:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_date">{{ date('H:i d/m/Y',time())}}</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                    </div>
                                    <div id="misc-post-date" class="form-inline collapse extend">
                                        <div class="form-group">
                                            <input type="text" name="post_date" class="form-control" data-plugin="datetimepicker" value="{{ date('H:i d/m/Y',time())}}" placeholder="Ngày tạo" data-model="post_date" />
                                        </div>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#misc-post-date" aria-expanded="false" aria-controls="misc-post-date"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                                <div class="misc-group">
                                    <div class="inner" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select">
                                        <label class="misc-label m-b-0">Bình luận:</label>
                                        <label class="misc-label-text m-b-0" data-bind="text: post_comment">@if( $optionComment == 'yes' ) Mở @else Đóng @endif</label>
                                        <i class="font-icon material-icons">mode_edit</i>
                                        <input type="hidden" name="hidden_post_comment" value="{{ $optionComment }}" data-bind="value: post_comment" />
                                    </div>
                                    <div id="post-comment-select" class="form-inline collapse extend">
                                        <select name="post_comment" class="form-control misc-select-text" data-model="post_comment">
                                            <option value="yes" @if($optionComment=='yes') {{'selected="selected"'}} @endif >Mở</option>
                                            <option value="no" @if($optionComment=='no') {{'selected="selected"'}} @endif >Đóng</option>
                                        </select>
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#post-comment-select" aria-expanded="false" aria-controls="post-comment-select"><i class="material-icons md-18">close</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle"><h3>Danh mục</h3></div>
                            <div class="taxonomy-list">
                                <div class="tabs-panel">
                                    <ul class="taxonomy-checklist">
                                        <?php categoryInMenu($term_categorys,'post_category') ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle">
                                <h3>Nhãn</h3>
                            </div>
                            <div id="post-tags" class="tags-choose">
                                <div class="form-group">
                                    <input type="text" name="newtags" data-plugin="tagsinput" class="form-control" value="{{old('tag_name')}}" placeholder="Nhập nhãn bài viết" />
                                </div>
                            </div>
                        </div>
                        <div class="proj-page-section">
                            <div class="proj-page-subtitle"><h3>Ảnh đại diện</h3></div>
                            <div id="post-image-group">
                                <div id="post-image-thumbnail" @if(!old('post_image_id')) style="display: none;" @endif>
                                    <a href="javascript:;" data-bind="click: Modal.LoadImage"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="{{ old('post_image_url') }}" /></div></div></div></a>
                                    <input type="hidden" name="post_image_url" value="{{ old('post_image_url') }}" />
                                    <input type="hidden" name="post_image_id" value="{{ old('post_image_id') }}" />
                                    <div class="thumbnail-remove"><button class="btn btn-link text-danger" data-bind="click: Post.RemoveImage">Xóa ảnh đại diện</button></div>
                                </div>
                                <div id="post-image-modal" @if(old('post_image_id')) style="display: none;" @endif><a href="javascript:;" data-bind="click: Modal.LoadImage"><i class="material-icons">add_to_photos</i><span>Thêm ảnh đại diện</span></a></div>
                                {!! media_modal() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</form>
    </div>
@stop