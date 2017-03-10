@extends('backend.layouts.default')
@section('titlePage','Danh sách giao diện')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách giao diện',
        'heading_button' =>'<a class="btn btn-primary waves-effect" href="'.url('admin/themes/install').'">Thêm mới giao diện</a>'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-themes">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form action="{{ url('admin/themes') }}" method="get">
            @include('backend.includes.token')
            <div class="list-theme">
                <div class="row" >
                    @foreach($data as $key => $value)
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="box-typical m-b-2">
                                <div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="{{ url($value['screenshot']) }}" alt="{{ $key }}" /></div></div></div>
                                <div class="theme-info">
                                    <h4>{{ $value['infoTemplateName'] }} <small class="text-muted">Version: {{ $value['infoTemplateVersion'] }}</small></h4>
                                    @if( $activeTemplate == $key ) <span class="label label-primary">Đang sử dụng</span> @else <span class="label label-default">Không sử dụng</span> @endif
                                    <p>Giao diện cung cấp bởi <b>QM Tech</b></p>
                                    @if( $activeTemplate !== $key ) <a class="btn btn-secondary" href="{{ url('admin/themes/active/'.$key) }}">Kích hoạt</a> @endif
                                    @if( $themeOption && $activeTemplate == $key )<a class="btn btn-secondary" href="{{ url('admin/themes/option') }}"><i class="material-icons md-16">settings</i> Thiết lập</a>@endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>
@stop