@extends('backend.layouts.default')
@section('titlePage','Danh sách giao diện')
@section('content')
<?php 
    $heading = array(
        'heading_text' => 'Danh sách giao diện',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-template">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
            <div class="row" >
                @foreach( $data as $key => $value )
                    <form action="{{ url('admin/template') }}" method="post">
                    @include('backend.includes.token')
                    <div class="item col-lg-4 col-sm-6 col-xs-12">
                        <div class="box-typical b-t-m">
                            <div class="item-thumb">
                                <div class="thumbnail"><div class="centered"><img src="{{ url($value['screenshot']) }}" alt="{{ $key }}" /></div></div>
                            </div>
                            <div class="item-info">
                                <h4>{{ $value['infoTemplateName'] }} <small class="text-muted">Version: {{ $value['infoTemplateVersion'] }}</small></h4>
                                @if( $activeTemplate == $key )
                                <span class="label label-primary">Đang sử dụng</span>
                                @else
                                <span class="label label-default">Không sử dụng</span>
                                @endif
                                <p class="font-lg-size card-text">Giao diện cung cấp bởi <b>QM Tech</b></p>
                                @if( $activeTemplate !== $key )
                                <button class="btn btn-secondary" type="submit">Kích hoạt</button><input type="hidden" name="template" value="{{ $key }}" />
                                @endif
                                @if( $themeOption && $activeTemplate == $key )<a class="btn btn-secondary" href="{{ url('admin/template/option') }}"><i class="material-icons md-16">settings</i> Thiết lập</a>@endif
                            </div>
                        </div>
                    </div>
                    </form>
                @endforeach
            </div>
    </div>
@stop