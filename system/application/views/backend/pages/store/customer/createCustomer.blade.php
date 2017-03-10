@extends('backend.layouts.default')
@section('titlePage','Thêm mới khách hàng')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/customer"),
        'heading_link_text' => 'Danh sách khách hàng',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-account">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form id="account-form" action="{{ url('admin/customer/create') }}" method="post" data-bind="form: disable" data-parsley-validate>
            @include('backend.includes.token')
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Thông tin chung</h4>
                        <p>Một số thông tin chung để sử dụng các chức năng trên website.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nickname">Họ tên</label>
                                        <input id="nickname" class="form-control" name="fullname" type="text" value="{{ old('fullname') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Số điện thoại</label>
                                        <input id="telephone" class="form-control" name="phone" type="text" value="{{ old('phone') }}" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-length="[8, 11]" data-parsley-pattern-message="Số điện thoại không hợp lệ" data-parsley-length-message="Số điện thoại không hợp lệ" data-parsley-type="integer" data-parsley-type-message="Số điện thoại không hợp lệ" data-parsley-trigger="change focusout" />
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" name="email" type="text" value="{{ old('email') }}" maxlength="60" data-parsley-trigger="change focusout" data-parsley-type="email" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-maxlength="60" data-parsley-maxlength-message="Địa chỉ Email quá dài." />
                            </div>
                            <div class="form-group discount-coupon">
                                <input id="email-advertising" name="email_advertising" type="checkbox" class="filled-in" checked /><label for="email-advertising">Nhận email quảng cáo</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input id="password" class="form-control" name="password" type="password" value="" minlength="8" data-parsley-trigger="change focusout" data-parsley-minlength-message="Mật khẩu ngắn thường dễ đoán. Hãy thử mật khẩu có ít nhất 8 ký tự." />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                                        <input id="password_confirmation" class="form-control" name="password_confirmation" type="password" value="" data-parsley-trigger="change focusout" data-parsley-equalto="#password" data-parsley-equalto-message="Các mật khẩu này không khớp. Thử lại?" />
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
                        <h4>Địa chỉ liên hệ</h4>
                        <p>Thông tin liên hệ của khách hàng</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <textarea name="address" id="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tỉnh/Thành phố</label>
                                        <?php $customer_province = old('provinces'); ?>
                                        <select name="provinces" id="provinces" class="form-control" data-bind="change: General.GetDistricts">
                                            <option value="choose">Chọn tỉnh/thành phố</option>
                                            @foreach( $provinces as $province )
                                            <option @if( $customer_province == $province->province_id ) selected @endif value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Quận/Huyện</label>
                                        <?php $customer_district = old('districts'); ?>
                                        <select name="districts" id="districts" class="form-control">
                                            <option value="choose">Chọn quận/huyện</option>     
                                            @foreach( $districts as $district )
                                            <option @if( $customer_district == $district->district_id ) selected @endif value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                            @endforeach                
                                        </select>
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
                        <h4>Thông tin bổ sung</h4>
                        <p>Các thiết lập dùng để giới hạn chức năng sử dụng và hiệu lực của tài khoản.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nickname">Giới tính</label>
                                        <?php $gender = old('gender',''); ?>
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="0"@if( !$gender) selected="selected"@endif>— Chọn giới tính —</option>
                                            <option value="1"@if( $gender == '1' ) selected="selected"@endif>Nam</option>
                                            <option value="2"@if( $gender == '2' ) selected="selected"@endif>Nữ</option>
                                            <option value="3"@if( $gender == '3' ) selected="selected"@endif>Khác</option>
                                        </select> 
                                    </div>
                                </div>
                                <?php $userCurrentLevel = Session::get('user_level'); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Nhóm khách hàng</label>
                                        <?php $level = old('level') ?>
                                        <select id="level" name="level" class="form-control">
                                            <option value="0">— Chọn nhóm khách hàng —</option>
                                            @foreach($customer_groups as $customer_group)
                                            <option @if($level ==$customer_group->taxonomy_id ) selected @endif value="{{$customer_group->taxonomy_id}}">{{$customer_group->taxonomy_name}}</option>
                                            @endforeach
                                            <!-- <option value="2">Khách hàng lâu năm</option> -->
                                        </select> 
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group m-b-0">
                                <label>Ghi chú</label>
                                <textarea class="form-control" rows="4" name="notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="clearfix">
                    <div class="pull-xs-right">
                        <a href="{{ url('admin/user') }}" class="btn btn-link">Hủy</a>
                        <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Customer.Submit">Thêm khách hàng</button>
                    </div>
                </div>
            </div>
            <!-- <div class="box-typical box-typical-padding">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input id="username" class="form-control" name="username" type="text" value="{{ old('username') }}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" name="email" type="text" value="{{ old('email') }}"/>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input id="password" class="form-control" name="password" type="password" value=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation">Xác nhận mật khẩu</label>
                            <input id="password_confirmation" class="form-control" name="password_confirmation" type="password" value=""/>
                        </div>
                    </div>
                </div>     
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <textarea name="address" id="address" class="form-control" cols="4" rows="2">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nickname">Họ tên</label>
                            <input id="nickname" class="form-control" name="nickname" type="text" value="{{ old('nickname') }}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telephone">Số điện thoại</label>
                            <input id="telephone" class="form-control" name="telephone" type="text" value="{{ old('telephone') }}"/>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nickname">Giới tính</label>
                            <?php $gender = old('gender','choise'); ?>
                            <select id="gender" name="gender" class="form-control">
                                <option value="choise">— Chọn giới tính —</option>
                                <option value="1"@if( $gender == '1' ) selected="selected"@endif>Nam</option>
                                <option value="2"@if( $gender == '2' ) selected="selected"@endif>Nữ</option>
                                <option value="3"@if( $gender == '3' ) selected="selected"@endif>Khác</option>
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Tình trạng</label>
                            <select id="status" name="status" class="form-control">
                                <?php $status = old('status','choise'); ?>
                                <option value="choise"@if( $status == 'choise' ) selected="selected"@endif>— Chọn tình trạng —</option>
                                <option value="1"@if( $status == '1' ) selected="selected"@endif>Kích hoạt</option>
                                <option value="0"@if( $status == '0' ) selected="selected"@endif>Vô hiệu hóa</option>
                            </select> 
                        </div>
                    </div>
                </div> 
                <div class="">
                    <button type="submit" class="btn btn-primary">Tạo khách hàng</button>
                    <a href="{{ url('admin/customer') }}" class="btn">Hủy</a>
                </div>
            </div> -->
        </form>
    </div>
    
@stop