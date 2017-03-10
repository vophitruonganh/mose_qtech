@extends('backend.layouts.default')
@section('titlePage','Câu hình chung')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Cấu hình website'
    );
    $setion_heading = section_title($heading);
?>
	<div class="section-setting">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
		<form action="{{ url('admin/setting/website') }}" method="post" data-parsley-validate>
			@include('backend.includes.token')
			<div class="section-group">
				<div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Thông tin chung</h4>
                        <p>Tên cửa hàng xuất hiện trên cửa hàng của bạn. Thẻ tiêu đề và thẻ mô tả giúp xác định cửa hàng của bạn xuất hiện trên công cụ tìm kiếm</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label>Tiêu đề trang</label>
                                <input class="form-control" type="text" name="site_title" value="{{ old('site_title',$options['site_title']) }}" data-bind="keyup: Setting.CountSiteTitle" />
                                <small class="text-muted"><span class="count_site_title">0</span> đến 70 ký tự sử dụng</small>
                            </div>
                            <div class="form-group">
                                <label>Mô tả trang</label>
                                <textarea class="form-control" rows="4" name="site_description" data-bind="keyup: Setting.CountSiteDescription">{{ old('site_description',$options['site_description']) }}</textarea>
                                <small class="text-muted"><span class="count_site_description">0</span> đến 160 ký tự sử dụng</small>
                            </div>
                            <div class="form-group">
                                <label>Từ khóa trang</label>
                                <input class="form-control" type="text" name="site_keyword" value="{{ old('site_keyword',$options['site_keyword']) }}" />
                                <small class="text-muted">Phân cách nhau bởi dấu phẩy (Ví dụ: điện thoại, điện thoại giá rẻ, ...)</small>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Hình ảnh</h4>
                        <p>Thiết lập kích thước hình ảnh, sử dụng cho mục đích hiển thị ngoài giao diện website, áp dụng cho tất cả hình ảnh được tại lên.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group m-b-0">
                                <label>Kích thước ảnh nhỏ</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rộng</span>
                                            <input type="number" class="form-control" name="thumbnail_size_w" value="{{ old('thumbnail_size_w',$options['thumbnail_size_w']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Cao</span>
                                            <input type="number" class="form-control" name="thumbnail_size_h" value="{{ old('thumbnail_size_h',$options['thumbnail_size_h']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <label>Kích thước ảnh trung bình</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rộng</span>
                                            <input type="number" class="form-control" name="medium_size_w" value="{{ old('medium_size_w',$options['medium_size_w']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Cao</span>
                                            <input type="number" class="form-control" name="medium_size_h" value="{{ old('medium_size_h',$options['medium_size_h']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <label>Kích thước ảnh lớn</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rộng</span>
                                            <input type="number" class="form-control" name="large_size_w" value="{{ old('large_size_w',$options['large_size_w']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Cao</span>
                                            <input type="number" class="form-control" name="large_size_h" value="{{ old('large_size_h',$options['large_size_h']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="section-group">
				<div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Google Analytics</h4>
                        <p>Dán đoạn mã hoặc mã tài khoản GA được cung cấp bởi Google.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group m-b-0">
                                <label>Mã Google Analytics</label>
                                <textarea class="form-control" rows="4" name="analytics" placeholder="Dán mã code từ google tại đây">{{ old('analytics',$options['analytics']) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Facebook Pixel</h4>
                        <p>Facebook Pixel giúp bạn tạo chiến dịch quảng cáo trên facebook để tìm kiếm khách hàng mới mua hàng trên website của bạn.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group m-b-0">
                                <label>Facebook Pixel account</label>
                                <input type="text" class="form-control" name="facebook_pixel" placeholder="Dán mã code từ facebook tại đây" value="{{ old('facebook_pixel',$options['facebook_pixel']) }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Mật khẩu cửa hàng</h4>
                        <p>Bạn có thể bảo vệ cửa hàng của bạn với một mật khẩu và hiển thị một tin nhắn tùy chỉnh.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <?php $site_active = old('site_active',$options['site_active']) ?>
                                <input type="checkbox" name="site_active" id="site-active" class="filled-in" @if( $site_active == 1 || $site_active == 'on' ) checked @endif /><label for="site-active">Mật khẩu bảo vệ cửa hàng</label>
                            </div>
                            <div class="site-active-group">
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="text" class="form-control" name="site_active_password" value="{{ old('site_active_password',$options['site_active_password']) }}" />
                                </div>
                                <div class="form-group">
                                    <label>Thông điệp truy cập của bạn</label>
                                    <textarea class="form-control" rows="4" name="site_active_message" placeholder="Dán mã code từ google tại đây ">{{ old('site_active_message',$options['site_active_message']) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="section-group">
                <div class="clearfix">
                    <div class="pull-xs-right">
                        <button type="submit" class="btn btn-primary waves-effect">Lưu</button>
                    </div>
                </div>
            </div>
		</form>
	</div>
@stop