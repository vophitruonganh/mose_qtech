@extends('frontend.giaodien11.layouts.default')
@section('content')

      
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><strong>{{ $page->post_title }}</strong></li>
         </ul>
      </div>
   </div>
</div>
<div class="container">
   <div class="content_page_info">
      <h1>{{ $page->post_title }}</h1>
      <div class="sidebar-line"><span></span></div>
      <div class="rte">
         {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
      </div>
   </div>
</div>
     
      

@stop