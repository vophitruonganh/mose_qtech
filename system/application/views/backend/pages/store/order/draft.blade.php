@extends('backend.layouts.default')
@section('titlePage','Draft Order')
@section('content')
    <div class="row">
        <a href="{{url('admin/order')}}">All</a>
        <a href="{{url('admin/order_list/paid')}}">Paid</a>
        <a href="{{url('admin/order_list/pending')}}">Pending</a>
        <a href="{{url('admin/order_list/draft')}}">Draft</a>
    </div>
    @if( count($list_order) == 0 )
        @include('backend.includes.nodata')
    @else
    <table class="border">
        <tr>
            <td>Order Code</td>
            <td>Order Date</td>
            <td>User ID</td>
            <td>Total</td>
            <td>Order Status</td>
            <td>button</td>
        </tr>
        @foreach($list_order as $order)
        <tr>
            <td>{{ $order["order_code"]}}</td>
            <td>{{ date('d-m-Y H:i:s',$order["order_date"])}}</td>
        
            <td>{{ $order["user_id"] }}</td>
            
            <td>{{number_format($order["total"],0,',',',')}} đ</td>
           
            <td>@if($order["order_status"]==0)
                    {{"Paid"}}
                @elseif($order["order_status"]==1)
                    {{"Pending"}}
                @else
                    {{"Draft"}}
                @endif
            </td>    
            <td><a href="{{ url('admin/order/edit/'.$order["order_code"]) }}" title="Edit">Edit</a> - <a href="{{ url('admin/order/delete/'.$order["order_code"]) }}" title="Delete">Delete</a></td>
        </tr>
        @endforeach
    </table>
    {{$list_order->render()}}
    @endif
    <a href="{{ url('admin/order/create') }}" title="Upload now">Create New Order</a>
@stop