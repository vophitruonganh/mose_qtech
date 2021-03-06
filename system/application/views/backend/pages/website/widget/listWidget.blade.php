@extends('backend.layouts.default')
@section('titlePage','Danh sach tiện ích')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách tiện ích',
        //'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/post/create').'">Thêm bài viết mới</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-widget">
        <div class="form-alerts"></div>
        <form id="widget-form" action="{{ url('admin/widget') }}" method="post" data-bind="form: disable">
            @include('backend.includes.token')
            @foreach( $listPluginInWidget as $widget => $pluginInWidget )
            <div class="box-typical b-t-m" data-widget="{{ $widget }}" data-bind="load: Plugins.EditPluginWidget, load: Plugins.RemovePluginWidget">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="pull-xs-left">
                        <div class="heading">
                            <h3>{{ $widget }}</h3>
                            <p class="text-muted">{{ $descriptionWidget[$widget] }}</p>
                        </div>
                    </div>
                    <div class="pull-xs-right">
                        <div class="panel-heading-action">
                            <button type="button" class="btn btn-secondary" data-bind="click: Plugins.ShowWidget"><i class="font-icon material-icons md-16">mode_edit</i> Thêm ứng dụng</button>
                        </div>
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="widget-list data-list data-table">
                        @include('backend.pages.website.widget.listViewWidget')
                    </div>
                </div>
            </div>
            @endforeach

            @if( count($widgetsNotActive) > 0 )
            <div class="row">
                @foreach( $widgetsNotActive as $widget )
                <div class="col-md-6">
                    <div class="box-typical b-t-m disabled" data-widget="{{ $widget }}" data-bind="load: Plugins.EditPluginWidget, load: Plugins.RemovePluginWidget">
                        <div class="box-typical-header box-typical-header-bordered b-t-p">
                            <div class="pull-xs-left">
                                <div class="heading">
                                    <h3>{{ $widget }}</h3>
                                    <p class="text-muted">Không sử dụng</p>
                                </div>
                            </div>
                            <div class="pull-xs-right">
                                <div class="panel-heading-action">
                                    <button type="button" class="btn btn-danger" data-bind="click: Plugins.DeleteWidget"><i class="font-icon material-icons md-16">delete</i> Xóa tiện ích</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            
            <div id="widget-modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h5 class="modal-title">Danh sách ứng dụng</h5></div>
                        <div class="modal-body">
                            @if( count($listPlugin) > 0 )
                            <select id="select_plugin" class="form-control" name="select_plugin">
                                @foreach( $listPlugin as $key => $value )
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary waves-effect" data-bind="click: Plugins.AddWidget">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="theme">
    <form action="{{ url('admin/widget') }}" method="post">
        @include('backend.includes.token')
        @foreach( $listPluginInWidget as $widget => $pluginInWidget )
        <div class="widget" data-name-widget="{{ $widget }}">
            <div><strong>{{ $widget }}</strong></div>
            <div class="listPlugin">
                <?php $i = 0; ?>
                @if( count($pluginInWidget) > 0 )
                @foreach( $pluginInWidget as $key => $row )
                <?php $i++; ?>
                <div class="rowPlugin" data-id="{{ $i }}" data-folder-plugin="{{ $row['folderPlugin'] }}">
                    - {{ $row['pluginName'] }} - @if( $row['enableEditButton'] == 1 )<a href="{{ url('admin/widget/'.$widget.'/'.$row['folderPlugin'].'/'.$i) }}">Edit</a> -@endif <a class="remove" href="javascript:;">Remove</a>
                    <input type="hidden" name="plugin[{{ $widget }}][{{ $i }}]" value="{{ $row['folderPlugin'] }}">
                </div>
                @endforeach
                @endif
            </div>
            @if( count($listPlugin) > 0 )
            <select class="plugins">
                @foreach( $listPlugin as $key => $value )
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <button type="button" class="addPlugin">Add</button>
            @endif
        </div>
        @endforeach
        <button type="submit">Save</button>
    </form>
