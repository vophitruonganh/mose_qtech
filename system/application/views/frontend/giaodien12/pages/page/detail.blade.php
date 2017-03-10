@extends('frontend.giaodien12.layouts.default')
@section('content')
<div id="site-content">
   <div id="main">
      <div class="header-breadcrumb">
         <div class="container">
            <div class="row ">
               <div class="col-xs-12">
                  <ol class="breadcrumb">
                     <li><a href="/" title="Trang chủ">Trang chủ</a>
                     </li>
                     <!-- blog -->
                     <li class="active breadcrumb-title">{{ $page->post_title }}</li>
                     <!-- page.contact -->
                     <!-- current_tags -->
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <h1 style="display:none;">Sport</h1>
      <section class="mtb25 section-page">
         <div class="container">
            <h1>{{ $page->post_title }}</h1>
            <div>
               {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
            </div>
         </div>
      </section>
   </div>
</div>
             
@stop
