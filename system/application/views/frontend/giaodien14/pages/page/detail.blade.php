@extends('frontend.giaodien14.layouts.default')
@section('content')

         
 <div class="list-sections clearfix">
      <div>
         <div class="col-md-12" id="layout-page">
            <div class="container">
               <div class="header-title-page">
                  <span class="header-page clearfix">
                     <h1>{{ $page->post_title }}</h1>
                  </span>
               </div>
               <div class="content-page">
                  {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
               </div>
            </div>
         </div>
      </div>
   </div>   
           

@stop
     