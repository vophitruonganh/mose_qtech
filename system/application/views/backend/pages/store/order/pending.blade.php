<?php
/*
@extends('backend.layouts.default')
@section('titlePage','Order Pending')
@section('content')
    @if( count($list_order) == 0 )
        @include('backend.includes.nodata')
    @else
    <table class="border" width="700">
        <tr>
            <td>Order Code</td>
            <td>Order Date</td>
            <td>User ID</td>
            <td>Total</td>
            <td>button</td>
        </tr>
        @foreach($list_order as $order )
        <tr>
            <td>{{ $order["order_code"] }}</td>
            <td>{{ date('d-m-Y H:i:s',$order["order_date"]) }}</td>
            <td>{{ $order["user_id"] }}</td>
            <td>{{number_format($order["total"],0,',',',')}} đ</td>
            <td>
             <a href="{{ url('admin/order/pending/edit/'.$order["order_code"]) }}" title="Edit">Edit</a> 
            <a href="{{ url('admin/order/pending/delete/'.$order["order_code"]) }}" title="Delete">Delete</a></td>
        </tr>
        @endforeach
    </table>
    {{$list_order->render()}}
    @endif
@stop
*/
?>
@extends('backend.layouts.default')
@section('titlePage','Đơn hàng đang xử lý')
@section('content')
    
    <div class="section-page mode-list">
        <div class="form-alerts"></div>
        <form id="order-form" action="{{ url('admin/order') }}" method="get" enctype="multipart/form-data">
            @include('backend.includes.token')
            
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered">
                    <div class="list-nav clearfix">
                        
                        
                    </div>
                </div>

                <div class="box-typical-body">
                    <div class="order-pending-list data-list data-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
                                    <!-- <th class="table-check"><input type="checkbox" id="checkall" /></th> -->
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>User ID</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody> 
                            @if( count($list_order) == 0 )
                                <tr><th class="table-check"></th><td colspan="4">@include('backend.includes.nodata')</td></tr>
                            @else
                            <?php $i = 0; ?>
                            @foreach( $list_order as $order  )
                            <?php $i++; ?>
                            <tr>
                                <th class="table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{ $order['order_code'] }}" /><label for="tbl-check-{{$i}}"></label></th>
                                <!-- <th class="table-check"><input type="checkbox" class="pcb" name="check[]" id="check[]" value="{{ $order['order_code'] }}" /></th> -->
                                <td class="table-title"><a href="{{ url('/admin/order/pending/edit/'.$order['order_code']) }}" title="Edit">{{ $order['order_code'] }}</a></td>
                                <td>{{ date('d-m-Y H:i:s',$order["order_date"]) }}</td>
                                <td>{{ $order["user_id"] }}</td>
                                <td>{{number_format($order["total"],0,',',',')}} đ</td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </form>    
    </div>
    {!! $list_order->render() !!}
@stop