</div>
<script type="text/javascript">
  $(document).ready(function(){

    $('#theme').on('click','.remove',function(){

        var widget = $(this).parents().eq(2).attr('data-name-widget');
        var folderPlugin = $(this).parent().attr('data-folder-plugin');
        var order = $(this).parent().attr('data-id');

        $.ajax({
            type: 'post',
            url: "{{ url('admin/widget/removeOrderAttribute') }}",
            data: {
                _token: $('#page_token').val(),
                widget: widget,
                folderPlugin: folderPlugin,
                order: order
            }
        });

        $(this).parent().remove();
        return false;
    });

    $('#theme').on('click','.addPlugin',function(){
        var folderPlugin = $(this).parent().find('.plugins').val();
        var pluginName = $(this).parent().find('.plugins option:selected').text();
        var order = $(this).parent().find('.rowPlugin').last().attr('data-id');
        if( order === undefined)
        {
            order = 0;
        }
        var maxOrder = parseInt(order) + 1;
        var widget = $(this).parent().attr('data-name-widget');
        var row = '';
        row += '<div class="rowPlugin" data-id="'+maxOrder+'" data-folder-plugin="'+folderPlugin+'">';
        row += '- '+pluginName+' - <a class="remove" href="javascript:;">Remove</a>';
        row += '<input type="hidden" name="plugin['+widget+']['+maxOrder+']" value="'+folderPlugin+'">';
        row += '</div>';
        $(this).parent().find('.listPlugin').append(row);
        return false;
    });

  }); 
</script>
<?php
/*
<div id="theme">
    <form action="{{ url('admin/widget') }}" method="post">
        @include('backend.includes.token')
        @foreach( $listWidget as $widget )
        <div class="widget" data-name="{{ $widget }}">
            <div><strong>{{ $widget }}</strong></div>
            <div class="listPlugin">
                <?php $i = 0; ?>
                @if( isset($listPluginInWidget[$widget]) )
                @foreach( $listPluginInWidget[$widget] as $row )
                @foreach( $row as $key => $value )
                <?php $i++; ?>
                <div class="rowPlugin" data-id="{{ $i }}" data-plugin-name="{{ $key }}">
                    - {{ $value }} - <a href="{{ url('admin/widget/'.$widget.'/'.$key.'/'.$i) }}">Edit</a> - <a class="remove" href="javascript:;">Remove</a>
                    <input type="hidden" name="plugin[{{ $widget }}][{{ $i }}]" value="{{ $key }}">
                </div>
                @endforeach
                @endforeach
                @endif
            </div>
            @if( count($listPlugin) > 0 )
            <select class="plugins">
                @foreach( $listPlugin as $key => $value )
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <button type="button" class="addPlugin">Add</button>
            @endif
        </div>
        @endforeach
        <button type="submit">Save</button>
    </form>
</div>
<script type="text/javascript">
  $(document).ready(function(){

    $('#theme').on('click','.remove',function(){

        var widget = $(this).parents().eq(2).attr('data-name');
        var plugin = $(this).parent().attr('data-plugin-name');
        var order = $(this).parent().attr('data-id');

        $.ajax({
            type: 'post',
            url: "{{ url('admin/widget/removeOrderAttribute') }}",
            data: {
                _token: $('#page_token').val(),
                widget: widget,
                plugin: plugin,
                order: order
            }
        });

        $(this).parent().remove();
        return false;
    });

    $('#theme').on('click','.addPlugin',function(){
        var value = $(this).parent().find('.plugins').val();
        var text = $(this).parent().find('.plugins option:selected').text();
        var dataId = $(this).parent().find('.rowPlugin').last().attr('data-id');
        if( dataId === undefined)
        {
            dataId = 0;
        }
        var numberMaxElement = parseInt(dataId) + 1;
        var name = $(this).parent().attr('data-name');
        var row = '';
        row += '<div class="rowPlugin" data-id="'+numberMaxElement+'">';
        row += '- '+text+' - <a class="remove" href="javascript:;">Remove</a>';
        row += '<input type="hidden" name="plugin['+name+']['+numberMaxElement+']" value="'+value+'">';
        row += '</div>';
        $(this).parent().find('.listPlugin').append(row);
        return false;
    });

  }); 
</script>
*/
?>
@stop