@extends('backend.layouts.default')
@section('titlePage','Danh sách khuyến mãi')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách khuyến mãi',
        'heading_button' => '<a class="btn btn-primary" href="'.url('admin/discount/create').'">Thêm  mới</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-discount">
        <div class="form-alerts"></div>
        <form id="discount-form" action="{{ url('admin/discount/') }}" method="post">
            @include('backend.includes.token')
            <input type="hidden" id="discount_status" name="discount_status" value="{{$discount_status}}"></input>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <div class="form-group">
                                @if($discount_count['all'] > 0)
                                <select name="action_status" id="action_status" class="form-control">
                                    @if($discount_count['all'] > 0)<option @if($discount_status=='all') selected="selected" @endif value="all">Tất cả <span class="count">({{$discount_count['all']}})</span></option>@endif
                                    @if($discount_count['activated'] > 0)<option @if($discount_status=='activated') selected="selected" @endif value="activated">Đã kích hoạt <span class="count">({{$discount_count['activated']}})</span></option>@endif
                                    @if($discount_count['not_activated'] > 0)<option @if($discount_status=='not_activated') selected="selected" @endif value="not_activated">Chưa kích hoạt <span class="count">({{$discount_count['not_activated']}})</span></option>@endif
                                    @if($discount_count['expired'] > 0)<option @if($discount_status=='expired') selected="selected" @endif value="expired">Hết hạn <span class="count">({{$discount_count['expired']}})</span></option>@endif
                                </select>
                                @endif
                            </div>
                            <?php
                                $arr=array();
                                $arr=array('edit'=> 'Ngừng khuyến mãi','trash'=>'Xóa')
                            ?>
                            {!! tableActionForm($arr,'','','click: Discount.TableAction') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Discount.TableSearch') !!}
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="discount-list data-list data-table">
                        @include('backend.pages.store.discount.listViewDiscount')
                    </div>
                </div>
            </div>
        </form>
    </div>
    {!! $terms->appends(['discount_status' => $discount_status, 'search'=>$search])->render() !!} 
@stop