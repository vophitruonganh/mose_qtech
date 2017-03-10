@extends('backend.layouts.default')
@section('titlePage','Show Option')
@section('content')
    {!!section_title('Cấu hình - Cửa hàng')!!}
    @include('backend.includes.showErrorValidator')
    <form action="{{ url('admin/setting/storeinfo') }}" method="post">
        @include('backend.includes.token')

        <div class="row">
            <label>Điện thoại</label>
            <input name="telephone" type="text" value="{{ old('businessLicense',$storeSetting['telephone']) }}"/>
        </div>
        <div class="row">
            <label>Địa chỉ</label>
            <input name="address" type="text" value="{{ old('businessLicense',$storeSetting['address']) }}"/>
        </div>

        <div class="row">
            <input value="Submit" type="submit"/>
        </div>
    </form>
@stop