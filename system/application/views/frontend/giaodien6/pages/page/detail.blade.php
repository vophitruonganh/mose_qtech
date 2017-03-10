@extends('frontend.giaodien6.layouts.default')
@section('content')

<main class="padding-top-mobile">
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="{{url('/')}}" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li class="active"><span>{{ $page->post_title }}</span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div class="layout-page">
      <div class="container">
         <div class="row">
            <div class="col-md-2 pd-none-r hidden-sm hidden-xs">
               <ul class="sidebar-page-left">
                  <li class="active"><a href="{{ url('pages/gioi-thieu') }}">{{ $page->post_title }}</a></li>
                  <li class=""><a href="{{url('pages/contact')}}">Liên hệ</a></li>
               </ul>
            </div>
            <div class="col-md-10 col-xs-12 page-border-left pd5">
               {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
            </div>
         </div>
      </div>
   </div>
</main>
               
@stop                           