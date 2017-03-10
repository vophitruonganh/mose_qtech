@extends('backend.layouts.default')
@section('titlePage',$data_arr['section_title'])
@section('content')
<?php 
    $heading = array(
        'heading_text' => $data_arr['section_title'],
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/taxonomy/'.$data_arr['tax_slug'].'/create').'">Thêm mới '.$data_arr['tax_name'].'</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-taxonomy">
        <div class="form-alerts"></div>
        <form id="taxonomy-form" action="{{ url('admin/taxonomy/'.$data_arr['tax_slug']) }}" method="post" data-bind="form: disable">
            @include('backend.includes.token')
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            {!! tableActionForm('','','','click: Table.Action') !!}
                        </div>
                        {!! tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Taxonomy.TableSearch') !!}
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="taxonomy-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        @include('backend.pages.taxonomy.listViewTaxonomy')
                    </div>
                </div>
            </div>
        </form>
    </div>
    {!! pagination($taxonomy,$pagination) !!}
@stop