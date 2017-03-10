@extends('backend.layouts.default')
@section('titlePage','Danh sách tập tin')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách tập tin',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/attachment/create').'">Thêm mới tập tin</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-attachment">
        <div class="form-alerts"></div>
        <form id="attachment-form" action="{{ url('admin/attachment') }}" method="post" data-bind="form: disable">
            @include('backend.includes.token')
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action" data-bind="load: Attachment.VSSelect">
                        <div class="pull-md-left">
                            <div class="form-group">
                                <div class="view-switch">
                                    <a href="javascript:;" class="view-item view-list @if( $mode == 'list' ) current @endif" data-layout="list" data-bind="click: Attachment.ViewSwitch"><label class="sr-only">List View</label><i class="font-icon material-icons">list</i></a>
                                    <a href="javascript:;" class="view-item view-grid @if( $mode !== 'list' ) current @endif" data-layout="grid" data-bind="click: Attachment.ViewSwitch"><label class="sr-only">Grid View</label><i class="font-icon material-icons">view_module</i></a>
                                </div>
                            </div>
                            {!! tableActionForm('','','','click: Attachment.TableAction') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Attachment.TableSearch') !!}
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="attachment-list data-list data-table" data-bind="load: Table.SetCheckAll, load: Attachment.DeleteGrid">
                        @if( $mode == 'list' )
                            @include('backend.pages.attachment.viewListAttachment')
                        @else
                            @include('backend.pages.attachment.viewGridAttachment')
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
    {!!pagination($attachments,$pagination)!!}
@stop