@extends('frontend.giaodien16.layouts.default')
@section('content')

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li><span class="brn">{{ $page->post_title }}</span></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<div class="main-container col2-left-layout">
   <div class="container">
      <div class="row mg0">
         <header class="page-header">
            <h2>{{ $page->post_title }}</h2>
         </header>
         <div class="rte">
           {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
         </div>
      </div>
   </div>
</div>
   
@stop
      