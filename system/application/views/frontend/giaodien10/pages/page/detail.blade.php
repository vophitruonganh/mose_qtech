@extends('frontend.giaodien10.layouts.default')
@section('content')
<div id="maincontainer">
    <div class="container">
        <div>
            <div class="col-md-9" id="layout-page">
                <h1 class="heading1"><span class="maintext">{{ $page->post_title }}</span></h1>
                <div class="content-page">
                     {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop