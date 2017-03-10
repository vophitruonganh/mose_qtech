@extends('backend.layouts.default')
@section('titlePage','Danh sách khuyến mãi')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách khuyến mãi',
        'heading_button' => '<a class="btn btn-primary" href="'.url('admin/discount/create').'">Thêm mới khuyến mãi</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-discount">
        <div class="form-alerts"></div>
        <form id="discount-form" action="{{ url('admin/discount') }}" method="post">
            @include('backend.includes.token')
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <div class="form-group">
                                @if( $discountCount['all'] > 0 )
                                <select name="discount_status" id="action_status" class="form-control" data-bind="change: Table.StatusChange">
                                    <option @if($actionStatus=='all') selected="selected" @endif value="all">Tất cả <span class="count">({{ $discountCount['all'] }})</span></option>
                                    @if( $discountCount['activated'] > 0 ) <option @if( $actionStatus == 'active' ) selected="selected" @endif value="active">Đã kích hoạt <span class="count">({{ $discountCount['activated'] }})</span></option> @endif
                                    @if( $discountCount['not_activated'] > 0 ) <option @if( $actionStatus == 'deactive' ) selected="selected" @endif value="deactive">Chưa kích hoạt <span class="count">({{ $discountCount['not_activated'] }})</span></option> @endif
                                    @if( $discountCount['waiting'] > 0 ) <option @if( $actionStatus == 'waiting' ) selected="selected" @endif value="waiting">Tạm ngưng <span class="count">({{ $discountCount['waiting'] }})</span></option> @endif
                                    @if( $discountCount['expired'] > 0 ) <option @if( $actionStatus == 'expired' ) selected="selected" @endif value="expired">Hết hạn <span class="count">({{ $discountCount['expired'] }})</span></option> @endif
                                </select>
                                @endif
                            </div>
                            <?php
                                $arr = array('active'=> 'Sử dụng khuyến mãi','deactive'=> 'Ngừng khuyến mãi','trash'=>'Xóa')
                            ?>
                            {!! tableActionForm($arr,'','','click: Table.Action') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Discount.TableSearch') !!}
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="discount-list data-list data-table" data-bind="load: Table.SetCheckAll, load: Discount.Detail">
                        @include('backend.pages.store.discount.listViewDiscount')
                    </div>
                </div>
            </div>
        </form>
    </div>
    {!!pagination($discounts,$pagination)!!}
    <script>
        // $(document).ready(function(){
        //     $(document).on('change','#action_status',function(){
        //         this.form.submit();
        //     });
        // });
    </script>
@stop