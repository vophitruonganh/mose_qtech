@extends('backend.layouts.default')
@section('titlePage','Chỉnh sửa khách hàng')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/customer"),
        'heading_link_text' => 'Danh sách khách hàng',
        'heading_text' => 'Chỉnh sửa',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/customer/create').'">Thêm mới khách hàng</a>',
    );
    
    $setion_heading = section_title($heading);
?>
    <div class="section-account">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form id="account-form" action="{{ url('admin/customer/edit/'.$customer->customer_id) }}" method="post" data-bind="form: disable" data-parsley-validate>
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
                                        <label>Họ tên</label>
                                        <input class="form-control" name="fullname" type="text" value="{{ old('fullname',$customer->customer_fullname) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" name="phone" type="text" value="{{ old('telephone',$customer->customer_phone) }}" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-length="[8, 11]" data-parsley-pattern-message="Số điện thoại không hợp lệ" data-parsley-length-message="Số điện thoại không hợp lệ" data-parsley-type="integer" data-parsley-type-message="Số điện thoại không hợp lệ" data-parsley-trigger="change focusout" />
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="text" value="{{ old('email',$customer->customer_email) }}" maxlength="60" data-parsley-trigger="change focusout" data-parsley-type="email" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-maxlength="60" data-parsley-maxlength-message="Địa chỉ Email quá dài." />
                            </div>
                            <div class="form-group discount-coupon">
                                <input id="email-advertising" name="email_advertising" type="checkbox" @if($customer->email_advertising ==1) checked @endif class="filled-in" /><label for="email-advertising">Nhận email quảng cáo</label>
                            </div>
                            @if($customer->customer_pass)<div class="form-group font-lg-size"><a data-toggle="collapse" href="#collapsePassword" aria-expanded="false" aria-controls="collapsePassword"><u>Đổi mật khẩu?</u></a></div>@endif
                            <div id="collapsePassword" class="row @if($customer->customer_pass) collapse @endif">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input id="password" class="form-control" name="password" type="password" value="" minlength="8" data-parsley-trigger="change focusout" data-parsley-minlength-message="Mật khẩu ngắn thường dễ đoán. Hãy thử mật khẩu có ít nhất 8 ký tự." />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu</label>
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
                                <textarea name="address" id="address" class="form-control" rows="3">{{ old('address',$customer->customer_address) }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tỉnh/Thành phố</label>
                                        <?php $customer_province = old('provinces',$customer->customer_province); ?>
                                        <select name="provinces" id="provinces" class="form-control" data-bind="change: General.GetDistricts">
                                            <option value="0">Chọn tỉnh/thành phố</option>
                                            @foreach( $provinces as $province )
                                            <option @if( $customer_province == $province->province_id ) selected @endif value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Quận/Huyện</label>
                                        <?php $customer_district = old('districts',$customer->customer_district); ?>
                                        <select name="districts" id="districts" class="form-control">
                                            <option value="0">Chọn quận/huyện</option>
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
                                            <option value="0"@if( !$customer->customer_gender) selected="selected"@endif>— Chọn giới tính —</option>
                                            <option value="1"@if( $customer->customer_gender == '1' ) selected="selected"@endif>Nam</option>
                                            <option value="2"@if( $customer->customer_gender == '2' ) selected="selected"@endif>Nữ</option>
                                            <option value="3"@if( $customer->customer_gender == '3' ) selected="selected"@endif>Khác</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Nhóm khách hàng</label>
                                        <select id="level" name="level" class="form-control">
                                            <option value="0">— Chọn nhóm khách hàng —</option>
                                            @foreach($list_customer_groups as $list_customer_group)
                                            <option @if($customer_group==$list_customer_group->taxonomy_id) selected="selected" @endif value="{{$list_customer_group->taxonomy_id}}">{{$list_customer_group->taxonomy_name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group m-b-0">
                                <label>Ghi chú</label>
                                <textarea class="form-control" name="notes" rows="4">{{old('notes', $customer->customer_notes)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="clearfix">
                    <div class="pull-xs-right">
                        <a href="{{ url('admin/customer') }}" class="btn btn-link">Hủy</a>
                        <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Customer.Submit">Sửa khách hàng</button>
                    </div>
                </div>
            </div>
    
        </form>
    </div>
@stop