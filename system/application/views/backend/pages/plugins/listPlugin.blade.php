@extends('backend.layouts.default')
@section('titlePage','Danh sách ứng dụng')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách ứng dụng',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/plugin/create').'">Thêm mới</a>',
    );
    $setion_heading = section_title($heading);
?>
	<div class="section-plugin">
        <div class="form-alerts"></div>
        <form action="{{ url('admin/plugin') }}" method="post">
			@include('backend.includes.token')
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <?php
                                $arr = array('activate'=> 'Kích hoạt','deactivate'=>'Vô hiệu hóa')
                            ?>
                            {!! tableActionForm($arr,'','','click: Plugin.TableAction') !!}
                        </div>
                        {!! tableSearchForm('','<div class="pull-md-right">','</div>','click: Plugin.TableSearch') !!}
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="customer-list data-list data-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
                                    <th>Tên ứng dụng</th>
                                    <th>Mô tả</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if( count($listPlugin) == 0 )
                                <tr><th class="table-check"></th><td colspan="3">@include('backend.includes.nodata')</td></tr>
                            @else
                                <?php $i = 0; ?>
                                @foreach( $listPlugin as $plugin )
                                    <tr>
                                        <th class="table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{ $plugin['folderPlugin'] }}::{{ $plugin['fileNamePlugin'] }}" /><label for="tbl-check-{{$i}}"></label></th>
                                        <td class="tbl-nowrap column-primary">
                                        	<p class="m-a-0 tbl-title-text @if( $plugin['activedPlugin'] == 0 ) font-weight-normal @else font-weight-bold @endif">{{ $plugin['pluginName'] }}</p>
    										<p class="m-a-0">@if( $plugin['activedPlugin'] == 0 ) <a href="{{ url('admin/plugin/active/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin']) }}">Kích hoạt</a> @else <a href="{{ url('admin/plugin/deactive/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin']) }}">Vô hiệu hóa</a> @endif @if( $plugin['activedPlugin'] == 0 ) <span class="spec">|</span> <a class="text-danger" href="{{ url('admin/plugin/delete/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin']) }}">Xóa ứng dụng</a> <a class="text-danger" href="{{ url('admin/plugin/delete/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin'].'/deleteAll') }}">Delete All ( include database )</a> @endif</p>
                                        </td>
                                        <td>
                                            <p class="m-a-0">{{ $plugin['pluginDescription'] }}</p>
                                            <p class="m-a-0">@if($plugin['pluginVersion']) <i class="material-icons md-18">info</i> Phiên bản: {{ $plugin['pluginVersion'] }} <span class="spec">|</span> @endif @if($plugin['pluginAuthor']) Nhà phát triển: @if($plugin['pluginAuthorUri'])<a target="_blank" href="{{ $plugin['pluginAuthorUri'] }}">{{ $plugin['pluginAuthor'] }}</a> @else {{ $plugin['pluginAuthor'] }} @endif <span class="spec">|</span> @endif @if($plugin['pluginUri'] ) <a target="_blank" href="{{ $plugin['pluginUri'] }}"><i class="material-icons md-16">link</i> Chi tiết</a> @endif</p>
                                        </td>
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