@extends('frontend.giaodien18.layouts.default')
@section('content')

<div class="breadcrumb">
   <div class="container">
      <ul>
         <li><a href="/" target="_self">Trang chủ</a></li>
         <li class="active"><span>{{$page->post_title}}</span></li>
      </ul>
   </div>
</div>

<div id="layout-page-main">
   <div class="container">
      <div class="content-page container">
               {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
      </div>
   </div>
</div>

@stop        
        
           
          
        