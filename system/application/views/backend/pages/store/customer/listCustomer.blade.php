@extends('backend.layouts.default')
@section('titlePage','Danh sách khách hàng')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách khách hàng',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/customer/create').'">Thêm mới</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-customer mode-list">
        <div class="form-alerts"></div>
        <form id="customer-form" action="{{ url('admin/customer') }}" method="post" data-bind="form: disable">
           @include('backend.includes.token')
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            {!! tableActionForm('','','','click: Table.Action') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Customer.TableSearch') !!}
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="customer-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        @include('backend.pages.store.customer.listViewCustomer')
                    </div>
                </div>
            </div>
        </form>
    </div>
    {!!pagination($customers,$pagination)!!}
@stop