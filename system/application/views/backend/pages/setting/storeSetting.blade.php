@extends('backend.layouts.default')
@section('titlePage','Show Option')
@section('content')
    {!!section_title('Cấu hình - Cửa hàng')!!}
    @include('backend.includes.showErrorValidator')
    <form action="{{ url('admin/setting/store') }}" method="post">
        @include('backend.includes.token')
        <div class="row">
            <label>Tên đăng ký giấy phép kinh doanh (GPKD) của doanh nghiệp</label>
            <input name="businessLicense" type="text" value="{{ old('businessLicense',$storeSetting['businessLicense']) }}"/>
        </div>
        <div class="row">
            <label>Điện thoại</label>
            <input name="telephone" type="text" value="{{ old('businessLicense',$storeSetting['telephone']) }}"/>
        </div>
        <div class="row">
            <label>Địa chỉ</label>
            <input name="address" type="text" value="{{ old('businessLicense',$storeSetting['address']) }}"/>
        </div>
        <div class="row">
            <label>Email</label>
            <input name="email" type="text" value="{{ old('businessLicense',$storeSetting['email']) }}"/>
        </div>

        <div class="row">
            <input value="Submit" type="submit"/>
        </div>
    </form>
@stop