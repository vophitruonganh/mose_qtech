@extends('frontend.giaodien13.layouts.default')
@section('content')

<section>
   <div class="page-header" style="">
      <div class="container">
         <h1 class="page-header__title  display-1">Giới thiệu</h1>
      </div>
   </div>
   <div id="breadcrumb">
      <div class="container">
         <div class="breadcrumb ">
            <ol class=" breadcrumb-arrow">
               <li><a href="/" target="_self">Trang chủ</a></li>
               <li class="active"><span>Giới thiệu</span></li>
            </ol>
         </div>
      </div>
   </div>
   <div id="primary" class="content-area  container">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
         </div>
      </div>
   </div>
</section> 
@stop
     
      
     
      
      
      