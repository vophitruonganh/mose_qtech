@extends('backend.layouts.default')
@section('titlePage','Selling Products')
@section('content')
<!-- Show By Date -->
<form action="{{ url('admin/selling-products/show-by-date') }}" method="post">
@include('backend.includes.token')
Xem theo ngày:
<select name="date">
@for( $i = 1; $i <= 31; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['mday'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<select name="month">
@for( $i = 1; $i <= 12; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['mon'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<select name="year">
@for( $i = $getDate['year']-10; $i <= $getDate['year']+10; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['year'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<button type="submit" >Xem</button>
</form>
<!-- End Show By Date -->

<!-- Show By Week -->
<a href="{{ url('admin/selling-products/show-by-current-week') }}">Xem theo tuần hiện tại</a>
<!-- End Show By Week -->

<!-- Show By Month -->
<form action="{{ url('admin/selling-products/show-by-month') }}" method="post">
@include('backend.includes.token')
Xem theo tháng:
<select name="month">
@for( $i = 1; $i <= 12; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['mon'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<select name="year">
@for( $i = $getDate['year']-10; $i <= $getDate['year']+10; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['year'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<button type="submit" >Xem</button>
</form>
<!-- End Show By Month -->

<!-- Show By Year -->
<form action="{{ url('admin/selling-products/show-by-year') }}" method="post">
@include('backend.includes.token')
Xem theo năm:
<select name="year">
@for( $i = $getDate['year']-10; $i <= $getDate['year']+10; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['year'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<button type="submit" >Xem</button>
</form>
<!-- End Show By Year -->

<!-- Show By From Day To Day -->
<form action="{{ url('admin/selling-products/show-by-from-day-to-day') }}" method="post">
@include('backend.includes.token')
Ngày bắt đầu:
<select name="fromDate">
@for( $i = 1; $i <= 31; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['mday'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<select name="fromMonth">
@for( $i = 1; $i <= 12; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['mon'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<select name="fromYear">
@for( $i = $getDate['year']-10; $i <= $getDate['year']+10; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['year'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
Ngày Kết Thúc:
<select name="toDate">
@for( $i = 1; $i <= 31; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['mday'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<select name="toMonth">
@for( $i = 1; $i <= 12; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['mon'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<select name="toYear">
@for( $i = $getDate['year']-10; $i <= $getDate['year']+10; $i++ )
    <option value="{{ $i }}" @if( $i == $getDate['year'] ) selected="selected" @endif()>{{ $i }}</option>
@endfor
</select>
<button type="submit" >Xem</button>
</form>
<!-- End Show By From Day To Day -->
@stop