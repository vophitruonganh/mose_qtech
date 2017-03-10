@extends('frontend.giaodien17.layouts.default')
@section('content')

<div class="fvc" style="float:left;width:100%;">
<div class="banner_page_list">
   <h1>{{$page->post_title}}</h1>
</div>
<div class="breadcrumbs">
   <div class="container">
      <ul>
         <li class="home"> <a href="/" title="Trang chủ">Trang chủ &nbsp;</a></li>
         <li><strong>{{$page->post_title}}</strong></li>
      </ul>
   </div>
</div>

<div class="container" style="margin-bottom:30px;margin-top: 40px;">
   <div class="span12 post">
            <h2 style="margin-top:0px;">{{$page->post_title}}</h2>
            <div class="sidebar-line"><span></span></div>
            <div class="rte">
               {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
            </div>
   </div>
</div>
		
</div>
@stop