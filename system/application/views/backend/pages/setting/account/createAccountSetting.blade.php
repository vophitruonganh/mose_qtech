@extends('backend.layouts.default')
@section('titlePage','Thêm mới quản trị')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/setting/account"),
        'heading_link_text' => 'Cấu hình tài khoản',
        'heading_text' => 'Thêm mới quản trị',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-setting">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form id="account-form" action="{{ url('admin/setting/account/create') }}" method="post">
            @include('backend.includes.token')
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Thông tin tài khoản</h4>
                        <p>Tất cả thông tin liên quan đến tài khoản.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nickname">Họ tên</label>
                                        <input id="nickname" class="form-control" name="nickname" type="text" value="{{ old('nickname') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Số điện thoại</label>
                                        <input id="telephone" class="form-control" name="telephone" type="text" value="{{ old('telephone') }}" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-length="[8, 11]" data-parsley-pattern-message="Số điện thoại không hợp lệ" data-parsley-length-message="Số điện thoại không hợp lệ" data-parsley-type="integer" data-parsley-type-message="Số điện thoại không hợp lệ" data-parsley-trigger="change focusout" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" name="email" type="text" value="{{ old('email') }}" required maxlength="60" data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-type="email" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-maxlength="60" data-parsley-maxlength-message="Địa chỉ Email quá dài." />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input id="password" class="form-control" name="password" type="password" value="" required minlength="8" data-parsley-trigger="change focusout" data-parsley-required="true" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-minlength-message="Mật khẩu ngắn thường dễ đoán. Hãy thử mật khẩu có ít nhất 8 ký tự." />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                                        <input id="password_confirmation" class="form-control" name="password_confirmation" type="password" value="" required data-parsley-trigger="change focusout" data-parsley-equalto="#password" data-parsley-equalto-message="Các mật khẩu này không khớp. Thử lại?" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                            </div>
                            <div class="form-group">
                                <input id="notify" name="notify" type="checkbox" class="filled-in" checked /><label for="notify">Hãy cập nhật cho tôi những thông báo quan trọng qua email.</label>
                                <div><small class="text-muted">Chúng tôi sẽ gửi định kỳ những tin tức quan trọng về Mose đến người dùng qua email. Chúng tôi sẽ hạn chế tần suất gửi email tối đa.</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="clearfix">
                    <div class="pull-xs-right">
                        <a href="{{ url('admin/setting/account') }}" class="btn btn-link">Hủy</a>
                        <button type="submit" class="btn btn-primary waves-effect">Thêm quản trị</button>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Lịch sử đăng nhập gần đây</h4>
                        <p>Truy cập từ ISP, địa điểm hoặc địa chỉ IP lạ có thể cho thấy tài khoản có thể bị xâm nhập và cần được xem xét thêm.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical">
                            <div class="account-history-list data-list data-table">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ngày đăng nhập</th>
                                            <th>IP</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="primary-text">9:35 13/10/2016</td>
                                            <td>192.168.1.1</td>
                                            <td>Không tìm thấy lượt đăng nhập</td>
                                        </tr>
                                        <tr>
                                            <td class="primary-text">9:35 13/10/2016</td>
                                            <td>192.168.1.1</td>
                                            <td>Toàn quyền truy cập</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop