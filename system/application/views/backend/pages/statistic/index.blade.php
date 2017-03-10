@extends('backend.layouts.default')
@section('titlePage','Statistic')
@section('content')
<h1>Thống Kê Truy Cập Website</h1>
    <p>Ngày Hôm Nay: {{ $today }}</p>
    <p>Ngày Hôm Qua: {{ $yesterday }}</p>
    <p>Tháng Hiện Tại: {{ $month }}</p>
    <p>Tháng Trước: {{ $monthLast }}</p>
    <p>Năm Hiện Tại: {{ $year }}</p>
    <p>Tổng Số Lượt Truy Cập: {{ $totalVisit }}</p>
@stop