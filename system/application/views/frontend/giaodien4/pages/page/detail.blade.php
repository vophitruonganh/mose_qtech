@extends('frontend.giaodien4.layouts.default')
@section('content')


<div class="container">
   <div class="col-md-12" id="layout-page">
      <span class="header-page clearfix">
         <h1>{{ $page->post_title }}</h1>
      </span>
      <div class="content-page">
          {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
      </div>
   </div>
</div>		

@stop