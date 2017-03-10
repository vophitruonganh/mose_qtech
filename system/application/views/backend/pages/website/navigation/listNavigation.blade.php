@extends('backend.layouts.default')
@section('titlePage','Danh sách menu')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách menu',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/navigation/create').'">Thêm mới</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-navigation">
        <div class="form-alerts"></div>
        <form action="{{ url('admin/navigation') }}" method="post">
            @include('backend.includes.token')
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action clearfix">
                        <div class="pull-md-left">
                             {!! tableActionForm('','','','') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','') !!}
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="navigation-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <table class="table table-hover tbl-typical">
                            <thead>
                                <tr>
                                    <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
                                    <th class="col-2">Tên menu</th>
                                    <th class="col-3 text-nowrap text-xs-center">Vị trí hiển thị</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( !is_array($navigation_data) && count($navigation_data) < 0 )
                                    <tr><th class="table-check"></th><td colspan="3">@include('backend.includes.nodata')</td></tr>
                                @else
                                    <?php $i = 0; ?>
                                    @foreach( $navigation_data as $key => $arries )
                                    <tr>
                                        <th class="col-1 table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{ $key }}" /><label for="tbl-check-{{$i}}"></label></th>
                                        <td class="col-2"><div class="title-link"><a href="{{ url('admin/navigation/edit/'.$key) }}">{{ $arries['menu_name'] }}</a></div></td>
                                        @if( !in_array($key,$navigation_load) )
                                            <td class="col-3 text-nowrap text-xs-center"><span class="label label-default">Chưa xác định</span></td>
                                        @else 
                                            <?php $keyNavigationLoad = array_search($key,$navigation_load); ?>
                                            @if( !isset($registerNavigation[$keyNavigationLoad]) )
                                            <td class="col-3 text-nowrap text-xs-center"><span class="label label-default">Chưa xác định</span></td>
                                            @endif
                                            <td class="col-3 text-nowrap text-xs-center"><span class="label label-success">{{ $registerNavigation[$keyNavigationLoad] }}</span></td>
                                        @endif
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop