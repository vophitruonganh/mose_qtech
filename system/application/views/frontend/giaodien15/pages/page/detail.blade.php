@extends('frontend.giaodien15.layouts.default')
@section('content')

<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <img src="//hstatic.net/033/1000104033/1000147703/bg-breadcrumb.jpg?v=55" alt="">
      <div class="inner">
         <div class="breadcrumb-list">
            <a href="/" title="Quay lại trang chủ">Trang chủ</a>
            <span aria-hidden="true">/</span>
            <span>{{ $page->post_title }}</span>
         </div>
         <h3 class="page_name">{{ $page->post_title }}</h3>
      </div>
   </nav>
   <!-- /templates/page.liquid -->
   <div class="grid">
      <div class="sidebar grid__item large--one-quarter">
         <div class="collection-sidebar">
            <!-- /snippets/collection-sidebar.liquid -->
               <!-- Widget cccccccc -->
                  {!!showWidget('widgetcccccccc')!!}
               <!-- End Widget cccccccc -->
            
            <!-- end category sidebar -->
            <!-- Widget dddddddd -->
                  {!!showWidget('widgetdddddddd')!!}
               <!-- End Widget dddddddd -->
           

            <!-- end widget 1 -->
            
            
         </div>
         
      </div>
       
       
      <em>
         <div class="grid__item large--three-quarters ">
             {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
         </div>
      </em>
   </div>
   <em>
   </em>
</main>


 <!-- begin site-footer -->
@stop

       