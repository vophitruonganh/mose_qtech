@extends('backend.layouts.default')
@section('titlePage','Danh sách đơn hàng')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách đơn hàng',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/order/create').'">Thêm mới đơn hàng</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div id="section-order">
        <div class="form-alerts"></div>
        <form id="order-form" action="{{ url('admin/order') }}" method="post">
            @include('backend.includes.token')
            <input type="hidden" name="order_status" id="order_status" value="{{$order_status}}"></input>
            <input type="hidden" id="customer_id" name="customer_id" value="{{$customer_id}}"></input>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action clearfix">
                        <div class="pull-md-left">
                            <div class="form-group">
                                <select name="order_status" id="action_status" class="form-control" data-bind="change: Table.ActionChange, change: Table.StatusChange">
                                    @if($order_count['all'] > 0)<option @if($order_status =='all')selected="selected" @endif value="all" data-url="{{url('admin/order?order_status=all')}}">Tất cả <span class="count">({{$order_count['all']}})</span></option>@endif
                                    @if($order_count['paid'] > 0)<option @if($order_status =='0')selected="selected" @endif  value="0" data-url="{{url('admin/order?order_status=0')}}">Đã thanh toán <span class="count">({{$order_count['paid']}})</span></option>@endif
                                    @if($order_count['pending'] > 0)<option @if($order_status =='1')selected="selected" @endif  value="1" data-url="{{url('admin/order?order_status=1')}}">Chưa thanh toán <span class="count">({{$order_count['pending']}})</span></option>@endif
                                    @if($order_count['draft'] > 0)<option @if($order_status =='3')selected="selected" @endif  value="3" data-url="{{url('admin/order?order_status=3')}}">Nháp <span class="count">({{$order_count['draft']}})</span></option>@endif
                                    @if($order_count['trash'] > 0)<option @if($order_status =='2')selected="selected" @endif  value="2" data-url="{{url('admin/order?order_status=2')}}">Xóa <span class="count">({{$order_count['trash']}})</span></option>@endif
                                </select>
                            </div>
                              <?php
                                $arr=array();
                                if($order_status == 'trash'){
                                    $arr=array('restore'=> 'Khôi phục','delete'=>'Xóa vĩnh viễn');
                                }
                            ?>
                            {!! tableActionForm($arr,'','','click: Order.TableAction') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Order.TableSearch') !!}
                    </div>
                </div>

                <div class="box-typical-body">
                    <div class="order-list data-list data-table">
                        @include('backend.pages.store.order.listViewOrder')
                    </div>
                </div>
            </div>
        </form>    
    </div>
    {!!pagination($list_order,$pagination)!!}
@stop